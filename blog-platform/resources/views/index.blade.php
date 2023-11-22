@extends('layouts.app')
@section('title')

@endsection
@section('content')
	<div>
		@foreach($blogs as $blog)
			<li><a href="show/{{ $blog->id}}">{{ $blog->Blog_title }}</a></li>
			<img src="{{asset('/images/'.$blog->image)}}" style="width: 300px; height: 200px;">
			<hr>
		@endforeach
	</div>
@endsection