@extends('layouts.master')

@section('title', 'Blog')

@section('content')
<style>
    .blog-title {
        text-decoration: none;
    }

    .blog-title:hover {
        text-decoration: underline;
    }
</style>

<h1 class="mb-5">Blog Post</h1>

<div class="mb-3">
    <a href="{{route('blog.create')}}" class="btn btn-primary">Create</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Title</th>
            <th scope="col">Action</th>
        </tr>
    </thead>

    @foreach ($blogs as $blog)
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td>
                <a href="{{url('blog', $blog->slug)}}" class="blog-title">
                    {{$blog->title}}
                </a>
            </td>
            <td>
                <button type="button" class="btn btn-success btn-sm">Edit</button>
                <button type="button" class="btn btn-danger btn-sm">Delete</button>
            </td>
        </tr>
    </tbody>
    @endforeach
</table>


@endsection