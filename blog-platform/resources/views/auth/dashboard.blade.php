@extends('layouts.app')
@section('title')
    dashboard
@endsection
@section('content')

  <div class="" id="">
            <ul class="">
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register-user') }}">Register</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link">Hello,{{Auth::user()->name}} | </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                </li>
                @endguest
            </ul>
        </div>
    
    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a href="/"><span class="navbar-brand mb-0 h1">blog</span></a>
            <a href="/create"><span class="btn btn-primary">Create Blog</span></a>
        </div>
    </nav>


    <div>
        @foreach($blogs as $blog)
            <li><a href="show/{{ $blog->id}}">{{ $blog->Blog_title }}</a></li>
            <img src="{{asset('/images/'.$blog->image)}}" style="width: 300px; height: 200px;">
            <hr>
        @endforeach
    </div>
@endsection