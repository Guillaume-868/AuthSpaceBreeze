<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanetController;
use App\Http\Controllers\TestPlanetsController;
use App\Http\Controllers\TestCrewsController;

// Route::prefix('admin')->group(function () {
//     Route::resource('planets', PlanetController::class);
// });



// 🌍 Routes pour les planètes
// Route::resource('planets', TestPlanetsController::class);

Route::prefix('admin')->group(function () {
    Route::resource('planets', TestPlanetsController::class);
});

Route::prefix('admin')->group(function () {
    Route::resource('crews', TestCrewsController::class);
});

// // 👩‍🚀 Routes pour l’équipage
// Route::resource('crews', TestCrewsController::class);