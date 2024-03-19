<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Models\Category;
use App\Models\Component;
use Illuminate\Http\Request;

class ComponentController extends Controller
{
    public function index()
    {
        $component = Component::with('year', 'category')
            ->latest()
            ->get();

        $years = Year::all();

        // Membuat array asosiatif untuk menyimpan kategori berdasarkan tahun
        $categoriesByYear = [];

        foreach ($years as $year) {
            $categoriesByYear[$year->id] = Category::where('year_id', $year->id)->get();
        }
        
        return view('home.component', [
            'component' => $component,
            'year' => $years,
            'category' => Category::all(),
            'categoriesByYear' => $categoriesByYear,
        ]);
    }

    public function getCategories(Request $request)
    {
        $year_id = $request->input('year_id');
        $categories = Category::where('year_id', $year_id)->get();

        $options = '<option value="" hidden>Choose</option>';
        foreach ($categories as $category) {
            $options .= '<option value="' . $category->id . '">' . $category->category . '</option>';
        }

        return $options;
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'year_id' => 'required',
            'category_id' => 'required',
            'component' => 'required',
            'iframe_src' => 'required',
        ]);

        // Memeriksa apakah ada component dengan kombinasi data yang sama
        $checking = Component::where('year_id', $data['year_id'])
            ->where('category_id', $data['category_id'])
            ->where('component', $data['component'])
            ->where('iframe_src', $data['iframe_src'])
            ->exists();

        // Jika ada component dengan nama yang sama dan category_id yang sama, kembalikan pesan kesalahan
        if ($checking) {
            return back()->withErrors(['component' => 'Component with the same year, category, component, and iframe source already exists.'])->withInput();
        }

        //tambahkan component
        Component::create($data);
    
        return back()->with('success', 'Component added successfully!');
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'year_id' => 'required',
            'category_id' => 'required',
            'component' => 'required',
            'iframe_src' => 'required',
        ]);

        // Memeriksa apakah ada component dengan kombinasi data yang sama
        $checking = Component::where('year_id', $data['year_id'])
            ->where('category_id', $data['category_id'])
            ->where('component', $data['component'])
            ->where('iframe_src', $data['iframe_src'])
            ->exists();

        // Jika ada component dengan nama yang sama dan category_id yang sama, kembalikan pesan kesalahan
        if ($checking) {
            return back()->withErrors(['component' => 'Component with the same year, category, component, and iframe source already exists.'])->withInput();
        }
    
        // Update kategori
        Component::find($id)->update($data);
    
        return back()->with('success', 'Component updated successfully!');
    }

    public function destroy(string $id)
    {
        Component::find($id)->delete();

        return back()->with('success', 'Component deleted successfully!');
    }
}
