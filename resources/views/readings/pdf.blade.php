<!DOCTYPE html>
<html>

<head>
    <title>Solar Readings Report</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 5px;
            text-align: left;
        }
    </style>
</head>

<body>
    <h2>Solar Readings Report</h2>
    <table>
        <thead>
            <tr>
                <th>Panel Serial Number</th>
                <th>Reading Date</th>
                <th>Energy (kWh)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($readings as $reading)
            <tr>
                <td>{{ $reading->panel->serial_number }}</td>
                <td>{{ $reading->reading_date }}</td>
                <td>{{ $reading->energy_kwh }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>