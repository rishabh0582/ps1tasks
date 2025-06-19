<!DOCTYPE html>
<html>
<head>
    <title>Help Requests</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            max-width: 1000px;
            margin: 40px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            position: relative;
        }

        h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background-color: #3498db;
            color: white;
        }

        th, td {
            padding: 14px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .logout-btn {
            position: absolute;
            top: 20px;
            right: 30px;
        }

        .logout-btn button {
            padding: 8px 16px;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .logout-btn button:hover {
            background-color: #c0392b;
        }

        @media (max-width: 768px) {
            table, thead, tbody, th, td, tr {
                display: block;
            }

            thead {
                display: none;
            }

            tr {
                margin-bottom: 15px;
                background: #fff;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 8px;
            }

            td {
                position: relative;
                padding-left: 50%;
                text-align: right;
            }

            td::before {
                content: attr(data-label);
                position: absolute;
                left: 10px;
                width: 45%;
                padding-right: 10px;
                font-weight: bold;
                text-align: left;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Logout Button -->
        <form action="{{ route('helplogout') }}" method="POST" class="logout-btn">
            @csrf
            <button type="submit">Logout</button>
        </form>

        <h2>Help Requests</h2>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Concern</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($helpRequests as $request)
                    <tr>
                        <td data-label="ID">{{ $request->id }}</td>
                        <td data-label="Name">{{ $request->name }}</td>
                        <td data-label="Email">{{ $request->email }}</td>
                        <td data-label="Concern">{{ $request->message }}</td>
                        <td data-label="Created At">{{ $request->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
