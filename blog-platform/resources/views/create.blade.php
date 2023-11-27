@extends('layouts.app')
@section('title')
	create
@endsection
@section('content')




{{-- <form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form> --}}


	<div>

		  


		<div class="form-group">
			<form action='/update' method="post" enctype="multipart/form-data">

				@csrf
			     
				<div class="form-group">
					<label for="blog">Blog Title</label>
					<input class ="form-control" type="text" name="title" id="blog">
					
				</div>
				<div class="form-group">
					<label for="Blog_description">Blog description</label>
					<input class="form-control" type="text"  name="description" id="Blog_description">
					
				</div>

				
				<div class="form-group">
					<input type="file" name="image">
				</div>
			
				<div class="form-group">
					<input type="submit" value="submit">
				</div>
		</div>
	</div>
@endsection