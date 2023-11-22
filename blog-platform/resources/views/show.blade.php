@extends('layouts.app')
@section('title')
	show
@endsection

@section('content')
	<div>
		<button ><a href="{{url('/delete/'.$blogs->id)}}">Detele</a></button>
	</div>
	<div>
		<li>{{ $blogs->Blog_title}}</li>
		<img src="{{asset('/images/'.$blogs->image)}}" width="200;" height="200;">
		<hr>
		<p>{{ $blogs->description}}</p>
		

	</div>
@endsection