<div class="pds-page">

    <div class="pds-header">
        <div class="pds-header-top">
            <div class="pds-header-left">
                <div class="form-no">CS Form No. 212</div>
                <div class="revised">Revised 2025</div>
            </div>
            <div class="pds-header-center">
                <div class="pds-title">Personal Data Sheet</div>
            </div>
            {{-- Empty right spacer so title stays offset like the Excel --}}
            <div style="min-width:120px;"></div>
        </div>
        <div class="pds-warning-block">
            <div class="pds-warning">WARNING: Any misrepresentation made in the Personal Data Sheet and the Work Experience Sheet shall cause the filing of administrative/criminal case/s against the person concerned.</div>
            <div class="pds-guide">READ THE ATTACHED GUIDE TO FILLING OUT THE PERSONAL DATA SHEET (PDS) BEFORE ACCOMPLISHING THE PDS FORM.</div>
        </div>
        <div class="pds-instruction-row">
            Print legibly if accomplished through own handwriting. Tick appropriate boxes (&#9634;) and use separate sheet if necessary. Indicate N/A if not applicable. <span class="do-not">DO NOT ABBREVIATE.</span>
        </div>
    </div>

    <div class="section-header">I.&nbsp;Personal Information</div>

    <table class="pds-table">

        <tr>
            <td style="width:3%; background:#EAEAEA;" class="label-cell"><span class="cell-label">1.</span></td>
            <td style="width:13%; background:#EAEAEA;" class="label-cell"><span class="cell-label">Surname</span></td>
            <td colspan="8">
                <span class="cell-value">{{ $na($personal->surname) }}</span>
            </td>
        </tr>

        <tr>
            <td style="background:#EAEAEA;" class="label-cell"><span class="cell-label">2.</span></td>
            <td style="background:#EAEAEA;" class="label-cell"><span class="cell-label">First Name</span></td>
            <td colspan="5" style="width:45%">
                <span class="cell-value">{{ $na($personal->first_name) }}</span>
            </td>
            <td style="width:12%; background:#EAEAEA; border-right:none;" class="label-cell">
                <span class="cell-label" style="font-size:7pt;">Name Extension (Jr., Sr.)</span>
            </td>
            <td colspan="2" style="width:8%; border-left:none; background: #EAEAEA;">
                <span class="cell-value"">{{ $na($personal->extension) }}</span>
            </td>
        </tr>

        <tr>
            <td style="background:#EAEAEA;" class="label-cell"><span class="cell-label"></span></td>
            <td style="background:#EAEAEA;" class="label-cell"><span class="cell-label">Middle Name</span></td>
            <td colspan="8">
                <span class="cell-value">{{ $na($personal->middle_name) }}</span>
            </td>
        </tr>

        {{-- Date of Birth | Citizenship (rowspan 3) --}}
        <tr>
            <td style="background:#EAEAEA; border-top:1px solid #000; border-bottom:1px solid #000;" class="label-cell"><span class="cell-label">3.</span></td>
            <td style="background:#EAEAEA; border-top:1px solid #000; border-bottom:1px solid #000;" class="label-cell"><span class="cell-label">Date of Birth<br>(dd/mm/yyyy)</span></td>
            <td colspan="2" style="text-align:center; vertical-align:middle;">
                <span class="cell-value">
                    {{ $personal->date_of_birth
                        ? \Carbon\Carbon::parse($personal->date_of_birth)->format('d/m/Y')
                        : 'N/A' }}
                </span>
            </td>
            {{-- Citizenship label spans 3 rows --}}
            <td colspan="2" rowspan="3" style="background:#EAEAEA; vertical-align:top; padding:3px 4px;">
                <span class="cell-label">16. Citizenship</span>
                <br><br>
                <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:7.5pt; font-style:italic; display:block; text-align:center; margin-top:0px; margin-bottom:10px;">
                    If holder of dual citizenship,<br>please indicate the details.
                </span>
            </td>
            {{-- Citizenship checkboxes span 3 rows --}}
            <td colspan="4" rowspan="3" style="vertical-align:top; padding:4px;">

                {{-- Row 1: Filipino + Dual Citizenship --}}
                <div style="display:flex; align-items:center; gap:16px; margin-bottom:4px; padding-left:75px;">
                    <span style="display:inline-flex; align-items:center; gap:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt;">
                        <span style="display:inline-block; width:10px; height:10px; border:1px solid #000; text-align:center; line-height:10px; font-size:8pt;">
                            {{ strtolower(trim($citizenship)) === 'filipino' ? '✓' : '' }}
                        </span>
                        Filipino
                    </span>
                    <span style="display:inline-flex; align-items:center; gap:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt;">
                        <span style="display:inline-block; width:10px; height:10px; border:1px solid #000; text-align:center; line-height:10px; font-size:8pt;">
                            {{ strtolower(trim($citizenship)) !== 'filipino' && $na($citizenship) !== 'N/A' ? '✓' : '' }}
                        </span>
                        Dual Citizenship
                    </span>
                </div>

                {{-- Row 2: by birth + by naturalization --}}
                <div style="display:flex; align-items:center; justify-content:center; gap:16px; margin-bottom:4px;">
                    <span style="display:inline-flex; align-items:center; gap:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt;">
                        <span style="display:inline-block; width:10px; height:10px; border:1px solid #000; text-align:center; line-height:10px; font-size:8pt;">
                            {{ strtolower(trim($citizenType)) === 'by birth' ? '✓' : '' }}
                        </span>
                        by birth
                    </span>
                    <span style="display:inline-flex; align-items:center; gap:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt;">
                        <span style="display:inline-block; width:10px; height:10px; border:1px solid #000; text-align:center; line-height:10px; font-size:8pt;">
                            {{ strtolower(trim($citizenType)) === 'by naturalization' ? '✓' : '' }}
                        </span>
                        by naturalization
                    </span>
                </div>

                {{-- Row 3: Pls. indicate country --}}
                <div style="font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; text-align:center; margin-bottom:4px;">
                    Pls. indicate country:
                </div>
                <div style="border-top:1px solid #000; padding:3px 4px; font-family:Arial,sans-serif; font-size:10pt; font-weight:normal; min-height:18px;">
                    {{ $citizenCountry ?: '' }}
                </div>

            </td>
        </tr>

        {{-- Place of Birth --}}
        <tr>
            <td style="background:#EAEAEA; border-top:1px solid #000; border-bottom:1px solid #000;" class="label-cell"><span class="cell-label">4.</span></td>
            <td style="background:#EAEAEA; border-top:1px solid #000; border-bottom:1px solid #000;" class="label-cell"><span class="cell-label">Place of Birth</span></td>
            <td colspan="2" style="text-align:center; vertical-align:middle;">
                <span class="cell-value">{{ $na($personal->place_of_birth) }}</span>
            </td>
        </tr>

        {{-- Sex at Birth --}}
        <tr>
            <td style="background:#EAEAEA; border-top:1px solid #000; border-bottom:1px solid #000;" class="label-cell"><span class="cell-label">5.</span></td>
            <td style="background:#EAEAEA; border-top:1px solid #000; border-bottom:1px solid #000;" class="label-cell"><span class="cell-label">Sex at Birth</span></td>
            <td colspan="2" style="vertical-align:middle;">
                <table style="width:100%; border-collapse:collapse;">
                    <tr>
                        <td style="border:none; text-align:left; padding-left:12px; width:50%;">
                            <span style="display:inline-flex; align-items:center; gap:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt;">
                                <span style="display:inline-block; width:10px; height:10px; border:1px solid #000; text-align:center; line-height:10px; font-size:8pt;">
                                    {{ strtolower(trim($personal->sex_at_birth ?? '')) === 'male' ? '✓' : '' }}
                                </span>
                                Male
                            </span>
                        </td>
                        <td style="border:none; text-align:right; padding-right: 39px; width:50%;">
                            <span style="display:inline-flex; align-items:center; gap:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt;">
                                <span style="display:inline-block; width:10px; height:10px; border:1px solid #000; text-align:center; line-height:10px; font-size:8pt;">
                                    {{ strtolower(trim($personal->sex_at_birth ?? '')) === 'female' ? '✓' : '' }}
                                </span>
                                Female
                            </span>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        {{-- Civil Status (rowspan 2) | Residential Address --}}
        <tr>
            <td rowspan="2" style="background:#EAEAEA; border-top:1px solid #000; border-bottom:1px solid #000;" class="label-cell"><span class="cell-label">6.</span></td>
            <td rowspan="2" style="background:#EAEAEA; border-top:1px solid #000; border-bottom:1px solid #000;" class="label-cell"><span class="cell-label">Civil Status</span></td>
            <td rowspan="2" colspan="2" style="vertical-align:middle; padding:4px 16px;">
                {{-- Civil status checkboxes in 2x2 grid --}}
                @php $cs = strtolower(trim($personal->civil_status ?? '')); @endphp
                <table style="width:100%; border-collapse:collapse;">
                    <tr>
                        <td style="border:none; width:50%; padding:2px 0; text-align:left;">
                            <span style="display:inline-flex; align-items:center; gap:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt;">
                                <span style="display:inline-block; width:10px; height:10px; border:1px solid #000; text-align:center; line-height:10px; font-size:8pt;">{{ $cs === 'single' ? '✓' : '' }}</span>
                                Single
                            </span>
                        </td>
                        <td style="border:none; width:50%; padding:2px 0; padding-left:32px;">
                            <span style="display:inline-flex; align-items:center; gap:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt;">
                                <span style="display:inline-block; width:10px; height:10px; border:1px solid #000; text-align:center; line-height:10px; font-size:8pt;">{{ $cs === 'married' ? '✓' : '' }}</span>
                                Married
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td style="border:none; padding:2px 0; text-align:left;">
                            <span style="display:inline-flex; align-items:center; gap:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt;">
                                <span style="display:inline-block; width:10px; height:10px; border:1px solid #000; text-align:center; line-height:10px; font-size:8pt;">{{ $cs === 'widowed' ? '✓' : '' }}</span>
                                Widowed
                            </span>
                        </td>
                        <td style="border:none; padding:2px 0; padding-left:32px;">
                            <span style="display:inline-flex; align-items:center; gap:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt;">
                                <span style="display:inline-block; width:10px; height:10px; border:1px solid #000; text-align:center; line-height:10px; font-size:8pt;">{{ $cs === 'separated' ? '✓' : '' }}</span>
                                Separated
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td style="border:none; padding:2px 0; text-align:left;" colspan="2">
                            <span style="display:inline-flex; align-items:center; gap:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt;">
                                <span style="display:inline-block; width:10px; height:10px; border:1px solid #000; text-align:center; line-height:10px; font-size:8pt;">{{ !in_array($cs, ['single','married','widowed','separated']) && $cs !== '' ? '✓' : '' }}</span>
                                Other/s: <span style="font-weight:bold;">{{ !in_array($cs, ['single','married','widowed','separated']) ? $personal->civil_status : '' }}</span>
                            </span>
                        </td>
                    </tr>
                </table>
            </td>
            {{-- Residential Address label (rowspan 3) --}}
            <td colspan="2" rowspan="3" style="background:#EAEAEA; vertical-align:top; padding:2px 4px;" class="label-cell">
                <span class="cell-label">17. Residential Address</span>
            </td>
            {{-- House/Lot No. + Street --}}
            <td colspan="4" style="padding:0;">
                <table style="width:100%; border-collapse:collapse;">
                    <tr style="border-top:1px solid #d0d0d0;">
                        <td style="border:none; width:50%; vertical-align:bottom; padding:2px 4px; height:28px; text-align:center;">
                            <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; font-weight:normal; display:block;">{{ $na($resAddr['house']) !== 'N/A' ? $resAddr['house'] : '' }}</span>
                            <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:7.5pt; font-style:italic; display:block; border-top:1px solid #d0d0d0; margin-top:2px; padding-top:1px;">House/Block/Lot No.</span>
                        </td>
                        <td style="border:none; width:50%; vertical-align:bottom; padding:2px 4px; height:28px; text-align:center;">
                            <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; font-weight:normal; display:block;">{{ $na($resAddr['street']) !== 'N/A' ? $resAddr['street'] : '' }}</span>
                            <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:7.5pt; font-style:italic; display:block; border-top:1px solid #d0d0d0; margin-top:2px; padding-top:1px;">Street</span>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        {{-- Civil Status row 2 | Subdivision + Barangay --}}
        <tr>
            <td colspan="4" style="padding:0;">
                <table style="width:100%; border-collapse:collapse;">
                    <tr style="border-top:1px solid #d0d0d0;">
                        <td style="border:none; width:50%; vertical-align:bottom; padding:2px 4px; height:28px; text-align:center;">
                            <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; font-weight:normal; display:block;">{{ $na($resAddr['subdivision']) !== 'N/A' ? $resAddr['subdivision'] : '' }}</span>
                            <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:7.5pt; font-style:italic; display:block; border-top:1px solid #d0d0d0; margin-top:2px; padding-top:1px;">Subdivision/Village</span>
                        </td>
                        <td style="border:none; width:50%; vertical-align:bottom; padding:2px 4px; height:28px; text-align:center;">
                            <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; font-weight:normal; display:block;">{{ $na($resAddr['barangay']) !== 'N/A' ? $resAddr['barangay'] : '' }}</span>
                            <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:7.5pt; font-style:italic; display:block; border-top:1px solid #d0d0d0; margin-top:2px; padding-top:1px;">Barangay</span>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        {{-- Height | City + Province --}}
        <tr>
            <td style="background:#EAEAEA; border-top:1px solid #000; border-bottom:1px solid #000;" class="label-cell"><span class="cell-label">7.</span></td>
            <td style="background:#EAEAEA; border-top:1px solid #000; border-bottom:1px solid #000;" class="label-cell"><span class="cell-label">Height (m)</span></td>
            <td colspan="2" style="text-align:center; vertical-align:middle;">
                <span class="cell-value">{{ $na($personal->height) }}</span>
            </td>
            <td colspan="4" style="padding:0;">
                <table style="width:100%; border-collapse:collapse;">
                    <tr style="border-top:1px solid #d0d0d0;">
                        <td style="border:none; width:50%; vertical-align:bottom; padding:2px 4px; height:28px; text-align:center;">
                            <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; font-weight:normal; display:block;">{{ $na($resAddr['city']) !== 'N/A' ? $resAddr['city'] : '' }}</span>
                            <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:7.5pt; font-style:italic; display:block; border-top:1px solid #d0d0d0; margin-top:2px; padding-top:1px;">City/Municipality</span>
                        </td>
                        <td style="border:none; width:50%; vertical-align:bottom; padding:2px 4px; height:28px; text-align:center;">
                            <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; font-weight:normal; display:block;">{{ $na($resAddr['province']) !== 'N/A' ? $resAddr['province'] : '' }}</span>
                            <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:7.5pt; font-style:italic; display:block; border-top:1px solid #d0d0d0; margin-top:2px; padding-top:1px;">Province</span>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        {{-- Weight | ZIP Code --}}
        <tr>
            <td style="background:#EAEAEA; border-top:1px solid #000; border-bottom:1px solid #000;" class="label-cell"><span class="cell-label">8.</span></td>
            <td style="background:#EAEAEA; border-top:1px solid #000; border-bottom:1px solid #000;" class="label-cell"><span class="cell-label">Weight (kg)</span></td>
            <td colspan="2" style="text-align:center; vertical-align:middle; padding-top:8px; padding-bottom:8px;">
                <span class="cell-value">{{ $na($personal->weight) }}</span>
            </td>
            <td colspan="2" style="background:#EAEAEA; vertical-align:middle; padding:2px 4px;" class="label-cell">
                <span class="cell-label" style="display:block; text-align:center;">ZIP Code</span>
            </td>
            <td colspan="4" style="vertical-align:middle; text-align:center; padding-top:8px; padding-bottom:8px;">
                <span class="cell-value" style="display:block; text-align:center;">{{ $na($personal->residential_zip_code) }}</span>
            </td>
        </tr>

        {{-- Blood Type | Permanent Address (rowspan 3) --}}
        <tr>
            <td style="background:#EAEAEA; border-top:1px solid #000; border-bottom:1px solid #000;" class="label-cell"><span class="cell-label">9.</span></td>
            <td style="background:#EAEAEA; border-top:1px solid #000; border-bottom:1px solid #000;" class="label-cell"><span class="cell-label">Blood Type</span></td>
            <td colspan="2" style="text-align:center; vertical-align:middle;">
                <span class="cell-value">{{ $na($personal->blood_type) }}</span>
            </td>
            {{-- Permanent Address label rowspan 3 --}}
            <td colspan="2" rowspan="3" style="background:#EAEAEA; vertical-align:top; padding:2px 4px; border-top:1px solid #000;" class="label-cell">
                <span class="cell-label">18. Permanent Address</span>
            </td>
            {{-- House/Lot No. + Street --}}
            <td colspan="4" style="padding:0;">
                <table style="width:100%; border-collapse:collapse; border-top:1px solid #d0d0d0;">
                    <tr>
                        <td style="border:none; width:50%; vertical-align:bottom; padding:2px 4px; height:28px; text-align:center;">
                            <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; font-weight:normal; display:block;">{{ $na($permAddr['house']) !== 'N/A' ? $permAddr['house'] : '' }}</span>
                            <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:7.5pt; font-style:italic; display:block; border-top:1px solid #d0d0d0; margin-top:2px; padding-top:1px;">House/Block/Lot No.</span>
                        </td>
                        <td style="border:none; width:50%; vertical-align:bottom; padding:2px 4px; height:28px; text-align:center;">
                            <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; font-weight:normal; display:block;">{{ $na($permAddr['street']) !== 'N/A' ? $permAddr['street'] : '' }}</span>
                            <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:7.5pt; font-style:italic; display:block; border-top:1px solid #d0d0d0; margin-top:2px; padding-top:1px;">Street</span>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        {{-- UMID | Subdivision + Barangay --}}
        <tr>
            <td style="background:#EAEAEA; border-top:1px solid #000; border-bottom:1px solid #000;" class="label-cell"><span class="cell-label">10.</span></td>
            <td style="background:#EAEAEA; border-top:1px solid #000; border-bottom:1px solid #000;" class="label-cell"><span class="cell-label">UMID ID No.</span></td>
            <td colspan="2" style="text-align:center; vertical-align:middle;">
                <span class="cell-value">{{ $na($personal->umid_id_no) }}</span>
            </td>
            <td colspan="4" style="padding:0;">
                <table style="width:100%; border-collapse:collapse; border-top:1px solid #d0d0d0;">
                    <tr>
                        <td style="border:none; width:50%; vertical-align:bottom; padding:2px 4px; height:28px; text-align:center;">
                            <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; font-weight:normal; display:block;">{{ $na($permAddr['subdivision']) !== 'N/A' ? $permAddr['subdivision'] : '' }}</span>
                            <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:7.5pt; font-style:italic; display:block; border-top:1px solid #d0d0d0; margin-top:2px; padding-top:1px;">Subdivision/Village</span>
                        </td>
                        <td style="border:none; width:50%; vertical-align:bottom; padding:2px 4px; height:28px; text-align:center;">
                            <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; font-weight:normal; display:block;">{{ $na($permAddr['barangay']) !== 'N/A' ? $permAddr['barangay'] : '' }}</span>
                            <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:7.5pt; font-style:italic; display:block; border-top:1px solid #d0d0d0; margin-top:2px; padding-top:1px;">Barangay</span>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        {{-- Pag-IBIG | City + Province --}}
        <tr>
            <td style="background:#EAEAEA; border-top:1px solid #000; border-bottom:1px solid #000;" class="label-cell"><span class="cell-label">11.</span></td>
            <td style="background:#EAEAEA; border-top:1px solid #000; border-bottom:1px solid #000;" class="label-cell"><span class="cell-label">Pag-IBIG ID No.</span></td>
            <td colspan="2" style="text-align:center; vertical-align:middle;">
                <span class="cell-value">{{ $na($personal->pagibig_id_no) }}</span>
            </td>
            <td colspan="4" style="padding:0;">
                <table style="width:100%; border-collapse:collapse; border-top:1px solid #d0d0d0;">
                    <tr>
                        <td style="border:none; width:50%; vertical-align:bottom; padding:2px 4px; height:28px; text-align:center;">
                            <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; font-weight:normal; display:block;">{{ $na($permAddr['city']) !== 'N/A' ? $permAddr['city'] : '' }}</span>
                            <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:7.5pt; font-style:italic; display:block; border-top:1px solid #d0d0d0; margin-top:2px; padding-top:1px;">City/Municipality</span>
                        </td>
                        <td style="border:none; width:50%; vertical-align:bottom; padding:2px 4px; height:28px; text-align:center;">
                            <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; font-weight:normal; display:block;">{{ $na($permAddr['province']) !== 'N/A' ? $permAddr['province'] : '' }}</span>
                            <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:7.5pt; font-style:italic; display:block; border-top:1px solid #d0d0d0; margin-top:2px; padding-top:1px;">Province</span>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        {{-- PhilHealth | ZIP Code --}}
        <tr>
            <td style="background:#EAEAEA; border-top:1px solid #000; border-bottom:1px solid #000;" class="label-cell"><span class="cell-label">12.</span></td>
            <td style="background:#EAEAEA; border-top:1px solid #000; border-bottom:1px solid #000;" class="label-cell"><span class="cell-label">PhilHealth No.</span></td>
            <td colspan="2" style="text-align:center; vertical-align:middle;">
                <span class="cell-value">{{ $na($personal->philhealth_id_no) }}</span>
            </td>
            <td colspan="2" style="background:#EAEAEA; vertical-align:middle; padding:2px 4px; text-align:center;" class="label-cell">
                <span class="cell-label">ZIP Code</span>
            </td>
            <td colspan="4" style="vertical-align:middle; text-align:center; padding-top:8px; padding-bottom:8px;">
                <span class="cell-value" style="display:block; text-align:center;">{{ $na($personal->permanent_zip_code) }}</span>
            </td>
        </tr>

        {{-- PhilSys | Telephone --}}
        <tr>
            <td style="background:#EAEAEA;; border-top:1px solid #000; border-bottom:1px solid #000;" class="label-cell"><span class="cell-label">13.</span></td>
            <td style="background:#EAEAEA;; border-top:1px solid #000; border-bottom:1px solid #000;" class="label-cell"><span class="cell-label">PhilSys Number (PSN):</span></td>
            <td colspan="2" style="text-align:center; vertical-align:middle; padding-top:8px; padding-bottom:8px;">
                <span class="cell-value">{{ $na($personal->philsys_no) }}</span>
            </td>
            <td colspan="2" style="background:#EAEAEA;; border-top:1px solid #000; border-bottom:1px solid #000;" class="label-cell">
                <span class="cell-label">19. Telephone No.</span>
            </td>
            <td colspan="4" style="text-align:center; vertical-align:middle; padding-top:8px; padding-bottom:8px;">
                <span class="cell-value">{{ $na($personal->telephone_no) }}</span>
            </td>
        </tr>

        {{-- TIN | Mobile --}}
        <tr>
            <td style="background:#EAEAEA;; border-top:1px solid #000; border-bottom:1px solid #000;" class="label-cell"><span class="cell-label">14.</span></td>
            <td style="background:#EAEAEA;; border-top:1px solid #000; border-bottom:1px solid #000;" class="label-cell"><span class="cell-label">TIN No.</span></td>
            <td colspan="2" style="text-align:center; vertical-align:middle; padding-top:8px; padding-bottom:8px;">
                <span class="cell-value">{{ $na($personal->tin_no) }}</span>
            </td>
            <td colspan="2" style="background:#EAEAEA;; border-top:1px solid #000; border-bottom:1px solid #000;" class="label-cell">
                <span class="cell-label">20. Mobile No.</span>
            </td>
            <td colspan="4" style="text-align:center; vertical-align:middle; padding-top:8px; padding-bottom:8px;">
                <span class="cell-value">{{ $na($personal->mobile_no) }}</span>
            </td>
        </tr>

        {{-- Agency Employee No. | Email --}}
        <tr>
            <td style="background:#EAEAEA;; border-top:1px solid #000; border-bottom:1px solid #000;" class="label-cell"><span class="cell-label">15.</span></td>
            <td style="background:#EAEAEA;; border-top:1px solid #000; border-bottom:1px solid #000;" class="label-cell"><span class="cell-label">Agency Employee No.</span></td>
            <td colspan="2" style="text-align:center; vertical-align:middle; padding-top:8px; padding-bottom:8px;">
                <span class="cell-value">{{ $na($personal->agency_employee_no) }}</span>
            </td>
            <td colspan="2" style="background:#EAEAEA;; border-top:1px solid #000; border-bottom:1px solid #000;" class="label-cell">
                <span class="cell-label">21. E-mail Address (if any)</span>
            </td>
            <td colspan="4" style="text-align:center; vertical-align:middle; padding-top:8px; padding-bottom:8px;">
                <span class="cell-value">{{ $na($personal->email_address) }}</span>
            </td>
        </tr>

    </table>

    {{-- <div class="section-header">II.&nbsp;&nbsp;Family Background</div>

    <table class="pds-table">

        <tr>
            <td style="width:3%"><span class="cell-label">22.</span></td>
            <td style="width:30%">
                <span class="cell-label">Spouse's Surname</span>
                <span class="cell-value">{{ $na($family->spouse_surname ?? null) }}</span>
            </td>

            <td rowspan="6" style="width:67%" colspan="2">
                <span class="cell-label">23. Name of Children (Write full name and list all)</span>
                <table style="width:100%; border-collapse:collapse; margin-top:3px;">
                    <tr>
                        <th style="width:55%; font-size:5.5pt; border:1px solid #000; padding:1px 3px; background:#e8e8e8;">Name</th>
                        <th style="width:45%; font-size:5.5pt; border:1px solid #000; padding:1px 3px; background:#e8e8e8;">Date of Birth (dd/mm/yyyy)</th>
                    </tr>
                    @for($ci = 0; $ci < 6; $ci++)
                        <tr>
                            <td style="border:1px solid #000; padding:2px 3px; font-size:7.5pt; font-weight:600; min-height:12px;">
                                {{ isset($childNames[$ci]) && $na($childNames[$ci]) !== 'N/A' ? $childNames[$ci] : '' }}
                            </td>
                            <td style="border:1px solid #000; padding:2px 3px; font-size:7.5pt; font-weight:600; min-height:12px;">
                                {{ isset($childDobs[$ci]) && $na($childDobs[$ci]) !== 'N/A' ? $childDobs[$ci] : '' }}
                            </td>
                        </tr>
                    @endfor
                </table>
            </td>
        </tr>

        <tr>
            <td></td>
            <td>
                <span class="cell-label">First Name</span>
                <span class="cell-value">{{ $na($family->spouse_first_name ?? null) }}</span>
                <span class="cell-label" style="margin-top:3px;">Name Extension (Jr., Sr.)</span>
                <span class="cell-value">{{ $na($family->spouse_name_extension ?? null) }}</span>
            </td>
        </tr>

        <tr>
            <td></td>
            <td>
                <span class="cell-label">Middle Name</span>
                <span class="cell-value">{{ $na($family->spouse_middle_name ?? null) }}</span>
            </td>
        </tr>

        <tr>
            <td></td>
            <td>
                <span class="cell-label">Occupation</span>
                <span class="cell-value">{{ $na($family->occupation ?? null) }}</span>
            </td>
        </tr>

        <tr>
            <td></td>
            <td>
                <span class="cell-label">Employer/Business Name</span>
                <span class="cell-value">{{ $na($family->employer_business_name ?? null) }}</span>
            </td>
        </tr>

        <tr>
            <td></td>
            <td>
                <span class="cell-label">Business Address</span>
                <span class="cell-value">{{ $na($family->business_address ?? null) }}</span>
            </td>
        </tr>

        <tr>
            <td></td>
            <td>
                <span class="cell-label">Telephone No.</span>
                <span class="cell-value">{{ $na($family->telephone_no ?? null) }}</span>
            </td>
            <td colspan="2">
                <span class="cell-label" style="font-style:italic;">(Continue on separate sheet if necessary)</span>
            </td>
        </tr>

        <tr>
            <td><span class="cell-label">24.</span></td>
            <td colspan="3">
                <span class="cell-label">Father's Surname</span>
                <span class="cell-value">{{ $na($family->father_surname ?? null) }}</span>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <span class="cell-label">First Name</span>
                <span class="cell-value">{{ $na($family->father_first_name ?? null) }}</span>
            </td>
            <td colspan="2">
                <span class="cell-label">Name Extension (Jr., Sr.)</span>
                <span class="cell-value">{{ $na($family->father_name_extension ?? null) }}</span>
            </td>
        </tr>
        <tr>
            <td></td>
            <td colspan="3">
                <span class="cell-label">Middle Name</span>
                <span class="cell-value">{{ $na($family->father_middle_name ?? null) }}</span>
            </td>
        </tr>

        <tr>
            <td><span class="cell-label">25.</span></td>
            <td colspan="3">
                <span class="cell-label">Mother's Maiden Name</span>
            </td>
        </tr>
        <tr>
            <td></td>
            <td colspan="3">
                <span class="cell-label">Surname</span>
                <span class="cell-value">{{ $na($family->mother_surname ?? null) }}</span>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <span class="cell-label">First Name</span>
                <span class="cell-value">{{ $na($family->mother_first_name ?? null) }}</span>
            </td>
            <td colspan="2">
                <span class="cell-label">Middle Name</span>
                <span class="cell-value">{{ $na($family->mother_middle_name ?? null) }}</span>
            </td>
        </tr>

    </table>

    <div class="section-header">III.&nbsp;&nbsp;Educational Background</div>

    <table class="pds-table">
        <thead>
            <tr>
                <th style="width:3%">26.</th>
                <th style="width:11%">Level</th>
                <th style="width:21%">Name of School<br><em style="font-weight:normal;">(Write in full)</em></th>
                <th style="width:18%">Basic Education / Degree / Course<br><em style="font-weight:normal;">(Write in full)</em></th>
                <th style="width:8%">Period of<br>Attendance<br>From</th>
                <th style="width:8%">Period of<br>Attendance<br>To</th>
                <th style="width:12%">Highest Level /<br>Units Earned<br><em style="font-weight:normal;">(if not graduated)</em></th>
                <th style="width:8%">Year<br>Graduated</th>
                <th style="width:11%">Scholarship /<br>Academic Honors<br>Received</th>
            </tr>
        </thead>
        <tbody>
            @foreach($levelOrder as $level)
                @php
                    $rows = $eduByLevel[$level] ?? [null];
                @endphp
                @foreach($rows as $idx => $e)
                    <tr>
                        @if($idx === 0)
                            <td rowspan="{{ count($rows) }}"></td>
                            <td rowspan="{{ count($rows) }}"
                                style="font-size:6.5pt; font-weight:600; vertical-align:middle; text-align:center;">
                                {{ $level }}
                            </td>
                        @endif
                        <td><span class="cell-value" style="font-size:7pt;">{{ $e ? $na($e->name_of_school) : '' }}</span></td>
                        <td><span class="cell-value" style="font-size:7pt;">{{ $e ? $na($e->basic_education) : '' }}</span></td>
                        <td style="text-align:center;"><span class="cell-value" style="font-size:7pt;">{{ $e ? $na($e->period_of_attendance_from) : '' }}</span></td>
                        <td style="text-align:center;"><span class="cell-value" style="font-size:7pt;">{{ $e ? $na($e->period_of_attendance_to) : '' }}</span></td>
                        <td style="text-align:center;"><span class="cell-value" style="font-size:7pt;">{{ $e ? $na($e->highest_level) : '' }}</span></td>
                        <td style="text-align:center;"><span class="cell-value" style="font-size:7pt;">{{ $e ? $na($e->year_graduated) : '' }}</span></td>
                        <td><span class="cell-value" style="font-size:7pt;">{{ $e ? $na($e->scholarship_academic_honors_recieved) : '' }}</span></td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>

    <div class="continue-note">(Continue on separate sheet if necessary)</div>

    <div class="sig-row">
        <div class="sig-cell" style="flex:2;">
            <div class="sig-line"></div>
            SIGNATURE &nbsp;<em>(wet signature/e-signature/digital certificate)</em>
        </div>
        <div class="sig-cell" style="flex:1;">
            <div class="sig-line"></div>
            DATE
        </div>
    </div>

    <div class="page-num">CS FORM 212 (Revised 2025), Page 1 of 4</div> --}}

</div>
