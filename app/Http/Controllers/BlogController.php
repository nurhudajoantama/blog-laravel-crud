<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

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

    function create()
    {
        return view('blog.create');
    }

    function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'slug' => 'required|unique:blogs|min:3',
            'body' => 'required|min:3',
        ]);
        $request->merge(['slug' => Str::slug($request->slug)]);
        Blog::create($request->all());
        return redirect()->route('blog.index');
    }

    function edit($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        return view('blog.edit', compact('blog'));
    }

    function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required|min:3',
            // 'slug' => 'required|min:3',
            'body' => 'required|min:3',
        ]);
        $data = $request->except(['_token', '_method', 'slug']);
        Blog::where('slug', $slug)->update($data);
        return redirect()->route('blog.edit', [
            'slug' => $slug
        ])->with('success', 'Blog updated successfully');
    }

    function destroy($slug)
    {
        Blog::where('slug', $slug)->delete();
        return redirect()->route('blog.index');
    }
}
