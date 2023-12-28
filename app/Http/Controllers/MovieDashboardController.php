<?php

namespace App\Http\Controllers;
use App\Models\movieDashboard;

use Illuminate\Http\Request;

class MovieDashboardController extends Controller
{
    public function index()
    {
        // $movies = movieDashboard::all();

        // return view('dashboard.movie.index', ['movie' => $movies]);
        return view('dashboard.movie.index'); 
    }
}
