<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonController;

// Route untuk halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Route untuk resource Pokemon
Route::resource('pokemon', PokemonController::class);
