<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonController;

// Route untuk halaman utama
route::get('/index', [PokemonController::class, 'index'])->name('pokemon.index');

// Route untuk resource Pokemon
Route::resource('pokemon', PokemonController::class);
