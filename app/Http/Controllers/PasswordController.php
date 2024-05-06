<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PasswordResetToken;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\ResetPasswordMail;


class PasswordController extends Controller
{
    public function index(){
        return view('auth.forgotPassword');
    }

    public function forgotPassword(Request $request){
        $request->validate(['email' => 'required|email|exists:users,email']);
        
        $token = \Str::random(60);

        PasswordResetToken::updateOrCreate(
        [
            'email' => $request->email,
        ],
        [
            'email' => $request->email,
            'token' => $token,
            'created_at' => now(),
        ]);

        Mail::to($request->mail)->send(new ResetPasswordMail($token));

        return back()->with('success', 'We have send link to your email');
    }

    public function resetPasswordIndex(Request $request, $token)
    {
        $getToken = PasswordResetToken::where('token', $token)->first();

        if(!$getToken){
            return redirect()->route('login')->with('error', 'Token tidak valid');
        }

        return view('auth.resetPassword', compact('token'));
    }

    public function resetPassword(Request $request){
        $request->validate([
            'password' => 'required|min:3'
        ]);
        
        $token = PasswordResetToken::where('token', $request->token)->first();

        if(!$token){
            return redirect()->route('login')->with('error', 'Token tidak valid');
        }

        $user = User::where('email', $token->email)->first();

        if(!$user){
            return redirect()->route('login')->with('error', 'Email tidak terdaftar');
        }

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        $token->delete();

        return redirect()->route('login')->with('success', 'Password telah direset');
    }
}
