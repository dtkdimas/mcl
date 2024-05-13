<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class PasswordController extends Controller
{
    public function index(){
        return view('auth.forgotPassword');
    }

    public function forgotPassword(Request $request){
        $request->validate(['email' => 'required|email|exists:users,email']);

        $email = $request->email;
        $token = Str::random(64);

        if (!DB::table('password_reset_tokens')->where('email', $email)->exists()) {
            DB::table('password_reset_tokens')->insert([
                    'email' => $email,
                    'token' => $token,
                    'created_at' => Carbon::now()
            ]);
        } else {
            return back()->with('error', 'Token already exists');
        }

        Mail::send('emails.resetPassword', ['token' => $token], function ($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('success', 'We have send to your email');
    }

    public function resetPasswordIndex($token)
    {
        $user = DB::table('password_reset_tokens')->where('token', $token)->first();
        if (!$user) {
            return redirect()->to(route('password.email'))->with('error', 'Invalid');
        }
        return view('auth.resetPassword', compact('token', 'user'));
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            // 'email' => $request->email,
            'password' => 'required|min:3|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_reset_tokens')->where([
            'email' => $request->email,
            'token' => $request->token
        ])->first();

        if(!$updatePassword){
            return redirect()->to(route('password.email'))->with('error', 'Invalid');
        }

        User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_reset_tokens')->where(['email' => $request->email])->delete();

        return redirect()->to(route('login'))->with('success', 'Password reset success');
    }
}
