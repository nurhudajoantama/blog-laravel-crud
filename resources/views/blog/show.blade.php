@extends('layouts.master')

@section('title', 'Blog - '. $blog->title)

@section('content')

<div class="mb-2">
    <h1>{{$blog->title}}</h1>
</div>

<div>
    <a href="{{url('blog', $blog->slug)}}">/blog/{{$blog->slug}}</a>
</div>

<div class="mt-5">
    <p>{{$blog->body}}</p>
</div>

@endsection