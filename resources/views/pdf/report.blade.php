<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>
    <style>
        body { font-family: Arial, Helvetica, sans-serif; font-size: 9px; margin: 20px; }
        h2 { font-size: 14px; margin-bottom: 2px; }
        p { font-size: 10px; color: #666; margin-top: 0; margin-bottom: 15px; }
        table { width: 100%; border-collapse: collapse; }
        th { background: #f1f5f9; font-weight: bold; text-align: left; padding: 5px 6px; border: 1px solid #cbd5e1; font-size: 8px; }
        td { padding: 4px 6px; border: 1px solid #cbd5e1; }
        .text-right { text-align: right; }
        .text-center { text-align: center; }
        .font-mono { font-family: 'Courier New', monospace; }
        .footer { text-align: center; font-size: 8px; color: #94a3b8; margin-top: 20px; }
    </style>
</head>
<body>
    <h2>{{ $title }}</h2>
    <p>{{ $subtitle }}</p>
    <table>
        <thead>
            <tr>
                @foreach($columns as $col)
                    <th>{{ $col }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($rows as $row)
                <tr>
                    @foreach($row as $cell)
                        <td>{{ $cell }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="footer">Dicetak pada {{ now()->format('d/m/Y H:i:s') }}</div>
</body>
</html>
