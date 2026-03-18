<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\AdherentController;

Route::get('/', function () {
    return view('app');
});

// simple routes for the menu links
Route::view('/rgpd', 'rgpd')->name('rgpd');

// adherents (CRUD)
Route::resource('adherents', AdherentController::class);

=======

Route::get('/', function () {
    return view('login');
});
>>>>>>> 08478081df2ad587f0c3b9bd39c591f716992fca
