<!DOCTYPE html>
<html>
<head>
    <title>Help Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f8;
            color: #333;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #0066cc;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
        }

        button {
            background-color: #0066cc;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.2s ease-in-out;
        }

        button:hover {
            background-color: #004a99;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Help Form</h1>
        <form action="{{ route('help.submit') }}" method="POST">
            @csrf
            <label for="name">Name:</label>
            <input type="text" name="name" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="message">Your Concern:</label>
            <textarea name="message" rows="6" required></textarea>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
