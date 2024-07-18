<?php
// app/Http/Controllers/QuadroController.php

namespace App\Http\Controllers;

use App\Models\Quadro;
use App\Models\Artista;
use Illuminate\Http\Request;

class QuadroController extends Controller
{
    public function index()
    {
        $quadros = Quadro::with('artista')->get();
        return view('quadros.index', compact('quadros'));
    }

    public function create()
    {
        $artisti = Artista::all();
        return view('quadros.create', compact('artisti'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titolo' => 'required',
            'anno' => 'required|integer',
            'genere' => 'required',
            'artista_id' => 'required|exists:artisti,id',
        ]);

        Quadro::create($request->all());

        return redirect()->route('quadros.index')->with('success', 'Quadro creato con successo.');
    }

    public function show(Quadro $quadro)
    {
        return view('quadros.show', compact('quadro'));
    }

    public function edit(Quadro $quadro)
    {
        $artisti = Artista::all();
        return view('quadros.edit', compact('quadro', 'artisti'));
    }

    public function update(Request $request, Quadro $quadro)
    {
        $request->validate([
            'titolo' => 'required',
            'anno' => 'required|integer',
            'genere' => 'required',
            'artista_id' => 'required|exists:artisti,id',
        ]);

        $quadro->update($request->all());

        return redirect()->route('quadros.index')->with('success', 'Quadro aggiornato con successo.');
    }

    public function destroy(Quadro $quadro)
    {
        $quadro->delete();

        return redirect()->route('quadros.index')->with('success', 'Quadro eliminato con successo.');
    }
}
