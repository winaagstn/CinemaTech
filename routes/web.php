<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\MovieDashboardController;
use App\Http\Controllers\TvDashboardController;
use App\Http\Controllers\GenreDashboardController;
use App\Http\Controllers\RatingDashboardController;


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
Route::get('/movie/{id}',[ MovieController::class,'movieDetail']);


Route::get('/dashboard/movie', [MovieDashboardController::class, 'index'])->name('movie.index');

Route::get('/dashboard/tv', [TvDashboardController::class, 'index'])->name('tv.index');

Route::get('/dashboard/genre', [GenreDashboardController::class, 'index'])->name('genre.index');

Route::get('/dashboard/rating', [RatingDashboardController::class, 'index'])->name('rating.index');

// create rating
Route::get('dashboard/genre/create', [GenreDashboardController::class, 'create'])->name('genre.create');

Route::post('dashboard/genre', [GenreDashboardController::class, 'store'])->name('genre.store');

// delete rating
Route::delete('/genre/{id}', [GenreDashboardController::class, 'delete'])->name('genre.delete');

// edit rating
Route::get('/genre/{id}/edit', [GenreDashboardController::class, 'edit'])->name('genre.edit');

Route::put('/genre/{id}', [GenreDashboardController::class, 'update'])->name('genre.update');

// show genre
Route::get('/genre/{id}', [GenreDashboardController::class, 'show'])->name('genre.show');


// create rating

Route::get('/dashboard/rating/create', [RatingDashboardController::class, 'create'])->name('rating.create');

Route::post('/dashboard/rating', [RatingDashboardController::class, 'store'])->name('rating.store');

// edit rating
Route::get('/rating/{id}/edit', [RatingDashboardController::class, 'edit'])->name('rating.edit');

Route::put('/rating/{id}', [RatingDashboardController::class, 'update'])->name('rating.update');

// delete rating
Route::delete('/rating/{id}', [RatingDashboardController::class, 'delete'])->name('rating.delete');

// show rating
Route::get('/rating/{id}', [RatingDashboardController::class, 'show'])->name('rating.show');


// Route::get('/dashboard/movie', function () {
//     $movies = movieDashboard::all();

//     return view('dashboard.movie.index', ['movie' => $movies]);
// });

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard.index');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
