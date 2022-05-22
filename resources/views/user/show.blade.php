@extends('layouts.master')

@section('title', 'Blog')

@section('content')
<h1 class="mb-5">User</h1>

<div>
    <h4>{{$user->name}}</h4>
    <p>{{$user->username}}</p>
</div>

<h3 class="mb-5">User Blog Post</h3>

<div class="row">
    @forelse ($blogs as $blog)
    <div class="col-md-4">
        <div class="card mb-3">
            @if ($blog->image)
            <img src="{{asset('storage/'.$blog->image)}}" class="card-img-top" alt="{{$blog->title}}">
            @endif
            <div class="card-body">
                <h5 class="card-title">{{$blog->title}}</h5>
                <p class="card-text">{!!Str::limit(strip_tags($blog->body, 35))!!}</p>
                <a href="{{route('blog.show', ['blog' => $blog->slug])}}" class="btn btn-primary">Read More</a>
            </div>
            <div class="card-footer text-muted">
                pada {{$blog->created_at->format('d M Y')}}
            </div>
        </div>
    </div>
    @empty
    <div>
        <h3 class="text-center">No Blog Post</h3>
    </div>
    @endforelse
</div>

{{ $blogs->links() }}

@endsection