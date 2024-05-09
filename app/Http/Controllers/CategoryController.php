<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Models\Category;
use App\Models\Component;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function adminIndex(Request $request)
    {
        $category = Category::with('year')
            ->latest()
            ->get();

        return view('admin.category', [
            'category' => $category,
            'year' => Year::all(),
        ]);
    }

    public function superAdminIndex(Request $request)
    {
        $category = Category::with('year')
            ->latest()
            ->get();

        return view('super-admin.category', [
            'category' => $category,
            'year' => Year::all(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'year_id' => 'required',
            'category' => 'required',
        ]);

        // Memeriksa apakah ada kategori dengan nama yang sama tetapi dengan year_id yang sama
        $checking = Category::where('category', $data['category'])->where('year_id', $data['year_id'])->exists();

        // Jika ada kategori dengan nama yang sama dan year_id yang sama, kembalikan pesan kesalahan
        if ($checking) {
            return back()->withErrors(['category' => 'Category with same name and year already exists.'])->withInput();
        }

        //tambahkan kategori
        Category::create($data);
    
        return back()->with('success', 'Category added successfully!');
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'year_id' => 'required',
            'category' => 'required',
        ]);

        // Memeriksa apakah ada kategori dengan nama yang sama tetapi dengan year_id yang sama
        $checking = Category::where('category', $data['category'])->where('year_id', $data['year_id'])->exists();

        // Jika ada kategori dengan nama yang sama dan year_id yang sama, kembalikan pesan kesalahan
        if ($checking) {
            return back()->withErrors(['category' => 'Category with same name and year already exists.'])->withInput();
        }
    
        // Update kategori
        Category::find($id)->update($data);
    
        return back()->with('success', 'Category updated successfully!');
    }

    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);

        // Periksa apakah ada component yang terkait dengan component ini
        $componentTerkait = component::where('category_id', $category->id)->exists();

        if ($componentTerkait) {
        // Jika ada component yang terkait, berikan pesan kesalahan
            return back()->with('error', 'Cannot delete this category because there is an associated component.');
        }

        // Jika tidak ada component yang terkait, hapus category
        $category->delete();

        return back()->with('success', 'Category deleted successfully!');
    }
}
