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
    'subtitle_fr',
    'subtitle_en',
    'launcher_fr',
    'launcher_en',
  ];

  /**
   * Sélectionne uniquement les colonnes dans la langue courante
   */
  public static function selectLocalized()
  {
    $locale = app()->getLocale(); // 'fr' ou 'en'

    return self::select([
      'id',
      "starships_{$locale} as starships", // ✅ correct
      "description_{$locale} as description",
      "subtitle_{$locale} as subtitle",
      "launcher_{$locale} as launcher",
      'created_at',
      'updated_at',
    ]);
  }
}
