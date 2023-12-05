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
    <div class="container mt-5">
        @if(session()->has('reset_success'))
        <div class="alert alert-danger" role="alert">
          {{ session()->get('reset_success') }}
        </div>
        @endif
        <form action="/loginUser" method="post" class="col-md-6 offset-md-3 border p-4">
            <!-- User ID Field -->
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="text" class="form-control" id="email" name="email" required>
            </div>
    
            <!-- Password Field -->
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
    
            <!-- Login Button -->
            <button type="submit" class="btn btn-primary">Login</button>
    
            <!-- Register Button - You can add a registration link with a button style if needed -->
            <!-- Example: <a href="register" class="btn btn-secondary">Register</a> -->
    
            <!-- Forgot Password Link -->
            <div class="mt-3">
                <a href="/forgetpassword">Forgot your password?</a>
            </div>
        </form>
    
        <!-- Registration Link -->
        <div class="mt-3 text-center">
            <p>Don't have an account? <a href="register">Register here</a></p>
        </div>
    </div>
    
</body>
</html>
