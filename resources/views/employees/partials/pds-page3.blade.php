<div class="pds-page">

    <div class="section-header">VI.&nbsp;&nbsp;Voluntary Work or Involvement in Civic / Non-Government / People's Organization/s</div>

    <table class="pds-table">

        {{-- Header --}}
        <tr>
            <td rowspan="2" style="background:#EAEAEA; text-align:center; vertical-align:top; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; width:3%; border-right:none; padding-top:4px;">29.</td>
            <td rowspan="2" style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; width:37%; border-left:none;">NAME & ADDRESS OF ORGANIZATION</td>
            <td colspan="2" style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; width:20%;">INCLUSIVE DATES</td>
            <td rowspan="2" style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; width:15%;">NUMBER OF HOURS</td>
            <td rowspan="2" style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; width:25%;">POSITION / NATURE OF WORK</td>
        </tr>
        <tr>
            <td style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; width:10%;">From</td>
            <td style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; width:10%;">To</td>
        </tr>

        {{-- Data rows — always show 5 rows minimum --}}
        @for($i = 0; $i < 5; $i++)
            @php $v = $voluntary[$i] ?? null; @endphp
            <tr style="height:36px;">
                <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center; border-right:none;"></td>
                <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center; border-left:none;">
                    {{ $v ? $na($v->name_and_address_of_organization) : '' }}
                </td>
                <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                    {{ $v ? $na($v->inclusive_date_from) : '' }}
                </td>
                <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                    {{ $v ? $na($v->inclusive_date_to) : '' }}
                </td>
                <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                    {{ $v ? $na($v->number_of_hours) : '' }}
                </td>
                <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                    {{ $v ? $na($v->position_nature_of_work) : '' }}
                </td>
            </tr>
        @endfor

        {{-- Extra rows if more than 5 records --}}
        @if($voluntary->count() > 5)
            @for($i = 5; $i < $voluntary->count(); $i++)
                @php $v = $voluntary[$i]; @endphp
                <tr style="height:36px;">
                    <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center; border-right:none;"></td>
                    <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center; border-left:none;">
                        {{ $na($v->name_and_address_of_organization) }}
                    </td>
                    <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                        {{ $na($v->inclusive_date_from) }}
                    </td>
                    <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                        {{ $na($v->inclusive_date_to) }}
                    </td>
                    <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                        {{ $na($v->number_of_hours) }}
                    </td>
                    <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                        {{ $na($v->position_nature_of_work) }}
                    </td>
                </tr>
            @endfor
        @endif

        {{-- Continue note — only shown when 5 or fewer records --}}
        @if($voluntary->count() <= 5)
            <tr>
                <td colspan="6" style="padding:2px 4px; background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:7.5pt; font-style:italic; font-weight:bold; color:#ff0202; text-align:center; text-transform:none;">
                    (Continue on separate sheet if necessary)
                </td>
            </tr>
        @endif

    </table>

    <div class="section-header">VII.&nbsp;&nbsp;Learning and Development <span style="text-transform:none;">(L&D)</span> Interventions/Training Programs Attended</div>

    <table class="pds-table">

        {{-- Header --}}
        <tr>
            <td rowspan="2" style="background:#EAEAEA; text-align:center; vertical-align:top; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; width:3%; border-right:none; padding-top:4px;">30.</td>
            <td rowspan="2" style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; width:37%; border-left:none;">TITLE OF LEARNING AND DEVELOPMENT INTERVENTIONS/TRAINING PROGRAMS<br><span style="font-weight:normal; font-style:italic; text-transform:none;">(Write in full)</span></td>
            <td colspan="2" style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; width:20%;">INCLUSIVE DATES OF<br>ATTENDANCE<br>{{--<span style="text-transform:none;">(dd/mm/yyyy)</span>--}}</td>
            <td rowspan="2" style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; width:15%;">NUMBER OF HOURS</td>
            <td rowspan="2" style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; width:13%;">TYPE OF <span style="text-transform:none;">L&D</span><br><span style="font-weight:normal; font-style:italic; text-transform:none;">(Managerial/<br>Supervisory/<br>Technical/etc)</span></td>
            <td rowspan="2" style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; width:12%;">CONDUCTED/<br>SPONSORED BY</td>
        </tr>
        <tr>
            <td style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; width:10%;">From</td>
            <td style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; width:10%;">To</td>
        </tr>

        {{-- Data rows — always show 5 rows minimum --}}
        @for($i = 0; $i < 5; $i++)
            @php $l = $learning[$i] ?? null; @endphp
            <tr style="height:36px;">
                <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center; border-right:none;"></td>
                <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center; border-left:none;">
                    {{ $l ? $na($l->title_of_learning_and_development_interventions) : '' }}
                </td>
                <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                    {{ $l ? $na($l->inclusive_date_from) : '' }}
                </td>
                <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                    {{ $l ? $na($l->inclusive_date_to) : '' }}
                </td>
                <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                    {{ $l ? $na($l->number_of_hours) : '' }}
                </td>
                <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                    {{ $l ? $na($l->type_of_l_d) : '' }}
                </td>
                <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                    {{ $l ? $na($l->conducted_sponsored_by) : '' }}
                </td>
            </tr>
        @endfor

        {{-- Extra rows if more than 5 records --}}
        @if($learning->count() > 5)
            @for($i = 5; $i < $learning->count(); $i++)
                @php $l = $learning[$i]; @endphp
                <tr style="height:36px;">
                    <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center; border-right:none;"></td>
                    <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center; border-left:none;">
                        {{ $na($l->title_of_learning_and_development_interventions) }}
                    </td>
                    <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                        {{ $na($l->inclusive_date_from) }}
                    </td>
                    <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                        {{ $na($l->inclusive_date_to) }}
                    </td>
                    <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                        {{ $na($l->number_of_hours) }}
                    </td>
                    <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                        {{ $na($l->type_of_l_d) }}
                    </td>
                    <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center;">
                        {{ $na($l->conducted_sponsored_by) }}
                    </td>
                </tr>
            @endfor
        @endif

        {{-- Continue note — only shown when 5 or fewer records --}}
        @if($learning->count() <= 5)
            <tr>
                <td colspan="7" style="padding:2px 4px; background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:7.5pt; font-style:italic; font-weight:bold; color:#ff0202; text-align:center; text-transform:none;">
                    (Continue on separate sheet if necessary)
                </td>
            </tr>
        @endif

    </table>

    <div class="section-header">VIII.&nbsp;&nbsp;Other Information</div>

    <table class="pds-table">

        {{-- Header --}}
        <tr>
            <td style="background:#EAEAEA; text-align:center; vertical-align:top; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; width:3%; border-right:none; padding-top:4px;">31.</td>
            <td style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; width:30%; border-left:none;">SPECIAL SKILLS AND HOBBIES</td>
            <td style="background:#EAEAEA; text-align:center; vertical-align:top; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; width:3%; border-right:none; padding-top:4px;">32.</td>
            <td style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; width:31%; border-left:none;">NON-ACADEMIC DISTINCTIONS / RECOGNITION<br><span style="font-weight:normal; font-style:italic; text-transform:none;">(Write in full)</span></td>
            <td style="background:#EAEAEA; text-align:center; vertical-align:top; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; width:3%; border-right:none; padding-top:4px;">33.</td>
            <td style="background:#EAEAEA; text-align:center; vertical-align:middle; font-family:'Arial Narrow',Arial,sans-serif; font-size:8pt; width:30%; border-left:none;">MEMBERSHIP IN ASSOCIATION/ORGANIZATION<br><span style="font-weight:normal; font-style:italic; text-transform:none;">(Write in full)</span></td>
        </tr>

        {{-- Data rows — always show 5 rows minimum --}}
        @for($i = 0; $i < 5; $i++)
            @php
                $skill = $skills[$i] ?? null;
                $distinction = $distinctions[$i] ?? null;
                $membership = $memberships[$i] ?? null;
            @endphp
            <tr style="height:36px;">
                <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center; border-right:none;"></td>
                <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center; border-left:none;">
                    {{ $skill ?? '' }}
                </td>
                <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center; border-right:none;"></td>
                <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center; border-left:none;">
                    {{ $distinction ?? '' }}
                </td>
                <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center; border-right:none;"></td>
                <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center; border-left:none;">
                    {{ $membership ?? '' }}
                </td>
            </tr>
        @endfor

        {{-- Extra rows if more than 5 records --}}
        @php $maxOtherRows = max(count($skills), count($distinctions), count($memberships)); @endphp
        @if($maxOtherRows > 5)
            @for($i = 5; $i < $maxOtherRows; $i++)
                <tr style="height:36px;">
                    <td style="padding:4px; border-right:none;"></td>
                    <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center; border-left:none;">
                        {{ $skills[$i] ?? '' }}
                    </td>
                    <td style="padding:4px; border-right:none;"></td>
                    <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center; border-left:none;">
                        {{ $distinctions[$i] ?? '' }}
                    </td>
                    <td style="padding:4px; border-right:none;"></td>
                    <td style="padding:4px; font-family:'Arial Narrow',Arial,sans-serif; font-size:9pt; font-weight:bold; vertical-align:middle; text-align:center; border-left:none;">
                        {{ $memberships[$i] ?? '' }}
                    </td>
                </tr>
            @endfor
        @endif

        {{-- Continue note --}}
        @if($maxOtherRows <= 5)
            <tr>
                <td colspan="6" style="padding:2px 4px; background:#EAEAEA; font-family:'Arial Narrow',Arial,sans-serif; font-size:7.5pt; font-style:italic; font-weight:bold; color:#ff0202; text-align:center; text-transform:none;">
                    (Continue on separate sheet if necessary)
                </td>
            </tr>
        @endif

    </table>

</div>