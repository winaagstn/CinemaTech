<?php

namespace App\Http\Controllers;
use App\Models\movie;


use Illuminate\Http\Request;

class MovieDashboardController extends Controller
{
    public function index()
    {
        // $movie = movieDashboard::all();
        $movie = movie::with('genre:id,name')->get();
        return view('dashboard.movie.index', ['movie' => $movie]);
        // return view('dashboard.movie.index'); 

        
    }

    
}
