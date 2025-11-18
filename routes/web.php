<?php

// ✅ Utiliser le bon contrôleur
use App\Http\Controllers\WorkSpaceController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', function () {
    return view('welcome');
});


// Accueil Planets
Route::get('/Space/Planets/space', [WorkSpaceController::class, 'showHome'])->name('home');

// Planets
Route::get('/planets/{id}', [WorkSpaceController::class, 'showPlanet'])->name('planets.show');

// Crew
Route::get('/crew/{crew}', [WorkSpaceController::class, 'showCrew'])->name('crew.show');

// Technology
Route::get('/technology/{technology}', [WorkSpaceController::class, 'showTechnology'])->name('technology.show');

// Gestion de la langue
Route::post('/change-locale', function (Illuminate\Http\Request $request) {
    $locale = $request->input('locale');
    if (in_array($locale, ['en', 'fr', 'it'])) {
        session(['locale' => $locale]);
        app()->setLocale($locale);
    }
    return response()->json(['status' => 'ok']);
})->name('locale.change');


// Routes helpers

Route::get('/planets', [WorkSpaceController::class, 'indexplanet'])->name('planet.index');
Route::get('/crews', [WorkSpaceController::class, 'indexcrew'])->name('crew.index');
Route::get('/starships', [WorkSpaceController::class, 'indextechnology'])->name('starships.index');

// Dashboard / Profile
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 👉 Inclusion des routes auth
require __DIR__.'/auth.php';

// 👉 Inclusion des routes admin
require __DIR__.'/admin.php';
