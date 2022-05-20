@extends('layouts.master')

@section('title', 'Create Blog')

@section('content')

<h1 class="mb-5">Create Blog</h1>

<form action="{{route('blog.update', ['slug' => $blog->slug])}}" method="POST">
    @csrf
    @method('put')

    <div class="form-group mb-3">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{$blog->title}}">
    </div>
    <div class="form-group mb-3">
        <label for="slug">Slug</label>
        <input type="text" class="form-control" id="slug" name="slug" placeholder="blog-slug" value="{{$blog->slug}}"
            disabled>
    </div>
    <div class="form-group mb-3">
        <label for="body">Body</label>
        <textarea class="form-control" id="body" name="body" rows="5">{{$blog->body}}</textarea>
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
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection