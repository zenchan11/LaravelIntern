<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
</head>
<body>

<h2>Login Form</h2>

<form action="/login" method="post">
    @csrf
    <div>
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="name"><br><br>
        <span>
            @if ($errors->has('name'))
        </span>
    </div>
    <div>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <span>
            @error('email')
                <p>{{ $message }}</p>
            @enderror
        </span>
    </div>
    <input type="submit" value="Login">
</form>

</body>
</html>
