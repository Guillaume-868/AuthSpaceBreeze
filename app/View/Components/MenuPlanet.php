<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Planet;

class MenuPlanet extends Component
{

  public $listPlanets;


  /**
   * Create a new component instance.
   */
  public function __construct()
  {

    $locale = app()->getLocale(); // ex: "fr" ou "en"

    // On construit dynamiquement le nom du champ : name_fr ou name_en
    $field = "name_" . $locale;
    //   $this->listPlanets =  'toto';

    // Récupération de l'id et du name des planètes fr et en
    $this->listPlanets = Planet::select("id", "$field as name")->get();
  }

  /**
   * Get the view / contents that represent the component.
   */
  public function render(): View|Closure|string
  {
    return view('components.menu-planet');
  }
}
