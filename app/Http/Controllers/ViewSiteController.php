<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Models\Category;
use App\Models\Component;
use Illuminate\Http\Request;

class ViewSiteController extends Controller
{
    public function superAdminIndex()
    {
        $years = Year::with('categories.components')->orderBy('year', 'desc')->get();
        return view('super-admin.view-site.viewSite', compact('years'));
    }

    public function superAdminShow($year, $category, $id, $component)
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
        return view('super-admin.view-site.viewComponent', $data, compact('years'));
    }

    public function AdminIndex()
    {
        $years = Year::with('categories.components')->orderBy('year', 'desc')->get();
        return view('admin.view-site.viewSite', compact('years'));
    }

    public function AdminShow($year, $category, $id, $component)
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
        return view('admin.view-site.viewComponent', $data, compact('years'));
    }
}
