<?php

use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\FacebookAuthController;
use App\Http\Controllers\filmController;

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

Route::get('auth/facebook' , [FacebookAuthController::class , 'redirect'])->name('facebook-auth');
Route::get('auth/facebook/call-back' , [FacebookAuthController::class, 'callbackFacebook']);



Route::middleware(['auth' , 'member'])->group(function () {
    Route::get('/' , [PagesController::class , 'index'])->name('member.index');
});


Route::middleware(['auth' , 'admin'])->group(function() {
    Route::get('/dashboard' , [PagesController::class , 'dashboard'])->name('dashboard');
});



Route::get('/index/film/{id}' , [filmController::class , 'showFilm'])->name('film.show');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
