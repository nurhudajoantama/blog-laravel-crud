@extends('layouts.master')

@section('head')
<!-- TRIX EDITOR -->
<link rel="stylesheet" href="{{URL::asset('css/trix.css')}}">
<script src="{{URL::asset('js/trix.js')}}"></script>

<style>
    trix-toolbar [data-trix-button-group="file-tools"] {
        display: none;
    }
</style>
@endsection

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

<script>
    document.addEventListener('trix-file-accept', function(event) {
        e.preventDefault();
    });
</script>

@endsection