<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanetController;
use App\Http\Controllers\CrewsController;
use App\Http\Controllers\TechnologiesController ;

// Route::prefix('admin')->group(function () {
//     Route::resource('planets', PlanetController::class);
// });



// 🌍 Routes pour les planètes
// Route::resource('planets', PlanetController::class);

// Route::prefix('admin')->group(function () {
//     Route::resource('planets', PlanetController::class);
// });

//  Création de 7 routes + middleware associé
Route::prefix('admin')
    ->middleware('auth') // Exiger la connexion (Login)
    ->group(function () {
        Route::resource('planets', PlanetController::class)
            ->middleware([
                'index'   => 'can:view,App\Models\Planet', // Protéger l’accès à la page
                'create'  => 'can:create,App\Models\Planet',
                'store'   => 'can:create,App\Models\Planet',
                'show'    => 'can:view,App\Models\Planet',
                'edit'    => 'can:update,App\Models\Planet',
                'update'  => 'can:update,App\Models\Planet',
                'destroy' => 'can:delete,App\Models\Planet',
            ]);
    });




Route::prefix('admin')->group(function () {
    Route::resource('crews', CrewsController::class);
});

Route::prefix('admin')->group(function () {
    Route::resource('technologies', TechnologiesController ::class);
});

// // 👩‍🚀 Routes pour l’équipage
// Route::resource('crews', CrewsController::class);


Route::get('/admin', function () {
    return 'Zone admin : accès réservé';
})->middleware(['auth', 'role:admin'])->name('admin.home');