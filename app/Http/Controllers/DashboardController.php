<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function indexBlog()
    {
        $blogs = Blog::orderBy('updated_at', 'desc')->paginate(20);
        return view('dashboard.blog.index', compact('blogs'));
    }

    public function showBlog($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        return view('dashboard.blog.show', compact('blog'));
    }

    public function createBlog()
    {
        return view('dashboard.blog.create');
    }

    public function storeBlog(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'slug' => 'required|unique:blogs|min:3',
            'body' => 'required|min:3',
        ]);
        Blog::create($request->all());
        return redirect()->route('dashboard.blog.index');
    }

    public function editBlog($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        return view('dashboard.blog.edit', compact('blog'));
    }

    public function updateBlog(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required|min:3',
            // 'slug' => 'required|min:3',
            'body' => 'required|min:3',
        ]);
        $data = $request->except(['_token', '_method', 'slug']);
        Blog::where('slug', $slug)->update($data);
        return redirect()->route('dashboard.blog.edit', [
            'slug' => $slug
        ])->with('success', 'Blog updated successfully');
    }

    public function destroyBlog($slug)
    {
        Blog::where('slug', $slug)->delete();
        return redirect()->route('dashboard.blog.index');
    }
}
