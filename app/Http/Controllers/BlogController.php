<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    function index(Request $request)
    {
        $search = $request->get('search');
        $blogs = Blog::where('title', 'like', '%' . $search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(20)
            ->appends($request->query());
        return view('blog.index', compact('blogs'));
    }

    function show($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        return view('blog.show', compact('blog'));
    }
}
