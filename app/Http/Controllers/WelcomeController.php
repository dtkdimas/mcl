<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Models\Category;
use App\Models\Component;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $years = Year::with('categories.components')->latest()->get();
        return view('welcome', compact('years'));
    }
}
