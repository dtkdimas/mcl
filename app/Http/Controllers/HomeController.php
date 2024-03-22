<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Year;
use App\Models\Category;
use App\Models\Component;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class HomeController extends Controller
{
    public function index()
    {
        $componentCount = Component::count();
        $categoryCount = Category::count();
        $yearCount = Year::count();
        $userCount = User::count();
        return view('home.dashboard',[
            'user' => $userCount,
            'year' => $yearCount,
            'category' => $categoryCount,
            'component' => $componentCount,
            'log' => Activity::orderBy('id', 'desc')->get(),
        ]);
    }
}
