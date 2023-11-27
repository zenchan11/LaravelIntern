@extends('layouts.app')
@section('title')

@endsection
@section('content')

		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <a class="navbar-brand" href="/">Home</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item active">
		        <a class="nav-link" href="login">Login <span class="sr-only"></span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="register">Register
		        </a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="/admin/login">Admin
		        </a>
		      </li>
			<li>
{{-- 				<div class="dropdown" data-bs-theme="dark">
				  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButtonDark" data-bs-toggle="dropdown" aria-expanded="false">
				    Dark dropdown
				  </button>
				  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonDark">
				    <li><a class="dropdown-item active" href="#">Action</a></li>
				    <li><a class="dropdown-item" href="#">Action</a></li>
				    <li><a class="dropdown-item" href="#">Another action</a></li>
				    <li><a class="dropdown-item" href="#">Something else here</a></li>
				    <li><hr class="dropdown-divider"></li>
				    <li><a class="dropdown-item" href="#">Separated link</a></li>
				  </ul>
				</div> --}}

		      	
		      </li>
{{-- 		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Dropdown
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="#">Action</a>
		          <a class="dropdown-item" href="#">Another action</a>
		          <div class="dropdown-divider"></div>
		          <a class="dropdown-item" href="#">Something else here</a>
		        </div>
		      </li> --}}

		    </ul>
		  </div>
		</nav>


	<nav class="navbar navbar-light bg-light">
    <div class="container">
        <a href="/"><span class="navbar-brand mb-0 h1">blogs</span></a>
        <a href="/create"><span class="btn btn-primary">Create Blog</span></a>
    </div>
            @if(session('error'))
            <div class="alert alert-primary" role="alert">
          {{ session('error')}}
        </div>
        @endif

	<div class="">
		@foreach($blogs as $blog)
			<li><a href="show/{{ $blog->id}}">{{ $blog->Blog_title }}</a></li>
			<img src="{{asset('/images/'.$blog->image)}}" style="width: 300px; height: 200px;">
			<hr>
		@endforeach

	</div>
	<!-- Remove the container if you want to extend the Footer to full width. -->



  

<!-- End of .container -->
@endsection