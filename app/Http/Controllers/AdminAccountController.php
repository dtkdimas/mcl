<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminAccountController extends Controller
{
    public function index()
    {
        return view('super-admin.admin', [
            'admin' => User::latest()->get()
        ]);
    }
}
