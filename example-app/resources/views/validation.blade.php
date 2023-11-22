<!DOCTYPE html>
<html>
<head>
    <title>Sample Form</title>
</head>
<body>

<h2>Sample Form</h2>

<form action="/post" method="post">
  @csrf
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
  <label for="name">First Name:</label><br>
  <input type="text" id="name" name="name"><br>
  <label for="email">Last Name:</label><br>
  <input type="text" id="email" name="email"><br><br>
  <input type="submit" value="Submit">
</form>

</body>
</html>
