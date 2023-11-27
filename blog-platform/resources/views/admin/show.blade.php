@extends('layouts.app')
@section('title')
	show
@endsection

@section('content')
    @if(session()->has('Permission'))
    <div class="alert alert-success">

        {{ session()->get('Permission') }}

    </div>
    @endif
		
	</div>

	<div>
		<li>{{ $blogs->Blog_title}}</li>
		<img src="{{asset('/images/'.$blogs->image)}}" width="200;" height="200;">
		<hr>
		<p>{{ $blogs->description}}</p>
		<p>Posted by, {{ $users->name}}</p>
		

	</div>
	<div class="">
		<a href="{{url('/delete/'.$blogs->id)}}" class="btn btn-primary" role="button">Delete</a>
		<a href="{{url('/edit/'.$blogs->id)}}" class="btn btn-primary" role="button">edit</a>
		<a href="{{url('/admin/approve/'.$blogs->id)}}" class="btn btn-primary" role="button">Approve</a>
	</div>



    <footer class="bd-footer py-4 py-md-5 mt-5 bg-body-tertiary">
    	“I haven’t been everywhere, but it’s on my list.” – Susan Sontag
    </footer>
@endsection