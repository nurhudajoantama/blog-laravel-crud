@extends('layouts.master')

@section('title', 'Blog Dashboard')

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
            <th scope="col">Slug</th>
            <th scope="col">Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($blogs as $blog)
        <tr>
            <th scope="row">1</th>
            <td>

                {{$blog->title}}

            </td>
            <td>
                <a href="{{route('blog.show', ['slug' => $blog->slug])}}" class="blog-title">
                    {{$blog->slug}}
                </a>
            </td>
            <td>
                <a href="{{route('blog.edit', ['slug' => $blog->slug])}}">
                    <button type="button" class="btn btn-success btn-sm">Edit</button>
                </a>

                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                    data-bs-target="#delete{{$blog->slug}}Modal">
                    Delete
                </button>

                <!-- Modal -->
                <div class="modal fade" id="delete{{$blog->slug}}Modal" tabindex="-1"
                    aria-labelledby="delete{{$blog->slug}}Modal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="delete{{$blog->slug}}Modal">Are You Sure Want To Delete ?
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure want to delete blog with title <strong>{{$blog->title}}</strong> ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancel</button>
                                <form action="{{route('blog.destroy', ['slug' => $blog->slug])}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Yes! Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection