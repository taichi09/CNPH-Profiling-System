<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Imports\EmployeePdsImport;
use App\Models\PersonalInformation;
use App\Models\FamilyBackground;
use App\Models\EducationalBackground;
use App\Models\CivilServiceEligibility;
use App\Models\WorkExperience;
use App\Models\VoluntaryWork;
use App\Models\LearningAndDevelopment;
use App\Models\OtherInformation;
use App\Models\Department;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $tab = $request->get('tab', 'active');
        $search = $request->get('search');

        // Base query
        $query = PersonalInformation::leftJoin(
                'other_information',
                'personal_information.employee_id',
                '=',
                'other_information.employee_id'
            )
            ->select(
                'personal_information.*',
                'other_information.department_name',
                'other_information.employment_status'
            );

        // Tab: active / resigned
        if ($tab === 'resigned') {
            $query->where('other_information.employment_status', 'Resigned');
        } else {
            $query->where('other_information.employment_status', '!=', 'Resigned');
        }

        // NAME SEARCH ONLY (Disregard ID)
        if ($request->filled('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('personal_information.surname', 'LIKE', "%{$search}%")
                ->orWhere('personal_information.first_name', 'LIKE', "%{$search}%")
                ->orWhere('personal_information.middle_name', 'LIKE', "%{$search}%");
            });
        }

        // Filter: Department
        if ($request->filled('departments')) {
            $depts = explode(',', $request->get('departments'));
            $query->whereIn('other_information.department_name', $depts);
        }

        // Filter: Employment Type
        if ($request->filled('employment_types')) {
            $types = explode(',', $request->get('employment_types'));
            $query->whereIn('other_information.employment_status', $types);
        }

        // Filter: Gender (sex_at_birth column on personal_information)
        if ($request->filled('genders')) {
            $genders = explode(',', $request->get('genders'));
            $query->whereIn('personal_information.sex_at_birth', $genders);
        }

        // Filter: Birth Year range
        if ($request->filled('birth_from')) {
            $query->whereYear('personal_information.date_of_birth', '>=', (int) $request->get('birth_from'));
        }
        if ($request->filled('birth_to')) {
            $query->whereYear('personal_information.date_of_birth', '<=', (int) $request->get('birth_to'));
        }

        // Filter: Age Group
        // Age is derived from date_of_birth at query time using TIMESTAMPDIFF.
        // Each selected group expands into a BETWEEN clause joined with OR.
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

        // Paginate & preserve query params
        $employees = $query->orderBy('personal_information.surname', 'asc')
                    ->paginate(10)
                    ->withQueryString();

        // SMOOTH SEARCH CHECK
        // If it's an AJAX request, return ONLY the table partial
        if ($request->ajax()) {
            return view('employees.partials.table', compact('employees', 'tab'))->render();
        }

        $activeCount = OtherInformation::where('employment_status', '!=', 'Resigned')->count();
        $resignedCount = OtherInformation::where('employment_status', 'Resigned')->count();

        return view('employees.index', compact('employees', 'tab', 'activeCount', 'resignedCount'));
    }

    public function cancelCreate()
    {
        for ($i = 1; $i <= 8; $i++) {
            session()->forget("employee_step_{$i}");
        }
        return redirect()->route('employees.index');
    }

   public function create($step = 1)
{
    $departments = Department::orderBy('dept_name')->get();

    return view('employees.create.index', [
        'currentStep' => (int)$step,
        'departments' => $departments,
    ]);
}

    public function storeStep(Request $request, $step)
    {
        $data = $request->except('_token');

        if ((int)$step === 1) {
            $citizenshipParts = array_filter([
                $data['citizenship'] ?? '',
                $data['citizenship_type'] ?? '',
                $data['citizenship_country'] ?? '',
            ]);
            $data['citizenship'] = implode('//', $citizenshipParts) ?: 'N/A';
            unset($data['citizenship_type']);
            unset($data['citizenship_country']);

            if (isset($data['civil_status']) && $data['civil_status'] === 'Others') {
                if (!empty($data['civil_status_other'])) {
                    $data['civil_status'] = $data['civil_status_other'];
                }
            }
            unset($data['civil_status_other']);
        }

        $request->session()->put("employee_step_{$step}", $data);

        if ((int)$step < 8) {
            return redirect()->route('employees.create.step', (int)$step + 1);
        }

        $s1 = $request->session()->get('employee_step_1', []);
        $s2 = $request->session()->get('employee_step_2', []);
        $s3 = $request->session()->get('employee_step_3', []);
        $s4 = $request->session()->get('employee_step_4', []);
        $s5 = $request->session()->get('employee_step_5', []);
        $s6 = $request->session()->get('employee_step_6', []);
        $s7 = $request->session()->get('employee_step_7', []);
        $s8 = $request->session()->get('employee_step_8', []);

        do {
            $employeeId = 'CNPH-' . strtoupper(substr(str_replace('-', '', \Illuminate\Support\Str::uuid()), 0, 8));
        } while (PersonalInformation::where('employee_id', $employeeId)->exists());

        $buildAddress = function (array $data, string $prefix): string {
            $parts = array_filter([
                $data["{$prefix}_house"] ?? 'N/A',
                $data["{$prefix}_street"] ?? 'N/A',
                $data["{$prefix}_subdivision"] ?? 'N/A',
                $data["{$prefix}_barangay"] ?? 'N/A',
                $data["{$prefix}_city"] ?? 'N/A',
                $data["{$prefix}_province"] ?? 'N/A',
            ]);
            return implode('//', $parts) ?: 'N/A';
        };

        DB::transaction(function () use (
            $employeeId, $s1, $s2, $s3, $s4, $s5, $s6, $s7, $s8, $buildAddress
        ) {
            PersonalInformation::create([
                'employee_id' => $employeeId,
                'surname' => $s1['surname'] ?? 'N/A',
                'first_name' => $s1['first_name'] ?? 'N/A',
                'middle_name' => $s1['middle_name'] ?? 'N/A',
                'extension' => $s1['name_extension'] ?? 'N/A',
                'date_of_birth' => !empty($s1['date_of_birth']) ? $s1['date_of_birth'] : null,
                'place_of_birth' => $s1['place_of_birth'] ?? 'N/A',
                'sex_at_birth' => $s1['sex_at_birth'] ?? 'N/A',
                'civil_status' => $s1['civil_status'] ?? 'N/A',
                'height' => $s1['height'] ?? 'N/A',
                'weight' => $s1['weight'] ?? 'N/A',
                'blood_type' => $s1['blood_type'] ?? 'N/A',
                'umid_id_no' => $s1['umid'] ?? 'N/A',
                'pagibig_id_no' => $s1['pagibig'] ?? 'N/A',
                'philhealth_id_no' => $s1['philhealth'] ?? 'N/A',
                'philsys_no' => $s1['philsys'] ?? 'N/A',
                'tin_no' => $s1['tin'] ?? 'N/A',
                'agency_employee_no' => $s1['agency_employee_no'] ?? 'N/A',
                'citizenship' => $s1['citizenship'] ?? 'N/A',
                'residential_address' => $buildAddress($s1, 'res'),
                'residential_zip_code' => $s1['res_zip'] ?? 'N/A',
                'permanent_address' => $buildAddress($s1, 'perm'),
                'permanent_zip_code' => $s1['perm_zip'] ?? 'N/A',
                'telephone_no' => $s1['telephone'] ?? 'N/A',
                'mobile_no' => $s1['mobile'] ?? 'N/A',
                'email_address' => $s1['email'] ?? 'N/A',
            ]);

            $children = $s2['children'] ?? [];
            $childNames = implode('; ', array_filter(array_column($children, 'name')));
            $childDobs = implode('; ', array_filter(array_column($children, 'dob')));

            FamilyBackground::create([
                'employee_id' => $employeeId,
                'spouse_surname' => $s2['spouse_surname'] ?? 'N/A',
                'spouse_first_name' => $s2['spouse_first_name'] ?? 'N/A',
                'spouse_middle_name' => $s2['spouse_middle_name'] ?? 'N/A',
                'spouse_name_extension' => $s2['spouse_extension'] ?? 'N/A',
                'occupation' => $s2['spouse_occupation'] ?? 'N/A',
                'employer_business_name' => $s2['spouse_employer'] ?? 'N/A',
                'business_address' => $s2['spouse_business_address'] ?? 'N/A',
                'telephone_no' => $s2['spouse_telephone'] ?? 'N/A',
                'name_of_children' => $childNames ?: 'N/A',
                'date_of_birth' => $childDobs ?: 'N/A',
                'father_surname' => $s2['father_surname'] ?? 'N/A',
                'father_first_name' => $s2['father_first_name'] ?? 'N/A',
                'father_middle_name' => $s2['father_middle_name'] ?? 'N/A',
                'father_name_extension' => $s2['father_extension'] ?? 'N/A',
                'mother_surname' => $s2['mother_surname'] ?? 'N/A',
                'mother_first_name' => $s2['mother_first_name'] ?? 'N/A',
                'mother_middle_name' => $s2['mother_middle_name'] ?? 'N/A',
            ]);

            $levels = [
                'elem' => 'Elementary',
                'sec' => 'Secondary',
                'voc' => 'Vocational/Trade Course',
                'col' => 'College',
                'grad' => 'Graduate Studies',
            ];
            foreach ($levels as $prefix => $label) {
                $rows = $s3[$prefix] ?? [[]];
                if (empty($rows)) $rows = [[]];
                foreach ($rows as $row) {
                    EducationalBackground::create([
                        'employee_id' => $employeeId,
                        'level' => $label,
                        'name_of_school' => !empty($row['school']) ? $row['school'] : 'N/A',
                        'basic_education' => !empty($row['course']) ? $row['course'] : 'N/A',
                        'period_of_attendance_from' => !empty($row['from']) ? $row['from'] : 'N/A',
                        'period_of_attendance_to' => !empty($row['to']) ? $row['to'] : 'N/A',
                        'highest_level' => !empty($row['units']) ? $row['units'] : 'N/A',
                        'year_graduated' => !empty($row['year_grad']) ? $row['year_grad'] : 'N/A',
                        'scholarship_academic_honors_recieved' => !empty($row['honors']) ? $row['honors'] : 'N/A',
                    ]);
                }
            }

            $eligibilities = $s4['eligibility'] ?? [[]];
            if (empty($eligibilities)) $eligibilities = [[]];
            foreach ($eligibilities as $row) {
                CivilServiceEligibility::create([
                    'employee_id' => $employeeId,
                    'eligibility' => !empty($row['name']) ? $row['name'] : 'N/A',
                    'rating' => !empty($row['rating']) ? $row['rating'] : 'N/A',
                    'date_of_examination' => !empty($row['date']) ? $row['date'] : 'N/A',
                    'place_of_examination' => !empty($row['place']) ? $row['place'] : 'N/A',
                    'license_no' => !empty($row['license_no']) ? $row['license_no'] : 'N/A',
                    'license_validity' => !empty($row['license_valid']) ? $row['license_valid'] : 'N/A',
                ]);
            }

            $work = $s5['work'] ?? [[]];
            if (empty($work)) $work = [[]];
            foreach ($work as $row) {
                WorkExperience::create([
                    'employee_id' => $employeeId,
                    'inclusive_date_from' => !empty($row['from']) ? $row['from'] : 'N/A',
                    'inclusive_date_to' => !empty($row['to']) ? $row['to'] : 'N/A',
                    'position_title' => !empty($row['position']) ? $row['position'] : 'N/A',
                    'department_agency_office_company' => !empty($row['department']) ? $row['department'] : 'N/A',
                    'monthly_salary' => !empty($row['monthly_salary']) ? $row['monthly_salary'] : 'N/A',
                    'salary_grade' => !empty($row['salary_grade']) ? $row['salary_grade'] : 'N/A',
                    'status_of_appointment' => !empty($row['status']) ? $row['status'] : 'N/A',
                    'govt_service' => !empty($row['govt_service']) ? $row['govt_service'] : 'N/A',
                ]);
            }

            $voluntary = $s6['voluntary'] ?? [[]];
            if (empty($voluntary)) $voluntary = [[]];
            foreach ($voluntary as $row) {
                VoluntaryWork::create([
                    'employee_id' => $employeeId,
                    'name_and_address_of_organization' => !empty($row['organization']) ? $row['organization'] : 'N/A',
                    'inclusive_date_from' => !empty($row['from']) ? $row['from'] : 'N/A',
                    'inclusive_date_to' => !empty($row['to']) ? $row['to'] : 'N/A',
                    'number_of_hours' => !empty($row['hours']) ? $row['hours'] : 'N/A',
                    'position_nature_of_work' => !empty($row['position']) ? $row['position'] : 'N/A',
                ]);
            }

            $ld = $s7['ld'] ?? [[]];
            if (empty($ld)) $ld = [[]];
            foreach ($ld as $row) {
                LearningAndDevelopment::create([
                    'employee_id' => $employeeId,
                    'title_of_learning_and_development_interventions' => !empty($row['title']) ? $row['title'] : 'N/A',
                    'inclusive_date_from' => !empty($row['from']) ? $row['from'] : 'N/A',
                    'inclusive_date_to' => !empty($row['to']) ? $row['to'] : 'N/A',
                    'number_of_hours' => !empty($row['hours']) ? $row['hours'] : 'N/A',
                    'type_of_l_d' => !empty($row['type']) ? $row['type'] : 'N/A',
                    'conducted_sponsored_by' => !empty($row['conducted_by']) ? $row['conducted_by'] : 'N/A',
                ]);
            }

            OtherInformation::create([
                'employee_id' => $employeeId,
                'special_skills_and_hobbies' => implode(',', array_filter($s8['skills'] ?? [])) ?: 'N/A',
                'non_academic_distinction' => implode(',', array_filter($s8['distinctions'] ?? [])) ?: 'N/A',
                'membership_in_association' => implode(',', array_filter($s8['memberships'] ?? [])) ?: 'N/A',
                'landbank_no' => $s8['landbank_no'] ?? 'N/A',
                'dbp_no' => $s8['dbp_no'] ?? 'N/A',
                'sss_id' => $s8['sss_id'] ?? 'N/A',
                'department_name' => $s8['department_name'] ?? 'N/A',
                'employment_status' => $s8['employment_status'] ?? 'N/A',
            ]);
        });

        for ($i = 1; $i <= 8; $i++) {
            $request->session()->forget("employee_step_{$i}");
        }

        return redirect()->route('employees.index')
            ->with('success', "Employee {$employeeId} added successfully.");
    }

    public function import(Request $request)
    {
        if ($request->has('temp_path')) {
            $request->validate(['temp_path' => 'required|string']);

            $tempPath = $request->input('temp_path');

            if (! Storage::exists($tempPath)) {
                return back()->withErrors(['file' => 'Session expired. Please re-upload the file.']);
            }

            Excel::import(new EmployeePdsImport, Storage::path($tempPath));
            Storage::delete($tempPath);
        } else {
            $request->validate([
                'file' => 'required|mimes:xlsx,xlsm,xls|max:10240',
            ]);
            Excel::import(new EmployeePdsImport, $request->file('file'));
        }

        $imported = PersonalInformation::where('employee_id', 'not like', 'CNPH-%')->get();

        DB::transaction(function () use ($imported) {
            foreach ($imported as $employee) {
                $oldId = $employee->employee_id;

                do {
                    $newId = 'CNPH-' . strtoupper(
                        substr(str_replace('-', '', \Illuminate\Support\Str::uuid()), 0, 8)
                    );
                } while (PersonalInformation::where('employee_id', $newId)->exists());

                PersonalInformation::where('employee_id', $oldId)->update(['employee_id' => $newId]);
                FamilyBackground::where('employee_id', $oldId)->update(['employee_id' => $newId]);
                EducationalBackground::where('employee_id', $oldId)->update(['employee_id' => $newId]);
                CivilServiceEligibility::where('employee_id', $oldId)->update(['employee_id' => $newId]);
                WorkExperience::where('employee_id', $oldId)->update(['employee_id' => $newId]);
                VoluntaryWork::where('employee_id', $oldId)->update(['employee_id' => $newId]);
                LearningAndDevelopment::where('employee_id', $oldId)->update(['employee_id' => $newId]);
                OtherInformation::where('employee_id', $oldId)->update(['employee_id' => $newId]);
            }
        });

        return back()->with('success', 'All employee data imported and IDs generated successfully.');
    }

    public function show($id)
    {
        $personal = PersonalInformation::where('employee_id', $id)->firstOrFail();
        $family = FamilyBackground::where('employee_id', $id)->first();
        $education = EducationalBackground::where('employee_id', $id)->get();
        $eligibility = CivilServiceEligibility::where('employee_id', $id)->get();
        $work = WorkExperience::where('employee_id', $id)->get();
        $voluntary = VoluntaryWork::where('employee_id', $id)->get();
        $learning = LearningAndDevelopment::where('employee_id', $id)->get();
        $other = OtherInformation::where('employee_id', $id)->first();

        return view('employees.show', compact(
            'personal', 'family', 'education', 'eligibility',
            'work', 'voluntary', 'learning', 'other'
        ));
    }

    public function resign($id)
    {
        DB::table('other_information')
            ->where('employee_id', $id)
            ->update(['employment_status' => 'RESIGNED']);

        return back()->with('success', 'Employee marked as resigned.');
    }

    public function reinstate(Request $request, $id)
    {
        $request->validate([
            'employment_status' => 'required|string',
            'department' => 'required|string',
        ]);

        DB::table('other_information')
            ->where('employee_id', $id)
            ->update([
                'employment_status' => $request->employment_status,
                'department_name' => $request->department,
            ]);

        return back()->with('success', 'Employee has been reinstated successfully.');
    }

    public function importPreview(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xlsm,xls|max:10240',
        ]);

        $tempPath = $request->file('file')->store('import_temp');
        $fullPath = Storage::path($tempPath);
        $spreadsheet = IOFactory::load($fullPath);

        $sheet = null;
        foreach ($spreadsheet->getWorksheetIterator() as $ws) {
            if (strtolower(trim($ws->getTitle())) === 'personal_information') {
                $sheet = $ws;
                break;
            }
        }

        if (! $sheet) {
            Storage::delete($tempPath);
            return response()->json([
                'message' => 'Sheet "personal_information" not found in the uploaded file.'
            ], 422);
        }

        $rows = $sheet->toArray(null, true, true, true);
        $headingRow = null;
        $headings = [];
        $new = [];
        $updated = [];
        $duplicate = [];
        $seenInFile = [];

        foreach ($rows as $rowIndex => $row) {
            if ($headingRow === null) {
                $normalized = array_map(fn($v) => strtolower(trim((string) $v)), $row);
                if (in_array('employee_id', $normalized, true)) {
                    $headingRow = $rowIndex;
                    foreach ($row as $col => $val) {
                        $headings[strtolower(trim((string) $val))] = $col;
                    }
                }
                continue;
            }

            $get = function (string $key) use ($row, $headings): string {
                return isset($headings[$key]) ? trim((string) ($row[$headings[$key]] ?? '')) : '';
            };

            $surname = $get('surname');
            $firstName = $get('first_name');
            $middleName = $get('middle_name');
            $dobRaw = $get('date_of_birth');

            if ($surname === '' && $firstName === '') continue;

            $dob = $this->parseDatePreview($dobRaw);
            $fileKey = strtolower("{$surname}|{$firstName}|{$middleName}|{$dob}");
            $fullName = trim("{$surname}, {$firstName}" . ($middleName ? " {$middleName}" : ''));

            if (isset($seenInFile[$fileKey])) {
                $duplicate[] = [
                    'name' => $fullName,
                    'reason' => 'Duplicate entry within the uploaded file — will be skipped',
                ];
                continue;
            }
            $seenInFile[$fileKey] = true;

            $existing = PersonalInformation::whereRaw('LOWER(TRIM(surname)) = ?', [strtolower($surname)])
                ->whereRaw('LOWER(TRIM(first_name)) = ?', [strtolower($firstName)])
                ->whereRaw('LOWER(TRIM(middle_name)) = ?', [strtolower($middleName)])
                ->whereDate('date_of_birth', $dob ?: '0000-00-00')
                ->first();

            if ($existing) {
                $changes = $this->detectChanges($existing, $row, $headings, $get);

                if (empty($changes)) {
                    $duplicate[] = [
                        'name' => $fullName,
                        'employee_id' => $existing->employee_id,
                        'reason' => 'Identical record already exists — will be skipped',
                    ];
                } else {
                    $updated[] = [
                        'name' => $fullName,
                        'employee_id' => $existing->employee_id,
                        'changes' => implode(', ', $changes),
                    ];
                }
            } else {
                $new[] = ['name' => $fullName];
            }
        }

        return response()->json([
            'temp_path' => $tempPath,
            'new' => $new,
            'updated' => $updated,
            'duplicate' => $duplicate,
            'summary' => [
                'new_count' => count($new),
                'updated_count' => count($updated),
                'duplicate_count' => count($duplicate),
            ],
        ]);
    }

    private function parseDatePreview($value): ?string
    {
        if (empty($value)) return null;

        if (is_numeric($value)) {
            return ExcelDate::excelToDateTimeObject($value)->format('Y-m-d');
        }

        if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $value)) {
            return $value;
        }

        if (preg_match('/^(\d{2})\/(\d{2})\/(\d{4})$/', $value, $m)) {
            try {
                return ((int) $m[1] > 12)
                    ? Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d')
                    : Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');
            } catch (\Exception $e) {
                return null;
            }
        }

        try {
            return Carbon::parse($value)->format('Y-m-d');
        } catch (\Exception $e) {
            return null;
        }
    }

    private function detectChanges(
        PersonalInformation $existing,
        array $row,
        array $headings,
        callable $get
    ): array {
        $changes = [];

        $fieldsToCheck = [
            'extension' => 'Extension',
            'place_of_birth' => 'Place of Birth',
            'sex_at_birth' => 'Sex',
            'civil_status' => 'Civil Status',
            'height' => 'Height',
            'weight' => 'Weight',
            'blood_type' => 'Blood Type',
            'umid_id_no' => 'UMID No.',
            'pagibig_id_no' => 'Pag-IBIG No.',
            'philhealth_id_no' => 'PhilHealth No.',
            'philsys_no' => 'PhilSys No.',
            'tin_no' => 'TIN No.',
            'agency_employee_no' => 'Agency Employee No.',
            'citizenship' => 'Citizenship',
            'residential_address' => 'Residential Address',
            'residential_zip_code' => 'Residential ZIP',
            'permanent_address' => 'Permanent Address',
            'permanent_zip_code' => 'Permanent ZIP',
            'telephone_no' => 'Telephone No.',
            'mobile_no' => 'Mobile No.',
            'email_address' => 'Email Address',
        ];

        foreach ($fieldsToCheck as $column => $label) {
            $incoming = strtolower(trim((string) $get($column)));
            $existing_ = strtolower(trim((string) ($existing->$column ?? '')));

            if ($incoming !== '' && $incoming !== $existing_) {
                $changes[] = $label;
            }
        }

        return $changes;
    }

    public function editStep(Request $request, $id, $step = 1)
    {
        $employee = PersonalInformation::with([
            'familyBackground',
            'educations',
            'eligibilities',
            'workExperiences',
            'voluntaryWorks',
            'learningAndDevelopments',
            'otherInformations',
        ])->where('employee_id', $id)->firstOrFail();

        return view('employees.edit.index', [
            'employee' => $employee,
            'currentStep' => (int) $step,
        ]);
    }

    public function editStepPost(Request $request, $id, $step)
    {
        $employee = PersonalInformation::where('employee_id', $id)->firstOrFail();

        match ((int) $step) {
            1 => $this->updatePersonalInformation($request, $employee),

            2 => $this->updateFamilyBackground($request, $employee),

            3 => $this->updateEducationalBackground($request, $employee),

            4 => $this->updateCivilServiceEligibility($request, $employee),

            5 => $this->updateWorkExperience($request, $employee),

            6 => $this->updateVoluntaryWork($request, $employee),

            7 => $this->updateLearningAndDevelopment($request, $employee),

            8 => $this->updateOtherInformation($request, $employee),
        };

        $nextStep = (int) $step + 1;

        if ($nextStep > 8) {
            return redirect()->route('employees.index')
                ->with('success', 'Employee updated successfully!');
        }

        return redirect()->route('employees.edit.step', ['id' => $employee->employee_id, 'step' => $nextStep])
            ->with('success', 'Step ' . $step . ' saved successfully!');
    }

    private function updatePersonalInformation(Request $request, PersonalInformation $employee): void
    {
        $s1 = $request->all();

        // Build citizenship string
        $citizenship = implode('//', array_filter([
            $s1['citizenship'] ?? '',
            $s1['citizenship_type'] ?? '',
            $s1['citizenship_country'] ?? '',
        ], fn($v) => $v !== ''));
        $citizenship = $citizenship ?: 'N/A';

        // Handle civil status "Others"
        $civilStatus = $s1['civil_status'] ?? 'N/A';
        if ($civilStatus === 'Others') {
            $civilStatus = !empty($s1['civil_status_other']) ? $s1['civil_status_other'] : ($employee->civil_status ?? 'N/A');
        }

        $employee->update([
            'surname' => $s1['surname'] ?? $employee->surname,
            'first_name' => $s1['first_name'] ?? $employee->first_name,
            'middle_name' => $s1['middle_name'] ?? $employee->middle_name,
            'extension' => $s1['name_extension'] ?? $employee->extension,
            'date_of_birth' => !empty($s1['date_of_birth']) ? $s1['date_of_birth'] : $employee->date_of_birth,
            'place_of_birth' => $s1['place_of_birth'] ?? $employee->place_of_birth,
            'sex_at_birth' => $s1['sex_at_birth'] ?? $employee->sex_at_birth,
            'civil_status' => $civilStatus, 
            'height' => $s1['height'] ?? $employee->height,
            'weight' => $s1['weight'] ?? $employee->weight,
            'blood_type' => $s1['blood_type'] ?? $employee->blood_type,
            'umid_id_no' => $s1['umid'] ?? $employee->umid_id_no,
            'pagibig_id_no' => $s1['pagibig'] ?? $employee->pagibig_id_no,
            'philhealth_id_no' => $s1['philhealth'] ?? $employee->philhealth_id_no,
            'philsys_no' => $s1['philsys'] ?? $employee->philsys_no,
            'tin_no' => $s1['tin'] ?? $employee->tin_no,
            'agency_employee_no' => $s1['agency_employee_no'] ?? $employee->agency_employee_no,
            'citizenship' => $citizenship,
            'residential_address' => implode('//', array_filter([
                                        $s1['res_house'] ?? '',
                                        $s1['res_street'] ?? '',
                                        $s1['res_subdivision'] ?? '',
                                        $s1['res_barangay'] ?? '',
                                        $s1['res_city'] ?? '',
                                        $s1['res_province'] ?? '',
                                    ], fn($v) => $v !== '')),
            'residential_zip_code' => isset($s1['res_zip']) && $s1['res_zip'] !== '' ? $s1['res_zip'] : null,
            'permanent_address' => implode('//', array_filter([
                                        $s1['perm_house'] ?? '',
                                        $s1['perm_street'] ?? '',
                                        $s1['perm_subdivision'] ?? '',
                                        $s1['perm_barangay'] ?? '',
                                        $s1['perm_city'] ?? '',
                                        $s1['perm_province'] ?? '',
                                    ], fn($v) => $v !== '')),
            'permanent_zip_code' => isset($s1['perm_zip']) && $s1['perm_zip'] !== '' ? $s1['perm_zip'] : null,
            'telephone_no' => $s1['telephone'] ?? $employee->telephone_no,
            'mobile_no' => $s1['mobile'] ?? $employee->mobile_no,
            'email_address' => $s1['email'] ?? $employee->email_address,
        ]);
    }

    private function updateFamilyBackground(Request $request, PersonalInformation $employee): void
    {
        $s2 = $request->all();

        $children = $s2['children'] ?? [];
        $childNames = [];
        $childDobs = [];
        foreach ($children as $child) {
            if (!empty($child['name'])) {
                $childNames[] = $child['name'];
                $childDobs[] = $child['dob'] ?? '';
            }
        }

        $employee->familyBackground()->updateOrCreate(
            ['employee_id' => $employee->employee_id],
            [
                'spouse_surname' => $s2['spouse_surname'] ?? null,
                'spouse_first_name' => $s2['spouse_first_name'] ?? null,
                'spouse_middle_name' => $s2['spouse_middle_name'] ?? null,
                'spouse_name_extension' => $s2['spouse_extension'] ?? null,
                'occupation' => $s2['spouse_occupation'] ?? null,
                'employer_business_name' => $s2['spouse_employer'] ?? null,
                'business_address' => $s2['spouse_business_address'] ?? null,
                'telephone_no' => $s2['spouse_telephone'] ?? null,
                'name_of_children' => implode(',', $childNames),
                'date_of_birth' => implode(',', $childDobs),
                'father_surname' => $s2['father_surname'] ?? null,
                'father_first_name' => $s2['father_first_name'] ?? null,
                'father_middle_name' => $s2['father_middle_name'] ?? null,
                'father_name_extension' => $s2['father_extension'] ?? null,
                'mother_surname' => $s2['mother_surname'] ?? null,
                'mother_first_name' => $s2['mother_first_name'] ?? null,
                'mother_middle_name' => $s2['mother_middle_name'] ?? null,
            ]
        );
    }

    private function updateEducationalBackground(Request $request, PersonalInformation $employee): void
    {
        $employee->educations()->delete();

        $levels = [
            'elem' => 'Elementary',
            'sec' => 'Secondary',
            'voc' => 'Vocational/Trade Course',
            'col' => 'College',
            'grad' => 'Graduate Studies',
        ];

        foreach ($levels as $prefix => $levelLabel) {
            foreach ($request->input($prefix, []) as $row) {
                if (!empty(array_filter($row))) {
                    $employee->educations()->create([
                        'level' => $levelLabel,
                        'name_of_school' => $row['school'] ?? null,
                        'basic_education' => $row['course'] ?? null,
                        'period_of_attendance_from' => $row['from'] ?? null,
                        'period_of_attendance_to' => $row['to'] ?? null,
                        'highest_level' => $row['units'] ?? null,
                        'year_graduated' => $row['year_grad'] ?? null,
                        'scholarship_academic_honors_recieved' => $row['honors'] ?? null,
                    ]);
                }
            }
        }
    }

    private function updateCivilServiceEligibility(Request $request, PersonalInformation $employee): void
    {
        $employee->eligibilities()->delete();

        foreach ($request->input('eligibility', []) as $row) {
            if (!empty(array_filter($row))) {
                $employee->eligibilities()->create([
                    'eligibility' => $row['name'] ?? null,
                    'rating' => $row['rating'] ?? null,
                    'date_of_examination' => $row['date'] ?? null,
                    'place_of_examination' => $row['place'] ?? null,
                    'license_no' => $row['license_no'] ?? null,
                    'license_validity' => $row['license_valid'] ?? null,
                ]);
            }
        }
    }

    private function updateWorkExperience(Request $request, PersonalInformation $employee): void
    {
        $employee->workExperiences()->delete();

        foreach ($request->input('work', []) as $row) {
            if (!empty(array_filter($row))) {
                $employee->workExperiences()->create([
                    'inclusive_date_from' => $row['from'] ?? null,
                    'inclusive_date_to' => $row['to'] ?? null,
                    'position_title' => $row['position'] ?? null,
                    'department_agency_office_company' => $row['department'] ?? null,
                    'monthly_salary' => $row['monthly_salary'] ?? null,
                    'salary_grade' => $row['salary_grade'] ?? null,
                    'status_of_appointment' => $row['status'] ?? null,
                    'govt_service' => $row['govt_service'] ?? null,
                ]);
            }
        }
    }

    private function updateVoluntaryWork(Request $request, PersonalInformation $employee): void
    {
        $employee->voluntaryWorks()->delete();

        foreach ($request->input('voluntary', []) as $row) {
            if (!empty(array_filter($row))) {
                $employee->voluntaryWorks()->create([
                    'name_and_address_of_organization' => $row['organization'] ?? null,
                    'inclusive_date_from' => $row['from'] ?? null,
                    'inclusive_date_to' => $row['to'] ?? null,
                    'number_of_hours' => $row['hours'] ?? null,
                    'position_nature_of_work' => $row['position'] ?? null,
                ]);
            }
        }
    }

    private function updateLearningAndDevelopment(Request $request, PersonalInformation $employee): void
    {
        $employee->learningAndDevelopments()->delete();

        foreach ($request->input('ld', []) as $row) {
            if (!empty(array_filter($row))) {
                $employee->learningAndDevelopments()->create([
                    'title_of_learning_and_development_interventions' => $row['title'] ?? null,
                    'inclusive_date_from' => $row['from'] ?? null,
                    'inclusive_date_to' => $row['to'] ?? null,
                    'number_of_hours' => $row['hours'] ?? null,
                    'type_of_l_d' => $row['type'] ?? null,
                    'conducted_sponsored_by' => $row['conducted_by'] ?? null,
                ]);
            }
        }
    }

    private function updateOtherInformation(Request $request, PersonalInformation $employee): void
    {
        $s8 = $request->all();

        $skills = array_filter($s8['skills'] ?? []);
        $distinctions = array_filter($s8['distinctions'] ?? []);
        $memberships = array_filter($s8['memberships'] ?? []);

        $employee->otherInformations()->updateOrCreate(
            ['employee_id' => $employee->employee_id],
            [
                'special_skills_and_hobbies' => implode(',', $skills),
                'non_academic_distinction' => implode(',', $distinctions),
                'membership_in_association'  => implode(',', $memberships),
                'landbank_no' => $s8['landbank_no'] ?? null,
                'dbp_no' => $s8['dbp_no'] ?? null,
                'sss_id' => $s8['sss_id'] ?? null,
                'department_name' => $s8['department_name'] ?? null,
                'employment_status' => $s8['employment_status'] ?? null,
            ]
        );
    }

    private function syncHasMany($relation, array $rows, array $fields)
    {
        $relation->delete();
        foreach ($rows as $row) {
            $data = array_intersect_key($row, array_flip($fields));
            if (array_filter($data)) {
                $relation->create($data);
            }
        }
    }
}