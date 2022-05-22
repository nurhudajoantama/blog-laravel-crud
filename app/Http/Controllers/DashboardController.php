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

    public function indexBlog(Request $request)
    {
        $search = $request->get('search');
        $blogs = Blog::where('title', 'like', '%' . $search . '%')
            ->where('user_id', auth()->user()->id)
            ->latest()
            ->paginate(20)
            ->appends($request->query());
        return view('dashboard.blog.index', compact('blogs'));
    }

    public function createBlog()
    {
        return view('dashboard.blog.create');
    }

    public function storeBlog(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|min:3',
            'slug' => 'required|unique:blogs|min:3',
            'body' => 'required|min:3',
        ]);
        $data['user_id'] = auth()->id();
        Blog::create($data);
        return redirect()->route('dashboard.blog.index');
    }

    public function editBlog(Blog $blog)
    {
        return view('dashboard.blog.edit', compact('blog'));
    }

    public function updateBlog(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|min:3',
            // 'slug' => 'required|min:3',
            'body' => 'required|min:3',
        ]);
        $data = $request->except(['_token', '_method', 'slug']);
        $blog->update($data);
        return redirect()->back()->with('success', 'Blog updated successfully');
    }

    public function destroyBlog(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('dashboard.blog.index');
    }
}
