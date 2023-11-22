
<html>
<h1>Create Post</h1>
 
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                <l1></li>
            @endforeach
        </ul>
    </div>
@endif
</html>