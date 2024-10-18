<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    // Menampilkan daftar Pokemon
    public function index()
    {
        $pokemon = Pokemon::all();
        return view('pokemon.index', compact('pokemon'));
    }

    // Menampilkan form untuk menambah Pokemon
    public function create()
    {
        return view('pokemon.create');
    }

    // Menyimpan Pokemon baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:100',
            'primary_type' => 'required|string|max:50',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'hp' => 'required|integer',
            'attack' => 'required|integer',
            'defense' => 'required|integer',
            'is_legendary' => 'boolean',
            'photo' => 'nullable|image|max:2048',
        ]);

        // Menyimpan Pokemon baru
        Pokemon::create($request->all());

        return redirect()->route('pokemon.index')->with('success', 'Pokemon berhasil ditambahkan.');
    }

    // Menampilkan detail Pokemon
    public function show(Pokemon $pokemon)
    {
        return view('pokemon.show', compact('pokemon'));
    }

    // Menampilkan form untuk mengedit Pokemon
    public function edit(Pokemon $pokemon)
    {
        return view('pokemon.edit', compact('pokemon'));
    }

    // Memperbarui Pokemon
    public function update(Request $request, Pokemon $pokemon)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:100',
            'primary_type' => 'required|string|max:50',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'hp' => 'required|integer',
            'attack' => 'required|integer',
            'defense' => 'required|integer',
            'is_legendary' => 'boolean',
            'photo' => 'nullable|image|max:2048',
        ]);

        $pokemon->update($request->all());

        return redirect()->route('pokemon.index')->with('success', 'Pokemon berhasil diperbarui.');
    }

    // Menghapus Pokemon
    public function destroy(Pokemon $pokemon)
    {
        $pokemon->delete();

        return redirect()->route('pokemon.index')->with('success', 'Pokemon berhasil dihapus.');
    }
}
