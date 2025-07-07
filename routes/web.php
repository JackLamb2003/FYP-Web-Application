<?php

use App\Http\Controllers\DriverController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TrackController;
use Illuminate\Support\Facades\Route;


Route::get('/drivers', [DriverController::class, 'index']);
Route::get('/drivers/create', [DriverController::class, 'create'])->middleware(['auth', 'can:admin']);
Route::get('/drivers/home', [DriverController::class, 'home']);
Route::post('/drivers', [DriverController::class, 'store'])->middleware(['auth', 'can:admin']);
Route::get('/drivers/search', [DriverController::class, 'search'])->name('look');
Route::get('/drivers/{id}', [DriverController::class, 'show']);
Route::get('/drivers/{id}/edit', [DriverController::class, 'edit'])->middleware(['auth', 'can:admin']);
Route::patch('/drivers', [DriverController::class, 'update'])->middleware(['auth', 'can:admin']);
Route::delete('/drivers', [DriverController::class, 'destroy'])->name('remove')->middleware(['auth', 'can:admin']);
Route::post('/drivers/{driver}/choice', [DriverController::class, 'storeChoice'])->name('driver.choice');

Route::get('/login', [LoginController::class, 'index'])->name("login");
Route::get('/registration', [LoginController::class, 'registration']);
Route::post('/registration', [LoginController::class, 'store_registration']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/password', [LoginController::class, 'password_reset']);
Route::post('/password', [LoginController::class, 'update_password']);
Route::get('/profile', [LoginController::class, 'profile'])->middleware('auth')->name('profile');

Route::get('/tracks', [TrackController::class, 'index']);
Route::get('/tracks/longbeach', [TrackController::class, 'longbeach'])->name('tracks.longbeach');
Route::get('/tracks/atlanta', [TrackController::class, 'atlanta'])->name('tracks.atlanta');
Route::get('/tracks/orlando', [TrackController::class, 'orlando'])->name('tracks.orlando');
Route::get('/tracks/englishtown', [TrackController::class, 'englishtown'])->name('tracks.englishtown');
Route::get('/tracks/stlouis', [TrackController::class, 'stlouis'])->name('tracks.stlouis');
Route::get('/tracks/seattle', [TrackController::class, 'seattle'])->name('tracks.seattle');
Route::get('/tracks/grantsville', [TrackController::class, 'grantsville'])->name('tracks.grantsville');
Route::get('/tracks/irwindale', [TrackController::class, 'irwindale'])->name('tracks.irwindale');
Route::post('/track/{track}/favorite', [TrackController::class, 'favoriteTrack'])->name('favorite.track');
Route::post('/tracks/{trackId}/comments', [TrackController::class, 'storeComment'])->name('comments.store');
Route::get('/predictions', [TrackController::class, 'predictions'])->name('predictions');