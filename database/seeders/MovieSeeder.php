<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\movie;
use App\Models\genre;

class MovieSeeder extends Seeder
{
    /**
     * 
     * Run the database seeds.
     */
    public function run(): void
    {
        $apiKey = '7783b7f2f58ce2aaac4f01b6f40fcf9d';
        $genreUrl = 'https://api.themoviedb.org/3/genre/movie/list';
        $movieUrl = 'https://api.themoviedb.org/3/discover/movie';
    
        // Ambil daftar genre dari API TMDb
        $genreResponse = Http::get($genreUrl, [
            'api_key' => $apiKey,
        ]);
    
        if ($genreResponse->successful()) {
            $genreData = $genreResponse->json()['genres'];
    
            // Simpan data genre ke dalam tabel 'genres'
            foreach ($genreData as $genre) {
                Genre::updateOrCreate(
                    ['id' => $genre['id']],
                    ['name' => $genre['name']]
                );
            }
        } else {
            // Handle error jika request gagal
            echo "Error: " . $genreResponse->status() . " - " . $genreResponse->body();
        }
    
        // Ambil daftar film dari API TMDb
        $movieResponse = Http::get($movieUrl, [
            'api_key' => $apiKey,
        ]);
    
        if ($movieResponse->successful()) {
            $movieData = $movieResponse->json()['results'];
    
            // Simpan data film ke dalam tabel 'movies'
            foreach ($movieData as $movie) {
                Movie::updateOrCreate(
                    ['id' => $movie['id']],
                    [
                        'genre_id' => $movie['genre_ids'][0] ?? null, // Ambil genre pertama atau kosongkan jika tidak ada
                        'poster_path' => $movie['poster_path'],
                        'title' => $movie['title'],
                        'overview' => $movie['overview'],
                        'release_date' => $movie['release_date']
                    ]
                );
            }
        } else {
            // Handle error jika request gagal
            echo "Error: " . $movieResponse->status() . " - " . $movieResponse->body();
        }
    }
    }

