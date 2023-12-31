<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TvShowController;
use App\Http\Controllers\ProfileController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',[ MovieController::class,'index']);
Route::get('/movies', [MovieController::class, 'movies'])->name('movies');
Route::get('/sort-movies', 'MovieController@sortMovies')->name('sort.movies');

Route::get('/search/movies', [MovieController::class, 'searchMovies'])->name('search.movies');

Route::get('/movie/{id}',[ MovieController::class,'movieDetail']);

Route::get('/tvshows', [TvShowController::class, 'tvshow'])->name('tvshow');
Route::get('/tvshow/{id}',[ TvShowController::class,'tvDetail']);



Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
