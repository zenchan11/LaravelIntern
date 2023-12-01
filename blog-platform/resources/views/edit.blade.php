@extends('layouts.app')
@section('title')
edit

@endsection
@section('content')
<div class="container mt-4">
    <form action='/update/{{ $blogs->id }}' method="post" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit Blog</h5>
                <div class="form-group">
                    <label for="blogTitle">Blog Title</label>
                    <input class="form-control" type="text" name="title" id="blogTitle" value="{{ $blogs->Blog_title }}">
                </div>
                <div class="form-group">
                    <label for="blogDescription">Blog Description</label>
                    <input class="form-control" type="text" name="description" id="blogDescription" value="{{ $blogs->description }}">
                </div>
                <div class="form-group">
                    <label for="blogImage">Blog Image</label>
                    <input type="file" class="form-control-file" name="image" id="blogImage">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>

		<p></p>


@endsection