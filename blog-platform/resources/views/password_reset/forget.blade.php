@extends('layouts.app')
@section('title')
    
@endsection

@section('content')
<div class="card text-center" style="width: 300px;">

    <div class="card-header h5 text-white bg-primary">Password Reset</div>
    <div class="card-body px-5">
        <p class="card-text py-2">
            Enter your email address and we'll send you an email with instructions to reset your password.
        </p>    
        @if(session()->has('success'))
        <div class="alert alert-danger" role="alert">
          {{ session()->get('success') }}
        </div>
        @endif
        <form method="POST" action="{{ route('forget.password.post') }}">
            @csrf <!-- CSRF token -->
            <div class="form-outline">
                <input type="email" id="typeEmail" class="form-control my-3" name="email">

                <span>
                    @error('email')
                        {{ $message}}
                    @enderror
                </span>
            </div>
            <button type="submit" class="btn btn-primary w-100">Reset password</button>
        </form>
        <div class="d-flex justify-content-between mt-4">
            <a class="" href="{{ route('login') }}">Login</a>
            <a class="" href="{{ route('register') }}">Register</a>
        </div>
    </div>
    </div>
    
    
@endsection