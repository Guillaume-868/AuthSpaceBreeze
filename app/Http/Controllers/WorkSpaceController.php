<?php

namespace App\Http\Controllers;

use App\Models\Crew;
use App\Models\Planet;
use App\Models\Technology;

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
{
    // Récupérer un seul modèle ou déclencher une 404 si introuvable
    $planet = Planet::selectLocalized($id)->firstOrFail();

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
