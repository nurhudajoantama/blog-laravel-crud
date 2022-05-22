@extends('layouts.dashboard')

@section('title', 'Edit Blog')

@section('dashboard')
<h1 class="mb-5">Edit Blog</h1>

@if ($message = Session::get('success'))
<div class="alert alert-success alert-block" role="alert">
    {{ $message }}
</div>
@endif

<form action="{{route('dashboard.blog.update', ['blog' => $blog->slug])}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')

    <div class="form-group mb-3">
        <label for="title">Title</label>
        <input type="text" class="form-control  @error('title') is-invalid @enderror" id="title" name="title"
            placeholder="Title" value="{{old('title', $blog->title)}}">
        @error('title')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="slug">Slug</label>
        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
            placeholder="blog-slug" value="{{$blog->slug}}">
        @error('slug')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="uploadImage" class="form-label">Upload Image</label>
        <img class="img-preview img-fluid mb-1 col-sm-5" @if($blog->image)
        src="{{asset('storage/'.$blog->image)}}"
        style="display: block;"
        @endif
        />
        <input class="form-control @error('image') is-invalid @enderror" id="image" type="file" id="uploadImage"
            name="image" onchange="previewImage()">
        @error('image')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="body">Body</label>
        <input id="body" type="hidden" class="@error('body') is-invalid @enderror" name="body" value="{{old('body',
        $blog->body)}}">
        <trix-editor input="body"></trix-editor>
        @error('body')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    <div class="mb-4">
        <div>
            dibuat pada
            <strong>{{$blog->created_at->format('d M Y')}}</strong>
        </div>
        <div>
            terakhir diperbarui pada
            <strong>{{$blog->updated_at->format('d M Y')}}</strong>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection