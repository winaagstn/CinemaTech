<?php

namespace App\Http\Controllers;
use App\Models\genre;
use Illuminate\Http\Request;

class GenreDashboardController extends Controller
{
    public function index()
    {
        $genre = genre::all();
        return view('dashboard.genre.index', ['genre' => $genre]);
        // return view('dashboard.genre.index'); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.genre.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:genres,name', 
        ]);

        Genre::create([
            'name' => $request->name,
        ]);

        return redirect()->route('genre.index')->with('success', 'Genre berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(genre $genre)
    {
       
    }
    public function edit($id)
    {
        $genre = genre::findOrFail($id); 
        return view('dashboard.genre.edit', ['genre' => $genre]); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $genre = genre::findOrFail($id); 
        $genre->update([
            'name' => $request->name,
        ]);

        return redirect()->route('genre.index')->with('success', 'Genre berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $genre = genre::findOrFail($id); // Temukan genre berdasarkan ID
        $genre->delete(); // Hapus data genre dari database

        return redirect()->route('genre.index')->with('success', 'Genre berhasil dihapus!');
    }
}

