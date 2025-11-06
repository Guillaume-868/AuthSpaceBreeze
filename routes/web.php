<?php


// ✅ Utiliser le bon contrôleur
use App\Http\Controllers\WorkSpaceController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Exemple sans controller
// Route::get('/Space/Planets/space', function () {
//     return view('Space.Planets.space');
// })->name('space');


// Route::controller(WorkSpaceController::class)->group(function () {

    // Accueil + Helper
    Route::get('/Space/Planets/space', [WorkSpaceController::class, 'showHome'])->name('home');
    Route::get('/Space/Planets/', [WorkSpaceController::class, 'showPlanets'])->name('planet');
    Route::get('/Space/Crew/', [WorkSpaceController::class, 'showCrews'])->name('crew');
    Route::get('/Space/Technologies/', [WorkSpaceController::class, 'showTechnologies'])->name('technology');

    // Routes associees à mon Controller WorkSpaceController
    // Planets
    Route::get('/Space/Planets/{id}', [WorkSpaceController::class, 'showPlanet'])->name('planetID');

    // Crew / Equipage
    Route::get('/Space/Crew/{id}', [WorkSpaceController::class, 'showCrew'])->name('crewID');

    // Technology / Technologies
    Route::get('/Space/Starships/{id}', [WorkSpaceController::class, 'showTechnology'])->name('technologyID');
   
// });

// Gestion de la langue
Route::post('/change-locale', function (Illuminate\Http\Request $request) {
    $locale = $request->input('locale');

    if (in_array($locale, ['en', 'fr', 'it'])) {
        session(['locale' => $locale]);
        app()->setLocale($locale); // pour la requête en cours
    }

    return response()->json(['status' => 'ok']);
})->name('locale.change');

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
