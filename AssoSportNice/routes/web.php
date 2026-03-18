<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdherentController;

Route::get('/', function () {
    return view('app');
});

// simple routes for the menu links
Route::view('/rgpd', 'rgpd')->name('rgpd');

// adherents (CRUD)
Route::resource('adherents', AdherentController::class);

