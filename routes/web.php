<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DisciplineController;

// redirection index discipline
Route::get('/', function () {
    return redirect()->route('disciplines.index');
});

// en detail comme dans le document
Route::get('/disciplines', [DisciplineController::class, 'index'])->name('disciplines.index');
Route::get('/disciplines/create', [DisciplineController::class, 'create'])->name('disciplines.create');
Route::post('/disciplines', [DisciplineController::class, 'store'])->name('disciplines.store');
Route::get('/disciplines/{discipline}', [DisciplineController::class, 'show'])->name('disciplines.show');
Route::get('/disciplines/{discipline}/edit', [DisciplineController::class, 'edit'])->name('disciplines.edit');
Route::put('/disciplines/{discipline}', [DisciplineController::class, 'update'])->name('disciplines.update');
Route::delete('/disciplines/{discipline}', [DisciplineController::class, 'destroy'])->name('disciplines.destroy');

// Competition CRUD routes
Route::get('/competitions', [\App\Http\Controllers\CompetitionController::class, 'index'])->name('competitions.index');
Route::get('/competitions/create', [\App\Http\Controllers\CompetitionController::class, 'create'])->name('competitions.create');
Route::post('/competitions', [\App\Http\Controllers\CompetitionController::class, 'store'])->name('competitions.store');
Route::get('/competitions/{competition}/edit', [\App\Http\Controllers\CompetitionController::class, 'edit'])->name('competitions.edit');
Route::put('/competitions/{competition}', [\App\Http\Controllers\CompetitionController::class, 'update'])->name('competitions.update');
Route::delete('/competitions/{competition}', [\App\Http\Controllers\CompetitionController::class, 'destroy'])->name('competitions.destroy');


