@extends('layouts.master')

@section('content')

<div class="mb-3">
    <h3 class="mb-2">Settings</h3>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{route('settings.user')}}">User</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('settings.user.change-password')}}">Change Password</a>
        </li>
    </ul>
</div>

@yield('settings')

@endsection