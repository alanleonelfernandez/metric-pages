<!DOCTYPE html>
<html>
<head>
    <title>Metric History</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <h1>Metric History</h1>
    <table>
        <thead>
            <tr>
                <th>URL</th>
                <th>Accessibility Metric</th>
                <th>Performance Metric</th>
                <th>Best Practices Metric</th>
                <th>Strategy ID</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($metrics as $metric)
                <tr>
                    <td>{{ $metric->url }}</td>
                    <td>{{ $metric->accessibility_metric }}</td>
                    <td>{{ $metric->performance_metric }}</td>
                    <td>{{ $metric->best_practices_metric }}</td>
                    <td>{{ $metric->strategy_id }}</td>
                    <td>{{ $metric->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

