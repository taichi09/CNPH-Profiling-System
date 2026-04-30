<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PersonalInformation;
use App\Models\OtherInformation;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;

class EmployeeExportController extends Controller
{
    // ── Preview (AJAX — just for record count) ───────────────────────────────
    public function preview(Request $request)
    {
        $total = $this->buildQuery($request)->count();

        return response()->json(['total' => $total]);
    }

    // ── Export ───────────────────────────────────────────────────────────────
    public function export(Request $request)
    {
        $format    = $request->get('format', 'pdf');
        $title     = $request->get('custom_title', 'Employee List');
        $employees = $this->buildQuery($request)->get();

        return $format === 'excel'
            ? $this->exportExcel($employees, $title)
            : $this->exportPdf($employees, $title);
    }

    // ── Shared Query Builder ─────────────────────────────────────────────────
    private function buildQuery(Request $request)
    {
        $tab    = $request->get('tab', 'active');
        $search = $request->get('search');

        if ($search) {
            $ldSubquery = DB::raw('(
                SELECT employee_id,
                       GROUP_CONCAT(title_of_learning_and_development_interventions
                           ORDER BY employee_id SEPARATOR " | ") AS matched_training
                FROM learning_and_development_interventions
                WHERE title_of_learning_and_development_interventions LIKE '
                    . DB::connection()->getPdo()->quote("%{$search}%") . '
                GROUP BY employee_id
            ) AS ld_agg');
        } else {
            $ldSubquery = DB::raw('(SELECT NULL AS employee_id, NULL AS matched_training LIMIT 0) AS ld_agg');
        }

        $query = PersonalInformation::leftJoin(
                'other_information',
                'personal_information.employee_id', '=', 'other_information.employee_id'
            )
            ->leftJoin($ldSubquery, 'ld_agg.employee_id', '=', 'personal_information.employee_id')
            ->select(
                'personal_information.employee_id',
                'personal_information.surname',
                'personal_information.first_name',
                'personal_information.middle_name',
                'other_information.department_name',
                'other_information.employment_status',
                'other_information.date_resigned',
                'ld_agg.matched_training'
            );

        // Tab filter
        if ($tab === 'resigned') {
            $query->where('other_information.employment_status', 'Resigned');
        } else {
            $query->where('other_information.employment_status', '!=', 'Resigned');
        }

        // Search: name or L&D training match
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('personal_information.surname', 'LIKE', "%{$search}%")
                  ->orWhere('personal_information.first_name', 'LIKE', "%{$search}%")
                  ->orWhere('personal_information.middle_name', 'LIKE', "%{$search}%")
                  ->orWhereNotNull('ld_agg.matched_training');
            });
        }

        // Filter: Department
        if ($request->filled('departments')) {
            $depts = explode(',', $request->get('departments'));
            $query->where(function ($q) use ($depts) {
                foreach ($depts as $dept) {
                    $q->orWhereRaw(
                        'LOWER(other_information.department_name) LIKE ?',
                        [strtolower(trim($dept)) . '%']
                    );
                }
            });
        }

        // Filter: Employment Type
        if ($request->filled('employment_types')) {
            $query->whereIn(
                'other_information.employment_status',
                explode(',', $request->get('employment_types'))
            );
        }

        // Filter: Gender
        if ($request->filled('genders')) {
            $query->whereIn(
                'personal_information.sex_at_birth',
                explode(',', $request->get('genders'))
            );
        }

        // Filter: Birth Year range
        if ($request->filled('birth_from')) {
            $query->whereYear(
                'personal_information.date_of_birth', '>=', (int) $request->get('birth_from')
            );
        }
        if ($request->filled('birth_to')) {
            $query->whereYear(
                'personal_information.date_of_birth', '<=', (int) $request->get('birth_to')
            );
        }

        // Filter: Age Group
        if ($request->filled('age_groups')) {
            $groups = explode(',', $request->get('age_groups'));
            $ageMap = [
                '18–25' => [18, 25],
                '26–35' => [26, 35],
                '36–45' => [36, 45],
                '46–55' => [46, 55],
                '56+'   => [56, 150],
            ];
            $query->where(function ($q) use ($groups, $ageMap) {
                foreach ($groups as $group) {
                    $group = trim($group);
                    if (isset($ageMap[$group])) {
                        [$min, $max] = $ageMap[$group];
                        $q->orWhereBetween(
                            DB::raw('TIMESTAMPDIFF(YEAR, personal_information.date_of_birth, CURDATE())'),
                            [$min, $max]
                        );
                    }
                }
            });
        }

        return $query->orderBy('personal_information.surname', 'asc');
    }

    // ── PDF — streams in browser tab (native print/download toolbar) ─────────
