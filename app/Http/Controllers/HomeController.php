<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Models\Category;
use App\Models\Component;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $componentCount = Component::count();
        $categoryCount = Category::count();
        $yearCount = Year::count();
        return view('home.dashboard',[
            'year' => $yearCount,
            'category' => $categoryCount,
            'component' => $componentCount
        ]);
    }
}
