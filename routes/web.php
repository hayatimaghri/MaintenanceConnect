<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MissionController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\CompetenceController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('technicien/competences', [CompetenceController::class, 'index'])->name('competences.index');
    Route::post('technicien/competences', [CompetenceController::class, 'store'])->name('competences.store');
    Route::delete('technicien/competences/{competence}', [CompetenceController::class, 'destroy'])->name('competences.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('missions', [MissionController::class, 'index'])->name('missions.index');
    Route::get('missions/create', [MissionController::class, 'create'])->name('missions.create');
    Route::post('missions', [MissionController::class, 'store'])->name('missions.store');
    Route::get('missions/{mission}', [MissionController::class, 'show'])->name('missions.show');
    Route::put('missions/{mission}', [MissionController::class, 'update'])->name('missions.update');
    Route::delete('missions/{mission}', [MissionController::class, 'destroy'])->name('missions.destroy');

    Route::post('offres', [OffreController::class, 'store'])->name('offres.store');
    Route::put('offres/{offre}/accept', [OffreController::class, 'accept'])->name('offres.accept');

    Route::get('technicien/experiences', [ExperienceController::class, 'index'])
    ->name('experiences.index');

Route::post('technicien/experiences', [ExperienceController::class, 'store'])
    ->name('experiences.store');

Route::put('technicien/experiences/{experience}', [ExperienceController::class, 'update'])
    ->name('experiences.update');

Route::delete('technicien/experiences/{experience}', [ExperienceController::class, 'destroy'])
    ->name('experiences.destroy');

    Route::post('missions/{mission}/evaluations', [EvaluationController::class, 'store'])
    ->name('evaluations.store');
});

require __DIR__.'/auth.php';
