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
        $request->validate([
            'name'=>['required','string'],
            'email'=>['required','string'],
            'password'=>['required','confirmed', 'min:3'],
        ]);

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return back()->with('success', 'Register Successfully');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $credetials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $data = $request->all();

        if(Auth::attempt($credetials)){
            if(isset($data['remember'])&&!empty($data['remember'])){
                setcookie('email',$data['email'], time()+2592000);
                setcookie('password',$data['password'], time()+2592000);
            } else {
                setcookie('email','');
                setcookie('password','');
            }

            return redirect('/home');
        }
        return back()->with('error', 'Incorrect email or password');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
