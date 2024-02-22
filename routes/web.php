<?php

use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\filmController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\filmController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\reservationController;
use App\Http\Controllers\GoogleAuthController;
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

Route::get('auth/google' , [GoogleAuthController::class , 'redirect'])->name('google-auth');
Route::get('auth/google/call-back' , [GoogleAuthController::class, 'callbackGoogle']);
Route::get('index/film/{id}' , [filmController::class, 'showFilm']);

Route::middleware(['auth' , 'member'])->group(function () {
    Route::get('/' , [PagesController::class , 'index'])->name('member.index');
});

Route::middleware(['auth' , 'admin'])->group(function() {
    Route::get('/dashboard' , [AdminController::class , 'dashboard'])->name('dashboard');
    Route::get('/insertFilms', function () {
        return view('admin.insertFilms');
    });
    Route::get('/manageResev', function () {
        return view('admin.manageResev');
    });
    Route::get('/manageShemas', function () {
        return view('admin.manageShemas');
    });
    Route::get('/statistiqueFilms', function () {
        return view('admin.statistiqueFilms');
    });

    Route::post('/film/store', [AdminController::class, 'storeFilm'])->name('film.store');
});



Route::get('/index/film/{id}' , [filmController::class , 'showFilm'])->name('film.show');
Route::get('/dashboard' , [AdminController::class , 'showDashboard'])->name('dashboard.show');
Route::get('/index/film/{id}/reservation' , [reservationController::class , 'showReservation']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
