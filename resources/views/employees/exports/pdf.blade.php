<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>{{ $title }}</title>

<style>
    * { margin: 0; padding: 0; box-sizing: border-box; }

    @page {
        margin-top: 20px;
        margin-bottom: 50px;
        margin-left: 30px;
        margin-right: 30px;
    }

    body {
        font-family: DejaVu Sans, sans-serif;
        font-size: 11px;
        color: #1f2937;
    }

    /* ── Footer with page number (ALL pages) ── */
    #page-footer {
        position: fixed;
        bottom: -35px;
        left: 0;
        right: 0;
        font-size: 8px;
        color: #6b7280;
        border-top: 1px solid #000000;
        padding-top: 5px;
        display: table;
        width: 100%;
    }

    #page-footer .footer-left {
        display: table-cell;
        text-align: left;
    }

    #page-footer .footer-right {
        display: table-cell;
        text-align: right;
    }

    /* ── Table wrapper — adds breathing room around the table ── */
    .table-wrapper {
        margin: 0 20px 30px 20px;
    }

    /* ── Table ── */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    thead {
        display: table-header-group;
    }

    /* ── Letterhead row — no border ── */
    .thead-header td {
        padding: 0;
        border: none !important;
        background: #ffffff;
    }

    .thead-header td img {
        width: 100%;
        height: 120px;
        object-fit: contain;
        object-position: left center;
        display: block;
    }

    .thead-header td .divider {
        border-top: 1.5px solid #15803d;
        margin-top: 5px;
        margin-bottom: 8px;
    }

    /* ── Title row — no border ── */
    .thead-title td {
        padding: 6px 0 10px;
        border: none !important;
        background: #ffffff;
        text-align: center;
    }

    .title {
        font-size: 14px;
        font-weight: bold;
        color: #14532d;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* ── Column header row — bordered ── */
    .thead-cols th {
        padding: 8px 10px;
        text-align: left;
        font-size: 10px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 0.4px;
        background-color: #15803d;
        color: #ffffff;
        border: 1px solid #000000;
    }

    .thead-cols th:first-child {
        text-align: center;
        width: 40px;
    }

    /* ── Body rows — all white, black borders ── */
    tbody tr {
        background-color: #ffffff;
    }

    tbody td {
        padding: 7px 10px;
        border: 1px solid #000000;
    }

    tbody td:first-child {
        text-align: center;
        color: #6b7280;
    }
</style>
</head>

<body>

    {{-- Footer with page numbers --}}
    <div id="page-footer">
        <span class="footer-left">{{ $title }}</span>
        <span class="footer-right">Page <span style="font-weight:bold">{PAGE_NUM}</span> of {PAGE_COUNT} &nbsp;·&nbsp; {{ now()->format('Y') }}</span>
    </div>

    <div class="table-wrapper">
        <table>
            <thead>

                {{-- Row 1: Letterhead — no border --}}
                <tr class="thead-header">
                    <td colspan="4">
                        <img src="{{ public_path('images/letterhead.png') }}" alt="Header">
                        <div class="divider"></div>
                    </td>
                </tr>

                {{-- Row 2: Title — no border --}}
                <tr class="thead-title">
                    <td colspan="4">
                        <div class="title">{{ $title }}</div>
                    </td>
                </tr>

                {{-- Row 3: Column headers — bordered --}}
                <tr class="thead-cols">
                    <th>#</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                </tr>

            </thead>

            <tbody>
                @forelse($employees as $i => $emp)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $emp->surname }}</td>
                    <td>{{ $emp->first_name }}</td>
                    <td>{{ $emp->middle_name ?? '—' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="text-align:center; padding: 20px; color:#9ca3af;">
                        No records found.
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>

</body>
</html>