<div class="pds-page">
    <div class="section-header">IV.&nbsp;&nbsp;Civil Service Eligibility</div>

    <table class="pds-table" style="table-layout:fixed; width:100%;">
        <colgroup>
            <col style="width:3%">
            <col style="width:32%">
            <col style="width:10%">
            <col style="width:15%">
            <col style="width:18%">
            <col style="width:12%">
            <col style="width:10%">
        </colgroup>

        <tr>
            <td rowspan="2" style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:7pt; font-weight:bold;">27.</td>
            <td rowspan="2" style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:7pt; font-weight:bold;">CES/CSEE/CAREER SERVICE/RA 1080 (BOARD/BAR)/UNDER SPECIAL LAWS/CATEGORY II/IV ELIGIBILITY and ELIGIBILITIES FOR UNIFORMED PERSONNEL</td>
            <td rowspan="2" style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:7pt; font-weight:bold;">RATING<br><span style="font-weight:normal; font-style:italic;">(If Applicable)</span></td>
            <td rowspan="2" style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:7pt; font-weight:bold;">DATE OF EXAMINATION /<br>CONFERMENT</td>
            <td rowspan="2" style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:7pt; font-weight:bold;">PLACE OF EXAMINATION /<br>CONFERMENT</td>
            <td colspan="2" style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:7pt; font-weight:bold;">LICENSE (if applicable)</td>
        </tr>
        <tr>
            <td style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:7pt; font-weight:bold;">NUMBER</td>
            <td style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:7pt; font-weight:bold;">Valid Until</td>
        </tr>

        @php $minRows = max($eligibility->count(), 7); @endphp
        @for($i = 0; $i < $minRows; $i++)
            @php $e = $eligibility[$i] ?? null; @endphp
            <tr>
                <td style="padding:6px 4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;"></td>
                <td style="padding:6px 4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle;">
                    {{ $e ? $na($e->eligibility) : '' }}
                </td>
                <td style="padding:6px 4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                    {{ $e ? $na($e->rating) : '' }}
                </td>
                <td style="padding:6px 4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                    {{ $e ? $na($e->date_of_examination) : '' }}
                </td>
                <td style="padding:6px 4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                    {{ $e ? $na($e->place_of_examination) : '' }}
                </td>
                <td style="padding:6px 4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                    {{ $e ? $na($e->license_no) : '' }}
                </td>
                <td style="padding:6px 4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                    {{ $e ? $na($e->license_validity) : '' }}
                </td>
            </tr>
        @endfor

        <tr>
            <td colspan="7" style="padding:2px 4px; background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:7.5pt; font-style:italic; font-weight:bold; color:#ff0202; text-align:center;">
                (Continue on separate sheet if necessary)
            </td>
        </tr>

    </table>

    <div class="section-header">V.&nbsp;&nbsp;Work Experience</div>
    <div style="font-family:'Arial Narrow',Arial,sans-serif; font-size:7.5pt; font-style:italic; font-weight:bold; padding:2px 4px; border-bottom:1px solid #000;">
        (Include private employment. Start from your recent work.) Description of duties should be indicated in the attached Work Experience Sheet.
    </div>

    <table class="pds-table" style="table-layout:fixed; width:100%;">
        <colgroup>
            <col style="width:3%">
            <col style="width:9%">
            <col style="width:9%">
            <col style="width:22%">
            <col style="width:22%">
            <col style="width:10%">
            <col style="width:8%">
            <col style="width:10%">
            <col style="width:7%">
        </colgroup>

        <tr>
            <td rowspan="2" style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:7pt; font-weight:bold;">28.</td>
            <td colspan="2" style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:7pt; font-weight:bold;">INCLUSIVE DATES<br>(dd/mm/yyyy)</td>
            <td rowspan="2" style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:7pt; font-weight:bold;">POSITION TITLE<br><span style="font-weight:normal; font-style:italic;">(Write in full/Do not abbreviate)</span></td>
            <td rowspan="2" style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:7pt; font-weight:bold;">DEPARTMENT / AGENCY / OFFICE / COMPANY<br><span style="font-weight:normal; font-style:italic;">(Write in full/Do not abbreviate)</span></td>
            <td rowspan="2" style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:7pt; font-weight:bold;">MONTHLY SALARY</td>
            <td rowspan="2" style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:7pt; font-weight:bold;">SALARY GRADE &amp;<br>STEP</td>
            <td rowspan="2" style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:7pt; font-weight:bold;">STATUS OF<br>APPOINTMENT</td>
            <td rowspan="2" style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:7pt; font-weight:bold;">GOV'T<br>SERVICE<br>(Y/N)</td>
        </tr>
        <tr>
            <td style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:7pt; font-weight:bold;">From</td>
            <td style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:7pt; font-weight:bold;">To</td>
        </tr>

        @php $minWork = max($work->count(), 24); @endphp
        @for($i = 0; $i < $minWork; $i++)
            @php $w = $work[$i] ?? null; @endphp
            <tr>
                <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;"></td>
                <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                    {{ $w ? $na($w->inclusive_date_from) : '' }}
                </td>
                <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                    {{ $w ? $na($w->inclusive_date_to) : '' }}
                </td>
                <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle;">
                    {{ $w ? $na($w->position_title) : '' }}
                </td>
                <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle;">
                    {{ $w ? $na($w->department_agency_office_company) : '' }}
                </td>
                <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                    {{ $w ? $na($w->monthly_salary) : '' }}
                </td>
                <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                    {{ $w ? $na($w->salary_grade) : '' }}
                </td>
                <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                    {{ $w ? $na($w->status_of_appointment) : '' }}
                </td>
                <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                    {{ $w ? $na($w->govt_service) : '' }}
                </td>
            </tr>
        @endfor

        <tr>
            <td colspan="9" style="padding:2px 4px; background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:7.5pt; font-style:italic; font-weight:bold; color:#ff0202; text-align:center;">
                (Continue on separate sheet if necessary)
            </td>
        </tr>

    </table>

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

    <div class="page-num">CS FORM 212 (Revised 2025), Page 2 of 4</div>

</div>
