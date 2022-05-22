<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    function index(Request $request)
    {
        $search = $request->get('search');
        $blogs = Blog::with('user')
            ->where('title', 'like', '%' . $search . '%')
            ->orWhereHas('user', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->latest()
            ->paginate(20)
            ->appends($request->query());
        return view('blog.index', compact('blogs'));
    }

    function show(Blog $blog)
    {
        $blog = $blog->load('user');
        return view('blog.show', compact('blog'));
    }
}
