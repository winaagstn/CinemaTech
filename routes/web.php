<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\MovieDashboardController;
use App\Http\Controllers\TvDashboardController;
use App\Http\Controllers\GenreDashboardController;
use App\Http\Controllers\RatingDashboardController;
use App\Models\movie;


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


Route::resource('/dashboard/genre', GenreDashboardController::class);

Route::resource('/dashboard/movie',MovieDashboardController::class );

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard.index');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
