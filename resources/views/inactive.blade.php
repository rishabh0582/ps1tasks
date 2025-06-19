<!DOCTYPE html>
<html>
<head>
    <title>Account Inactive</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding-top: 100px;
            background-color: #f9f9f9;
        }
        .card {
            display: inline-block;
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.2);
        }
        h2 {
            color: #c0392b;
        }
        p {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>Your Account is Inactive</h2>
        <p>Please contact the administrator for access.</p>
        <a href="{{ route('help.form') }}">Go to Help</a>
    </div>
</body>
</html>
