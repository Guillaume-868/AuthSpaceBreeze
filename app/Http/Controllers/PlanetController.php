<?php

namespace App\Http\Controllers;

use App\Models\Planet;
use Illuminate\Http\Request;

class PlanetController extends Controller
{
    // 🪐 Lister les planètes selon la langue
    public function index()
    {
        $planets = Planet::selectLocalized()->get();
        return view('Space.PlanetsCrud.index', compact('planets'));
    }

    // ➕ Formulaire d’ajout
    public function create()
    {
        return view('Space.PlanetsCrud.create');
    }

   // 💾 Enregistrer une planète
public function store(Request $request)
{
    $validated = $request->validate([
        'name_fr' => 'required|string|max:255',
        'name_en' => 'required|string|max:255',
        'description_fr' => 'nullable|string',
        'description_en' => 'nullable|string',
        'distance_fr' => 'nullable|string',
        'distance_en' => 'nullable|string',
        'duration_fr' => 'nullable|string',
        'duration_en' => 'nullable|string',
        'subtitle_fr' => 'nullable|string',
        'subtitle_en' => 'nullable|string',
    ]);

    // return redirect()->route('planets.index');

    // Crée la planète
    Planet::create($validated);

    return redirect()->route('planets.index')->with('success', '✅ Planète créée avec succès !');

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
    public function edit(Planet $planet)
    {
        return view('Space.PlanetsCrud.edit', compact('planet'));
    }

    // 🔁 Mettre à jour une planète
    public function update(Request $request, Planet $planet)
    {
        $validated = $request->validate([
            'name_fr' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'description_fr' => 'nullable|string',
            'description_en' => 'nullable|string',
            'distance_fr' => 'nullable|string',
            'distance_en' => 'nullable|string',
            'duration_fr' => 'nullable|string',
            'duration_en' => 'nullable|string',
            'subtitle_fr' => 'nullable|string',
            'subtitle_en' => 'nullable|string',
        ]);

        $planet->update($validated);

        return redirect()->route('planets.index')->with('success', '🪐 Planète mise à jour avec succès !');
    }

    // 🗑️ Supprimer
    public function destroy(Planet $planet)
    {
        $planet->delete();
        return redirect()->route('planets.index')->with('success', '🚀 Planète supprimée avec succès !');
    }
}
