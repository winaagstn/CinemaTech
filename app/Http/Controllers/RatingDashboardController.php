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
}
