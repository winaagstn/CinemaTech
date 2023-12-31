<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TvDashboardController extends Controller
{
    public function index()
    {
        
        return view('dashboard.tv.index'); 
    }
}
