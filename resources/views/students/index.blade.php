<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student List</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 40px 20px;
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            color: #333;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,.08);
        }

        h1 {
            margin-top: 0;
            margin-bottom: 20px;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            border: none;
            border-radius: 6px;
            background: #007bff;
            color: white;
            text-decoration: none;
            cursor: pointer;
        }

        .btn:hover {
            background: #0056b3;
        }

        .success {
            padding: 12px 15px;
            margin-bottom: 20px;
            border-radius: 6px;
            background: #d4edda;
            color: #155724;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background: #f8f9fa;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #777;
        }

        @media (max-width: 700px) {
            body {
                padding: 15px;
            }

            .container {
                padding: 20px 15px;
                overflow-x: auto;
            }

            .top-bar {
                flex-direction: column;
                align-items: stretch;
            }

            .btn {
                text-align: center;
            }

            table {
                min-width: 700px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="top-bar">
        <h1>Student List</h1>

        <a href="{{ url('/students/create') }}" class="btn">
            + Add Student
        </a>
    </div>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    @if($students->count() > 0)

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Contact No.</th>
                </tr>
            </thead>

            <tbody>
                @foreach($students as $student)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $student->student_id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->address }}</td>
                        <td>{{ $student->contact_no }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @else

        <div class="empty">
            No students found.
        </div>

    @endif

</div>

</body>
</html>