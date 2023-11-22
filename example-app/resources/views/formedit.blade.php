<!-- View stored in resources/views/greeting.blade.php -->

<html>
    <script>


</script>
    <body>
        <form method="POST" action="/edit">
        @csrf <!-- CSRF Protection -->
        <lable for ='id' >id</label><br>
        <input type="number" id = "id" name ="id" value ={{ $id}}><br><br>

        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br><br>

        <label for="message">Message:</label><br>
        <textarea id="message" name="message"></textarea><br><br>

        <button type="submit">Submit</button>
    </form>
    </body>
</html>

