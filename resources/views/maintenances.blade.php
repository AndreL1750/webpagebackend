<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenances</title>
</head>
<body>
    <h1>Maintenance Records</h1>
    <table>
        <thead>
            <tr>
                <th>Plate</th>
                <th>Name</th>
                <th>Description</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $record)
                <tr>
                    <td>{{ $record['plate'] ?? 'N/A' }}</td>
                    <td>{{ $record['name'] ?? 'N/A' }}</td>
                    <td>{{ $record['description'] ?? 'N/A' }}</td>
                    <td>{{ $record['date'] ?? 'N/A' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>