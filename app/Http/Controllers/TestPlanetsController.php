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
            // Vérifier la correspondance des rubriques / clefs du 'fields' avec la methode selectlocalized du modèle Planet
            'fields' => [
                'fr' => ['name' => 'Nom', 'subtitle' => 'Sous-titre',  'distance' => 'Distance', 'duration' => 'Durée'],
                'en' => ['name' => 'Name', 'subtitle' => 'Subtitle', 'distance' => 'Distance', 'duration' => 'Duration'],
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
            'name_fr' => ['required', 'string', 'max:255', 'regex:/^[^\d]*$/'],
            'name_en' => ['required', 'string', 'max:255', 'regex:/^[^\d]*$/'],
            'description_fr' => ['nullable'],
            'description_en' => ['nullable'],
            'distance_fr' => ['regex:/^[0-9]+$/'],
            'distance_en' => ['regex:/^[0-9]+$/'],
            'duration_fr' => ['regex:/^[0-9]+$/'],
            'duration_en' => ['regex:/^[0-9]+$/'],
            'subtitle_fr' => ['nullable', 'string', 'regex:/^[^\d]*$/'],
            'subtitle_en' => ['nullable', 'string', 'regex:/^[^\d]*$/'],
        ], [
            'name_fr.regex' => 'Le nom français ne doit pas contenir de chiffres.',
            'name_en.regex' => 'Le nom anglais ne doit pas contenir de chiffres.',
        ]);

        // return redirect()->route('planets.index');

        // Crée la planète
        Planet::create($validated);

        return redirect()->route('planets.index')->with('success', '✅ Planète créée avec succès !');
    }

    // ✏️ Formulaire d’édition
    public function edit(Planet $planet)
    {
        return view('Space.Shared.edit', [
            'item' => $planet,
            'type' => 'planets',
            'updateRoute' => 'planets.update',
            'title' => 'Modifier la planète',
        ]);
    }

    // 🔁 Mettre à jour une planète
    public function update(Request $request, Planet $planet)
    {
        $validated = $request->validate([
            'name_fr' => ['required', 'string', 'max:255', 'regex:/^[^\d]*$/'],
            'name_en' => ['required', 'string', 'max:255', 'regex:/^[^\d]*$/'],
            'description_fr' => ['nullable'],
            'description_en' => ['nullable'],
            'distance_fr' => ['regex:/^[0-9]+$/'],
            'distance_en' => ['regex:/^[0-9]+$/'],
            'duration_fr' => ['regex:/^[0-9]+$/'],
            'duration_en' => ['regex:/^[0-9]+$/'],
            'subtitle_fr' => ['nullable', 'string', 'regex:/^[^\d]*$/'],
            'subtitle_en' => ['nullable', 'string', 'regex:/^[^\d]*$/'],
        ], [
            'name_fr.regex' => 'Le nom français ne doit pas contenir de chiffres.',
            'name_en.regex' => 'Le nom anglais ne doit pas contenir de chiffres.',
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
