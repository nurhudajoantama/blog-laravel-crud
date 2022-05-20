<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    function index()
    {
        $blogs = Blog::all();
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
            'title' => 'required',
            'slug' => 'required|unique:blogs',
            'body' => 'required',
        ]);

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
        ]);
    }

    function destroy($slug)
    {
        Blog::where('slug', $slug)->delete();
        return redirect()->route('blog.index');
    }
}
