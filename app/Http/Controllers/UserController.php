<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($username)
    {
        $user = User::with('blogs')->where('username', $username)->firstOrFail();
        $blogs = $user->blogs()->orderBy('created_at', 'desc')->paginate(10);
        return view('user.show', compact('user', 'blogs'));
    }
}
