@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<form action="{{route('login.post')}}" method="POST">
    @csrf

    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block" role="alert">
        {{ $message }}
    </div>
    @endif

    <a href="{{route('index')}}" class="blog-link">
        <h1 class="h3 mb-3 fw-normal">Blog CRUD</h1>
    </a>
    <h1 class="h3 mb-3 fw-normal">Login</h1>
    <div class="form-floating">
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput"
            placeholder="name@example.com" value="{{old('email')}}">
        <label for="floatingInput">Email address</label>
        @error('email')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    <div class="form-floating">
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
            id="floatingPassword" placeholder="Password" value="{{old('password')}}">
        <label for="floatingPassword">Password</label>
        @error('password')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
    <div class="mt-2">
        <span>Don't have an account? <a href="{{route('register')}}">Register</a></span>
    </div>
</form>
@endsection