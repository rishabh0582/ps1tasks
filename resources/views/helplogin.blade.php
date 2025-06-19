<!DOCTYPE html>
<html>
<head>
    <title>Help Portal Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-card {
            background: white;
            padding: 30px;
            border-radius: 8px;
            width: 350px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .login-card h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        label {
            display: block;
            margin: 12px 0 6px;
            font-weight: bold;
        }
        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .checkbox {
            margin-top: 12px;
            display: flex;
            align-items: center;
        }
        .checkbox input {
            margin-right: 8px;
        }
        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 18px;
        }
        .actions a {
            font-size: 0.9em;
            text-decoration: none;
            color: #2563eb;
        }
        .actions a:hover {
            text-decoration: underline;
        }
        button {
            background: #2563eb;
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #1e40af;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <h2>Help Portal Login</h2>

        @if (session('status'))
            <div style="color: green; margin-bottom: 10px;">{{ session('status') }}</div>
        @endif

        @if ($errors->any())
            <div style="color: red; margin-bottom: 10px;">
                <ul style="padding-left: 18px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('helplogin.submit') }}">

            @csrf

            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>

            <label for="password">Password</label>
            <input id="password" type="password" name="password" required autocomplete="current-password">

            <div class="checkbox">
                <input type="checkbox" name="remember" id="remember_me">
                <label for="remember_me" style="margin: 0;">Remember Me</label>
            </div>

            <div class="actions">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Forgot password?</a>
                @endif
                <button type="submit">Log in</button>
            </div>
        </form>
    </div>
</body>
</html>
