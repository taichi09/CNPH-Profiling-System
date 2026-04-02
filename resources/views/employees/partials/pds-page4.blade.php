<div class="pds-page">

    <div class="section-header">VII.&nbsp;&nbsp;Questions</div>

    @php
        $bq = $backgroundQuestions;
        $yes = fn($v) => strtoupper(trim((string)$v)) === 'YES';
        $no  = fn($v) => strtoupper(trim((string)$v)) === 'NO';
    @endphp

    <table class="pds-table">

        {{-- Question 34 --}}
        <tr>
            <td style="background:#EAEAEA; width:3%; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; vertical-align:top; padding:4px; border-right:none;">34.</td>
            <td colspan="3" style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; vertical-align:top; padding:4px; border-left:none;">
                Are you related by consanguinity or affinity to the appointing or recommending authority, or to the chief of bureau or office or to the person who has immediate supervision over you in the Office, Bureau or Department where you will be appointed,
            </td>
            <td style="background:#EAEAEA; width:8%; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; text-align:center; vertical-align:middle; padding:4px;">YES</td>
            <td style="background:#EAEAEA; width:8%; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; text-align:center; vertical-align:middle; padding:4px;">NO</td>
        </tr>
        <tr>
            <td style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; vertical-align:middle; padding:4px; border-right:none;"></td>
            <td style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; vertical-align:middle; padding:4px; border-left:none;">a. within the third degree?</td>
            <td colspan="2" style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; font-style:italic; vertical-align:middle; padding:4px;">
                If YES, give details:
                <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; font-style:normal;">
                    {{ $bq ? $na($bq->q34a_details) : '' }}
                </span>
            </td>
            <td style="text-align:center; vertical-align:middle; padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold;">
                {{ $bq && $yes($bq->q34a) ? '&#10003;' : '' }}
            </td>
            <td style="text-align:center; vertical-align:middle; padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold;">
                {{ $bq && $no($bq->q34a) ? '&#10003;' : '' }}
            </td>
        </tr>
        <tr>
            <td style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; vertical-align:middle; padding:4px; border-right:none;"></td>
            <td style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; vertical-align:middle; padding:4px; border-left:none;">b. within the fourth degree (for Local Government Unit - Career Employees)?</td>
            <td colspan="2" style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; font-style:italic; vertical-align:middle; padding:4px;">
                If YES, give details:
                <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; font-style:normal;">
                    {{ $bq ? $na($bq->q34b_details) : '' }}
                </span>
            </td>
            <td style="text-align:center; vertical-align:middle; padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold;">
                {{ $bq && $yes($bq->q34b) ? '&#10003;' : '' }}
            </td>
            <td style="text-align:center; vertical-align:middle; padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold;">
                {{ $bq && $no($bq->q34b) ? '&#10003;' : '' }}
            </td>
        </tr>

        {{-- Question 35 --}}
        <tr>
            <td style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; vertical-align:middle; padding:4px; border-right:none;">35.</td>
            <td style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; vertical-align:middle; padding:4px; border-left:none;">a. Have you ever been found guilty of any administrative offense?</td>
            <td colspan="2" style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; font-style:italic; vertical-align:middle; padding:4px;">
                If YES, give details:
                <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; font-style:normal;">
                    {{ $bq ? $na($bq->q35a_details) : '' }}
                </span>
            </td>
            <td style="text-align:center; vertical-align:middle; padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold;">
                {{ $bq && $yes($bq->q35a) ? '&#10003;' : '' }}
            </td>
            <td style="text-align:center; vertical-align:middle; padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold;">
                {{ $bq && $no($bq->q35a) ? '&#10003;' : '' }}
            </td>
        </tr>
        <tr>
            <td style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; vertical-align:middle; padding:4px; border-right:none;"></td>
            <td style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; vertical-align:middle; padding:4px; border-left:none;">b. Have you been criminally charged before any court?</td>
            <td colspan="2" style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; font-style:italic; vertical-align:middle; padding:4px;">
                If YES, give details:
                <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; font-style:normal;">
                    {{ $bq ? $na($bq->q35b_details) : '' }}
                </span>
            </td>
            <td style="text-align:center; vertical-align:middle; padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold;">
                {{ $bq && $yes($bq->q35b) ? '&#10003;' : '' }}
            </td>
            <td style="text-align:center; vertical-align:middle; padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold;">
                {{ $bq && $no($bq->q35b) ? '&#10003;' : '' }}
            </td>
        </tr>
        <tr>
            <td style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; vertical-align:middle; padding:4px; border-right:none;"></td>
            <td style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; vertical-align:middle; padding:4px; border-left:none; font-style:italic;">
                Date Filed:
                <span style="font-weight:bold; font-style:normal;">{{ $bq ? $na($bq->q35b_date_filed) : '' }}</span>
            </td>
            <td colspan="4" style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; vertical-align:middle; padding:4px; font-style:italic;">
                Status of Case/s:
                <span style="font-weight:bold; font-style:normal;">{{ $bq ? $na($bq->q35b_status) : '' }}</span>
            </td>
        </tr>

        {{-- Question 36 --}}
        <tr>
            <td style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; vertical-align:middle; padding:4px; border-right:none;">36.</td>
            <td style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; vertical-align:middle; padding:4px; border-left:none;">Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulation by any court or tribunal?</td>
            <td colspan="2" style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; font-style:italic; vertical-align:middle; padding:4px;">
                If YES, give details:
                <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; font-style:normal;">
                    {{ $bq ? $na($bq->q36_details) : '' }}
                </span>
            </td>
            <td style="text-align:center; vertical-align:middle; padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold;">
                {{ $bq && $yes($bq->q36) ? '&#10003;' : '' }}
            </td>
            <td style="text-align:center; vertical-align:middle; padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold;">
                {{ $bq && $no($bq->q36) ? '&#10003;' : '' }}
            </td>
        </tr>

        {{-- Question 37 --}}
        <tr>
            <td style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; vertical-align:middle; padding:4px; border-right:none;">37.</td>
            <td style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; vertical-align:middle; padding:4px; border-left:none;">Have you ever been separated from the service in any of the following modes: resignation, retirement, dropped from the rolls, dismissal, termination, end of term, finished contract or phased out (abolition) in the public or private sector?</td>
            <td colspan="2" style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; font-style:italic; vertical-align:middle; padding:4px;">
                If YES, give details:
                <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; font-style:normal;">
                    {{ $bq ? $na($bq->q37_details) : '' }}
                </span>
            </td>
            <td style="text-align:center; vertical-align:middle; padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold;">
                {{ $bq && $yes($bq->q37) ? '&#10003;' : '' }}
            </td>
            <td style="text-align:center; vertical-align:middle; padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold;">
                {{ $bq && $no($bq->q37) ? '&#10003;' : '' }}
            </td>
        </tr>

        {{-- Question 38 --}}
        <tr>
            <td style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; vertical-align:middle; padding:4px; border-right:none;">38.</td>
            <td style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; vertical-align:middle; padding:4px; border-left:none;">a. Have you ever been a candidate in a national or local election held within the last year (except Barangay election)?</td>
            <td colspan="2" style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; font-style:italic; vertical-align:middle; padding:4px;">
                If YES, give details:
                <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; font-style:normal;">
                    {{ $bq ? $na($bq->q38a_details) : '' }}
                </span>
            </td>
            <td style="text-align:center; vertical-align:middle; padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold;">
                {{ $bq && $yes($bq->q38a) ? '&#10003;' : '' }}
            </td>
            <td style="text-align:center; vertical-align:middle; padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold;">
                {{ $bq && $no($bq->q38a) ? '&#10003;' : '' }}
            </td>
        </tr>
        <tr>
            <td style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; vertical-align:middle; padding:4px; border-right:none;"></td>
            <td style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; vertical-align:middle; padding:4px; border-left:none;">b. Have you resigned from the government service during the three (3)-month period before the last election to promote/actively campaign for a national or local candidate?</td>
            <td colspan="2" style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; font-style:italic; vertical-align:middle; padding:4px;">
                If YES, give details:
                <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; font-style:normal;">
                    {{ $bq ? $na($bq->q38b_details) : '' }}
                </span>
            </td>
            <td style="text-align:center; vertical-align:middle; padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold;">
                {{ $bq && $yes($bq->q38b) ? '&#10003;' : '' }}
            </td>
            <td style="text-align:center; vertical-align:middle; padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold;">
                {{ $bq && $no($bq->q38b) ? '&#10003;' : '' }}
            </td>
        </tr>

        {{-- Question 39 --}}
        <tr>
            <td style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; vertical-align:middle; padding:4px; border-right:none;">39.</td>
            <td style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; vertical-align:middle; padding:4px; border-left:none;">Have you acquired the status of an immigrant or permanent resident of another country?</td>
            <td colspan="2" style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; font-style:italic; vertical-align:middle; padding:4px;">
                If YES, give details (country):
                <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; font-style:normal;">
                    {{ $bq ? $na($bq->q39_details) : '' }}
                </span>
            </td>
            <td style="text-align:center; vertical-align:middle; padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold;">
                {{ $bq && $yes($bq->q39) ? '&#10003;' : '' }}
            </td>
            <td style="text-align:center; vertical-align:middle; padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold;">
                {{ $bq && $no($bq->q39) ? '&#10003;' : '' }}
            </td>
        </tr>

        {{-- Question 40 --}}
        <tr>
            <td style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; vertical-align:top; padding:4px; border-right:none;">40.</td>
            <td colspan="5" style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; vertical-align:middle; padding:4px; border-left:none;">
                Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA 7277, as amended); and (c) Expanded Solo Parents Welfare Act (RA 11861), please answer the following items:
            </td>
        </tr>
        <tr>
            <td style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; vertical-align:middle; padding:4px; border-right:none;">a.</td>
            <td style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; vertical-align:middle; padding:4px; border-left:none;">Are you a member of any indigenous group?</td>
            <td colspan="2" style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; font-style:italic; vertical-align:middle; padding:4px;">
                If YES, please specify:
                <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; font-style:normal;">
                    {{ $bq ? $na($bq->q40a_details) : '' }}
                </span>
            </td>
            <td style="text-align:center; vertical-align:middle; padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold;">
                {{ $bq && $yes($bq->q40a) ? '&#10003;' : '' }}
            </td>
            <td style="text-align:center; vertical-align:middle; padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold;">
                {{ $bq && $no($bq->q40a) ? '&#10003;' : '' }}
            </td>
        </tr>
        <tr>
            <td style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; vertical-align:middle; padding:4px; border-right:none;">b.</td>
            <td style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; vertical-align:middle; padding:4px; border-left:none;">Are you a person with disability?</td>
            <td colspan="2" style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; font-style:italic; vertical-align:middle; padding:4px;">
                If YES, please specify ID No:
                <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; font-style:normal;">
                    {{ $bq ? $na($bq->q40b_details) : '' }}
                </span>
            </td>
            <td style="text-align:center; vertical-align:middle; padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold;">
                {{ $bq && $yes($bq->q40b) ? '&#10003;' : '' }}
            </td>
            <td style="text-align:center; vertical-align:middle; padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold;">
                {{ $bq && $no($bq->q40b) ? '&#10003;' : '' }}
            </td>
        </tr>
        <tr>
            <td style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; vertical-align:middle; padding:4px; border-right:none;">c.</td>
            <td style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; vertical-align:middle; padding:4px; border-left:none;">Are you a solo parent?</td>
            <td colspan="2" style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; font-style:italic; vertical-align:middle; padding:4px;">
                If YES, please specify ID No:
                <span style="font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; font-style:normal;">
                    {{ $bq ? $na($bq->q40c_details) : '' }}
                </span>
            </td>
            <td style="text-align:center; vertical-align:middle; padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold;">
                {{ $bq && $yes($bq->q40c) ? '&#10003;' : '' }}
            </td>
            <td style="text-align:center; vertical-align:middle; padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold;">
                {{ $bq && $no($bq->q40c) ? '&#10003;' : '' }}
            </td>
        </tr>

    </table>

    {{-- Question 41 - References --}}
    <div class="section-header">41.&nbsp;&nbsp;REFERENCES <span style="font-weight:normal; font-size:9pt; text-transform:none;">(Person not related by consanguinity or affinity to applicant/appointee)</span></div>

    <table class="pds-table">
        <tr>
            <td style="background:#EAEAEA; text-align:center; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; width:35%; padding:4px;">NAME</td>
            <td style="background:#EAEAEA; text-align:center; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; width:40%; padding:4px;">OFFICE / RESIDENTIAL ADDRESS</td>
            <td style="background:#EAEAEA; text-align:center; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; width:25%; padding:4px;">CONTACT NO. AND/OR EMAIL</td>
        </tr>
        @foreach([
            [$bq->ref1_name ?? '', $bq->ref1_address ?? '', $bq->ref1_contact ?? ''],
            [$bq->ref2_name ?? '', $bq->ref2_address ?? '', $bq->ref2_contact ?? ''],
            [$bq->ref3_name ?? '', $bq->ref3_address ?? '', $bq->ref3_contact ?? ''],
        ] as $ref)
        <tr style="height:36px;">
            <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">{{ $na($ref[0]) }}</td>
            <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">{{ $na($ref[1]) }}</td>
            <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">{{ $na($ref[2]) }}</td>
        </tr>
        @endforeach
    </table>

    {{-- Question 42 - Declaration --}}
    <table class="pds-table" style="margin-top:8px;">
        <tr>
            <td colspan="2" style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; vertical-align:top; padding:4px; border-right:none;">
                <span style="font-weight:bold;">42.</span>
            </td>
            <td colspan="4" style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; vertical-align:top; padding:4px; border-left:none;">
                I declare under oath that I have personally accomplished this Personal Data Sheet which is a true, correct, and complete statement pursuant to the provisions of pertinent laws, rules, and regulations of the Republic of the Philippines. I authorize the agency head/authorized representative to verify/validate the contents stated herein. I agree that any misrepresentation made in this document and its attachments shall cause the filing of administrative/criminal case/s against me.
            </td>
        </tr>
        <tr>
            <td colspan="3" style="padding:8px 4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; vertical-align:bottom;">
                <div style="border-bottom:1px solid #000; width:80%; margin:0 auto; min-height:40px;"></div>
                <div style="text-align:center; font-size:8pt; margin-top:4px;">Signature (Wet/E-signature/Digital Certificate)</div>
            </td>
            <td colspan="3" style="padding:8px 4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; vertical-align:top; text-align:center;">
                <div style="border:1px solid #000; width:80px; height:80px; margin:0 auto; display:flex; align-items:center; justify-content:center; font-size:7pt; color:#999;">PHOTO</div>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; padding:4px;">
                Government Issued ID: <span style="font-weight:bold;">{{ $bq ? $na($bq->govt_issued_id) : '' }}</span>
            </td>
            <td colspan="3" style="background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; padding:4px;">
                ID No: <span style="font-weight:bold;">{{ $bq ? $na($bq->id_no) : '' }}</span>
                &nbsp;&nbsp;&nbsp;
                Date of Issuance: <span style="font-weight:bold;">{{ $bq ? $na($bq->id_date_issued) : '' }}</span>
            </td>
        </tr>
    </table>

</div>