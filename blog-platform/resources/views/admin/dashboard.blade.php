@extends('layouts.app')
@section('title')
    dashboard
@endsection
@section('content')

<div>
      <div class="" id="">
            <ul class="">
                
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        @guest          
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
                @else
                <li class="nav-item">
                    <a class="nav-link"><span class="navbar-brand mb-0 h1">Hello,{{Auth::user()->name}} </span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"><span class="btn btn-primary">Logout</span></a>
                </li>

                @endguest
           
            </ul>
        </div>
    </nav>
    </div>
    <div>
        <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a href="/"><span class="navbar-brand mb-0 h1">blog</span></a>
            <a href="/create"><span class="btn btn-primary">Create Blog</span></a>
            <a href="/trash"><span class="btn btn-secondary">Trash</span></a>
        </div>
    </nav>
    </div>
    

    
    <div class="container">
    <h2>Unapproved posts</h2>
    
    <ul class="list-unstyled">
        @foreach($blogs as $blog)
            @if($blog->approved_status == 0)
                <div class="card my-3">
                    <li><a href="show/{{ $blog->id }}">{{ $blog->Blog_title }}</a></li>
                    <img class="card-img-top" src="{{ asset('/images/'.$blog->image) }}" style="width: 300px; height: 200px;">
                    <hr>
                </div>
            @endif
        @endforeach
    </ul>
</div>

    
</div>



@endsection