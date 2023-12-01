@extends('layouts.app')
@section('title')
@endsection
@section('content')
<div class="container mt-5">
  <h2>Item List</h2>
  @foreach($onlyTrashed as $trash)
  <ul class="list-group">
    <!-- Sample list item -->
    <li class="list-group-item d-flex justify-content-between align-items-center">
      {{$trash->Blog_title}}
      <div class="btn-group">
            <form method="post" action="/trash/restore/{{$trash->id}}">
            	@csrf
              <button type="submit" class="btn btn-success">Restore</button>
            </form>
            <form method="post" action="/trash/permeanantlyDelete/{{ $trash->id}}">
            	@csrf
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
      </div>
    </li>
  </ul>
  @endforeach
</div>
@endsection