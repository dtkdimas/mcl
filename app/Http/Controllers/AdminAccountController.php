<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminAccountController extends Controller
{
    public function index()
    {
        return view('super-admin.admin', [
            'admin' => User::latest()->get()
        ]);
    }

    public function store(Request $request)
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

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'role'=>['required','string'],
            'active'=>['required','boolean'],
        ]);

        $user = User::find($id);
        $user->role = $data['role'];
        $user->active = $data['active'];
        $user->save();

        return back()->with('success', 'Admin account updated successfully!');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back()->with('success', 'Account deleted successfully!');
    }
}
