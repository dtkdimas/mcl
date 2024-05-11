<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function registerPost(Request $request)
    {
        try {
            $request->validate([
                'name'=>['required','string'],
                'email'=>['required','string','unique:users'],
                'password'=>['required','confirmed', 'min:3'],
            ]);
        
            $user = new User();
        
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
        
            $user->save();
        
            return back()->with('success', 'Register Successfully');
        } catch (ValidationException $e) {
            return back()->with('error', 'Email already exists');
        }
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $data = $request->all();

        if (Auth::attempt($credentials)) {
            // Check if the user is active
            if (Auth::user()->active === 1) {
                // Check if the user is an admin or super admin
                if (Auth::user()->role === 'admin') {
                    if (isset($data['remember']) && !empty($data['remember'])) {
                        setcookie('email', $data['email'], time() + 2592000);
                        setcookie('password', $data['password'], time() + 2592000);
                    } else {
                        setcookie('email', '');
                        setcookie('password', '');
                    }
                    return redirect()->route('admin.dashboard');
                } elseif (Auth::user()->role === 'super-admin') {
                    if (isset($data['remember']) && !empty($data['remember'])) {
                        setcookie('email', $data['email'], time() + 2592000);
                        setcookie('password', $data['password'], time() + 2592000);
                    } else {
                        setcookie('email', '');
                        setcookie('password', '');
                    }
                    return redirect()->route('super-admin.dashboard');
                }
            } else {
                Auth::logout();
                return back()->with('error', 'Account not active');
            }
        } else {
            return back()->with('error', 'Incorrect email or password');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
