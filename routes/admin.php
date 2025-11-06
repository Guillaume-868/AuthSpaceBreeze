<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanetController;

Route::prefix('admin')->group(function () {
    Route::resource('planets', PlanetController::class);
});