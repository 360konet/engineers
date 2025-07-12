<!DOCTYPE html>
<html>
<head>
    <title>Complains Report</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <center><img src ="logo.png" height="100px" width="100px"></center>
    <h2>Complains Report</h2>
    <p><strong>Status:</strong> {{ $request->status }}</p>
    <p><strong>Date Range:</strong> {{ $request->start_date }} to {{ $request->end_date }}</p>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Ticket ID</th>
                <th>Complain From</th>
                <th>Department</th>
                <th>Category</th>
                <th>Status</th>
                <th>Technicians</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($complains as $index => $complain)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $complain->ticketID }}</td>
                <td>{{ $complain->username }}</td>
                <td>{{ $complain->department }}</td>
                <td>{{ $complain->category }}</td>
                <td>{{ $complain->status }}</td>
                <td>{{ $complain->technician }} <br><br> Review: {{ $complain->review }}</td>
                <td>{{ $complain->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
