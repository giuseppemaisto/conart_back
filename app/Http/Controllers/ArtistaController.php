<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use App\Models\Quadro;
use Illuminate\Http\Request;

class ArtistaController extends Controller
{
    public function index()
    {
        $artisti = Artista::all();
        return view('artisti.index', compact('artisti'));
        return response()->json(Artista::all());
    }

  

    public function create()
    {
        return view('artisti.create');
    }

  public function store(Request $request)
{
    $request->validate([
        'nome' => 'required|string|max:255',
        'cognome' => 'required|string|max:255',
        'data_nascita' => 'required|date',
        'descrizione' => 'nullable|string',
        'quadri.*.titolo' => 'nullable|string|max:255',
        'quadri.*.anno' => 'nullable|integer',
        'quadri.*.genere' => 'nullable|string|max:255',
    ]);

    // Creare l'artista
    $artista = Artista::create($request->except('quadri'));

    // Associare i quadri all'artista
    foreach ($request->input('quadri', []) as $quadroData) {
        if (!empty($quadroData['titolo'])) { // Aggiungi solo se il titolo non è vuoto
            $artista->quadros()->create($quadroData);
        }
    }

    return redirect()->route('artisti.index')->with('success', 'Artista creato con successo.');
}
    public function show(Artista $artista)
    {
        return view('artisti.show', compact('artista'));
    }

    public function edit(Artista $artista)
    {
        return view('artisti.edit', compact('artista'));
    }

    public function update(Request $request, Artista $artista)
    {
        $request->validate([
            'nome' => 'required',
            'cognome' => 'required',
            'data_nascita' => 'required|date',
            'descrizione' => 'nullable|string',
            'quadri.*.titolo' => 'required',
            'quadri.*.anno' => 'required|integer',
            'quadri.*.genere' => 'required'
        ]);

        $artista->update($request->only(['nome', 'cognome', 'data_nascita', 'descrizione']));
        
        $artista->quadros()->delete();
        foreach ($request->quadri as $quadroData) {
            $artista->quadros()->create($quadroData);
        }

        return redirect()->route('artisti.index')->with('success', 'Artista aggiornato con successo.');
    }

    public function destroy(Artista $artista)
    {
        $artista->delete();
        return redirect()->route('artisti.index')->with('success', 'Artista eliminato con successo.');
    }
}


