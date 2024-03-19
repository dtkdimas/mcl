<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class YearController extends Controller
{
    public function index()
    {
        return view('home.year', [
            'year' => Year::latest()->get()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'year' => [
                'required',
                'min:4',
                Rule::unique('years')->ignore($request->id),
            ],
        ], [
            'year.unique' => 'Year has been used, please insert another year.',
        ]);
    
        // Tambahkan tahun
        Year::create($data);
    
        return back()->with('success', 'Year added successfully!');
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'year' => [
                'required',
                'min:4',
                Rule::unique('years')->ignore($id),
            ],
        ], [
            'year.unique' => 'Year has been used, please insert another year.',
        ]);
    
        // Update year
        Year::find($id)->update($data);
    
        return back()->with('success', 'Year updated successfully!');
    }

    public function destroy(string $id)
    {
        $year = Year::findOrFail($id);

        // Periksa apakah ada category yang terkait dengan year ini
        $categoryTerkait = category::where('year_id', $year->id)->exists();

        if ($categoryTerkait) {
        // Jika ada category yang terkait, berikan pesan kesalahan
            return back()->with('error', 'Cannot delete this year because there is an associated category.');
        }

        // Jika tidak ada category yang terkait, hapus year
        $year->delete();

        return back()->with('success', 'Year deleted successfully!');
    }
}
