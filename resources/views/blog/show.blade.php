@extends('layouts.master')

@section('title', 'Blog - '. $blog->title)

@section('content')

<div class="mb-3">
    <h1>{{$blog->title}}</h1>
</div>

<div class="mb-2">
    <a href="{{url('blog', $blog->slug)}}">/blog/{{$blog->slug}}</a>
</div>

<div>
    <p>
        Dibuat oleh <strong>{{$blog->user->name}}</strong>
    </p>
    <p>
        Terakhir diperbarui pada
        <strong>{{$blog->updated_at->format('d M Y')}}</strong>
    </p>
</div>

<div class="mt-5">
    <p>{{$blog->body}}</p>
</div>

@endsection