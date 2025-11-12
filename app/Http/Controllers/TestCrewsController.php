<?php

namespace App\Http\Controllers;

use App\Models\Crew;
use Illuminate\Http\Request;

class TestCrewsController extends Controller
{
    public function index()
    {
        $items = Crew::selectLocalized()->get();

        return view('Space.Shared.index', [
            'title' => '👩‍🚀 Crews List',
            'add' => 'crews',
            'createRoute' => 'crews.create',
            'editRoute' => 'crews.edit',
            'deleteRoute' => 'crews.destroy',
            'fields' => [
                'fr' => ['fonction_fr' => 'Fonction', 'description_fr' => 'Description', 'meet_fr' => 'Rencontre'],
                'en' => ['fonction_en' => 'Role', 'description_en' => 'Description', 'meet_en' => 'Meet'],
            ],
            'items' => $items,
            'type' => 'crews', // 👈 ajoute ce paramètre
        ]);
    }

    // ➕ Formulaire d’ajout
    public function create()
    {
        return view('Space.Shared.create', ['type' => 'crews']);
    }

    // 💾 Enregistrer une planète
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fonction_fr' => 'required|string|max:255',
            'fonction_en' => 'required|string|max:255',
            'description_fr' => 'nullable|string',
            'description_en' => 'nullable|string',
            'meet_fr' => 'nullable|string',
            'meet_en' => 'nullable|string',
        ]);

        // return redirect()->route('planets.index');

        // Crée la planète
        Crew::create($validated);

        return redirect()->route('crews.index')->with('success', '✅ Planète créée avec succès !');
    }
}
