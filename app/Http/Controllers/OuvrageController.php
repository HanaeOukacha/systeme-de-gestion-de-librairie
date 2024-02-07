<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ouvrage;

class OuvrageController extends Controller
{
    public function index()
    {
        $ouvrages = Ouvrage::all();

        return view('ouvrages.index', compact('ouvrages'));
    }
    public function create()
    {
        return view('ouvrages.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Titre' => 'required|string',
            'Auteur' => 'required|string',
            'Editeur' => 'required|string',
            'Prix' => 'required|numeric',
            'AnneePublication' => 'required|string',
            'Statut' => 'required|string|in:disponible,non disponible',

        ]);

        Ouvrage::create($validatedData);

        return redirect()->route('ouvrages.index')->with('success', 'Ouvrage ajouté avec succès');
    }

    public function edit($Id)
    {
        $ouvrage = Ouvrage::findOrFail($Id);

    return view('ouvrages.edit', compact('ouvrage'));
    }


    public function update(Request $request, $Id)
{
    $validatedData = $request->validate([
        'Titre' => 'required|string',
        'Auteur' => 'required|string',
        'Editeur' => 'required|string',
        'Prix' => 'required|numeric',
        'AnneePublication' => 'required|string',
        'Statut' => 'required|string|in:disponible,non disponible',
    ]);

    $ouvrage = Ouvrage::findOrFail($Id);
    $ouvrage->update($validatedData);

    return redirect()->route('ouvrages.index')->with('success', 'Ouvrage mis à jour avec succès');
}
public function destroy($Id)
{
    $ouvrage = Ouvrage::findOrFail($Id);
    $ouvrage->delete();

    return redirect()->route('ouvrages.index')->with('success', 'Ouvrage supprimé avec succès');
}

}
