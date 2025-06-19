<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 50px;
        }

        .auth-card {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 6px;
            color: #333;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn {
            width: 100%;
            background-color: #3490dc;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #2779bd;
        }

        .link {
            text-align: center;
            margin-top: 15px;
        }

        .link a {
            text-decoration: none;
            color: #3490dc;
        }

        .error-list {
            color: red;
            margin-bottom: 20px;
        }

    </style>
</head>
<body>

<div class="auth-card">
    <h2>User Registration</h2>

    <!-- Validation Errors -->
    @if ($errors->any())
        <ul class="error-list">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <label for="name">Name</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>

        <!-- Email Address -->
        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required>

        <!-- Country -->
        <label for="country">Country</label>
        <input id="country" type="text" name="country" value="{{ old('country') }}" required>

        <!-- Password -->
        <label for="password">Password</label>
        <input id="password" type="password" name="password" required autocomplete="new-password">

        <!-- Confirm Password -->
        <label for="password_confirmation">Confirm Password</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required>

        <!-- Submit Button -->
        <button type="submit" class="btn">Register</button>
    </form>

    <div class="link">
        <a href="{{ route('login') }}">Already registered?</a>
    </div>
</div>

</body>
</html>
