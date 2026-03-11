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


