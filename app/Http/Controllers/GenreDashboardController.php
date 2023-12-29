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

    public function create()
    {
        return view('dashboard.genre.create');
    }

 
    public function store(Request $request)
    {
        $request->validate([
            'GenreName' => 'required|max:255', 
  
        ]);

      
        genreDashboard::create([
            'GenreName' => $request->GenreName, 
   
        ]);

        return redirect()->route('genre.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
    $genre = genreDashboard::findOrFail($id);
        return view('dashboard.genre.show', ['genre' => $genre]);
    }

    public function delete($id)
    {
        $genre = genreDashboard::findOrFail($id);
        $genre->delete();

        return redirect()->route('genre.index')->with('success', 'Data berhasil terhapus');
    }

    public function edit($id)
    {
        $genre = genreDashboard::findOrFail($id);
        return view('dashboard.genre.edit', ['genre' => $genre]);
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'GenreName' => 'required|max:255',
        ]);

        $genre = genreDashboard::findOrFail($id);
        $genre->update([
            'GenreName' => $request->GenreName,
        ]);

        return redirect()->route('genre.index')->with('success', 'Data berhasil diperbarui');
    }
}

