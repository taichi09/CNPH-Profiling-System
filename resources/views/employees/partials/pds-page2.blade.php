<div class="pds-page">

    <div class="section-header">IV.&nbsp;&nbsp;Civil Service Eligibility</div>

    <table class="pds-table">

        {{-- Header --}}
        <tr>
            <td rowspan="2" style="background:#EAEAEA; text-align:center; vertical-align:top; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; width:3%; border-right:none; padding-top:4px;">27.</td>
            <td rowspan="2" style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; width:35%; border-left:none;">CES/CSEE/CAREER SERVICE/RA 1080 (BOARD/BAR)/UNDER SPECIAL LAWS/CATEGORY II/IV ELIGIBILITY and ELIGIBILITIES FOR UNIFORMED PERSONNEL</td>
            <td rowspan="2" style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; width:10%;">RATING<br><span style="font-weight:normal; font-style:italic; text-transform:none;">(If Applicable)</span></td>
            <td rowspan="2" style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; width:16%;">DATE OF EXAMINATION /<br>CONFERMENT</td>
            <td rowspan="2" style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; width:18%;">PLACE OF EXAMINATION /<br>CONFERMENT</td>
            <td colspan="2" style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; width:18%;">LICENSE <span style="text-transform:none;">(if applicable)</span></td>
        </tr>
        <tr>
            <td style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; width:9%;">NUMBER</td>
            <td style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; width:9%;">Valid Until</td>
        </tr>

        {{-- Data rows — always show 5 rows minimum --}}
        @for($i = 0; $i < 5; $i++)
            @php $e = $eligibility[$i] ?? null; @endphp
            <tr style="height:36px;">
                <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center; border-right:none;"></td>
                <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; border-left:none; text-align:center;">
                    {{ $e ? $na($e->eligibility) : '' }}
                </td>
                <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                    {{ $e ? $na($e->rating) : '' }}
                </td>
                <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                    {{ $e ? $na($e->date_of_examination) : '' }}
                </td>
                <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                    {{ $e ? $na($e->place_of_examination) : '' }}
                </td>
                <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                    {{ $e ? $na($e->license_no) : '' }}
                </td>
                <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                    {{ $e ? $na($e->license_validity) : '' }}
                </td>
            </tr>
        @endfor

        {{-- Extra rows if more than 5 eligibility records --}}
        @if($eligibility->count() > 5)
            @for($i = 5; $i < $eligibility->count(); $i++)
                @php $e = $eligibility[$i]; @endphp
                <tr style="height:36px;">
                    <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center; border-right:none;"></td>
                    <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; border-left:none; text-align:center;">
                        {{ $na($e->eligibility) }}
                    </td>
                    <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                        {{ $na($e->rating) }}
                    </td>
                    <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                        {{ $na($e->date_of_examination) }}
                    </td>
                    <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                        {{ $na($e->place_of_examination) }}
                    </td>
                    <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                        {{ $na($e->license_no) }}
                    </td>
                    <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                        {{ $na($e->license_validity) }}
                    </td>
                </tr>
            @endfor
        @endif

        {{-- Continue note — only shown when 5 or fewer records --}}
        @if($eligibility->count() <= 5)
            <tr>
                <td colspan="7" style="padding:2px 4px; background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:7.5pt; font-style:italic; font-weight:bold; color:#ff0202; text-align:center; text-transform:none;">
                    (Continue on separate sheet if necessary)
                </td>
            </tr>
        @endif

    </table>

    <div class="section-header" style="font-style:italic;">
        V.&nbsp;&nbsp;Work Experience
        <div style="font-size:11pt; font-style:italic; font-weight:bold; text-transform:none; margin-top:2px;">
            (Include private employment. Start from your recent work.) Description of duties should be indicated in the attached Work Experience Sheet.
        </div>
    </div>

    <table class="pds-table">

        {{-- Header --}}
        <tr>
            <td colspan="2" style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; width:21%; padding:3px 4px; vertical-align:top; position:relative;">
                <span style="position:absolute; top:3px; left:4px;">28.</span>
                <div style="text-align:center;">INCLUSIVE DATES<br>{{--<span style="text-transform:none;">(dd/mm/yyyy)</span>--}}</div>
            </td>
            <td rowspan="2" style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; width:27%;">POSITION TITLE<br><span style="font-weight:normal; font-style:italic; text-transform:none;">(Write in full/Do not abbreviate)</span></td>
            <td rowspan="2" style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; width:34%;">DEPARTMENT / AGENCY / OFFICE / COMPANY<br><span style="font-weight:normal; font-style:italic; text-transform:none;">(Write in full/Do not abbreviate)</span></td>
            <td rowspan="2" style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; width:9%;">STATUS OF<br>APPOINTMENT</td>
            <td rowspan="2" style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; width:9%;">GOV'T<br>SERVICE<br><span style="text-transform:none;">(Y/N)</span></td>
        </tr>
        <tr>
            <td style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; width:10%;">From</td>
            <td style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; width:11%;">To</td>
        </tr>

        {{-- Data rows — always show 5 rows minimum --}}
        @for($i = 0; $i < 5; $i++)
            @php $w = $work[$i] ?? null; @endphp
            <tr style="height:36px;">
                <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                    {{ $w ? $na($w->inclusive_date_from) : '' }}
                </td>
                <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                    {{ $w ? $na($w->inclusive_date_to) : '' }}
                </td>
                <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                    {{ $w ? $na($w->position_title) : '' }}
                </td>
                <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                    {{ $w ? $na($w->department_agency_office_company) : '' }}
                </td>
                <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                    {{ $w ? $na($w->status_of_appointment) : '' }}
                </td>
                <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                    {{ $w ? $na($w->govt_service) : '' }}
                </td>
            </tr>
        @endfor

        {{-- Extra rows if more than 5 work records --}}
        @if($work->count() > 5)
            @for($i = 5; $i < $work->count(); $i++)
                @php $w = $work[$i]; @endphp
                <tr style="height:36px;">
                    <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                        {{ $na($w->inclusive_date_from) }}
                    </td>
                    <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                        {{ $na($w->inclusive_date_to) }}
                    </td>
                    <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                        {{ $na($w->position_title) }}
                    </td>
                    <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                        {{ $na($w->department_agency_office_company) }}
                    </td>
                    <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                        {{ $na($w->status_of_appointment) }}
                    </td>
                    <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                        {{ $na($w->govt_service) }}
                    </td>
                </tr>
            @endfor
        @endif

        {{-- Continue note — only shown when 5 or fewer records --}}
        @if($work->count() <= 5)
            <tr>
                <td colspan="7" style="padding:2px 4px; background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:7.5pt; font-style:italic; font-weight:bold; color:#ff0202; text-align:center; text-transform:none;">
                    (Continue on separate sheet if necessary)
                </td>
            </tr>
        @endif

    </table>

</div>
