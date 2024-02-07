<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use Illuminate\Http\Request;

class AchatController extends Controller
{
    public function index()
    {
        $achats = Achat::all();

        return view('achats.index', compact('achats'));
    }
    public function create()
    {
        return view('achats.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'IdOuvrage' => 'required|numeric',
            'DateAchat' => 'required|date',
            'Quantite' => 'required|numeric',
            'CoutTotal' => 'required|numeric',

        ]);

        Achat::create($validatedData);

        return redirect()->route('achats.index')->with('success', 'achat ajouté avec succès');
    }
    public function edit($Id)
    {
        $achat = Achat::findOrFail($Id);

    return view('achats.edit', compact('achat'));
    }


    public function update(Request $request, $Id)
{
    $validatedData = $request->validate([
            'IdOuvrage' => 'required|numeric',
            'DateAchat' => 'required|date',
            'Quantite' => 'required|numeric',
            'CoutTotal' => 'required|numeric',
    ]);

    $achat = Achat::findOrFail($Id);
    $achat->update($validatedData);

    return redirect()->route('achats.index')->with('success', 'Achat mis à jour avec succès');
}
public function destroy($Id)
{
    $achat = Achat::findOrFail($Id);
    $achat->delete();

    return redirect()->route('achats.index')->with('success', 'Achat supprimé avec succès');
}
}
