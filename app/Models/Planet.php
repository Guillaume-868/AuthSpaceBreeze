<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// ← AJOUT ICI

class Planet extends Model
{
    use HasFactory;

    // Autoriser les colonnes à être remplies en masse
    protected $fillable = [
        'name_fr',
        'name_en',
        'description_fr',
        'description_en',
        'distance_fr',
        'distance_en',
        'duration_fr',
        'duration_en',
        'subtitle_fr',
        'subtitle_en'
    ];

    /**
     * Sélectionne uniquement les colonnes dans la langue courante
     */
    public static function selectLocalized()
    {
        $locale = app()->getLocale(); // 'fr' ou 'en'

        return self::select([
            'id',
            "name_{$locale} as name", // ✅ correct
            "description_{$locale} as description", 
            "distance_{$locale} as distance",
            "duration_{$locale} as duration",
            "subtitle_{$locale} as subtitle",
            'created_at',
            'updated_at',
        ]);
    }

}
