<?php

namespace App\Http\Controllers;

use App\Models\Crew;
use App\Models\Planet;
use App\Models\Technology;
use Illuminate\Support\Facades\Storage;

class WorkSpaceController extends Controller
{

    public function indexplanet()
    {
        $planets = Planet::all();
        return view('Space.Planets.index', compact('planets'));
    }


    public function indexcrew()
    {
        $crew = Crew::all();
        return view('Space.Crew.index', compact('crew'));
    }


    public function indextechnology()
    {
        $technologies = Technology::all();
        return view('Space.starships.index', compact('technologies'));
    }

    // Home
    public function showHome()
    {
        return view('Space.Planets.space');
    }

    // Planets
    // public function showPlanet(string $id)
    // {
    //     // ajouter un get
    //     $planet = Planet::selectLocalized($id);
    //     // dd($planet);
    //     return view('Space.Planets.moon', compact('planet'));
    // }


    // La traduction se fait uniquement sur l'ID concerné
    // (Se reférer à la méthode selectlocalized() du Model Planet)

    public function showPlanet(string $id)

    // Grace a la relation des tables :
    // mon select doit récuperer l'id + l'image
    {

        $planet = Planet::with('image')
            ->selectLocalized()
            ->findOrFail($id);

        // return view('Space.Planets.moon', compact('planet'));
        // Récupérer un seul modèle ou déclencher une 404 si introuvable
        // $planet = Planet::selectLocalized($id)->firstOrFail();

        // Charge la planète + son image liée

        // dd([
        //     'path' => $planet->image->path,
        //     'url' => Storage::url($planet->image->path),
        //     'exists' => Storage::disk('public')->exists($planet->image->path),
        // ]);

        // 👉 Mets-le ici
        // dd($planet);
        // dd($planet->toArray());
        // Affiche la vue qui correspond à ta planète
        return view('Space.Planets.moon', compact('planet'));
    }

    // Crew / Equipage

    public function showCrew(string $id)
    {
        // Récupérer un seul modèle ou déclencher une 404 si introuvable
        $crew = Crew::selectLocalized($id)->firstOrFail();

        return view('Space.Crew.commandant', compact('crew'));
    }

    // Technology / Technologies

    public function showTechnology(string $id)
    {
        // Récupérer un seul modèle ou déclencher une 404 si introuvable
        $technology = Technology::selectLocalized($id)->firstOrFail();

        return view('Space.Starships.launcher', compact('technology'));
    }
}
