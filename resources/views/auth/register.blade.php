@extends('layouts.auth')

@section('title', 'Register')

@section('content')
<form action="{{route('register.post')}}" method="POST">
    @csrf

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block" role="alert">
        {{ $message }}
    </div>
    @endif

    <a href="{{route('index')}}" class="blog-link">
        <h1 class="h3 mb-3 fw-normal">Blog CRUD</h1>
    </a>
    <h1 class="h3 mb-3 fw-normal">Register</h1>
    <div class="form-floating">
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="floatingInputName"
            placeholder="name" value="{{old('name')}}">
        <label for="floatingInputName">Nama</label>
        @error('name')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    <div class="form-floating">
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
            id="floatingInputEmail" placeholder="name@example.com" value="{{old('email')}}">
        <label for="floatingInputEmail">Email address</label>
        @error('email')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    <div class="form-floating">
        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
            id="floatingInputUsername" placeholder="username" value="{{old('username')}}">
        <label for="floatingInputUsername">Username</label>
        @error('username')
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
    <div class="form-floating">
        <input type="password" name="password_confirmation"
            class="form-control @error('password_confirmation') is-invalid @enderror" id="floatingRetypePassword"
            placeholder="Retype Password" value="{{old('password_confirmation')}}">
        <label for="floatingRetypePassword">Retype Password</label>
        @error('password_confirmation')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
    <div class="mt-2">
        <span>Already have an account? <a href="{{route('login')}}">Login</a></span>
    </div>
</form>
@endsection