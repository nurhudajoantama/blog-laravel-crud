@extends('layouts.dashboard')

@section('title', 'Blog Dashboard')

@section('dashboard')
<div class="row mt-5">
    <div class="col-md-6">
        <a href="{{route('dashboard.blog.index')}}" style="text-decoration:none;">
            <div class="card text-bg-primary mb-3">
                <div class="card-body">
                    <h1 class="card-title">Blog List</h1>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-6">
        <a href="{{route('dashboard.blog.create')}}" style="text-decoration:none;">
            <div class="card text-bg-success mb-3">
                <div class="card-body">
                    <h1 class="card-title">Create</h1>
                </div>
            </div>
        </a>
    </div>
    @endsection