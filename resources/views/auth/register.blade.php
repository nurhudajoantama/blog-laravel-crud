@extends('layouts.auth')

@section('title', 'Register')

@section('content')
<form>
    <a href="{{route('index')}}" class="blog-link">
        <h1 class="h3 mb-3 fw-normal">Blog CRUD</h1>
    </a>
    <h1 class="h3 mb-3 fw-normal">Register</h1>
    <div class="form-floating">
        <input type="text" name="name" class="form-control" id="floatingInput" placeholder="name">
        <label for="floatingInput">Nama</label>
    </div>
    <div class="form-floating">
        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
    </div>
    <div class="form-floating">
        <input type="password" name="retype_password" class="form-control" id="floatingRetypePassword"
            placeholder="Retype Password">
        <label for="floatingRetypePassword">Retype Password</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
    <div class="mt-2">
        <span>Already have an account? <a href="{{route('login')}}">Login</a></span>
    </div>
</form>
@endsection