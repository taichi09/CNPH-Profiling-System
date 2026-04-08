<div class="pds-page">

    @php $bq = $backgroundQuestions; @endphp

    <table class="pds-table">

        {{-- Question 34 --}}
        <tr>
            <td style="background:#EAEAEA; width:3%; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; vertical-align:top; padding:4px; border-right:none;">34.</td>
            <td style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; vertical-align:top; padding:4px; border-left:none; width:55%; text-transform:none;">
                Are you related by consanguinity or affinity to the appointing or recommending authority, or to the 
                <br>
                chief of bureau or office or to the person who has immediate supervision over you in the Office,
                <br>
                Bureau or Department where you will be appointed,
                <br>
                a. within the third degree?
                <br>
                b. within the fourth degree (for Local Government Unit - Career Employees)?
            </td>
            <td style="vertical-align:top; padding:6px 10px; width:42%;">

                {{-- Spacer to align with question text --}}
                <div style="min-height:55px;"></div>

                {{-- 34a --}}
                <div style="display:flex; align-items:center; gap:45px; margin-bottom:1px;">
                    <div style="display:flex; align-items:center; gap:6px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt;">
                        <span style="font-size:11pt;">{!! ($bq && strtoupper($bq->q34a) === 'YES') ? '&#9745;' : '&#9744;' !!}</span> YES
                    </div>
                    <div style="display:flex; align-items:center; gap:6px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt;">
                        <span style="font-size:11pt;">{!! ($bq && strtoupper($bq->q34a) === 'NO') ? '&#9745;' : '&#9744;' !!}</span> NO
                    </div>
                </div>

                {{-- 34b --}}
                <div style="display:flex; align-items:center; gap:45px;">
                    <div style="display:flex; align-items:center; gap:6px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt;">
                        <span style="font-size:11pt;">{!! ($bq && strtoupper($bq->q34b) === 'YES') ? '&#9745;' : '&#9744;' !!}</span> YES
                    </div>
                    <div style="display:flex; align-items:center; gap:6px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt;">
                        <span style="font-size:11pt;">{!! ($bq && strtoupper($bq->q34b) === 'NO') ? '&#9745;' : '&#9744;' !!}</span> NO
                    </div>
                </div>

                {{-- If YES give details --}}
                <div style="font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; font-style:italic; text-transform:none;">
                    If YES, give details:
                    <div style="border-bottom:1px solid #000; margin-top:4px; min-height:14px; font-weight:bold; font-style:normal;">
                        {{ $bq ? $na($bq->q34a_details ?: $bq->q34b_details) : '' }}
                    </div>
                </div>

            </td>
        </tr>

    {{-- Question 35 --}}
        <tr>
            <td style="background:#EAEAEA; width:3%; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; vertical-align:top; padding:4px; border-right:none; text-transform:none;">35.</td>
            <td style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; vertical-align:top; padding:4px; border-left:none; width:55%; text-transform:none;">
                a. Have you ever been found guilty of any administrative offense?
                <br><br><br><br>
                b. Have you been criminally charged before any court?
            </td>
            <td style="vertical-align:top; padding:6px 10px; width:42%;">

                {{-- 35a --}}
                <div style="display:flex; align-items:center; gap:45px;">
                    <div style="display:flex; align-items:center; gap:6px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt;">
                        <span style="font-size:11pt;">{!! ($bq && strtoupper($bq->q35a) === 'YES') ? '&#9745;' : '&#9744;' !!}</span> YES
                    </div>
                    <div style="display:flex; align-items:center; gap:6px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt;">
                        <span style="font-size:11pt;">{!! ($bq && strtoupper($bq->q35a) === 'NO') ? '&#9745;' : '&#9744;' !!}</span> NO
                    </div>
                </div>
                <div style="font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; font-style:italic; text-transform:none; margin-bottom:5px;">
                    If YES, give details:
                    <div style="border-bottom:1px solid #000; margin-top:4px; min-height:14px; font-weight:bold; font-style:normal;">
                        {{ $bq ? $na($bq->q35a_details) : '' }}
                    </div>
                </div>

                {{-- Divider between 35a and 35b --}}
                <div style="border-top:1px solid #000; margin-bottom:8px; margin-left:-10px; margin-right:-10px;"></div>

                {{-- 35b --}}
                <div style="display:flex; align-items:center; gap:45px;">
                    <div style="display:flex; align-items:center; gap:6px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt;">
                        <span style="font-size:11pt;">{!! ($bq && strtoupper($bq->q35b) === 'YES') ? '&#9745;' : '&#9744;' !!}</span> YES
                    </div>
                    <div style="display:flex; align-items:center; gap:6px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt;">
                        <span style="font-size:11pt;">{!! ($bq && strtoupper($bq->q35b) === 'NO') ? '&#9745;' : '&#9744;' !!}</span> NO
                    </div>
                </div>
                <div style="font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; font-style:italic; text-transform:none; margin-bottom:4px;">
                    If YES, give details:
                    <div style="border-bottom:1px solid #000; margin-top:4px; min-height:14px; font-weight:bold; font-style:normal;">
                        {{ $bq ? $na($bq->q35b_details) : '' }}
                    </div>
                </div>
                <div style="display:flex; align-items:baseline; gap:6px; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; font-style:italic; text-transform:none;">
                    <span style="white-space:nowrap; padding-left:30px">Date Filed:</span>
                    <div style="flex:1; border-bottom:1px solid #000; min-height:14px; font-weight:bold; font-style:normal;">
                        {{ $bq ? $na($bq->q35b_date_filed) : '' }}
                    </div>
                </div>
                <div style="display:flex; align-items:baseline; gap:6px; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; font-style:italic; text-transform:none;">
                    <span style="white-space:nowrap;">Status of Case/s:</span>
                    <div style="flex:1; border-bottom:1px solid #000; min-height:14px; font-weight:bold; font-style:normal;">
                        {{ $bq ? $na($bq->q35b_status) : '' }}
                    </div>
                </div>

            </td>
        </tr>

    {{-- Question 36 --}}
        <tr>
            <td style="background:#EAEAEA; width:3%; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; vertical-align:top; padding:4px; border-right:none; text-transform:none;">36.</td>
            <td style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; vertical-align:top; padding:4px; border-left:none; width:55%; text-transform:none;">
                Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulation
                <br>
                by any court or tribunal?
            </td>
            <td style="vertical-align:top; padding:6px 10px; width:42%;">
                <div style="display:flex; align-items:center; gap:45px;">
                    <div style="display:flex; align-items:center; gap:6px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt;">
                        <span style="font-size:11pt;">{!! ($bq && strtoupper($bq->q36) === 'YES') ? '&#9745;' : '&#9744;' !!}</span> YES
                    </div>
                    <div style="display:flex; align-items:center; gap:6px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt;">
                        <span style="font-size:11pt;">{!! ($bq && strtoupper($bq->q36) === 'NO') ? '&#9745;' : '&#9744;' !!}</span> NO
                    </div>
                </div>
                <div style="font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; font-style:italic; text-transform:none;">
                    If YES, give details:
                    <div style="border-bottom:1px solid #000; margin-top:4px; min-height:14px; font-weight:bold; font-style:normal;">
                        {{ $bq ? $na($bq->q36_details) : '' }}
                    </div>
                </div>
            </td>
        </tr>

    {{-- Question 37 --}}
        <tr>
            <td style="background:#EAEAEA; width:3%; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; vertical-align:top; padding:4px; border-right:none; text-transform:none;">37.</td>
            <td style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; vertical-align:top; padding:4px; border-left:none; width:55%; text-transform:none;">
                Have you ever been separated from the service in any of the following modes: resignation,
                <br>
                retirement, dropped from the rolls, dismissal, termination, end of term, finished contract or phased
                <br>
                out (abolition) in the public or private sector?
            </td>
            <td style="vertical-align:top; padding:6px 10px; width:42%;">
                <div style="display:flex; align-items:center; gap:45px;">
                    <div style="display:flex; align-items:center; gap:6px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt;">
                        <span style="font-size:11pt;">{!! ($bq && strtoupper($bq->q37) === 'YES') ? '&#9745;' : '&#9744;' !!}</span> YES
                    </div>
                    <div style="display:flex; align-items:center; gap:6px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt;">
                        <span style="font-size:11pt;">{!! ($bq && strtoupper($bq->q37) === 'NO') ? '&#9745;' : '&#9744;' !!}</span> NO
                    </div>
                </div>
                <div style="font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; font-style:italic; text-transform:none;">
                    If YES, give details:
                    <div style="border-bottom:1px solid #000; margin-top:4px; min-height:14px; font-weight:bold; font-style:normal;">
                        {{ $bq ? $na($bq->q37_details) : '' }}
                    </div>
                </div>
            </td>
        </tr>

    {{-- Question 38 --}}
        <tr>
            <td style="background:#EAEAEA; width:3%; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; vertical-align:top; padding:4px; border-right:none; text-transform:none;">38.</td>
            <td style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; vertical-align:top; padding:4px; border-left:none; width:55%; text-transform:none;">
                a. Have you ever been a candidate in a national or local election held within the last year (except
                <br>
                Barangay election)?
                <br><br>
                b. Have you resigned from the government service during the three (3)-month period before the last
                <br>
                election to promote/actively campaign for a national or local candidate?
            </td>
            <td style="vertical-align:top; padding:6px 10px; width:42%;">

                {{-- 38a --}}
                <div style="display:flex; align-items:center; gap:45px;">
                    <div style="display:flex; align-items:center; gap:6px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt;">
                        <span style="font-size:11pt;">{!! ($bq && strtoupper($bq->q38a) === 'YES') ? '&#9745;' : '&#9744;' !!}</span> YES
                    </div>
                    <div style="display:flex; align-items:center; gap:6px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt;">
                        <span style="font-size:11pt;">{!! ($bq && strtoupper($bq->q38a) === 'NO') ? '&#9745;' : '&#9744;' !!}</span> NO
                    </div>
                </div>
                <div style="display:flex; align-items:baseline; gap:6px; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; font-style:italic; text-transform:none; margin-bottom:10px;">
                    <span style="white-space:nowrap;">If YES, give details:</span>
                    <div style="flex:1; border-bottom:1px solid #000; min-height:14px; font-weight:bold; font-style:normal;">
                        {{ $bq ? $na($bq->q38a_details) : '' }}
                    </div>
                </div>

                {{-- 38b --}}
                <div style="display:flex; align-items:center; gap:45px;">
                    <div style="display:flex; align-items:center; gap:6px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt;">
                        <span style="font-size:11pt;">{!! ($bq && strtoupper($bq->q38b) === 'YES') ? '&#9745;' : '&#9744;' !!}</span> YES
                    </div>
                    <div style="display:flex; align-items:center; gap:6px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt;">
                        <span style="font-size:11pt;">{!! ($bq && strtoupper($bq->q38b) === 'NO') ? '&#9745;' : '&#9744;' !!}</span> NO
                    </div>
                </div>
                <div style="display:flex; align-items:baseline; gap:6px; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; font-style:italic; text-transform:none;">
                    <span style="white-space:nowrap;">If YES, give details:</span>
                    <div style="flex:1; border-bottom:1px solid #000; min-height:14px; font-weight:bold; font-style:normal;">
                        {{ $bq ? $na($bq->q38b_details) : '' }}
                    </div>
                </div>

            </td>
        </tr>

    {{-- Question 39 --}}
        <tr>
            <td style="background:#EAEAEA; width:3%; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; vertical-align:top; padding:4px; border-right:none; text-transform:none;">39.</td>
            <td style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; vertical-align:top; padding:4px; border-left:none; width:55%; text-transform:none;">
                Have you acquired the status of an immigrant or permanent resident of another country?
            </td>
            <td style="vertical-align:top; padding:6px 10px; width:42%;">
                <div style="display:flex; align-items:center; gap:45px;">
                    <div style="display:flex; align-items:center; gap:6px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt;">
                        <span style="font-size:11pt;">{!! ($bq && strtoupper($bq->q39) === 'YES') ? '&#9745;' : '&#9744;' !!}</span> YES
                    </div>
                    <div style="display:flex; align-items:center; gap:6px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt;">
                        <span style="font-size:11pt;">{!! ($bq && strtoupper($bq->q39) === 'NO') ? '&#9745;' : '&#9744;' !!}</span> NO
                    </div>
                </div>
                <div style="font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; font-style:italic; text-transform:none;">
                    If YES, give details (country):
                    <div style="border-bottom:1px solid #000; margin-top:4px; min-height:14px; font-weight:bold; font-style:normal;">
                        {{ $bq ? $na($bq->q39_details) : '' }}
                    </div>
                </div>
            </td>
        </tr>

    {{-- Question 40 --}}
        <tr>
            <td style="background:#EAEAEA; width:3%; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; vertical-align:top; padding:4px; border-right:none; text-transform:none;">40.</td>
            <td style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; vertical-align:top; padding:4px; border-left:none; width:55%; text-transform:none;">
                Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA 7277, as amended); and (c) Expanded Solo Parents Welfare Act (RA 11861), please answer the following items:
                <br><br>
                a. Are you a member of any indigenous group?
                <br><br><br>
                b. Are you a person with disability?
                <br><br><br>
                c. Are you a solo parent?
            </td>
            <td style="vertical-align:top; padding:6px 10px; width:42%;">

                {{-- spacer past the intro text --}}
                <div style="min-height:58px;"></div>

                {{-- 40a --}}
                <div style="display:flex; align-items:center; gap:45px;">
                    <div style="display:flex; align-items:center; gap:6px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt;">
                        <span style="font-size:11pt;">{!! ($bq && strtoupper($bq->q40a) === 'YES') ? '&#9745;' : '&#9744;' !!}</span> YES
                    </div>
                    <div style="display:flex; align-items:center; gap:6px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt;">
                        <span style="font-size:11pt;">{!! ($bq && strtoupper($bq->q40a) === 'NO') ? '&#9745;' : '&#9744;' !!}</span> NO
                    </div>
                </div>
                <div style="display:flex; align-items:baseline; gap:6px; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; font-style:italic; text-transform:none; margin-bottom:10px;">
                    <span style="white-space:nowrap;">If YES, please specify:</span>
                    <div style="flex:1; border-bottom:1px solid #000; min-height:14px; font-weight:bold; font-style:normal;">
                        {{ $bq ? $na($bq->q40a_details) : '' }}
                    </div>
                </div>

                {{-- 40b --}}
                <div style="display:flex; align-items:center; gap:45px; margin-top">
                    <div style="display:flex; align-items:center; gap:6px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt;">
                        <span style="font-size:11pt;">{!! ($bq && strtoupper($bq->q40b) === 'YES') ? '&#9745;' : '&#9744;' !!}</span> YES
                    </div>
                    <div style="display:flex; align-items:center; gap:6px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt;">
                        <span style="font-size:11pt;">{!! ($bq && strtoupper($bq->q40b) === 'NO') ? '&#9745;' : '&#9744;' !!}</span> NO
                    </div>
                </div>
                <div style="display:flex; align-items:baseline; gap:6px; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; font-style:italic; text-transform:none; margin-bottom:10px;">
                    <span style="white-space:nowrap;">If YES, please specify ID No:</span>
                    <div style="flex:1; border-bottom:1px solid #000; min-height:14px; font-weight:bold; font-style:normal;">
                        {{ $bq ? $na($bq->q40b_details) : '' }}
                    </div>
                </div>

                {{-- 40c --}}
                <div style="display:flex; align-items:center; gap:45px;">
                    <div style="display:flex; align-items:center; gap:6px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt;">
                        <span style="font-size:11pt;">{!! ($bq && strtoupper($bq->q40c) === 'YES') ? '&#9745;' : '&#9744;' !!}</span> YES
                    </div>
                    <div style="display:flex; align-items:center; gap:6px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt;">
                        <span style="font-size:11pt;">{!! ($bq && strtoupper($bq->q40c) === 'NO') ? '&#9745;' : '&#9744;' !!}</span> NO
                    </div>
                </div>
                <div style="display:flex; align-items:baseline; gap:6px; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; font-style:italic; text-transform:none;">
                    <span style="white-space:nowrap;">If YES, please specify ID No:</span>
                    <div style="flex:1; border-bottom:1px solid #000; min-height:14px; font-weight:bold; font-style:normal;">
                        {{ $bq ? $na($bq->q40c_details) : '' }}
                    </div>
                </div>

            </td>
        </tr>

    </table>

</div>