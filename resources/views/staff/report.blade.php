<!DOCTYPE html>
<html>

<head>
    <title>To-Do Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>To-Do Report</h1>
    <p><strong>User:</strong> {{ $user->name }}</p>
    <p><strong>Due Date:</strong> {{ $due_date }}</p>
    <p><strong>Download Date:</strong> {{ $download_date }}</p>

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Status</th>
                <th>Start Date</th>
                <th>Due Date</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($todos as $todo)
            <tr>
                <td>{{ $todo->title }}</td>
                <td>{{ $todo->is_completed ? 'Completed' : 'Not Completed' }}</td>
                <td>{{ $todo->start_date }}</td>
                <td>{{ $todo->due_date }}</td>
                <td>{{ $todo->created_at }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5">To do list is still empty</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>