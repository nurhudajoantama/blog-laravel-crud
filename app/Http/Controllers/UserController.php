<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user)
    {

        // $blogs = Blog::with('user')->whereHas('user', function ($query) use ($username) {
        //     $query->where('username', $username);
        // })->paginate(10);
        $blogs = $user->blogs()->paginate(10);
        return view('user.show', compact('user', 'blogs'));
    }
}
