<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 40px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .logout-btn {
            position: absolute;
            top: 20px;
            right: 30px;
        }

        .logout-btn button {
            background-color: #dc3545;
            color: white;
            padding: 10px 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .logout-btn button:hover {
            background-color: #c82333;
        }

        .messages {
            text-align: center;
            margin-bottom: 20px;
        }

        .messages p {
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 10px;
            background-color: #fff;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 14px 20px;
            text-align: center;
        }

        thead {
            background-color: #007bff;
            color: white;
        }

        tbody tr {
            background-color: #fefefe;
            border-bottom: 1px solid #ddd;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
        }

        .status-active {
            color: green;
            font-weight: bold;
        }

        .status-inactive {
            color: red;
            font-weight: bold;
        }

        .toggle-btn {
            background-color: #17a2b8;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 5px;
            cursor: pointer;
        }

        .toggle-btn:hover {
            background-color: #138496;
        }

        ul {
            list-style: none;
            padding-left: 0;
        }

        ul li {
            color: red;
        }

        @media screen and (max-width: 768px) {
            table, thead, tbody, th, td, tr {
                display: block;
                width: 100%;
            }

            thead {
                display: none;
            }

            tr {
                margin-bottom: 15px;
                background-color: white;
                box-shadow: 0 2px 6px rgba(0,0,0,0.05);
                border-radius: 8px;
                padding: 12px;
            }

            td {
                text-align: right;
                padding-left: 50%;
                position: relative;
            }

            td::before {
                content: attr(data-label);
                position: absolute;
                left: 20px;
                width: 45%;
                padding-right: 10px;
                font-weight: bold;
                text-align: left;
            }
        }
    </style>
</head>
<body>

    <h2>Admin Dashboard – Manage Users</h2>

    <form action="{{ route('admin.logout') }}" method="POST" class="logout-btn">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <div class="messages">
        @if (session('status'))
            <p style="color: green;">{{ session('status') }}</p>
        @endif

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td data-label="ID">{{ $user->id }}</td>
                    <td data-label="Name">{{ $user->name }}</td>
                    <td data-label="Email">{{ $user->email }}</td>
                    <td data-label="Role">{{ ucfirst($user->role) }}</td>
                    <td data-label="Status">
                        @if ($user->id !== auth()->id())
                            <form action="{{ route('admin.toggleStatus', $user->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit"
                                    style="color: white;
                                           background-color: {{ $user->status === 'active' ? '#28a745' : '#dc3545' }};
                                           border: none;
                                           padding: 6px 14px;
                                           border-radius: 4px;
                                           cursor: pointer;">
                                    {{ ucfirst($user->status) }}
                                </button>
                            </form>
                        @else
                            <span style="font-weight: bold; color: gray;">{{ ucfirst($user->status) }}</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
