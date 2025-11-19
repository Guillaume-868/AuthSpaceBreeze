<?php

namespace App\Http\Controllers;

use App\Models\Crew;
use Illuminate\Http\Request;

class CrewsController extends Controller
{
    public function index()
    {

        $items = Crew::all();
        return view('Space.Shared.index', [
            'title' => '👩‍🚀 Crews List',
            'add' => 'crews',
            'createRoute' => 'crews.create',
            'editRoute' => 'crews.edit',
            'deleteRoute' => 'crews.destroy',
            'fields' => [
                'fr' => ['fonction' => 'Fonction', 'created_at' => 'Crée le', 'updated_at' => 'Mis à jour le'],
                'en' => ['fonction' => 'Role', 'created_at' => 'Created at', 'updated_at' => 'Update at'],
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

    // 💾 Enregistrer l'équipage
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fonction_fr' => ['required', 'string', 'max:255', 'regex:/^[^\d]*$/'], // interdit les chiffres
            'fonction_en' => ['required', 'string', 'max:255', 'regex:/^[^\d]*$/'], // interdit les chiffres
            'description_fr' => ['required', 'string'],
            'description_en' => ['required', 'string'],
        ], [
            'fonction_fr.required' => 'Ne peut pas être vide',
            'fonction_fr.regex' => 'La fonction ne doit pas contenir de chiffres.',
            'description_fr.required' => 'Merci d\'ajouter du texte',

            'fonction_en.required' => 'Ne peut pas être vide',
            'fonction_en.regex' => 'Le rôle ne doit pas contenir de chiffres.',
            'description_en.required' => 'Merci d\'ajouter du texte',

        ]);
        // return redirect()->route('planets.index');

        // Crée l'équipage
        Crew::create($validated);

        return redirect()->route('crews.index')->with('success', '✅ Planète créée avec succès !');
    }

    // ✏️ Formulaire d’édition
    public function edit(Crew $crew)
    {
        return view('Space.Shared.edit', [
            'item' => $crew,
            'type' => 'crews',
            'updateRoute' => 'crews.update',
            'title' => 'Modifier le membre de l’équipage',
        ]);
    }

    // 🔁 Mettre à jour un équipage
    public function update(Request $request, Crew $crew)
    {
        $validated = $request->validate([
            'fonction_fr' => ['required', 'string', 'max:255', 'regex:/^[^\d]*$/'], // interdit les chiffres
            'fonction_en' => ['required', 'string', 'max:255', 'regex:/^[^\d]*$/'], // interdit les chiffres
            'description_fr' => ['required', 'string'],
            'description_en' => ['required', 'string'],
        ], [
            'fonction_fr.required' => 'Ne peut pas être vide',
            'fonction_fr.regex' => 'La fonction ne doit pas contenir de chiffres.',
            'description_fr.required' => 'Merci d\'ajouter du texte',

            'fonction_en.required' => 'Ne peut pas être vide',
            'fonction_en.regex' => 'La fonction ne doit pas contenir de chiffres.',
            'description_en.required' => 'Merci d\'ajouter du texte',
        ]);

        $crew->update($validated);

        return redirect()->route('crews.index')->with('success', 'Equipage mis à jour avec succès !');
    }

    // 🗑️ Supprimer
    public function destroy(Crew $crew)
    {
        $crew->delete();
        return redirect()->route('crews.index')->with('success', '🚀 Equipage supprimé avec succès !');
    }
}
