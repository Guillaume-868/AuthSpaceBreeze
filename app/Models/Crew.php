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
            "fonction_{$locale} as fonction", // ✅ correct
            "description_{$locale} as description",
            'created_at',
            'updated_at'
        ])

          // Cibler la planête en particulier
          ->where('id', $id);
    }

    // Equivalent :

   // Avantage d'un scope :
// - Plus flexible : tu peux enchaîner d’autres méthodes Eloquent (where, orderBy, with, etc.).
// - Si tu veux utiliser $planet->created_at ou $planet->some_other_column, elles sont toujours disponibles.

    // public function scopeSelectLocalized($query)
    // {
    //     $locale = app()->getLocale();

    //     return $query->select('*')
    //         ->addSelect(
    //             "fonction_{$locale} as fonction",
    //             "description_{$locale} as description",
    //         );
    // }

    public function resolveRouteBinding($value, $field = null)
    {
        return $this->newQuery()       // IMPORTANT pour pouvoir appliquer le scope
                    ->selectLocalized() 
                    ->where('id', $value)
                    ->firstOrFail();
    }
    
}
