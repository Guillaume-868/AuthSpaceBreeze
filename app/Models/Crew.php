<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Crew extends Model
{
    use HasFactory;

    // Autoriser les colonnes à être remplies en masse
    protected $fillable = [
        'fonction_fr',
        'fonction_en',
        'description_fr',
        'description_en',
        'meet_fr',
        'meet_en'
    ];


    /**
     * Sélectionne uniquement les colonnes dans la langue courante
     */
    public static function selectLocalized()
    {
        $locale = app()->getLocale(); // 'fr' ou 'en'

        return self::select([
            'id',
            "fonction_{$locale} as fonction", // ✅ correct
            "description_{$locale} as description",
            "meet_{$locale} as meet",
            'created_at',
            'updated_at'
        ]);
    }
}
