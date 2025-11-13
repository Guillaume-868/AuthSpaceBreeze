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
            'starships_fr' => ['required', 'string', 'max:255', 'regex:/^[^\d]*$/'], // interdit les chiffres
            'starships_en' => ['required', 'string', 'max:255', 'regex:/^[^\d]*$/'], // interdit les chiffres
            'description_fr' => ['nullable', 'string'],
            'description_en' => ['nullable', 'string'],
            'subtitle_fr' => ['nullable', 'string', 'regex:/^[^\d]*$/'], // interdit les chiffres si rempli
            'subtitle_en' => ['nullable', 'string', 'regex:/^[^\d]*$/'], // idem
        ], [
            'starships_fr.regex' => 'Le nom du vaisseau français ne doit pas contenir de chiffres.',
            'starships_en.regex' => 'Le nom du vaisseau anglais ne doit pas contenir de chiffres.',
            'subtitle_fr.regex' => 'Le sous-titre français ne doit pas contenir de chiffres.',
            'subtitle_en.regex' => 'Le sous-titre anglais ne doit pas contenir de chiffres.',
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

    // 🔁 Mettre à jour une planète
    public function update(Request $request, Technology $technology)
    {
        $validated = $request->validate([
            'starships_fr' => ['required', 'string', 'max:255', 'regex:/^[^\d]*$/'], // interdit les chiffres
            'starships_en' => ['required', 'string', 'max:255', 'regex:/^[^\d]*$/'], // interdit les chiffres
            'description_fr' => ['nullable', 'string'],
            'description_en' => ['nullable', 'string'],
            'subtitle_fr' => ['nullable', 'string', 'regex:/^[^\d]*$/'], // interdit les chiffres si rempli
            'subtitle_en' => ['nullable', 'string', 'regex:/^[^\d]*$/'], // idem
        ], [
            'starships_fr.regex' => 'Le nom du vaisseau français ne doit pas contenir de chiffres.',
            'starships_en.regex' => 'Le nom du vaisseau anglais ne doit pas contenir de chiffres.',
            'subtitle_fr.regex' => 'Le sous-titre français ne doit pas contenir de chiffres.',
            'subtitle_en.regex' => 'Le sous-titre anglais ne doit pas contenir de chiffres.',
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
