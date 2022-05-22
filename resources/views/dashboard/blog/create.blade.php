@extends('layouts.dashboard')

@section('title', 'Create Blog')

@section('dashboard')
<h1 class="mb-5">Create Blog</h1>

<form action="{{route('dashboard.blog.store')}}" method="POST" enctype="multipart/form-data">
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
        <label for="uploadImage" class="form-label">Upload Image</label>
        <img class="img-preview img-fluid mb-1 col-sm-5" />
        <input class="form-control @error('image') is-invalid @enderror" id="image" type="file" id="uploadImage"
            name="image" onchange="previewImage()">
        @error('image')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="body">Body</label>
        <input id="body" type="hidden" class="@error('body') is-invalid @enderror" name="body" value="{{old('body')}}">
        <trix-editor input="body"></trix-editor>
        @error('body')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Create</button>
</form>

@endsection