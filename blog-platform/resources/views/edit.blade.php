@extends('layouts.app')
@section('title')
edit

@endsection
@section('content')
		<div class="form-group">
			<form action='/update/{{$blogs->id}}' method="post" enctype="multipart/form-data">

				@csrf
			     
				<div class="form-group">
					<label for="blog">Blog Title{{ $blogs->title}}</label>
					<input class ="form-control" type="text" name="title" id="blog" value ="{{ $blogs->Blog_title}}">
					
				</div>
				<div class="form-group">
					<label for="Blog_description">Blog description</label>
					<input class="form-control" type="text"  name="description" id="Blog_description" value="{{ $blogs->description}}">
					
				</div>

				
				<div class="form-group">
					<input type="file" name="image">
				</div>
			
				<div class="form-group">
					<input type="submit" value="submit">
				</div>

		</div>
		<p></p>


@endsection