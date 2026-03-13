<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Data Sheet — {{ $personal->surname }}, {{ $personal->first_name }}</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: Arial, sans-serif;
            font-size: 7.5pt;
            background: #e5e7eb;
            padding: 20px;
            color: #000;
        }

        /* Print button bar */
        .print-bar {
            max-width: 900px;
            margin: 0 auto 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .print-bar a {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 13px;
            font-family: Arial, sans-serif;
            text-decoration: none;
            border: 1px solid #d1d5db;
            background: white;
            color: #374151;
            cursor: pointer;
        }
        .btn-print {
            background: #15803d !important;
            color: white !important;
            border: none !important;
            cursor: pointer;
            padding: 8px 20px;
            border-radius: 6px;
            font-size: 13px;
            font-family: Arial, sans-serif;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .btn-print:hover { background: #166534 !important; }

        /* PDS Pages */
        .pds-page {
            max-width: 900px;
            margin: 0 auto 24px;
            background: white;
            border: 1px solid #000;
            padding: 0;
        }

        /* Header */
        .pds-header {
            border-bottom: 2px solid #000;
            padding: 4px 8px;
            text-align: center;
        }
        .pds-header .form-title {
            font-size: 11pt;
            font-weight: bold;
            letter-spacing: 2px;
        }
        .pds-header .warning {
            font-size: 6.5pt;
            margin-top: 2px;
        }
        .pds-header .guide {
            font-size: 6.5pt;
            font-style: italic;
            margin-top: 1px;
        }
        .pds-header .instruction {
            font-size: 6.5pt;
            margin-top: 2px;
            border-top: 1px solid #000;
            padding-top: 2px;
        }

        /* Section headers */
        .section-header {
            background: #000;
            color: white;
            padding: 2px 6px;
            font-size: 7.5pt;
            font-weight: bold;
            letter-spacing: 0.5px;
        }

        /* Table layout */
        .pds-table {
            width: 100%;
            border-collapse: collapse;
        }
        .pds-table td, .pds-table th {
            border: 1px solid #000;
            padding: 1px 3px;
            vertical-align: top;
            font-size: 7pt;
        }
        .pds-table .label {
            color: #555;
            font-size: 6pt;
            display: block;
            text-transform: uppercase;
        }
        .pds-table .value {
            font-size: 8pt;
            font-weight: bold;
            display: block;
            min-height: 10px;
        }
        .col-header {
            background: #f0f0f0;
            font-weight: bold;
            font-size: 6.5pt;
            text-align: center;
            text-transform: uppercase;
        }

        /* Page footer */
        .pds-footer {
            border-top: 1px solid #000;
            display: flex;
            justify-content: space-between;
            padding: 3px 8px;
            font-size: 6.5pt;
        }
        .signature-row {
            display: grid;
            grid-template-columns: 1fr auto 1fr;
            gap: 0;
            border-top: 1px solid #000;
        }
        .sig-block {
            padding: 3px 6px;
            border-right: 1px solid #000;
        }
        .sig-block:last-child { border-right: none; }
        .sig-label { font-size: 6pt; color: #555; }
        .sig-line { border-bottom: 1px solid #000; margin-top: 14px; }
        .page-num {
            text-align: right;
            padding: 2px 6px;
            font-size: 6.5pt;
            font-style: italic;
            border-top: 1px solid #000;
        }

        @media print {
            body { background: white; padding: 0; }
            .print-bar { display: none; }
            .pds-page {
                margin: 0;
                page-break-after: always;
                border: none;
                max-width: 100%;
            }
            .pds-page:last-child { page-break-after: avoid; }
        }
    </style>
</head>
<body>

{{-- Print Bar --}}
<div class="print-bar">
    <a href="{{ route('employees.index') }}">
        &#8592; Back to Employees
    </a>
    <button class="btn-print" onclick="window.print()">
        &#128438; Print / Save as PDF
    </button>
</div>

@php
    $na = fn($v) => (!$v || strtoupper(trim($v)) === 'N/A') ? 'N/A' : $v;
    $childNames = $family ? (is_array($family->name_of_children) ? $family->name_of_children : explode(',', $family->name_of_children)) : [];
    $childDobs  = $family ? (is_array($family->date_of_birth) ? $family->date_of_birth : explode(',', $family->date_of_birth)) : [];

    $levelOrder = ['Elementary', 'Secondary', 'Vocational/Trade Course', 'College', 'Graduate Studies'];
    $eduByLevel = [];
    foreach ($education as $e) { $eduByLevel[$e->level] = $e; }

    $skills      = $other ? array_filter(explode(',', $other->special_skills_and_hobbies)) : [];
    $distinctions = $other ? array_filter(explode(',', $other->non_academic_distinction)) : [];
    $memberships = $other ? array_filter(explode(',', $other->membership_in_association)) : [];
    $maxOther    = max(count($skills), count($distinctions), count($memberships), 1);
@endphp

{{-- ===================== PAGE 1 ===================== --}}
<div class="pds-page">
    {{-- Header --}}
    <div class="pds-header">
        <div class="form-title">PERSONAL DATA SHEET</div>
        <div class="warning">WARNING: Any misrepresentation made in the Personal Data Sheet and the Work Experience Sheet shall cause the filing of administrative/criminal case/s against the person concerned.</div>
        <div class="guide">READ THE ATTACHED GUIDE TO FILLING OUT THE PERSONAL DATA SHEET (PDS) BEFORE ACCOMPLISHING THE PDS FORM.</div>
        <div class="instruction">Print legibly if accomplished through own handwriting. Tick appropriate boxes and use separate sheet if necessary. Indicate N/A if not applicable. DO NOT ABBREVIATE.</div>
    </div>

    {{-- I. PERSONAL INFORMATION --}}
    <div class="section-header">I. PERSONAL INFORMATION</div>
    <table class="pds-table">
        <tr>
            <td style="width:30%">
                <span class="label">1. Surname</span>
                <span class="value">{{ $na($personal->surname) }}</span>
            </td>
            <td colspan="2">
                <span class="label">2. First Name</span>
                <span class="value">{{ $na($personal->first_name) }}</span>
            </td>
            <td style="width:18%">
                <span class="label">Name Extension (Jr., Sr.)</span>
                <span class="value">{{ $na($personal->extension) }}</span>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <span class="label">Middle Name</span>
                <span class="value">{{ $na($personal->middle_name) }}</span>
            </td>
        </tr>
        <tr>
            <td>
                <span class="label">3. Date of Birth (dd/mm/yyyy)</span>
                <span class="value">{{ $personal->date_of_birth ? \Carbon\Carbon::parse($personal->date_of_birth)->format('m/d/Y') : 'N/A' }}</span>
            </td>
            <td colspan="3" rowspan="4">
                <span class="label">16. Citizenship</span>
                <span class="value">{{ $na($personal->citizenship) }}</span>
            </td>
        </tr>
        <tr>
            <td>
                <span class="label">4. Place of Birth</span>
                <span class="value">{{ $na($personal->place_of_birth) }}</span>
            </td>
        </tr>
        <tr>
            <td>
                <span class="label">5. Sex at Birth</span>
                <span class="value">{{ $na($personal->sex_at_birth) }}</span>
            </td>
        </tr>
        <tr>
            <td>
                <span class="label">6. Civil Status</span>
                <span class="value">{{ $na($personal->civil_status) }}</span>
            </td>
        </tr>
        <tr>
            <td>
                <span class="label">7. Height (m)</span>
                <span class="value">{{ $na($personal->height) }}</span>
            </td>
            <td colspan="3" rowspan="3">
                <span class="label">17. Residential Address</span>
                <span class="value">{{ $na($personal->residential_address) }}</span>
                <span class="label" style="margin-top:4px">Zip Code</span>
                <span class="value">{{ $na($personal->residential_zip_code) }}</span>
            </td>
        </tr>
        <tr>
            <td>
                <span class="label">8. Weight (kg)</span>
                <span class="value">{{ $na($personal->weight) }}</span>
            </td>
        </tr>
        <tr>
            <td>
                <span class="label">9. Blood Type</span>
                <span class="value">{{ $na($personal->blood_type) }}</span>
            </td>
        </tr>
        <tr>
            <td>
                <span class="label">10. UMID ID No.</span>
                <span class="value">{{ $na($personal->umid_id_no) }}</span>
            </td>
            <td colspan="3" rowspan="4">
                <span class="label">18. Permanent Address</span>
                <span class="value">{{ $na($personal->permanent_address) }}</span>
                <span class="label" style="margin-top:4px">Zip Code</span>
                <span class="value">{{ $na($personal->permanent_zip_code) }}</span>
            </td>
        </tr>
        <tr>
            <td>
                <span class="label">11. Pag-IBIG ID No.</span>
                <span class="value">{{ $na($personal->pagibig_id_no) }}</span>
            </td>
        </tr>
        <tr>
            <td>
                <span class="label">12. PhilHealth No.</span>
                <span class="value">{{ $na($personal->philhealth_id_no) }}</span>
            </td>
        </tr>
        <tr>
            <td>
                <span class="label">13. PhilSys Number (PSN)</span>
                <span class="value">{{ $na($personal->philsys_no) }}</span>
            </td>
        </tr>
        <tr>
            <td>
                <span class="label">14. TIN No.</span>
                <span class="value">{{ $na($personal->tin_no) }}</span>
            </td>
            <td>
                <span class="label">19. Telephone No.</span>
                <span class="value">{{ $na($personal->telephone_no) }}</span>
            </td>
            <td colspan="2">
                <span class="label">20. Mobile No.</span>
                <span class="value">{{ $na($personal->mobile_no) }}</span>
            </td>
        </tr>
        <tr>
            <td>
                <span class="label">15. Agency Employee No.</span>
                <span class="value">{{ $na($personal->agency_employee_no) }}</span>
            </td>
            <td colspan="3">
                <span class="label">21. E-Mail Address</span>
                <span class="value">{{ $na($personal->email_address) }}</span>
            </td>
        </tr>
    </table>

    {{-- II. FAMILY BACKGROUND --}}
    <div class="section-header">II. FAMILY BACKGROUND</div>
    <table class="pds-table">
        <tr>
            <td style="width:45%">
                <span class="label">22. Spouse's Surname</span>
                <span class="value">{{ $na($family->spouse_surname ?? '') }}</span>
            </td>
            <td rowspan="7" style="width:55%">
                <div style="display:grid; grid-template-columns:1fr 1fr; border-bottom:1px solid #000; margin-bottom:2px; padding-bottom:1px;">
                    <span class="label">23. Name of Children</span>
                    <span class="label">Date of Birth</span>
                </div>
                @for($i = 0; $i < max(count($childNames), 5); $i++)
                <div style="display:grid; grid-template-columns:1fr 1fr; border-bottom:1px solid #ddd; min-height:12px;">
                    <span style="font-size:7.5pt; padding:1px 2px;">{{ $childNames[$i] ?? '' }}</span>
                    <span style="font-size:7.5pt; padding:1px 2px; border-left:1px solid #000;">{{ $childDobs[$i] ?? '' }}</span>
                </div>
                @endfor
            </td>
        </tr>
        <tr>
            <td>
                <span class="label">First Name</span>
                <span class="value">{{ $na($family->spouse_first_name ?? '') }}</span>
            </td>
        </tr>
        <tr>
            <td>
                <span class="label">Middle Name</span>
                <span class="value">{{ $na($family->spouse_middle_name ?? '') }}</span>
            </td>
        </tr>
        <tr>
            <td>
                <span class="label">Occupation</span>
                <span class="value">{{ $na($family->occupation ?? '') }}</span>
            </td>
        </tr>
        <tr>
            <td>
                <span class="label">Employer/Business Name</span>
                <span class="value">{{ $na($family->employer_business_name ?? '') }}</span>
            </td>
        </tr>
        <tr>
            <td>
                <span class="label">Business Address</span>
                <span class="value">{{ $na($family->business_address ?? '') }}</span>
            </td>
        </tr>
        <tr>
            <td>
                <span class="label">Telephone No.</span>
                <span class="value">{{ $na($family->telephone_no ?? '') }}</span>
            </td>
        </tr>
        <tr>
            <td>
                <span class="label">24. Father's Surname</span>
                <span class="value">{{ $na($family->father_surname ?? '') }}</span>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>
                <span class="label">First Name &amp; Extension</span>
                <span class="value">{{ $na($family->father_first_name ?? '') }} {{ $na($family->father_name_extension ?? '') }}</span>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>
                <span class="label">Middle Name</span>
                <span class="value">{{ $na($family->father_middle_name ?? '') }}</span>
            </td>
            <td></td>
        </tr>
        <tr>
            <td colspan="2">
                <span class="label">25. Mother's Maiden Name</span>
            </td>
        </tr>
        <tr>
            <td>
                <span class="label">Surname</span>
                <span class="value">{{ $na($family->mother_surname ?? '') }}</span>
            </td>
            <td>
                <span class="label">First Name</span>
                <span class="value">{{ $na($family->mother_first_name ?? '') }}</span>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <span class="label">Middle Name</span>
                <span class="value">{{ $na($family->mother_middle_name ?? '') }}</span>
            </td>
        </tr>
    </table>

    {{-- III. EDUCATIONAL BACKGROUND --}}
    <div class="section-header">III. EDUCATIONAL BACKGROUND</div>
    <table class="pds-table">
        <tr>
            <th class="col-header" style="width:12%">26. Level</th>
            <th class="col-header" style="width:22%">Name of School</th>
            <th class="col-header" style="width:18%">Basic Education / Degree / Course</th>
            <th class="col-header" style="width:8%">From</th>
            <th class="col-header" style="width:8%">To</th>
            <th class="col-header" style="width:12%">Highest Level / Units Earned</th>
            <th class="col-header" style="width:8%">Year Graduated</th>
            <th class="col-header" style="width:12%">Scholarship / Academic Honors</th>
        </tr>
        @foreach($levelOrder as $level)
        @php $e = $eduByLevel[$level] ?? null; @endphp
        <tr>
            <td><span class="value">{{ $level }}</span></td>
            <td><span class="value">{{ $na($e->name_of_school ?? '') }}</span></td>
            <td><span class="value">{{ $na($e->basic_education ?? '') }}</span></td>
            <td><span class="value">{{ $na($e->period_of_attendance_from ?? '') }}</span></td>
            <td><span class="value">{{ $na($e->period_of_attendance_to ?? '') }}</span></td>
            <td><span class="value">{{ $na($e->highest_level ?? '') }}</span></td>
            <td><span class="value">{{ $na($e->year_graduated ?? '') }}</span></td>
            <td><span class="value">{{ $na($e->scholarship_academic_honors_recieved ?? '') }}</span></td>
        </tr>
        @endforeach
    </table>

    <div class="page-num">CS FORM 212 (Revised 2025), Page 1 of 3</div>
</div>

{{-- ===================== PAGE 2 ===================== --}}
<div class="pds-page">
    {{-- IV. CIVIL SERVICE ELIGIBILITY --}}
    <div class="section-header">IV. CIVIL SERVICE ELIGIBILITY</div>
    <table class="pds-table">
        <tr>
            <th class="col-header" style="width:35%">27. Eligibility</th>
            <th class="col-header" style="width:10%">Rating</th>
            <th class="col-header" style="width:15%">Date of Examination</th>
            <th class="col-header" style="width:20%">Place of Examination</th>
            <th class="col-header" style="width:10%">License No.</th>
            <th class="col-header" style="width:10%">Valid Until</th>
        </tr>
        @forelse($eligibility as $e)
        <tr>
            <td><span class="value">{{ $na($e->eligibility) }}</span></td>
            <td><span class="value">{{ $na($e->rating) }}</span></td>
            <td><span class="value">{{ $na($e->date_of_examination) }}</span></td>
            <td><span class="value">{{ $na($e->place_of_examination) }}</span></td>
            <td><span class="value">{{ $na($e->license_no) }}</span></td>
            <td><span class="value">{{ $na($e->license_validity) }}</span></td>
        </tr>
        @empty
        <tr><td colspan="6" style="text-align:center; color:#999;">N/A</td></tr>
        @endforelse
    </table>

    {{-- V. WORK EXPERIENCE --}}
    <div class="section-header">V. WORK EXPERIENCE</div>
    <table class="pds-table">
        <tr>
            <th class="col-header" style="width:10%">28. From</th>
            <th class="col-header" style="width:10%">To</th>
            <th class="col-header" style="width:22%">Position Title</th>
            <th class="col-header" style="width:28%">Department / Agency / Office / Company</th>
            <th class="col-header" style="width:15%">Status of Appointment</th>
            <th class="col-header" style="width:8%">Gov't Service (Y/N)</th>
        </tr>
        @forelse($work as $w)
        <tr>
            <td><span class="value">{{ $na($w->inclusive_date_from) }}</span></td>
            <td><span class="value">{{ $na($w->inclusive_date_to) }}</span></td>
            <td><span class="value">{{ $na($w->position_title) }}</span></td>
            <td><span class="value">{{ $na($w->department_agency_office_company) }}</span></td>
            <td><span class="value">{{ $na($w->status_of_appointment) }}</span></td>
            <td><span class="value">{{ $na($w->govt_service) }}</span></td>
        </tr>
        @empty
        <tr><td colspan="6" style="text-align:center; color:#999;">N/A</td></tr>
        @endforelse
    </table>

    <div class="page-num">CS FORM 212 (Revised 2025), Page 2 of 3</div>
</div>

{{-- ===================== PAGE 3 ===================== --}}
<div class="pds-page">
    {{-- VI. VOLUNTARY WORK --}}
    <div class="section-header">VI. VOLUNTARY WORK OR INVOLVEMENT IN CIVIC / NON-GOVERNMENT / PEOPLE / VOLUNTARY ORGANIZATION/S</div>
    <table class="pds-table">
        <tr>
            <th class="col-header" style="width:35%">29. Name & Address of Organization</th>
            <th class="col-header" style="width:12%">From</th>
            <th class="col-header" style="width:12%">To</th>
            <th class="col-header" style="width:12%">No. of Hours</th>
            <th class="col-header" style="width:29%">Position / Nature of Work</th>
        </tr>
        @forelse($voluntary as $v)
        <tr>
            <td><span class="value">{{ $na($v->name_and_address_of_organization) }}</span></td>
            <td><span class="value">{{ $na($v->inclusive_date_from) }}</span></td>
            <td><span class="value">{{ $na($v->inclusive_date_to) }}</span></td>
            <td><span class="value">{{ $na($v->number_of_hours) }}</span></td>
            <td><span class="value">{{ $na($v->position_nature_of_work) }}</span></td>
        </tr>
        @empty
        <tr><td colspan="5" style="text-align:center; color:#999;">N/A</td></tr>
        @endforelse
    </table>

    {{-- VII. LEARNING AND DEVELOPMENT --}}
    <div class="section-header">VII. LEARNING AND DEVELOPMENT (L&D) INTERVENTIONS / TRAINING PROGRAMS ATTENDED</div>
    <table class="pds-table">
        <tr>
            <th class="col-header" style="width:30%">30. Title of L&D / Training Program</th>
            <th class="col-header" style="width:10%">From</th>
            <th class="col-header" style="width:10%">To</th>
            <th class="col-header" style="width:8%">No. of Hours</th>
            <th class="col-header" style="width:12%">Type of L&D</th>
            <th class="col-header" style="width:30%">Conducted / Sponsored By</th>
        </tr>
        @forelse($learning as $l)
        <tr>
            <td><span class="value">{{ $na($l->title_of_learning_and_development_interventions) }}</span></td>
            <td><span class="value">{{ $na($l->inclusive_date_from) }}</span></td>
            <td><span class="value">{{ $na($l->inclusive_date_to) }}</span></td>
            <td><span class="value">{{ $na($l->number_of_hours) }}</span></td>
            <td><span class="value">{{ $na($l->type_of_l_d) }}</span></td>
            <td><span class="value">{{ $na($l->conducted_sponsored_by) }}</span></td>
        </tr>
        @empty
        <tr><td colspan="6" style="text-align:center; color:#999;">N/A</td></tr>
        @endforelse
    </table>

    {{-- VIII. OTHER INFORMATION --}}
    <div class="section-header">VIII. OTHER INFORMATION</div>
    <table class="pds-table">
        <tr>
            <th class="col-header" style="width:33%">31. Special Skills and Hobbies</th>
            <th class="col-header" style="width:34%">32. Non-Academic Distinctions / Recognition</th>
            <th class="col-header" style="width:33%">33. Membership in Association/Organization</th>
        </tr>
        @for($i = 0; $i < $maxOther; $i++)
        <tr>
            <td><span class="value">{{ $skills[$i] ?? '' }}</span></td>
            <td><span class="value">{{ $distinctions[$i] ?? '' }}</span></td>
            <td><span class="value">{{ $memberships[$i] ?? '' }}</span></td>
        </tr>
        @endfor
    </table>

    {{-- Other IDs --}}
    <table class="pds-table" style="margin-top:-1px">
        <tr>
            <td style="width:25%">
                <span class="label">Landbank No.</span>
                <span class="value">{{ $na($other->landbank_no ?? '') }}</span>
            </td>
            <td style="width:25%">
                <span class="label">DBP No.</span>
                <span class="value">{{ $na($other->dbp_no ?? '') }}</span>
            </td>
            <td style="width:25%">
                <span class="label">SSS ID</span>
                <span class="value">{{ $na($other->sss_id ?? '') }}</span>
            </td>
            <td style="width:25%">
                <span class="label">Employee ID</span>
                <span class="value">{{ $personal->employee_id }}</span>
            </td>
        </tr>
    </table>

    {{-- Signature --}}
    <table class="pds-table" style="margin-top:16px">
        <tr>
            <td style="width:50%; height:50px; vertical-align:bottom;">
                <span class="label">Signature (wet signature/e-signature/digital certificate)</span>
            </td>
            <td style="width:25%; vertical-align:bottom;">
                <span class="label">Date</span>
            </td>
            <td style="width:25%; vertical-align:bottom;">
                <span class="label">Date Accomplished</span>
            </td>
        </tr>
    </table>

    <div class="page-num">CS FORM 212 (Revised 2025), Page 3 of 3</div>
</div>

</body>
</html>