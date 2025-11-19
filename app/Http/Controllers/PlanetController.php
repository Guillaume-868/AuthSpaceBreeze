<?php

namespace App\Http\Controllers;

use App\Models\Planet;
use Illuminate\Http\Request;

class PlanetController extends Controller
{

    public function index()
    {

        $items = Planet::all();
        
        return view('Space.Shared.index', [
            'title' => '🌍 Planets List',
            'add' => 'planets',
            'createRoute' => 'planets.create',
            'editRoute' => 'planets.edit',
            'deleteRoute' => 'planets.destroy',
            // Vérifier la correspondance des rubriques / clefs du 'fields' avec la methode selectlocalized du modèle Planet
            'fields' => [
                'fr' => ['name' => 'Nom',  'distance' => 'Distance', 'duration' => 'Durée'],
                'en' => ['name' => 'Name', 'distance' => 'Distance', 'duration' => 'Duration'],
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
            'description_fr' => ['required'],
            'description_en' => ['required'],
            'distance_fr' => ['required','string'],
            'distance_en' => ['required','string'],
            'duration_fr' => ['required','string'],
            'duration_en' => ['required','string'],
        ], [

            'name_fr.required' => 'Ne peut pas être vide',
            'name_fr.regex' => 'Ne doit pas contenir de chiffres.',
            'distance_fr.required' => 'Ne peut pas être vide',
            'distance_fr' => 'Merci d\'insérer des chiffres',
            'duration_fr.required' => 'Ne peut pas être vide',
            'duration_fr' => 'Merci d\'insérer des chiffres',
            'description_fr.required' => 'Merci d\'ajouter du texte',

            'name_en.required' => 'Ne peut pas être vide',
            'name_en.regex' => 'Ne doit pas contenir de chiffres.',
            'distance_en.required' => 'Ne peut pas être vide',
            'distance_en' => 'Merci d\'insérer des chiffres',
            'duration_en.required' => 'Ne peut pas être vide',
            'duration_en' => 'Merci d\'insérer des chiffres',
            'description_en' => 'Merci d\'ajouter du texte',
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
            'description_fr' => ['required'],
            'description_en' => ['required'],
            'distance_fr' => ['required','string'],
            'distance_en' => ['required','string'],
            'duration_fr' => ['required','string'],
            'duration_en' => ['required','string'],
        ], [

           'name_fr.required' => 'Ne peut pas être vide',
            'name_fr.regex' => 'Ne doit pas contenir de chiffres.',
            'distance_fr.required' => 'Ne peut pas être vide',
            'distance_fr' => 'Merci d\'insérer des chiffres',
            'duration_fr.required' => 'Ne peut pas être vide',
            'duration_fr' => 'Merci d\'insérer des chiffres',
            'description_fr.required' => 'Merci d\'ajouter du texte',

            'name_en.required' => 'Ne peut pas être vide',
            'name_en.regex' => 'Ne doit pas contenir de chiffres.',
            'distance_en.required' => 'Ne peut pas être vide',
            'distance_en' => 'Merci d\'insérer des chiffres',
            'duration_en.required' => 'Ne peut pas être vide',
            'duration_en' => 'Merci d\'insérer des chiffres',
            'description_en' => 'Merci d\'ajouter du texte',
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
