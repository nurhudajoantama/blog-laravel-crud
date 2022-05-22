@extends('layouts.master')

@section('content')

<div class="mb-3">
    <a href="{{route('dashboard.index')}}">
        <h3 class="mb-2">Dashboard</h3>
    </a>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{route('dashboard.blog.index')}}">Blog List</a>
        </li>
    </ul>
</div>

@yield('dashboard')

@endsection