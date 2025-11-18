<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use Illuminate\Http\Request;

class TechnologiesController extends Controller
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
                'fr' => ['starships' => 'Nom du vaisseau'],
                'en' => ['starships' => 'Name '],
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
            'starships_fr' => ['required', 'string', 'max:255', 'regex:/^[^\d]*$/'], // interdit les chiffres
            'starships_en' => ['required', 'string', 'max:255', 'regex:/^[^\d]*$/'], // interdit les chiffres
            'description_fr' => ['required', 'string'],
            'description_en' => ['required', 'string'],
        ], [
            'starships_fr.required' => 'Ne peut pas être vide',
            'starships_fr.regex' => 'Le nom ne doit pas contenir de chiffres.',
            'description_fr.required' => 'Merci d\'ajouter du texte',
               
            'starships_en.required' => 'Ne peut pas être vide',
            'starships_en.regex' => 'Le nom ne doit pas contenir de chiffres.',
            'description_en.required' => 'Merci d\'ajouter du texte',
        ]);

        // return redirect()->route('planets.index');

        // Crée la planète
        Technology::create($validated);

        return redirect()->route('technologies.index')->with('success', '✅ Technologie créée avec succès !');
    }

       // ✏️ Formulaire d’édition
       public function edit(Technology $technology)
       {
           return view('Space.Shared.edit', [
               'item' => $technology,
               'type' => 'technologies',
               'updateRoute' => 'technologies.update',
               'title' => 'Modifier une Technologie',
           ]);
       }

    // 🔁 Mettre à jour une technologie
    public function update(Request $request, Technology $technology)
    {
        $validated = $request->validate([
            'starships_fr' => ['required', 'string', 'max:255', 'regex:/^[^\d]*$/'], // interdit les chiffres
            'starships_en' => ['required', 'string', 'max:255', 'regex:/^[^\d]*$/'], // interdit les chiffres
            'description_fr' => ['required', 'string'],
            'description_en' => ['required','string'],
        ], [
            'starships_fr.required' => 'Ne peut pas être vide',
            'starships_fr.regex' => 'Le nom ne doit pas contenir de chiffres.',
            'description_fr.required' => 'Merci d\'ajouter du texte',
               
            'starships_en.required' => 'Ne peut pas être vide',
            'starships_en.regex' => 'Le ne doit pas contenir de chiffres.',
            'description_en.required' => 'Merci d\'ajouter du texte',
        ]);

        $technology->update($validated);

        return redirect()->route('technologies.index')->with('success', ' Technologie mise à jour avec succès !');
    }

     // 🗑️ Supprimer
     public function destroy(Technology $technology)
     {
         $technology->delete();
         return redirect()->route('technologies.index')->with('success', 'Technologie supprimée avec succès !');
     }
}
