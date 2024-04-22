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
        $years = Year::with('categories.components')->orderBy('year', 'desc')->get();
        return view('welcome', compact('years'));
    }

    public function show($year, $category, $id, $component)
    {
        $years = Year::with('categories.components')->orderBy('year', 'desc')->get();

        // Mendapatkan data komponen berdasarkan ID
        $component = Component::findOrFail($id);

        // Menyiapkan data yang akan dikirim ke view
        $data = [
            'componentId' => $component->id,
            'yearId' => $component->year_id,
            'categoryId' => $component->category_id,
            'componentName' => $component->component,
            'note' => $component->note,
            'iframe_src' => $component->iframe_src,
        ];

        // Memuat view dengan data yang disiapkan
        return view('viewComponent', $data, compact('years'));
    }
}
