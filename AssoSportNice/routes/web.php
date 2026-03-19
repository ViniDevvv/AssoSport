<?php

use App\Http\Controllers\AdherentController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login.form');
});

Route::get('/login', [LoginController::class, 'show'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login.attempt');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::view('/rgpd', 'layouts.rgpd')->name('rgpd');

// CRUD Clubs (version explicite, plus facile a suivre en BTS)
Route::get('/clubs', [ClubController::class, 'index'])->name('clubs.index');
Route::get('/clubs/create', [ClubController::class, 'create'])->name('clubs.create');
Route::post('/clubs', [ClubController::class, 'store'])->name('clubs.store');
Route::get('/clubs/{id}/edit', [ClubController::class, 'edit'])->name('clubs.edit');
Route::put('/clubs/{id}', [ClubController::class, 'update'])->name('clubs.update');
Route::delete('/clubs/{id}', [ClubController::class, 'destroy'])->name('clubs.destroy');

// CRUD Adherents
Route::resource('adherents', AdherentController::class)->except(['show']);
