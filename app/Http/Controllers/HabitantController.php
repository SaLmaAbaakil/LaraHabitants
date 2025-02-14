<?php

namespace App\Http\Controllers;

use App\Models\Ville;
use App\Models\Habitant;
use Illuminate\Http\Request;

class HabitantController extends Controller
{

    public function index()
    {
        $habitants = Habitant::all(); // Récupère tous les habitants sans charger la relation ville
        return view('habitants.index', compact('habitants'));
    }

    public function create()
    {
        $villes = Ville::all();
        return view('habitants.create', compact('villes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'cin' => 'required|unique:habitants',
            'nom' => 'required',
            'prenom' => 'required',
            'ville_id' => 'required|exists:villes,id',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $photoPath = $request->file('photo')->store('photos', 'public');
        
        Habitant::create([
            'cin' => $validated['cin'],
            'nom' => $validated['nom'],
            'prenom' => $validated['prenom'],
            'ville_id' => $validated['ville_id'],
            'photo' => $photoPath
        ]);

        return redirect()->route('habitants.index')->with('success', 'Habitant ajouté avec succès');
    }

    public function edit(Habitant $habitant)
    {
        $villes = Ville::all();
        return view('habitants.edit', compact('habitant', 'villes'));
    }

    public function update(Request $request, Habitant $habitant)
    {
        $validated = $request->validate([
            'cin' => 'required|unique:habitants,cin,' . $habitant->id,
            'nom' => 'required',
            'prenom' => 'required',
            'ville_id' => 'required|exists:villes,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $validated['photo'] = $photoPath;
        }

        $habitant->update($validated);

        return redirect()->route('habitants.index')->with('success', 'Habitant modifié avec succès');
    }

    public function destroy(Habitant $habitant)
    {
        $habitant->delete();
        return redirect()->route('habitants.index')->with('success', 'Habitant supprimé avec succès');
    }
}
