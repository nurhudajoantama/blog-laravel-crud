<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function userSetting()
    {
        $user = auth()->user();
        return view('settings.user.index', compact('user'));
    }

    public function userSettingPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
        ]);

        $user = auth()->user();

        $user->name = $request->name;
        $user->email = $request->email;

        User::where('id', $user->id)->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return redirect()->back()->with('success', 'User updated successfully');
    }

    public function userChangePassword()
    {
        return view('settings.user.change-password');
    }


    public function userChangePasswordPost(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'new_password' => 'required|min:6',
            'new_password_confirmation' => 'required|same:new_password',
        ]);

        $user = auth()->user();

        if (Hash::check($request->password, $user->password)) {
            $user->password = bcrypt($request->new_password);
            User::where('id', $user->id)->update([
                'password' => bcrypt($request->new_password)
            ]);
            return redirect()->back()->with('success', 'Password changed successfully');
        } else {
            return redirect()->back()->with('error', 'Old password is incorrect');
        }

        $user->password = bcrypt($request->password);
    }
}
