<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
 <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
<body>



    <form action="/loginUser" method="post">
        <!-- User ID Field -->
        @csrf
        <label for="email">email:</label>
        <input type="text" id="email" name="email" required>

        <br>

        <!-- Password Field -->
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <br>

        <!-- Login Button -->
        <input type="submit" value="Login">

        <!-- Register Button -->
    </form>
    <div>
        <a href="register">Don't have account register here</a>
    </div>
</body>
</html>
