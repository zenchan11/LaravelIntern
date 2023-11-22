@extends('layouts.app')
@section('title')
	create
@endsection
@section('content')
	<div>
		<div>
			<form action='/update' method="post" enctype="multipart/form-data">
				@csrf
			      @if ($errors->any())
			        <div class="alert alert-danger">
			          <ul>
			            @foreach ($errors->all() as $error)
			              <li>{{ $error }}</li>
			            @endforeach
			          </ul>
			        </div>
			      @endif
				<div>
					<label for="blog">Blog Title</label>
					<input type="text" name="title" id="blog">
					
				</div>
				<div>
					<label for="Blog_description">Blog description</label>
					<input type="text"  name="description" id="Blog_description">
					
				</div>

				
				<div>
					<input type="file" name="image">
				</div>
			
				<div>
					<input type="submit" value="submit">
				</div>
		</div>
	</div>
@endsection