<!DOCTYPE html>
<html>
<head>
    <title>HTML Table Example</title>
</head>
<body>

<h2>Simple HTML Table</h2>

<table border="1">
  <tr>
    <th>id</th>
    <th>name</th>
    <th>email</th>
  </tr>
  @foreach ($data as $item)
    <tr>
    <td>  {{$item->id}}</td>
    <td> {{ $item->name}}</td>
    <td>  {{ $item->email}} </td>
    <td>
      <form action="/edit/{{ $item->id }}" method="POST">
        @csrf
                <button type="submit">Edit</button>
            </form>
    <td>
            <form action="/delete/{{ $item->id }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit">Delete</button>
            </form>
    </td>
    </td>
  </tr>
  @endforeach
</table>

</body>
</html>
