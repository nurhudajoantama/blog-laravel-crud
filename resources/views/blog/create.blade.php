@extends('layouts.master')

@section('title', 'Create Blog')

@section('content')

<h1 class="mb-5">Create Blog</h1>

<form action="{{route('blog.store')}}" method="POST">
    @csrf
    <div class="form-group mb-3">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Title">
    </div>
    <div class="form-group mb-3">
        <label for="slug">Slug</label>
        <input type="text" class="form-control" id="slug" name="slug" placeholder="blog-slug">
    </div>
    <div class="form-group mb-3">
        <label for="body">Body</label>
        <textarea class="form-control" id="body" name="body" rows="5"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection