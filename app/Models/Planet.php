<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
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
    ];

    /**
     * Sélectionne uniquement les colonnes dans la langue courante
     */

    // Il faut faire correspondre le nom de ces rubriques  de la méthode selectLocalized aux rubriques de mon field (méthode index de mon controller PlanetController).
    // Méthode statique
    // public static function selectLocalized($id)
    // {
    //     $locale = app()->getLocale(); // 'fr' ou 'en'
    
    //     return self::select([
    //         'id',
    //         'image_id', // ⭐ indispensable pour charger l'image
    //         "fonction_{$locale} as fonction",
    //         "description_{$locale} as description",
    //         'created_at',
    //         'updated_at'
    //     ])
    //     ->where('id', $id);
    // }

    public function scopeSelectLocalized($query)
    {
        $locale = app()->getLocale();
    
        return $query->select([
            'id',
            "name_{$locale} as name",
            "distance_{$locale} as distance",
            "duration_{$locale} as duration",
            "description_{$locale} as description", 
            'created_at',
            'updated_at',
        ]);
    }


    public function image()
    {
        return $this->hasOne(Image::class);
           
    }

      




    

// ***************** methodes liées au modele image *****************

// public function image()
// {
//     return $this->morphOne(Image::class, 'imageable');
// }

// // Avoir plusieurs images (optionnel)
// public function images()
// {
//     return $this->morphMany(Image::class, 'imageable');
// }

// ******************************************************************

    // Equivalent :

      // Avantage d'un scope :
    // - Plus flexible : tu peux enchaîner d’autres méthodes Eloquent (where, orderBy, with, etc.).
    // - Si tu veux utiliser $planet->created_at ou $planet->some_other_column, elles sont toujours disponibles.

    /**
     * Scope pour récupérer les colonnes localisées selon la langue courante
     */
//     public function scopeSelectLocalized($query)
//     {
//         $locale = app()->getLocale(); // ex: 'fr', 'en'

//         // On sélectionne toutes les colonnes + on ajoute un alias pour la traduction
//         return $query->select('*')
//                      ->addSelect([
//                         "name_{$locale} as name", 
//                         "description_{$locale} as description", 
//                         "distance_{$locale} as distance", 
//                         "duration_{$locale} as duration"
//                     ]);
//     }

//     public function resolveRouteBinding($value, $field = null)
// {
//     return $this->newQuery()       // IMPORTANT pour pouvoir appliquer le scope
//                 ->selectLocalized() 
//                 ->where('id', $value)
//                 ->firstOrFail();
// }


}
