<?php

namespace App\Http\Controllers;

use App\Models\Planet;
use Illuminate\Http\Request;

class TestPlanetsController extends Controller
{

    public function index()
    {
        $items = Planet::selectLocalized()->get();

        return view('Space.Shared.index', [
            'title' => '🌍 Planets List',
            'add' => 'planets',
            'createRoute' => 'planets.create',
            'editRoute' => 'planets.edit',
            'deleteRoute' => 'planets.destroy',
            'fields' => [
                'fr' => ['name_fr' => 'Nom', 'subtitle_fr' => 'Sous-titre', 'distance_fr' => 'Distance', 'duration_fr' => 'Durée'],
                'en' => ['name_en' => 'Name', 'subtitle_en' => 'Subtitle', 'distance_en' => 'Distance', 'duration_en' => 'Duration'],
            ],
            'items' => $items,
            'type' => 'planets', // 👈 ajoute ce paramètre
        ]);
    }

    // ➕ Formulaire d’ajout
    public function create()
    {
        return view('Space.Shared.create', ['type' => 'planets']);
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
    }
}
