<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

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
        $request->merge(['slug' => Str::slug($request->slug)]);
        $data = $request->validate([
            'title' => 'required|min:3',
            'slug' => 'required|min:3|unique:blogs',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|file|max:2048',
            'body' => 'required|min:3',
        ]);
        if ($request->file('image')) {
            $data['image'] = $request->file('image')->store('blog-image', 'public');
        }
        $data['user_id'] = auth()->id();
        Blog::create($data);
        return redirect()->route('dashboard.blog.index');
    }

    public function editBlog(Blog $blog)
    {
        if (!Gate::allows('update-blog', $blog)) {
            abort(403);
        }
        return view('dashboard.blog.edit', compact('blog'));
    }

    public function updateBlog(Request $request, Blog $blog)
    {
        $request->merge(['slug' => Str::slug($request->slug)]);
        $request->validate([
            'title' => 'required|min:3',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|file|max:2048',
            'slug' => 'required|min:3|unique:blogs,slug,' . $blog->id,
            'body' => 'required|min:3',
        ]);
        $data = $request->except(['_token', '_method']);
        if ($request->file('image')) {
            if ($blog->image) {
                Storage::delete($blog->image);
            }
            $data['image'] =  $request->file('image')->store('blog-image', 'public');
        }
        $blog->update($data);
        return redirect()->route('dashboard.blog.edit', ['blog' => $blog])->with('success', 'Blog updated successfully');
    }

    public function destroyBlog(Blog $blog)
    {
        if ($blog->image) {
            Storage::delete($blog->image);
        }
        $blog->delete();
        return redirect()->route('dashboard.blog.index');
    }
}