private function exportPdf($employees, string $title)
{
    $pdf = Pdf::loadView('employees.exports.pdf', compact('employees', 'title'))
        ->setPaper('a4', 'portrait')
        ->setOption('isPhpEnabled', true)
        ->setOption('isRemoteEnabled', true); // needed to load the local image

    $filename = \Illuminate\Support\Str::slug($title) . '.pdf';
    return $pdf->stream($filename);
}

    // ── Excel — direct download ───────────────────────────────────────────────
    private function exportExcel($employees, string $title)
    {
        $spreadsheet = new Spreadsheet();
        $sheet       = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Employees');

        // Row 1 — Title
        $sheet->mergeCells('A1:D1');
        $sheet->setCellValue('A1', strtoupper($title));
        $sheet->getStyle('A1')->applyFromArray([
            'font'      => ['bold' => true, 'size' => 13, 'color' => ['rgb' => '1A5C2A']],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER],
            'fill'      => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => 'E8F5E9']],
        ]);
        $sheet->getRowDimension(1)->setRowHeight(30);

        // Row 2 — Generated date
        $sheet->mergeCells('A2:D2');
        $sheet->getStyle('A2')->applyFromArray([
            'font'      => ['italic' => true, 'size' => 9, 'color' => ['rgb' => '6B7280']],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
        ]);

        // Row 3 — Column headers
        foreach (['#', 'Last Name', 'First Name', 'Middle Name'] as $col => $header) {
            $sheet->setCellValue(chr(65 + $col) . '3', $header);
        }
        $sheet->getStyle('A3:D3')->applyFromArray([
            'font'      => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']],
            'fill'      => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => '15803D']],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
            'borders'   => ['allBorders' => ['borderStyle' => Border::BORDER_THIN, 'color' => ['rgb' => 'FFFFFF']]],
        ]);

        // Data rows
        foreach ($employees as $i => $emp) {
            $row = $i + 4;
            $sheet->setCellValue("A{$row}", $i + 1);
            $sheet->setCellValue("B{$row}", $emp->surname);
            $sheet->setCellValue("C{$row}", $emp->first_name);
            $sheet->setCellValue("D{$row}", $emp->middle_name ?? '');

            $bg = $i % 2 === 0 ? 'FFFFFF' : 'F0FDF4';
            $sheet->getStyle("A{$row}:D{$row}")->applyFromArray([
                'fill'    => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => $bg]],
                'borders' => ['allBorders' => ['borderStyle' => Border::BORDER_HAIR, 'color' => ['rgb' => 'D1D5DB']]],
            ]);
            $sheet->getStyle("A{$row}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        }

        // Column widths
        $sheet->getColumnDimension('A')->setWidth(6);
        $sheet->getColumnDimension('B')->setWidth(22);
        $sheet->getColumnDimension('C')->setWidth(22);
        $sheet->getColumnDimension('D')->setWidth(22);

        $filename = \Illuminate\Support\Str::slug($title) . '.xlsx';
        $tempPath = sys_get_temp_dir() . '/' . $filename;

        (new Xlsx($spreadsheet))->save($tempPath);

        return response()->download($tempPath, $filename, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ])->deleteFileAfterSend(true);
    }
}