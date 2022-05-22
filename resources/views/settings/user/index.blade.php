@extends('layouts.settings')

@section('title', 'User Settings')

@section('settings')
<h1 class="mb-3">User Settings</h1>

@if ($message = Session::get('success'))
<div class="alert alert-success alert-block" role="alert">
    {{ $message }}
</div>
@endif

<div>
    <form action="{{route('settings.user.post')}}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                placeholder="Name" value="{{old('name', $user->name)}}">
            @error('name')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                placeholder="Email" value="{{old('email', $user->email)}}">
            @error('email')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>

@endsection