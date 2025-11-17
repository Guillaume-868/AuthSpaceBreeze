<?php

namespace App\Http\Controllers;

use App\Models\Crew;
use Illuminate\Http\Request;

class CrewController extends Controller
{
    // 🪐 Lister les planètes selon la langue
    public function index()
    {
        $planets = Crew::selectLocalized()->get();
        return view('Space.CrewsCrud.index', compact('crews'));
    }

    // ➕ Formulaire d’ajout
    public function create()
    {
        return view('Space.CrewsCrud.create');
    }

    // 💾 Enregistrer une planète
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fonction_fr' => 'required|string|max:255',
            'fonction_en' => 'required|string|max:255',
            'description_fr' => 'nullable|string',
            'description_en' => 'nullable|string',
        ]);

        // return redirect()->route('planets.index');

        // Crée le membre d'équipage
        Crew::create($validated);

        return redirect()->route('crews.index')->with('success', '✅ Equipage crée avec succès !');

        // $planet = Planet::firstOrCreate(
        //     ['name_fr' => $validated['name_fr']], // vérifie si la planète existe déjà
        //     $validated // crée la planète si elle n'existe pas
        // );

        // $message = $planet->wasRecentlyCreated 
        //     ? '✅ Planète créée avec succès !' 
        //     : 'ℹ️ Cette planète existe déjà.';

        // return redirect()->route('planets.index')->with('success', $message);

    }

    // ✏️ Formulaire d’édition
    public function edit(Crew $crew)
    {
        return view('Space.CrewsCrud.edit', compact('crew'));
    }

    // 🔁 Mettre à jour une planète
    public function update(Request $request, crew $crew)
    {
        $validated = $request->validate([
            'fonction_fr' => 'required|string|max:255',
            'fonction_en' => 'required|string|max:255',
            'description_fr' => 'nullable|string',
            'description_en' => 'nullable|string',
        ]);

        $crew->update($validated);

        return redirect()->route('crews.index')->with('success', 'Membre d\'équipage mise à jour avec succès !');
    }

    // 🗑️ Supprimer
    public function destroy(Crew $crew)
    {
        $crew->delete();
        return redirect()->route('crews.index')->with('success', ' Membre d\'équipage supprimé avec succès !');
    }
}
