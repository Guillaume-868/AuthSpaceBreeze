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

Route::prefix('admin')->group(function () {
    Route::resource('planets', PlanetController::class);
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