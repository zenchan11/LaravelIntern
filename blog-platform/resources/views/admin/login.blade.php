@extends('layouts.app')
@section('title')
	admin login
@endsection

@section('content')
<form action="/admin/loginUser" method="post" enctype="multipart/form-data">
	@csrf
  <div class="form-group" >
    <label for="exampleInputEmail1">Admin email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <div class=""><a href="/admin/register">Make a super User</a></div>
</form>
@endsection