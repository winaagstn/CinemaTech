<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RatingDashboardController extends Controller
{
    public function index()
    {
        // $genre = genreDashboard::all();

        // return view('dashboard.genre.index', ['genre' => $genre]);
        return view('dashboard.rating.index'); 
    }
}
