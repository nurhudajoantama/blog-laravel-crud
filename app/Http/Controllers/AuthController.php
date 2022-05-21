<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('dashboard');
        }

        return redirect()->back()->withErrors(['email' => 'Email or password is incorrect']);
    }

    public function register()
    {
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        $request->merge(['password' => bcrypt($request->password)]);
        User::create($request->all());
        return redirect()->route('register')->with('success', 'User created successfully');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('index');
    }
}
