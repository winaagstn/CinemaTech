<?php

namespace App\Http\Controllers;
use App\Models\ratingsDashboard;
use Illuminate\Http\Request;

class RatingDashboardController extends Controller
{
    public function index()
    {
        $ratings = ratingsDashboard::all();

        return view('dashboard.rating.index', ['ratings' => $ratings]);
        // return view('dashboard.rating.index'); 
    }

    public function create()
    {
        return view('dashboard.rating.create');
    }

 
    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required|max:255', 
  
        ]);

      
        ratingsDashboard::create([
            'rating' => $request->rating, 
   
        ]);

        return redirect()->route('rating.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $ratings = ratingsDashboard::findOrFail($id);
        return view('dashboard.rating.edit', ['ratings' => $ratings]);
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|max:255',
        ]);

        $ratings = ratingsDashboard::findOrFail($id);
        $ratings->update([
            'rating' => $request->rating,
        ]);

        return redirect()->route('rating.index')->with('success', 'Data berhasil diperbarui');
    }

    public function delete($id)
    {
        $ratings = ratingsDashboard::findOrFail($id);
        $ratings->delete();

        return redirect()->route('rating.index')->with('success', 'Data berhasil terhapus');
    }
}
