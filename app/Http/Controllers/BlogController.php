<?php

namespace App\Http\Controllers;

use App\Models\Blog;


class BlogController extends Controller
{
    function index()
    {
        $blogs = Blog::orderBy('updated_at', 'desc')->paginate(20);
        return view('blog.index', compact('blogs'));
    }

    function show($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        return view('blog.show', compact('blog'));
    }
}
