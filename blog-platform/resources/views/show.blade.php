@extends('layouts.app')
@section('title')
	show
@endsection

@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $data['blogs']->Blog_title }}</h5>
            <img src="{{ asset('/images/' . $data['blogs']->image) }}" class="img-fluid" alt="Blog Image">
            <hr>
            <p class="card-text">{{ $data['blogs']->description }}</p>
            <p class="card-text">Posted by, {{ $data['users']->name }}</p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ url('/delete/' . $data['blogs']->id) }}" class="btn btn-danger" role="button">Delete</a>
        <a href="{{ url('/edit/' . $data['blogs']->id) }}" class="btn btn-primary" role="button">Edit</a>
    </div>
</div>

<footer class="bd-footer py-4 py-md-5 mt-5 bg-body-tertiary text-center">
    “I haven’t been everywhere, but it’s on my list.” – Susan Sontag
</footer>

@endsection