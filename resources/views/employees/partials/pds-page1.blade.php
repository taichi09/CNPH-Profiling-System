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
            <td colspan="8" style="padding-top:8px; padding-bottom:8px;">
                <span class="cell-value">{{ $na($personal->surname) }}</span>
            </td>
        </tr>

        <tr>
            <td style="background:#EAEAEA;" class="label-cell"><span class="cell-label">2.</span></td>
            <td style="background:#EAEAEA;" class="label-cell"><span class="cell-label">First Name</span></td>
            <td colspan="5" style="width:45%; padding-top:8px; padding-bottom:8px;">
                <span class="cell-value">{{ $na($personal->first_name) }}</span>
            </td>
            <td style="width:12%; background:#EAEAEA; border-right:none;" class="label-cell">
                <span class="cell-label" style="font-size:7pt;">Name Extension (Jr., Sr.)</span>
            </td>
            <td colspan="2" style="width:8%; border-left:none; background: #EAEAEA;">
                <span class="cell-value">{{ $na($personal->extension) }}</span>
            </td>
        </tr>

        <tr>
            <td style="background:#EAEAEA;" class="label-cell"><span class="cell-label"></span></td>
            <td style="background:#EAEAEA;" class="label-cell"><span class="cell-label">Middle Name</span></td>
            <td colspan="8" style="padding-top:8px; padding-bottom:8px;">
                <span class="cell-value">{{ $na($personal->middle_name) }}</span>
            </td>
        </tr>

        {{-- Date of Birth | Citizenship (rowspan 3) --}}
        <tr>
            <td style="background:#EAEAEA; border-top:1px solid #000; border-bottom:1px solid #000;" class="label-cell"><span class="cell-label">3.</span></td>
            <td style="background:#EAEAEA; border-top:1px solid #000; border-bottom:1px solid #000;" class="label-cell"><span class="cell-label">Date of Birth<br><span class="normal-case font-normal text-[10px]">(dd/mm/yyyy)</span></span></td>
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
                <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:7.5pt; font-style:italic; display:block; text-align:center; margin-top:4px; margin-bottom:6px; text-transform:none;">
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
                <div style="font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; text-align:center; margin-bottom:4px; text-transform:none;">
                    Pls. indicate country:
                </div>
                <div style="border-top:1px solid #000; padding:3px 4px; font-family:Arial,sans-serif; font-size:8pt; font-weight:normal; min-height:18px;">
                    {{ $citizenCountry ?: 'N/A' }}
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
                            <span style="display:inline-flex; align-items:center; gap:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; text-transform:none;">
                                <span style="display:inline-block; width:10px; height:10px; border:1px solid #000; text-align:center; line-height:10px; font-size:8pt;">
                                    {{ strtolower(trim($personal->sex_at_birth ?? '')) === 'male' ? '✓' : '' }}
                                </span>
                                Male
                            </span>
                        </td>
                        <td style="border:none; text-align:right; padding-right: 35.5px; width:50%;">
                            <span style="display:inline-flex; align-items:center; gap:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; text-transform:none;">
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
                            <span style="display:inline-flex; align-items:center; gap:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; text-transform:none;">
                                <span style="display:inline-block; width:10px; height:10px; border:1px solid #000; text-align:center; line-height:10px; font-size:8pt;">{{ $cs === 'single' ? '✓' : '' }}</span>
                                Single
                            </span>
                        </td>
                        <td style="border:none; width:50%; padding:2px 0; padding-left:32px;">
                            <span style="display:inline-flex; align-items:center; gap:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; text-transform:none;">
                                <span style="display:inline-block; width:10px; height:10px; border:1px solid #000; text-align:center; line-height:10px; font-size:8pt;">{{ $cs === 'married' ? '✓' : '' }}</span>
                                Married
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td style="border:none; padding:2px 0; text-align:left;">
                            <span style="display:inline-flex; align-items:center; gap:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; text-transform:none;">
                                <span style="display:inline-block; width:10px; height:10px; border:1px solid #000; text-align:center; line-height:10px; font-size:8pt;">{{ $cs === 'widowed' ? '✓' : '' }}</span>
                                Widowed
                            </span>
                        </td>
                        <td style="border:none; padding:2px 0; padding-left:32px;">
                            <span style="display:inline-flex; align-items:center; gap:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; text-transform:none;">
                                <span style="display:inline-block; width:10px; height:10px; border:1px solid #000; text-align:center; line-height:10px; font-size:8pt;">{{ $cs === 'separated' ? '✓' : '' }}</span>
                                Separated
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td style="border:none; padding:2px 0; text-align:left;" colspan="2">
                            <span style="display:inline-flex; align-items:center; gap:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; text-transform:none;">
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
                            <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; font-weight:bold; display:block;">{{ $na($resAddr['house']) }}</span>
                            <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:7.5pt; font-style:italic; display:block; border-top:1px solid #d0d0d0; margin-top:2px; padding-top:1px; text-transform:none;">House/Block/Lot No.</span>
                        </td>
                        <td style="border:none; width:50%; vertical-align:bottom; padding:2px 4px; height:28px; text-align:center;">
                            <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; font-weight:bold; display:block;">{{ $na($resAddr['street']) }}</span>
                            <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:7.5pt; font-style:italic; display:block; border-top:1px solid #d0d0d0; margin-top:2px; padding-top:1px; text-transform:none;">Street</span>
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
                            <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; font-weight:bold; display:block;">{{ $na($resAddr['subdivision']) }}</span>
                            <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:7.5pt; font-style:italic; display:block; border-top:1px solid #d0d0d0; margin-top:2px; padding-top:1px; text-transform:none;">Subdivision/Village</span>
                        </td>
                        <td style="border:none; width:50%; vertical-align:bottom; padding:2px 4px; height:28px; text-align:center;">
                            <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; font-weight:bold; display:block;">{{ $na($resAddr['barangay']) }}</span>
                            <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:7.5pt; font-style:italic; display:block; border-top:1px solid #d0d0d0; margin-top:2px; padding-top:1px; text-transform:none;">Barangay</span>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        {{-- Height | City + Province --}}
        <tr>
            <td style="background:#EAEAEA; border-top:1px solid #000; border-bottom:1px solid #000;" class="label-cell"><span class="cell-label">7.</span></td>
            <td style="background:#EAEAEA; border-top:1px solid #000; border-bottom:1px solid #000;" class="label-cell"><span class="cell-label">Height <span style="text-transform:none;">(m)</span></span></td>
            <td colspan="2" style="text-align:center; vertical-align:middle;">
                <span class="cell-value">{{ $na($personal->height) }}</span>
            </td>
            <td colspan="4" style="padding:0;">
                <table style="width:100%; border-collapse:collapse;">
                    <tr style="border-top:1px solid #d0d0d0;">
                        <td style="border:none; width:50%; vertical-align:bottom; padding:2px 4px; height:28px; text-align:center;">
                            <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; font-weight:bold; display:block;">{{ $na($resAddr['city']) }}</span>
                            <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:7.5pt; font-style:italic; display:block; border-top:1px solid #d0d0d0; margin-top:2px; padding-top:1px; text-transform:none;">City/Municipality</span>
                        </td>
                        <td style="border:none; width:50%; vertical-align:bottom; padding:2px 4px; height:28px; text-align:center;">
                            <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; font-weight:bold; display:block;">{{ $na($resAddr['province']) }}</span>
                            <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:7.5pt; font-style:italic; display:block; border-top:1px solid #d0d0d0; margin-top:2px; padding-top:1px; text-transform:none;">Province</span>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        {{-- Weight | ZIP Code --}}
        <tr>
            <td style="background:#EAEAEA; border-top:1px solid #000; border-bottom:1px solid #000;" class="label-cell"><span class="cell-label">8.</span></td>
            <td style="background:#EAEAEA; border-top:1px solid #000; border-bottom:1px solid #000;" class="label-cell"><span class="cell-label">Weight <span style="text-transform:none;">(kg)</span></span></td>
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
                            <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; font-weight:bold; display:block;">{{ $na($permAddr['house']) }}</span>
                            <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:7.5pt; font-style:italic; display:block; border-top:1px solid #d0d0d0; margin-top:2px; padding-top:1px; text-transform:none;">House/Block/Lot No.</span>
                        </td>
                        <td style="border:none; width:50%; vertical-align:bottom; padding:2px 4px; height:28px; text-align:center;">
                            <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; font-weight:bold; display:block;">{{ $na($permAddr['street']) }}</span>
                            <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:7.5pt; font-style:italic; display:block; border-top:1px solid #d0d0d0; margin-top:2px; padding-top:1px; text-transform:none;">Street</span>
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
                            <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; font-weight:bold; display:block;">{{ $na($permAddr['subdivision']) }}</span>
                            <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:7.5pt; font-style:italic; display:block; border-top:1px solid #d0d0d0; margin-top:2px; padding-top:1px; text-transform:none;">Subdivision/Village</span>
                        </td>
                        <td style="border:none; width:50%; vertical-align:bottom; padding:2px 4px; height:28px; text-align:center;">
                            <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; font-weight:bold; display:block;">{{ $na($permAddr['barangay']) }}</span>
                            <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:7.5pt; font-style:italic; display:block; border-top:1px solid #d0d0d0; margin-top:2px; padding-top:1px; text-transform:none;">Barangay</span>
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
                            <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; font-weight:bold; display:block;">{{ $na($permAddr['city']) }}</span>
                            <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:7.5pt; font-style:italic; display:block; border-top:1px solid #d0d0d0; margin-top:2px; padding-top:1px; text-transform:none;">City/Municipality</span>
                        </td>
                        <td style="border:none; width:50%; vertical-align:bottom; padding:2px 4px; height:28px; text-align:center;">
                            <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; font-weight:bold; display:block;">{{ $na($permAddr['province']) }}</span>
                            <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:7.5pt; font-style:italic; display:block; border-top:1px solid #d0d0d0; margin-top:2px; padding-top:1px; text-transform:none;">Province</span>
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
                <span class="cell-label">21. E-mail Address <span style="text-transform:none;">(if any)</span></span>
            </td>
            <td colspan="4" style="text-align:center; vertical-align:middle; padding-top:8px; padding-bottom:8px;">
                <span class="cell-value" style="color:blue; text-decoration:underline; text-transform:none;">{{ $na($personal->email_address) }}</span>
            </td>
        </tr>

        {{-- ── Section Header Row: Family Background ── --}}
        <tr>
            <td colspan="10" style="padding:0; border:none;">
                <div class="section-header">II.&nbsp;Family Background</div>
            </td>
        </tr>

        {{-- Row 1: Spouse Surname | Children headers --}}
        <tr>
            <td style="background:#EAEAEA;" class="label-cell"><span class="cell-label">22.</span></td>
            <td style="background:#EAEAEA;" class="label-cell"><span class="cell-label">Spouse's Surname</span></td>
            <td colspan="4" style="padding-top:8px; padding-bottom:8px; text-align:left; vertical-align:middle; padding-left:6px;">
                <span class="cell-value">{{ $na($family->spouse_surname ?? null) }}</span>
            </td>
            <td colspan="2" style="background:#EAEAEA;" class="label-cell">
                <span class="cell-label">23. Name of Children <span style="text-transform:none;">(Write full name and list all)</span></span>
            </td>
            <td colspan="2" style="background:#EAEAEA; border-left:1px solid #000; text-align:center;" class="label-cell">
                <span class="cell-label">Date of Birth {{-- <span style="text-transform:none;">(dd/mm/yyyy)</span> --}}</span>
            </td>
        </tr>

        {{-- Row 2: First Name | Name Extension | Child 1 --}}
        <tr>
            <td style="background:#EAEAEA;" class="label-cell"></td>
            <td style="background:#EAEAEA;" class="label-cell"><span class="cell-label">First Name</span></td>
            <td colspan="2" style="padding-top:8px; padding-bottom:8px; text-align:left; vertical-align:middle; padding-left:6px;">
                <span class="cell-value">{{ $na($family->spouse_first_name ?? null) }}</span>
            </td>
            <td colspan="2" style="background:#EAEAEA; border-right:none;" class="label-cell">
                <span class="cell-label" style="font-size:7pt;">Name Extension (Jr., Sr.)</span>
                <span class="cell-value" style="font-size:9pt;">{{ $na($family->spouse_name_extension ?? null) }}</span>
            </td>
            <td colspan="2" style="border-left:1px solid #000; padding:6px 4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; font-weight:bold; vertical-align:middle; text-align:center;">
                {{ isset($childNames[0]) && $na($childNames[0]) !== 'N/A' ? $childNames[0] : 'N/A' }}
            </td>
            <td colspan="2" style="border-left:1px solid #000; padding:6px 4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; font-weight:bold; vertical-align:middle; text-align:center;">
                {{ isset($childDobs[0]) && $na($childDobs[0]) !== 'N/A' ? $childDobs[0] : 'N/A' }}
            </td>
        </tr>

        {{-- Row 3: Middle Name | Child 2 --}}
        <tr>
            <td style="background:#EAEAEA;" class="label-cell"></td>
            <td style="background:#EAEAEA;" class="label-cell"><span class="cell-label">Middle Name</span></td>
            <td colspan="4" style="padding-top:8px; padding-bottom:8px; text-align:left; vertical-align:middle; padding-left:6px;">
                <span class="cell-value">{{ $na($family->spouse_middle_name ?? null) }}</span>
            </td>
            <td colspan="2" style="border-left:1px solid #000; padding:6px 4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; font-weight:bold; vertical-align:middle; text-align:center;">
                {{ isset($childNames[1]) && $na($childNames[1]) !== 'N/A' ? $childNames[1] : '' }}
            </td>
            <td colspan="2" style="border-left:1px solid #000; padding:6px 4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; font-weight:bold; vertical-align:middle; text-align:center;">
                {{ isset($childDobs[1]) && $na($childDobs[1]) !== 'N/A' ? $childDobs[1] : '' }}
            </td>
        </tr>

        {{-- Occupation | Child 3 --}}
        <tr>
            <td style="background:#EAEAEA; border-top:1px solid #000; border-bottom:1px solid #000;" class="label-cell"></td>
            <td style="background:#EAEAEA; border-top:1px solid #000; border-bottom:1px solid #000;" class="label-cell"><span class="cell-label">Occupation</span></td>
            <td colspan="4" style="padding-top:8px; padding-bottom:8px; text-align:left; vertical-align:middle; padding-left:6px;">
                <span class="cell-value">{{ $na($family->occupation ?? null) }}</span>
            </td>
            <td colspan="2" style="border-left:1px solid #000; padding:6px 4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; font-weight:bold; vertical-align:middle; text-align:center;">
                {{ isset($childNames[2]) && $na($childNames[2]) !== 'N/A' ? $childNames[2] : '' }}
            </td>
            <td colspan="2" style="border-left:1px solid #000; padding:6px 4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; font-weight:bold; vertical-align:middle; text-align:center;">
                {{ isset($childDobs[2]) && $na($childDobs[2]) !== 'N/A' ? $childDobs[2] : '' }}
            </td>
        </tr>

        {{-- Employer/Business Name | Child 4 --}}
        <tr>
            <td style="background:#EAEAEA; border-top:1px solid #000; border-bottom:1px solid #000;" class="label-cell"></td>
            <td style="background:#EAEAEA; border-top:1px solid #000; border-bottom:1px solid #000;" class="label-cell"><span class="cell-label">Employer/Business Name</span></td>
            <td colspan="4" style="padding-top:8px; padding-bottom:8px; text-align:left; vertical-align:middle; padding-left:6px;">
                <span class="cell-value">{{ $na($family->employer_business_name ?? null) }}</span>
            </td>
            <td colspan="2" style="border-left:1px solid #000; padding:6px 4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; font-weight:bold; vertical-align:middle; text-align:center;">
                {{ isset($childNames[3]) && $na($childNames[3]) !== 'N/A' ? $childNames[3] : '' }}
            </td>
            <td colspan="2" style="border-left:1px solid #000; padding:6px 4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; font-weight:bold; vertical-align:middle; text-align:center;">
                {{ isset($childDobs[3]) && $na($childDobs[3]) !== 'N/A' ? $childDobs[3] : '' }}
            </td>
        </tr>

        {{-- Business Address | Child 5 --}}
        <tr>
            <td style="background:#EAEAEA; border-top:1px solid #000; border-bottom:1px solid #000;" class="label-cell"></td>
            <td style="background:#EAEAEA; border-top:1px solid #000; border-bottom:1px solid #000;" class="label-cell"><span class="cell-label">Business Address</span></td>
            <td colspan="4" style="padding-top:8px; padding-bottom:8px; text-align:left; vertical-align:middle; padding-left:6px;">
                <span class="cell-value">{{ $na($family->business_address ?? null) }}</span>
            </td>
            <td colspan="2" style="border-left:1px solid #000; padding:6px 4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; font-weight:bold; vertical-align:middle; text-align:center;">
                {{ isset($childNames[4]) && $na($childNames[4]) !== 'N/A' ? $childNames[4] : '' }}
            </td>
            <td colspan="2" style="border-left:1px solid #000; padding:6px 4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; font-weight:bold; vertical-align:middle; text-align:center;">
                {{ isset($childDobs[4]) && $na($childDobs[4]) !== 'N/A' ? $childDobs[4] : '' }}
            </td>
        </tr>

        {{-- Telephone No. | Child 6 --}}
        <tr>
            <td style="background:#EAEAEA; border-top:1px solid #000; border-bottom:1px solid #000;" class="label-cell"></td>
            <td style="background:#EAEAEA; border-top:1px solid #000; border-bottom:1px solid #000;" class="label-cell"><span class="cell-label">Telephone No.</span></td>
            <td colspan="4" style="padding-top:8px; padding-bottom:8px; text-align:left; vertical-align:middle; padding-left:6px;">
                <span class="cell-value">{{ $na($family->telephone_no ?? null) }}</span>
            </td>
            <td colspan="2" style="border-left:1px solid #000; padding:6px 4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; font-weight:bold; vertical-align:middle; text-align:center;">
                {{ isset($childNames[5]) && $na($childNames[5]) !== 'N/A' ? $childNames[5] : '' }}
            </td>
            <td colspan="2" style="border-left:1px solid #000; padding:6px 4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; font-weight:bold; vertical-align:middle; text-align:center;">
                {{ isset($childDobs[5]) && $na($childDobs[5]) !== 'N/A' ? $childDobs[5] : '' }}
            </td>
        </tr>

        {{-- Father's Surname | Child 7 --}}
        <tr>
            <td style="background:#EAEAEA; border-top:1px solid #000;" class="label-cell"><span class="cell-label">24.</span></td>
            <td style="background:#EAEAEA; border-top:1px solid #000;" class="label-cell"><span class="cell-label">Father's Surname</span></td>
            <td colspan="4" style="padding-top:8px; padding-bottom:8px; text-align:left; vertical-align:middle; padding-left:6px;">
                <span class="cell-value">{{ $na($family->father_surname ?? null) }}</span>
            </td>
            <td colspan="2" style="border-left:1px solid #000; padding:6px 4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; font-weight:bold; vertical-align:middle; text-align:center;">
                {{ isset($childNames[6]) && $na($childNames[6]) !== 'N/A' ? $childNames[6] : '' }}
            </td>
            <td colspan="2" style="border-left:1px solid #000; padding:6px 4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; font-weight:bold; vertical-align:middle; text-align:center;">
                {{ isset($childDobs[6]) && $na($childDobs[6]) !== 'N/A' ? $childDobs[6] : '' }}
            </td>
        </tr>

        {{-- Father's First Name + Extension | Child 8 --}}
        <tr>
            <td style="background:#EAEAEA;" class="label-cell"></td>
            <td style="background:#EAEAEA;" class="label-cell"><span class="cell-label">First Name</span></td>
            <td colspan="2" style="padding-top:8px; padding-bottom:8px; text-align:left; vertical-align:middle; padding-left:6px;">
                <span class="cell-value">{{ $na($family->father_first_name ?? null) }}</span>
            </td>
            <td colspan="2" style="background:#EAEAEA; border-right:none;" class="label-cell">
                <span class="cell-label" style="font-size:7pt;">Name Extension (Jr., Sr.)</span>
                <span class="cell-value" style="font-size:9pt;">{{ $na($family->father_name_extension ?? null) }}</span>
            </td>
            <td colspan="2" style="border-left:1px solid #000; padding:6px 4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; font-weight:bold; vertical-align:middle; text-align:center;">
                {{ isset($childNames[7]) && $na($childNames[7]) !== 'N/A' ? $childNames[7] : '' }}
            </td>
            <td colspan="2" style="border-left:1px solid #000; padding:6px 4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; font-weight:bold; vertical-align:middle; text-align:center;">
                {{ isset($childDobs[7]) && $na($childDobs[7]) !== 'N/A' ? $childDobs[7] : '' }}
            </td>
        </tr>

        {{-- Father's Middle Name | Child 9 --}}
        <tr>
            <td style="background:#EAEAEA;" class="label-cell"></td>
            <td style="background:#EAEAEA;" class="label-cell"><span class="cell-label">Middle Name</span></td>
            <td colspan="4" style="padding-top:8px; padding-bottom:8px; text-align:left; vertical-align:middle; padding-left:6px;">
                <span class="cell-value">{{ $na($family->father_middle_name ?? null) }}</span>
            </td>
            <td colspan="2" style="border-left:1px solid #000; padding:6px 4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; font-weight:bold; vertical-align:middle; text-align:center;">
                {{ isset($childNames[8]) && $na($childNames[8]) !== 'N/A' ? $childNames[8] : '' }}
            </td>
            <td colspan="2" style="border-left:1px solid #000; padding:6px 4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; font-weight:bold; vertical-align:middle; text-align:center;">
                {{ isset($childDobs[8]) && $na($childDobs[8]) !== 'N/A' ? $childDobs[8] : '' }}
            </td>
        </tr>

        {{-- Mother's Maiden Name header | Child 10 --}}
        <tr>
            <td style="background:#EAEAEA; border-top:1px solid #000; padding-top:8px; padding-bottom:8px;" class="label-cell"><span class="cell-label">25.</span></td>
            <td colspan="5" style="background:#EAEAEA; border-top:1px solid #000; padding-top:8px; padding-bottom:8px;" class="label-cell">
                <span class="cell-label">Mother's Maiden Name</span>
            </td>
            <td colspan="2" style="border-left:1px solid #000; padding:6px 4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; font-weight:bold; vertical-align:middle; text-align:center;">
                {{ isset($childNames[9]) && $na($childNames[9]) !== 'N/A' ? $childNames[9] : '' }}
            </td>
            <td colspan="2" style="border-left:1px solid #000; padding:6px 4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; font-weight:bold; vertical-align:middle; text-align:center;">
                {{ isset($childDobs[9]) && $na($childDobs[9]) !== 'N/A' ? $childDobs[9] : '' }}
            </td>
        </tr>

        {{-- Mother's Surname | Child 11 --}}
        <tr>
            <td style="background:#EAEAEA;" class="label-cell"></td>
            <td style="background:#EAEAEA;" class="label-cell"><span class="cell-label">Surname</span></td>
            <td colspan="4" style="padding-top:8px; padding-bottom:8px; text-align:left; vertical-align:middle; padding-left:6px;">
                <span class="cell-value">{{ $na($family->mother_surname ?? null) }}</span>
            </td>
            <td colspan="2" style="border-left:1px solid #000; padding:6px 4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; font-weight:bold; vertical-align:middle; text-align:center;">
                {{ isset($childNames[10]) && $na($childNames[10]) !== 'N/A' ? $childNames[10] : '' }}
            </td>
            <td colspan="2" style="border-left:1px solid #000; padding:6px 4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; font-weight:bold; vertical-align:middle; text-align:center;">
                {{ isset($childDobs[10]) && $na($childDobs[10]) !== 'N/A' ? $childDobs[10] : '' }}
            </td>
        </tr>

        {{-- Mother's First Name | Child 12 --}}
        <tr>
            <td style="background:#EAEAEA;" class="label-cell"></td>
            <td style="background:#EAEAEA;" class="label-cell"><span class="cell-label">First Name</span></td>
            <td colspan="4" style="padding-top:8px; padding-bottom:8px; text-align:left; vertical-align:middle; padding-left:6px;">
                <span class="cell-value">{{ $na($family->mother_first_name ?? null) }}</span>
            </td>
            <td colspan="2" style="border-left:1px solid #000; padding:6px 4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; font-weight:bold; vertical-align:middle; text-align:center;">
                {{ isset($childNames[11]) && $na($childNames[11]) !== 'N/A' ? $childNames[11] : '' }}
            </td>
            <td colspan="2" style="border-left:1px solid #000; padding:6px 4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; font-weight:bold; vertical-align:middle; text-align:center;">
                {{ isset($childDobs[11]) && $na($childDobs[11]) !== 'N/A' ? $childDobs[11] : '' }}
            </td>
        </tr>

        {{-- Mother's Middle Name | Child 13 --}}
        <tr>
            <td style="background:#EAEAEA;" class="label-cell"></td>
            <td style="background:#EAEAEA;" class="label-cell"><span class="cell-label">Middle Name</span></td>
            <td colspan="4" style="padding-top:8px; padding-bottom:8px; text-align:left; vertical-align:middle; padding-left:6px;">
                <span class="cell-value">{{ $na($family->mother_middle_name ?? null) }}</span>
            </td>
            {{-- If 12 or fewer children: show continue note as one merged cell --}}
            @if(count($childNames) <= 12)
                <td colspan="4" style="border-left:1px solid #000; padding:6px 4px; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; font-style:italic; font-weight:bold; background:#EAEAEA; color:#ff0202; text-transform:none;">
                    (Continue on separate sheet if necessary)
                </td>
            @else
                {{-- More than 12: show child 13 values in two separate cells --}}
                <td colspan="2" style="border-left:1px solid #000; padding:6px 4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; font-weight:bold; vertical-align:middle; text-align:center;">
                    {{ isset($childNames[12]) && $na($childNames[12]) !== 'N/A' ? $childNames[12] : '' }}
                </td>
                <td colspan="2" style="border-left:1px solid #000; padding:6px 4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; font-weight:bold; vertical-align:middle; text-align:center;">
                    {{ isset($childDobs[12]) && $na($childDobs[12]) !== 'N/A' ? $childDobs[12] : '' }}
                </td>
            @endif
        </tr>

        {{-- Extra children rows beyond 13 --}}
        @if(count($childNames) > 13)
            @for($ci = 13; $ci < count($childNames); $ci++)
                <tr>
                    <td colspan="6" style="padding-top:4px; padding-bottom:4px; background:#EAEAEA;
                        {{ $ci > 13 ? 'border-top:none; border-bottom:none; border-left:none;' : 'border-bottom:none; border-left:none;' }}"></td>
                    <td colspan="2" style="padding:6px 4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; font-weight:bold; vertical-align:middle;">
                        {{ isset($childNames[$ci]) && $na($childNames[$ci]) !== 'N/A' ? $childNames[$ci] : '' }}
                    </td>
                    <td colspan="2" style="padding:6px 4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; font-weight:bold; vertical-align:middle;">
                        {{ isset($childDobs[$ci]) && $na($childDobs[$ci]) !== 'N/A' ? $childDobs[$ci] : '' }}
                    </td>
                </tr>
            @endfor
        @endif

    </table>

    {{-- ── Section Header: same style as Personal Info and Family Background ── --}}
    <div class="section-header">III.&nbsp;Educational Background</div>

    {{-- Separate table so column widths can be different from above ── --}}
    <table class="pds-table">

        {{-- Header row — widths set directly on cells, same as other sections --}}
        <tr>
            <td rowspan="2" style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; border-right:none; width:3%;">26.</td>
            <td rowspan="2" style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; border-left:none; width:13%;">LEVEL</td>
            <td rowspan="2" style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; width:25%;">NAME OF SCHOOL<br><span style="font-style:italic; font-weight:normal; text-transform:none;">(Write in full)</span></td>
            <td rowspan="2" style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; width:22%;">BASIC EDUCATION/DEGREE/COURSE<br><span style="font-style:italic; font-weight:normal; text-transform:none;">(Write in full)</span></td>
            <td colspan="2" style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:7pt; width:14%;">PERIOD OF ATTENDANCE</td>
            <td rowspan="2" style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:7pt; width:9%;">HIGHEST LEVEL/<br>UNITS EARNED<br><span style="font-style:italic; font-weight:normal; text-transform:none;">(if not graduated)</span></td>
            <td rowspan="2" style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:7pt; width:5%;">YEAR<br>GRADUATED</td>
            <td rowspan="2" colspan="2" style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:7pt; width:9%;">SCHOLARSHIP/<br>ACADEMIC HONORS<br>RECEIVED</td>
        </tr>
        <tr>
            <td style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; width:7%; text-transform:none;">From</td>
            <td style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; width:7%; text-transform:none;">To</td>
        </tr>   

        {{-- Education rows by level --}}
        @foreach($levelOrder as $level)
            @php $rows = $eduByLevel[$level] ?? [null]; @endphp
            @foreach($rows as $idx => $e)
                <tr>
                    @if($idx === 0)
                        <td colspan="2" rowspan="{{ count($rows) }}" style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; vertical-align:middle; padding:4px 6px; text-align:left;">
                            {{ $level }}
                        </td>
                    @endif
                    <td style="text-align:center; padding:6px 4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle;">
                        {{ $e ? $na($e->name_of_school) : 'N/A' }}
                    </td>
                    <td style="text-align:center; padding:6px 4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle;">
                        {{ $e ? $na($e->basic_education) : 'N/A' }}
                    </td>
                    <td style="text-align:center; padding:6px 4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle;">
                        {{ $e ? $na($e->period_of_attendance_from) : 'N/A' }}
                    </td>
                    <td style="text-align:center; padding:6px 4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle;">
                        {{ $e ? $na($e->period_of_attendance_to) : 'N/A' }}
                    </td>
                    <td style="text-align:center; padding:6px 4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle;">
                        {{ $e ? $na($e->highest_level) : 'N/A' }}
                    </td>
                    <td style="text-align:center; padding:6px 4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle;">
                        {{ $e ? $na($e->year_graduated) : 'N/A' }}
                    </td>
                    <td colspan="2" style="padding:6px 4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                        {{ $e ? $na($e->scholarship_academic_honors_recieved) : 'N/A' }}
                    </td>
                </tr>
            @endforeach
        @endforeach

        {{-- Continue note --}}
        <tr>
            <td colspan="10" style="padding:2px 4px; background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:7.5pt; font-style:italic; font-weight:bold; color:#ff0202; vertical-align:middle; text-align:center; text-transform:none;">
                (Continue on separate sheet if necessary)
            </td>
        </tr>

    </table>

</div>
