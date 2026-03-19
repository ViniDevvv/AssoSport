<?php

use App\Http\Controllers\AdherentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\DisciplineController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('competitions.index');
});

Route::get('/login', [LoginController::class, 'show'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login.attempt');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::view('/rgpd', 'layouts.rgpd')->name('rgpd');

// Parcours visiteur : competitions publiques
Route::get('/competitions', [CompetitionController::class, 'index'])->name('competitions.index');
Route::get('/competitions/{id}', [CompetitionController::class, 'show'])->name('competitions.show');

Route::middleware(['session.auth', 'admin'])->group(function () {
    // Supervision plateforme
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // CRUD Clubs
    Route::get('/clubs', [ClubController::class, 'index'])->name('clubs.index');
    Route::get('/clubs/create', [ClubController::class, 'create'])->name('clubs.create');
    Route::post('/clubs', [ClubController::class, 'store'])->name('clubs.store');
    Route::get('/clubs/{id}/edit', [ClubController::class, 'edit'])->name('clubs.edit');
    Route::put('/clubs/{id}', [ClubController::class, 'update'])->name('clubs.update');
    Route::delete('/clubs/{id}', [ClubController::class, 'destroy'])->name('clubs.destroy');

    // CRUD Disciplines
    Route::get('/disciplines', [DisciplineController::class, 'index'])->name('disciplines.index');
    Route::get('/disciplines/create', [DisciplineController::class, 'create'])->name('disciplines.create');
    Route::post('/disciplines', [DisciplineController::class, 'store'])->name('disciplines.store');
    Route::get('/disciplines/{id}/edit', [DisciplineController::class, 'edit'])->name('disciplines.edit');
    Route::put('/disciplines/{id}', [DisciplineController::class, 'update'])->name('disciplines.update');
    Route::delete('/disciplines/{id}', [DisciplineController::class, 'destroy'])->name('disciplines.destroy');

    // Gestion utilisateurs (adherents)
    Route::resource('adherents', AdherentController::class)->except(['show']);
});
