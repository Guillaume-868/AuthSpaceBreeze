<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use Illuminate\Http\Request;

class TestTechnologiesController extends Controller
{

    public function index()
    {
        $items = Technology::selectLocalized()->get();

        return view('Space.Shared.index', [
            'title' => '🚀 Technologies List',
            'add' => 'Technology',
            'createRoute' => 'technologies.create',
            'editRoute' => 'technologies.edit',
            'deleteRoute' => 'technologies.destroy',
            'fields' => [
                'fr' => ['starships' => 'Nom du vaisseau', 'subtitle' => 'Sous-titre'],
                'en' => ['starships' => 'Name ', 'subtitle' => 'Subtitle'],
            ],
            'items' => $items,
            'type' => 'technologies', // 👈 ajoute ce paramètre
        ]);
    }

    // ➕ Formulaire d’ajout
    public function create()
    {
        return view('Space.Shared.create', ['type' => 'technologies']);
    }

    // 💾 Enregistrer une technologie
    public function store(Request $request)
    {
        $validated = $request->validate([
            'starships_fr' => 'required|string|max:255',
            'starships_en' => 'required|string|max:255',
            'description_fr' => 'nullable|string',
            'description_en' => 'nullable|string',
            'subtitle_fr' => 'nullable|string',
            'subtitle_en' => 'nullable|string',
        ]);

        // return redirect()->route('planets.index');

        // Crée la planète
        Technology::create($validated);

        return redirect()->route('technologies.index')->with('success', '✅ Technologie créée avec succès !');
    }

    // 🔁 Mettre à jour une planète
    public function update(Request $request, Technology $technology)
    {
        $validated = $request->validate([
            'starships_fr' => 'required|string|max:255',
            'starships_en' => 'required|string|max:255',
            'description_fr' => 'nullable|string',
            'description_en' => 'nullable|string',
            'subtitle_fr' => 'nullable|string',
            'subtitle_en' => 'nullable|string',
        ]);

        $technology->update($validated);

        return redirect()->route('technologies.index')->with('success', ' Technologie mise à jour avec succès !');
    }
}
