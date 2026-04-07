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

    {{-- Question 35a --}}
        <tr>
            <td style="background:#EAEAEA; width:3%; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; vertical-align:top; padding:4px; border-right:none; text-transform:none;">35.</td>
            <td style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; vertical-align:top; padding:4px; border-left:none; width:55%; text-transform:none;">
                a. Have you ever been found guilty of any administrative offense?
            </td>
            <td style="vertical-align:top; padding:6px 10px; width:42%;">
                <div style="display:flex; align-items:center; gap:45px;">
                    <div style="display:flex; align-items:center; gap:6px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt;">
                        <span style="font-size:11pt;">{!! ($bq && strtoupper($bq->q35a) === 'YES') ? '&#9745;' : '&#9744;' !!}</span> YES
                    </div>
                    <div style="display:flex; align-items:center; gap:6px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt;">
                        <span style="font-size:11pt;">{!! ($bq && strtoupper($bq->q35a) === 'NO') ? '&#9745;' : '&#9744;' !!}</span> NO
                    </div>
                </div>
                <div style="font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; font-style:italic; text-transform:none;">
                    If YES, give details:
                    <div style="border-bottom:1px solid #000; margin-top:4px; min-height:14px; font-weight:bold; font-style:normal;">
                        {{ $bq ? $na($bq->q35a_details) : '' }}
                    </div>
                </div>
            </td>
        </tr>

        {{-- Question 35b --}}
        <tr>
            <td style="background:#EAEAEA; width:3%; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; vertical-align:top; padding:4px; border-right:none; text-transform:none;"></td>
            <td style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; vertical-align:top; padding:4px; border-left:none; width:55%; text-transform:none;">
                b. Have you been criminally charged before any court?
            </td>
            <td style="vertical-align:top; padding:6px 10px; width:42%;">
                <div style="display:flex; align-items:center; gap:45px;">
                    <div style="display:flex; align-items:center; gap:6px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt;">
                        <span style="font-size:11pt;">{!! ($bq && strtoupper($bq->q35b) === 'YES') ? '&#9745;' : '&#9744;' !!}</span> YES
                    </div>
                    <div style="display:flex; align-items:center; gap:6px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt;">
                        <span style="font-size:11pt;">{!! ($bq && strtoupper($bq->q35b) === 'NO') ? '&#9745;' : '&#9744;' !!}</span> NO
                    </div>
                </div>
                <div style="font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; font-style:italic; text-transform:none;">
                    If YES, give details:
                </div>
                <div style="font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; font-style:italic; text-transform:none; margin-left:25px;">
                    Date Filed:
                    <div style="border-bottom:1px solid #000; margin-top:4px; min-height:14px; font-weight:bold; font-style:normal;">
                        {{ $bq ? $na($bq->q35b_date_filed) : '' }}
                    </div>
                </div>
                <div style="font-family:'Arial Narrow',Arial,sans-serif; font-size:10pt; font-style:italic; text-transform:none;">
                    Status of Case/s:
                    <div style="border-bottom:1px solid #000; margin-top:4px; min-height:14px; font-weight:bold; font-style:normal;">
                        {{ $bq ? $na($bq->q35b_status) : '' }}
                    </div>
                </div>
            </td>
        </tr>

    </table>

</div>