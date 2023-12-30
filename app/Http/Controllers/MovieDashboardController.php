<?php

namespace App\Http\Controllers;

use App\Models\movie;
use App\Models\genre;
use Illuminate\Http\Request;

class MovieDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movie = movie::all();
        return view('dashboard.movie.index', ['movie' => $movie]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.movie.create',[
            'genre' => genre::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'release_date' => 'required',
            'overview' => 'required',
            'genre_id' => 'required',
            'poster_path' => 'mimes:jpeg,png,jpg,gif|max:1024', 
        ]);

        $movie=[
            'title' => $request->title,
            'release_date' => $request->release_date,
            'overview' => $request->overview,
            'genre_id' => $request->genre_id,

        ];

        // cek gambar yg akan diupload
        if($request->hasFile('poster_path')) {
            $poster_file = $request->file('poster_path');
            $poster_nama = $poster_file->hashName();
            $poster_file->move(public_path('img'), $poster_nama);

            $movie['poster_path'] = $poster_nama;

        }
        movie::create($movie);
        return redirect()->route('movie.index')->with('success', 'Film berhasil ditambahkan!');
     
    }
   

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $movie = movie::findOrFail($id);
        return view('dashboard.movie.show', ['movie' => $movie]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $movie = movie::findOrFail($id);
        $genre = genre::all();

        return view('dashboard.movie.edit', ['movie' => $movie],['genre' => $genre]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);


        $movie->title = $request->title;
        $movie->release_date = $request->release_date;
        $movie->poster_path = $request->poster_path;
        $movie->overview = $request->overview;
        $movie->genre_id = $request->genre_id;

        $movie->save();

        return redirect()->route('movie.index')->with('success', 'Film berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $movie = movie::findOrFail($id);

        $movie->delete();

        return redirect()->route('movie.index')->with('success', 'Film berhasil dihapus!');
    }
}
