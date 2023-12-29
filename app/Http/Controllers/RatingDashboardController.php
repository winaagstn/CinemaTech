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
}
