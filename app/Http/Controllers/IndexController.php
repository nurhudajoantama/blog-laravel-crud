<?php

namespace App\Http\Controllers;

use App\Models\Blog;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderBy('updated_at', 'desc')->paginate(20);
        return view('index', compact('blogs'));
    }
}
