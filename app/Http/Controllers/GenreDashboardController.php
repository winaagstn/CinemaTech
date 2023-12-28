<?php

namespace App\Http\Controllers;
use App\Models\genreDashboard;
use Illuminate\Http\Request;

class GenreDashboardController extends Controller
{
    public function index()
    {
        $genre = genreDashboard::all();

        return view('dashboard.genre.index', ['genre' => $genre]);
        // return view('dashboard.genre.index'); 
    }
}
