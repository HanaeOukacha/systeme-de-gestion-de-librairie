<?php

namespace App\Http\Controllers;

use App\Models\Emprunt;
use Illuminate\Http\Request;

class EmpruntController extends Controller
{
    public function index()
    {
        $emprunts = Emprunt::all();

        return view('emprunts.index', compact('emprunts'));
    }
    public function create()
    {
        return view('emprunts.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'IdOuvrage' => 'required|integer',
            'IdAbonne' => 'required|integer',
            'DateEmprunt' => 'required|date',
            'DateRetourPrevue' => 'required|date',
            'DateRetourReelle' => 'nullable|date',

        ]);

        Emprunt::create($validatedData);

        return redirect()->route('emprunts.index')->with('success', 'emprunt ajouté avec succès');
    }
    public function edit($Id)
    {
        $emprunt = Emprunt::findOrFail($Id);

    return view('emprunts.edit', compact('emprunt'));
    }


    public function update(Request $request, $Id)
{
    $validatedData = $request->validate([
            'IdOuvrage' => 'required|integer',
            'IdAbonne' => 'required|integer',
            'DateEmprunt' => 'required|date',
            'DateRetourPrevue' => 'required|date',
            'DateRetourReelle' => 'nullable|date',
    ]);

    $emprunt = Emprunt::findOrFail($Id);
    $emprunt->update($validatedData);

    return redirect()->route('emprunts.index')->with('success', 'emprunt mis à jour avec succès');
}
public function destroy($Id)
{
    $emprunt = Emprunt::findOrFail($Id);
    $emprunt->delete();

    return redirect()->route('emprunts.index')->with('success', 'emprunt supprimé avec succès');
}
}
