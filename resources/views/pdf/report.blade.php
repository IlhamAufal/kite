<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Report' }}</title>
    <style>
        @page {
            size: A4;
            margin: 12mm 15mm 15mm 15mm;
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 10px;
            color: #333333;
            line-height: 1.4;
            margin: 0;
            padding: 0;
        }

        /* Header Section */
        .header-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        .header-table td {
            vertical-align: middle;
            padding: 0;
        }
        .company-logo {
            max-height: 45px;
        }
        .doc-title {
            font-size: 20px;
            font-weight: bold;
            color: #1a202c;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            text-align: right;
        }
        .doc-subtitle {
            font-size: 10px;
            color: #64748b;
            text-align: right;
            margin-top: 2px;
        }

        /* Main Data Table */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .data-table th {
            background-color: #f1f5f9;
            color: #1e293b;
            font-weight: bold;
            font-size: 8.5px;
            text-align: center;
            padding: 6px 5px;
            border: 1px solid #cbd5e1;
            vertical-align: middle;
        }
        .data-table td {
            padding: 6px 5px;
            border: 1px solid #cbd5e1;
            font-size: 9px;
            vertical-align: middle;
        }
        .data-table .text-left { text-align: left; }
        .data-table .text-center { text-align: center; }
        .data-table .text-right { text-align: right; }
        .data-table tr:nth-child(even) {
            background-color: #f8fafc;
        }

        /* Footer Section */
        .footer-container {
            margin-top: 25px;
            padding-top: 10px;
            border-top: 1px solid #cbd5e1;
            font-size: 8px;
            color: #64748b;
        }
        .contact-info {
            margin-bottom: 6px;
        }
        .contact-info strong {
            color: #334155;
        }
        .disclaimer-note {
            font-style: italic;
            color: #94a3b8;
            margin-top: 6px;
            font-size: 7.5px;
        }
        .footer-bottom {
            margin-top: 10px;
            width: 100%;
        }
        .po-ref {
            float: left;
            font-weight: bold;
            color: #334155;
        }
        .page-number {
            float: right;
            color: #64748b;
        }
        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }
    </style>
</head>
<body>

    <!-- Header Section -->
    <table class="header-table">
        <tr>
            <td>
                <img src="{{ public_path('storage/logo-yupi.png') }}" class="company-logo" alt="Logo Yupi">
            </td>
            <td style="text-align: right;">
                <div class="doc-title">{{ $title ?? 'Report' }}</div>
                @if(isset($subtitle))
                    <div class="doc-subtitle">{{ $subtitle }}</div>
                @endif
            </td>
        </tr>
    </table>

    <!-- Main Data Table -->
    <table class="data-table">
        <thead>
            <tr>
                @foreach($columns as $col)
                    <th>{{ $col }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @forelse($rows as $row)
                <tr>
                    @foreach($row as $cell)
                        <td class="text-center">{{ $cell }}</td>
                    @endforeach
                </tr>
            @empty
                <tr>
                    <td colspan="{{ count($columns) }}" class="text-center" style="padding: 20px; color: #94a3b8;">
                        Tidak ada data.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Footer Information -->
    <div class="footer-container">
        <div class="disclaimer-note">
            NOTE: Dokumen ini dihasilkan secara otomatis oleh sistem.
        </div>
        <div class="footer-bottom clearfix">
            <div class="page-number">Page 1 of 1</div>
        </div>
    </div>

</body>
</html>
