<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 50px;
            text-align: center;
        }

        h2 {
            margin-bottom: 40px;
        }

        a {
            display: inline-block;
            margin: 20px;
            padding: 14px 24px;
            font-size: 18px;
            text-decoration: none;
            color: white;
            background-color: #007BFF;
            border-radius: 6px;
        }

        a:hover {
            background-color: #0056b3;
        }

        .logout-btn {
            position: absolute;
            top: 20px;
            right: 30px;
        }
    </style>
</head>
<body>

    <form action="{{ route('admin.logout') }}" method="POST" class="logout-btn">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <h2>Welcome to the Admin Dashboard</h2>

    <a href="{{ route('admin.dashboard.users') }}">Manage Users</a>
    <a href="{{ route('admin.usersByCountry') }}">View Users by Country</a>

</body>
</html>
