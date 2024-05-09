<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Models\Category;
use App\Models\Component;
use Illuminate\Http\Request;

class ComponentController extends Controller
{
    public function adminIndex()
    {
        $component = Component::with('year', 'category')
            ->latest()
            ->get();
        
        return view('admin.component', compact('component'));
    }

    public function superAdminIndex()
    {
        $component = Component::with('year', 'category')
            ->latest()
            ->get();
        
        return view('super-admin.component', compact('component'));
    }

    public function category($id)
    {
        $data = Category::where('year_id', $id)
            ->where('category', 'LIKE', '%'.request('q').'%')
            ->paginate(10);
        
        return response()->json($data);
    }

    public function adminCreate()
    {
        $year = Year::all();
        return view('admin.components.create', compact('year'));
    }

    public function superAdminCreate()
    {
        $year = Year::all();
        return view('super-admin.components.create', compact('year'));
    }

    public function adminEdit($id)
    {
        $years = Year::all();
        $component = Component::findOrFail($id);

        // Membuat array asosiatif untuk menyimpan kategori berdasarkan tahun
        $categoriesByYear = [];

        foreach ($years as $year) {
            $categoriesByYear[$year->id] = Category::where('year_id', $year->id)->get();
        }

        return view('admin.components.edit', [
            'year' => $years,
            'component' => $component,
            'category' => Category::all(),
            'categoriesByYear' => $categoriesByYear,
        ]);
    }

    public function superAdminEdit($id)
    {
        $years = Year::all();
        $component = Component::findOrFail($id);

        // Membuat array asosiatif untuk menyimpan kategori berdasarkan tahun
        $categoriesByYear = [];

        foreach ($years as $year) {
            $categoriesByYear[$year->id] = Category::where('year_id', $year->id)->get();
        }

        return view('super-admin.components.edit', [
            'year' => $years,
            'component' => $component,
            'category' => Category::all(),
            'categoriesByYear' => $categoriesByYear,
        ]);
    }


    public function adminStore(Request $request)
    {
        $data = $request->validate([
            'year_id' => 'required',
            'category_id' => 'required',
            'component' => 'required',
            'iframe_src' => 'required',
            'note' => 'nullable', 
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
    
        return redirect()->route('admin.component')->with('success', 'Component added successfully!');
    }

    public function superAdminStore(Request $request)
    {
        $data = $request->validate([
            'year_id' => 'required',
            'category_id' => 'required',
            'component' => 'required',
            'iframe_src' => 'required',
            'note' => 'nullable', 
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
    
        return redirect()->route('super-admin.component')->with('success', 'Component added successfully!');
    }

    public function adminUpdate(Request $request, string $id)
    {
        $data = $request->validate([
            'year_id' => 'required',
            'category_id' => 'required',
            'component' => 'required',
            'iframe_src' => 'required',
            'note' => 'nullable', 
        ]);

        // Memeriksa apakah ada component dengan kombinasi data yang sama
        $checking = Component::where('year_id', $data['year_id'])
            ->where('category_id', $data['category_id'])
            ->where('component', $data['component'])
            ->where('iframe_src', $data['iframe_src'])
            ->where('note', $data['note'])
            ->exists();

        // Jika ada component dengan nama yang sama dan category_id yang sama, kembalikan pesan kesalahan
        if ($checking) {
            return back()->withErrors(['component' => 'Component with the same year, category, component, and iframe source already exists.'])->withInput();
        }
    
        // Update kategori
        Component::find($id)->update($data);
    
        return redirect()->route('admin.component')->with('success', 'Component updated successfully!');
    }

    public function superAdminUpdate(Request $request, string $id)
    {
        $data = $request->validate([
            'year_id' => 'required',
            'category_id' => 'required',
            'component' => 'required',
            'iframe_src' => 'required',
            'note' => 'nullable', 
        ]);

        // Memeriksa apakah ada component dengan kombinasi data yang sama
        $checking = Component::where('year_id', $data['year_id'])
            ->where('category_id', $data['category_id'])
            ->where('component', $data['component'])
            ->where('iframe_src', $data['iframe_src'])
            ->where('note', $data['note'])
            ->exists();

        // Jika ada component dengan nama yang sama dan category_id yang sama, kembalikan pesan kesalahan
        if ($checking) {
            return back()->withErrors(['component' => 'Component with the same year, category, component, and iframe source already exists.'])->withInput();
        }
    
        // Update kategori
        Component::find($id)->update($data);
    
        return redirect()->route('super-admin.component')->with('success', 'Component updated successfully!');
    }

    public function destroy(string $id)
    {
        Component::find($id)->delete();

        return back()->with('success', 'Component deleted successfully!');
    }
}
