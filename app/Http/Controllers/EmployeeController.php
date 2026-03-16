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
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $tab = $request->get('tab', 'active');

        if ($tab === 'resigned') {
            $employees = PersonalInformation::leftJoin('other_information', 'personal_information.employee_id', '=', 'other_information.employee_id')
                ->where('other_information.employment_status', 'Resigned')
                ->select('personal_information.*', 'other_information.department_name', 'other_information.employment_status')
                ->orderBy('personal_information.employee_id')
                ->paginate(10);
        } else {
            $employees = PersonalInformation::leftJoin('other_information', 'personal_information.employee_id', '=', 'other_information.employee_id')
                ->where('other_information.employment_status', '!=', 'Resigned')
                ->select('personal_information.*', 'other_information.department_name', 'other_information.employment_status')
                ->orderBy('personal_information.employee_id')
                ->paginate(10);
        }

        $activeCount   = \App\Models\OtherInformation::where('employment_status', '!=', 'Resigned')->count();
        $resignedCount = \App\Models\OtherInformation::where('employment_status', 'Resigned')->count();

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
        return view('employees.create.index', [
            'currentStep' => (int)$step
        ]);
    }

    public function storeStep(Request $request, $step)
    {
        $request->session()->put("employee_step_{$step}", $request->except('_token'));

        if ((int)$step < 8) {
            return redirect()->route('employees.create.step', (int)$step + 1);
        }

        // Step 8 — gather all session data
        $s1 = $request->session()->get('employee_step_1', []);
        $s2 = $request->session()->get('employee_step_2', []);
        $s3 = $request->session()->get('employee_step_3', []);
        $s4 = $request->session()->get('employee_step_4', []);
        $s5 = $request->session()->get('employee_step_5', []);
        $s6 = $request->session()->get('employee_step_6', []);
        $s7 = $request->session()->get('employee_step_7', []);
        $s8 = $request->session()->get('employee_step_8', []);

        // Generate employee_id
        $latest = PersonalInformation::orderBy('employee_id', 'desc')->first();
        $nextNumber = $latest
            ? (int) filter_var($latest->employee_id, FILTER_SANITIZE_NUMBER_INT) + 1
            : 1;
        $employeeId = (string) $nextNumber;

        // Helper to build full address string from parts
        $buildAddress = function (array $data, string $prefix): string {
            $parts = array_filter([
                $data["{$prefix}_house"] ?? '',
                $data["{$prefix}_street"] ?? '',
                $data["{$prefix}_subdivision"] ?? '',
                $data["{$prefix}_barangay"] ?? '',
                $data["{$prefix}_city"] ?? '',
                $data["{$prefix}_province"] ?? '',
            ]);
            return implode(', ', $parts) ?: 'N/A';
        };

        DB::transaction(function () use (
            $employeeId, $s1, $s2, $s3, $s4, $s5, $s6, $s7, $s8, $buildAddress
        ) {
            // --- Step 1: Personal Information ---
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
                'height' => $s1['height'] ?? 0,
                'weight' => $s1['weight'] ?? 0,
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

            // --- Step 2: Family Background ---
            $children  = $s2['children'] ?? [];
            $childNames = implode(',', array_filter(array_column($children, 'name')));
            $childDobs  = implode(',', array_filter(array_column($children, 'dob')));

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

            // --- Step 3: Educational Background ---
            $levels = [
                'elem' => 'Elementary',
                'sec' => 'Secondary',
                'voc' => 'Vocational/Trade Course',
                'col' => 'College',
                'grad' => 'Graduate Studies',
            ];
            foreach ($levels as $prefix => $label) {
                if (!empty($s3["{$prefix}_school"])) {
                    EducationalBackground::create([
                        'employee_id' => $employeeId,
                        'level' => $label,
                        'name_of_school' => $s3["{$prefix}_school"] ?? 'N/A',
                        'basic_education' => $s3["{$prefix}_course"] ?? 'N/A',
                        'period_of_attendance_from' => $s3["{$prefix}_from"] ?? 'N/A',
                        'period_of_attendance_to' => $s3["{$prefix}_to"] ?? 'N/A',
                        'highest_level' => $s3["{$prefix}_units"] ?? 'N/A',
                        'year_graduated' => $s3["{$prefix}_year_grad"] ?? 'N/A',
                        'scholarship_academic_honors_recieved' => $s3["{$prefix}_honors"] ?? 'N/A',
                    ]);
                }
            }

            // --- Step 4: Civil Service Eligibility ---
            foreach ($s4['eligibility'] ?? [] as $row) {
                if (!empty($row['name'])) {
                    CivilServiceEligibility::create([
                        'employee_id' => $employeeId,
                        'eligibility' => $row['name'] ?? 'N/A',
                        'rating' => $row['rating'] ?? 'N/A',
                        'date_of_examination' => $row['date'] ?? 'N/A',
                        'place_of_examination' => $row['place'] ?? 'N/A',
                        'license_no' => $row['license_no'] ?? 'N/A',
                        'license_validity' => $row['license_valid'] ?? 'N/A',
                    ]);
                }
            }

            // --- Step 5: Work Experience ---
            foreach ($s5['work'] ?? [] as $row) {
                if (!empty($row['position'])) {
                    WorkExperience::create([
                        'employee_id' => $employeeId,
                        'inclusive_date_from' => $row['from'] ?? 'N/A',
                        'inclusive_date_to' => $row['to'] ?? 'N/A',
                        'position_title' => $row['position'] ?? 'N/A',
                        'department_agency_office_company' => $row['department'] ?? 'N/A',
                        'monthly_salary' => $row['monthly_salary'] ?? 'N/A',
                        'salary_grade' => $row['salary_grade'] ?? 'N/A',
                        'status_of_appointment' => $row['status'] ?? 'N/A',
                        'govt_service' => $row['govt_service'] ?? 'N/A',
                    ]);
                }
            }

            // --- Step 6: Voluntary Work ---
            foreach ($s6['voluntary'] ?? [] as $row) {
                if (!empty($row['organization'])) {
                    VoluntaryWork::create([
                        'employee_id' => $employeeId,
                        'name_and_address_of_organization' => $row['organization'] ?? 'N/A',
                        'inclusive_date_from' => $row['from'] ?? 'N/A',
                        'inclusive_date_to' => $row['to'] ?? 'N/A',
                        'number_of_hours' => $row['hours'] ?? 0,
                        'position_nature_of_work' => $row['position'] ?? 'N/A',
                    ]);
                }
            }

            // --- Step 7: Learning & Development ---
            foreach ($s7['ld'] ?? [] as $row) {
                if (!empty($row['title'])) {
                    LearningAndDevelopment::create([
                        'employee_id' => $employeeId,
                        'title_of_learning_and_development_interventions' => $row['title'] ?? 'N/A',
                        'inclusive_date_from' => $row['from'] ?? 'N/A',
                        'inclusive_date_to' => $row['to'] ?? 'N/A',
                        'number_of_hours' => $row['hours'] ?? 0,
                        'type_of_l_d' => $row['type'] ?? 'N/A',
                        'conducted_sponsored_by' => $row['conducted_by'] ?? 'N/A',
                    ]);
                }
            }

            // --- Step 8: Other Information ---
            OtherInformation::create([
                'employee_id' => $employeeId,
                'special_skills_and_hobbies' => implode(',', array_filter($s8['skills'] ?? [])) ?: 'N/A',
                'non_academic_distinction' => implode(',', array_filter($s8['distinctions'] ?? [])) ?: 'N/A',
                'membership_in_association'  => implode(',', array_filter($s8['memberships'] ?? [])) ?: 'N/A',
                'landbank_no' => $s8['landbank_no'] ?? 'N/A',
                'dbp_no' => $s8['dbp_no'] ?? 'N/A',
                'sss_id' => $s8['sss_id'] ?? 'N/A',
                'department_name' => $s8['department_name'] ?? 'N/A',
                'employment_status' => $s8['employment_status'] ?? 'N/A',
            ]);
        });

        // Clean up session
        for ($i = 1; $i <= 8; $i++) {
            $request->session()->forget("employee_step_{$i}");
        }

        return redirect()->route('employees.index')
            ->with('success', "Employee {$employeeId} added successfully.");
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xlsm,xls|max:10240',
        ]);

        Excel::import(new EmployeePdsImport, $request->file('file'));

        return back()->with('success', 'All employee data imported successfully.');
    }

    public function show($id)
    {
        $personal    = \App\Models\PersonalInformation::where('employee_id', $id)->firstOrFail();
        $family      = \App\Models\FamilyBackground::where('employee_id', $id)->first();
        $education   = \App\Models\EducationalBackground::where('employee_id', $id)->get();
        $eligibility = \App\Models\CivilServiceEligibility::where('employee_id', $id)->get();
        $work        = \App\Models\WorkExperience::where('employee_id', $id)->get();
        $voluntary   = \App\Models\VoluntaryWork::where('employee_id', $id)->get();
        $learning    = \App\Models\LearningAndDevelopment::where('employee_id', $id)->get();
        $other       = \App\Models\OtherInformation::where('employee_id', $id)->first();

        return view('employees.show', compact(
            'personal', 'family', 'education', 'eligibility',
            'work', 'voluntary', 'learning', 'other'
        ));
    }
}