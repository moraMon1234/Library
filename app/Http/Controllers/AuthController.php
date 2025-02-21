<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register', ['type' => 'register']);
    }

    public function handleRegister(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',  
            'email' => 'required|email|unique:users,email|max:255',  
            'password' => 'required|confirmed|min:6',
            'is_admin' => 'required|boolean',  
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $filename = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            if ($file->isValid()) {
                $filename = $file->store('images', 'public');
            } else {
                dd('File is not valid');
            }
        } else {
            dd('No file uploaded');
        }

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'is_admin' => $data['is_admin'],
            'type' => $data['is_admin'] ? 'admin' : 'guest',  
            'image' => $filename, 
        ]);

        Auth::login($user);

        return redirect("/welcome");
    }

    public function login()
    {
        return view('auth.login', ['type' => 'login']);
    }

    public function handlelogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect("/welcome");
        }

        return back()->withErrors([
            'alert' => 'The Email or Password is incorrect',
        ]);
    }
}
