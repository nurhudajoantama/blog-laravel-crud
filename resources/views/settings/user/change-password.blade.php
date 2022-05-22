@extends('layouts.settings')

@section('title', 'User Settings')

@section('settings')
<h1 class="mb-3">User Settings</h1>

@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block" role="alert">
    {{ $message }}
</div>
@endif

@if ($message = Session::get('success'))
<div class="alert alert-success alert-block" role="alert">
    {{ $message }}
</div>
@endif

<div>
    <form action="{{route('settings.user.change-password.post')}}" method="POST">
        @csrf

        <div class="form-group mb-4">
            <label for="password">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                name="password" placeholder="password">
            @error('password')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="new-password">New Password</label>
            <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror"
                id="new-password" placeholder="New Password">
            @error('new_password')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="retype-new-password">Retype New Password</label>
            <input type="password" name="new_password_confirmation"
                class="form-control @error('new_password_confirmation') is-invalid @enderror" id="retype-new-password"
                placeholder="Retype New Password">
            @error('new_password_confirmation')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Change</button>
    </form>
</div>

@endsection