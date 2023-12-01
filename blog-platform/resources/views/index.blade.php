@extends('layouts.app')
@section('title')

@endsection
@section('content')

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
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
                    <a class="nav-link" href="register">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.login')}}">Admin</a>
                </li>
                <!-- Add your other navigation items here -->
            </ul>
        </div>
    </div>
</nav>

<!-- Navbar for Blog Section -->
<nav class="navbar navbar-light bg-light">
    <div class="container">
        <a href="/"><span class="navbar-brand mb-0 h1">Blogs</span></a>
        <a href="/create"><span class="btn btn-primary">Create Blog</span></a>
    </div>
</nav>

<!-- Blog Display Section -->
<div class="container">
    @if(session('error'))
        <div class="alert alert-primary" role="alert">
            {{ session('error')}}
        </div>
    @endif


<div class="row blog-list">
    @foreach($blogs as $blog)
        @if($blog->approved_status == '1')
            <div class="col-md-4 mb-4">
                <div class="position-relative">
                    <a href="show/{{ $blog->id }}" class="blog-title card-title stretched-link">{{ $blog->Blog_title }}</a>
                    <img src="{{asset('/images/'.$blog->image)}}" class="img-fluid rounded fixed-size-image" alt="Blog Image">
                </div>
                <hr class="blog-divider mt-2">
            </div>
        @endif
    @endforeach
</div>
    {{ $blogs->links()}}
</div>
<style>
    .fixed-size-image {
        height: 200px; /* Set the desired height */
        object-fit: cover; /* Preserve aspect ratio and cover the entire container */
    }
</style>
@endsection