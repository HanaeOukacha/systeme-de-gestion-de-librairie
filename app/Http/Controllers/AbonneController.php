<?php

namespace App\Http\Controllers;

use App\Models\Abonne;
use Illuminate\Http\Request;

class AbonneController extends Controller
{
    public function index()
    {
        $abonnes = Abonne::all();

        return view('abonnes.index', compact('abonnes'));
    }
    public function create()
    {
        return view('abonnes.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Nom' => 'required|string',
            'Prenom' => 'required|string',
            'Email' => 'required|string',
            'NumeroTelephone' => 'required|string',

        ]);

        Abonne::create($validatedData);

        return redirect()->route('abonnes.index')->with('success', 'abonné ajouté avec succès');
    }
    public function edit($Id)
    {
        $abonne = Abonne::findOrFail($Id);

    return view('abonnes.edit', compact('abonne'));
    }


    public function update(Request $request, $Id)
{
    $validatedData = $request->validate([
        'Nom' => 'required|string',
        'Prenom' => 'required|string',
        'Email' => 'required|string',
        'NumeroTelephone' => 'required|string',
    ]);

    $abonne = Abonne::findOrFail($Id);
    $abonne->update($validatedData);

    return redirect()->route('abonnes.index')->with('success', 'Abonné mis à jour avec succès');
}
public function destroy($Id)
{
    $abonne = Abonne::findOrFail($Id);
    $abonne->delete();

    return redirect()->route('abonnes.index')->with('success', 'Abonné supprimé avec succès');
}
}
