<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MissionController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\CompetenceController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Models\Notification;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('technicien/competences', [CompetenceController::class, 'index'])->name('competences.index');
    Route::post('technicien/competences', [CompetenceController::class, 'store'])->name('competences.store');
    Route::delete('technicien/competences/{competence}', [CompetenceController::class, 'destroy'])->name('competences.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('missions', [MissionController::class, 'index'])->name('missions.index');
    Route::get('missions/create', [MissionController::class, 'create'])->name('missions.create');
    Route::post('missions', [MissionController::class, 'store'])->name('missions.store');
    Route::get('missions/{mission}', [MissionController::class, 'show'])->name('missions.show');
    Route::put('missions/{mission}', [MissionController::class, 'update'])->name('missions.update');

    Route::put('missions/{mission}/status/{status}', [MissionController::class, 'updateStatus'])
    ->name('missions.updateStatus');
    Route::delete('missions/{mission}', [MissionController::class, 'destroy'])->name('missions.destroy');

    Route::post('offres', [OffreController::class, 'store'])->name('offres.store');
    Route::get('offres/{offre}/edit', [OffreController::class, 'edit'])->name('offres.edit');
    Route::put('offres/{offre}', [OffreController::class, 'update'])->name('offres.update');
    Route::delete('offres/{offre}', [OffreController::class, 'destroy'])->name('offres.destroy');
    Route::put('offres/{offre}/accept', [OffreController::class, 'accept'])->name('offres.accept');
Route::put('offres/{offre}/refuse', [OffreController::class, 'refuse'])
    ->name('offres.refuse');
    Route::get('technicien/experiences', [ExperienceController::class, 'index'])
    ->name('experiences.index');

Route::post('technicien/experiences', [ExperienceController::class, 'store'])
    ->name('experiences.store');

Route::put('technicien/experiences/{experience}', [ExperienceController::class, 'update'])
    ->name('experiences.update');

Route::delete('technicien/experiences/{experience}', [ExperienceController::class, 'destroy'])
    ->name('experiences.destroy');


    Route::get(
    'offres/{offre}/technicien',
    [OffreController::class, 'profilTechnicien']
)->name('offres.technicien.profil');

    Route::post('missions/{mission}/evaluations', [EvaluationController::class, 'store'])
    ->name('evaluations.store');

   Route::middleware('can:isAdmin')->group(function () {

    Route::get('/admin/users', [UserController::class, 'index'])
        ->name('admin.users.index');

    Route::patch('/admin/users/{user}/suspend', [UserController::class, 'suspend'])
        ->name('admin.users.suspend');

    Route::patch('/admin/users/{user}/activate', [UserController::class, 'activate'])
        ->name('admin.users.activate');

});
});

Route::post('/notifications/{notification}/read', function (Notification $notification) {
    abort_unless($notification->id_utilisateur === auth()->id(), 403);

    if ($notification->read_at === null) {
        $notification->update(['read_at' => now()]);
    }

    return back();
})->middleware('auth')->name('notifications.read');



require __DIR__.'/auth.php';
