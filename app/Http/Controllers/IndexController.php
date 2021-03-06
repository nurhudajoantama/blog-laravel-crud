<?php

namespace App\Http\Controllers;

use App\Models\Blog;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('user')->latest()->take(4)->get();
        return view('index', compact('blogs'));
    }
}
