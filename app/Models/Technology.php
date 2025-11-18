<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
  /** @use HasFactory<\Database\Factories\TechnologysFactory> */
  use HasFactory;

  // Autoriser les colonnes à être remplies en masse
  protected $fillable = [
    'starships_fr',
    'starships_en',
    'description_fr',
    'description_en',
    'launcher_fr',
    'launcher_en',
  ];

  /**
   * Sélectionne uniquement les colonnes dans la langue courante
   */

  // Méthode statique
  public static function selectLocalized($id)
  {
    $locale = app()->getLocale(); // 'fr' ou 'en'

    return self::select([
      'id',
      "starships_{$locale} as starships", // ✅ correct
      "description_{$locale} as description",
      "launcher_{$locale} as launcher",
      'created_at',
      'updated_at',
    ])
     // Cibler la planête en particulier
     ->where('id', $id);
  }

  // Equivalent : 

  // Avantage d'un scope :
  // - Plus flexible : tu peux enchaîner d’autres méthodes Eloquent (where, orderBy, with, etc.).
  // - Si tu veux utiliser $planet->created_at ou $planet->some_other_column, elles sont toujours disponibles.


  // public function scopeSelectLocalized($query)
  //   {
  //       $locale = app()->getLocale();

  //       return $query->select('*')
  //           ->addSelect(
  //               "starships_{$locale} as starships", // ✅ correct
  //               "description_{$locale} as description",
  //               "launcher_{$locale} as launcher",
  //           );
  //   }










  public function resolveRouteBinding($value, $field = null)
  {
    // Applique selectLocalized() pour la planète demandée
    return $this->selectLocalized()->where('id', $value)->firstOrFail();
  }
}
