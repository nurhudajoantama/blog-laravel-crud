@extends('layouts.master')

@section('title', 'Create Blog')

@section('content')

<h1 class="mb-5">Create Blog</h1>

<form action="{{route('dashboard.blog.store')}}" method="POST">
    @csrf
    <div class="form-group mb-3">
        <label for="title">Title</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
            placeholder="Title" value="{{old('title')}}">
        @error('title')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="slug">Slug</label>
        <input type="text" class="form-control  @error('slug') is-invalid @enderror" id="slug" name="slug"
            placeholder="blog-slug" value="{{old('slug')}}">
        @error('slug')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="body">Body</label>
        <textarea class="form-control  @error('body') is-invalid @enderror" id="body" name="body"
            rows="5">{{old('body')}}</textarea>
        @error('body')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection