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
  public function scopeSelectLocalized($query)
{
    $locale = app()->getLocale(); // fr ou en

    return $query->select([
        'id',
        "starships_{$locale} as starships",
        'created_at',
        'updated_at',
    ]);
}


  public function image()
  {
      return $this->belongsTo(Image::class);
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

  // public function resolveRouteBinding($value, $field = null)
  // {
  //     return $this->newQuery()       // IMPORTANT pour pouvoir appliquer le scope
  //                 ->selectLocalized() 
  //                 ->where('id', $value)
  //                 ->firstOrFail();
  // }
  
}
