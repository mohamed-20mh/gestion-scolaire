<?php

use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnneeScolaireController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\EnseignantGroupeMatiereController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\GroupeController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\NiveauController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\SceanceController;
use App\Http\Controllers\TypeEvaluationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Page d'accueil
Route::get('/', function () {
    return view('welcome');
});

// Page de login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('showLoginForm');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('users', UserController::class);
    Route::resource('niveaux', NiveauController::class);
    Route::resource('groupes', GroupeController::class);
    Route::resource('sceances', SceanceController::class);
    Route::resource('matieres', MatiereController::class);
    Route::resource('types_evaluations', TypeEvaluationController::class);
    Route::resource('annees_scolaires', AnneeScolaireController::class);
    Route::resource('eseignant_groupe_matiere', EnseignantGroupeMatiereController::class);
    Route::get('/evaluations', [EvaluationController::class, 'index'])->name('evaluations.index');
    Route::get('/notes', [NoteController::class, 'index']);
    Route::get('/admin/absences', [AdminController::class, 'absences'])->name('admin.absences');
});

Route::middleware(['auth', 'role:enseignant'])->group(function () {
    Route::get('/enseignant/dashboard', [EnseignantController::class, 'dashboard'])->name('enseignant.dashboard');

    //Evaluations
    Route::get('/enseignant/evaluations', [EnseignantController::class, 'evaluations'])->name('enseignant.evaluations');
    Route::get('/enseignant/evaluations/create', [EnseignantController::class, 'createEvaluation'])->name('enseignant.evaluations.create');
    Route::post('/enseignant/evaluations', [EnseignantController::class, 'storeEvaluation'])->name('enseignant.evaluations.store');
    Route::get('/enseignant/evaluations/{id}', [EnseignantController::class, 'showEvaluation'])->name('enseignant.evaluations.show');
    Route::get('/enseignant/evaluations/{id}/edit', [EnseignantController::class, 'editEvaluation'])->name('enseignant.evaluations.edit');
    Route::put('/enseignant/evaluations/{id}', [EnseignantController::class, 'updateEvaluation'])->name('enseignant.evaluations.update');
    Route::delete('/enseignant/evaluations/{id}', [EnseignantController::class, 'destroyEvaluation'])->name('enseignant.evaluations.destroy');
    Route::get('evaluations/{id}/notes', [EnseignantController::class, 'notesParEvaluation'])->name('enseignant.evaluations.notes');

    // Notes
    Route::get('evaluations/{id}/notes', [EnseignantController::class, 'notesParEvaluation'])->name('enseignant.evaluation.notes');
    Route::get('evaluations/{id}/notes/create', [EnseignantController::class, 'createNotes'])->name('enseignant.evaluation.notes.create');
    Route::post('evaluations/{id}/notes', [EnseignantController::class, 'storeNotes'])->name('enseignant.evaluation.notes.store');
    Route::get('notes/{id}/edit', [EnseignantController::class, 'editNotes'])->name('enseignant.evaluation.notes.edit');
    Route::put('notes/{id}', [EnseignantController::class, 'updateNotes'])->name('enseignant.evaluation.notes.update');
    Route::delete('notes/{id}', [EnseignantController::class, 'destroyNotes'])->name('enseignant.evaluation.notes.destroy');

    // Absences
    Route::get('/groupes-absences', [EnseignantController::class, 'groupesAbsences'])->name('enseignant.groupes.absences');
    Route::get('/absences/{absence}/edit', [EnseignantController::class, 'editAbsence'])->name('enseignant.absences.edit');
    Route::put('/absences/{absence}/update', [EnseignantController::class, 'updateAbsence'])->name('enseignant.absences.update');
    Route::delete('/absences/{absence}/destroy', [EnseignantController::class, 'destroyAbsence'])->name('enseignant.absences.destroy');
    Route::get('/absences/{groupe}', [EnseignantController::class, 'indexAbsences'])->name('enseignant.absences.index');
    Route::get('/absences/{groupe}/create', [EnseignantController::class, 'createAbsence'])->name('enseignant.absences.create');
    Route::post('/absences', [EnseignantController::class, 'storeAbsence'])->name('enseignant.absences.store');

});

Route::middleware(['auth', 'role:eleve'])->group(function () {
    Route::get('/dashboard', [EleveController::class, 'dashboard'])->name('eleve.dashboard');
    Route::get('/notes', [EleveController::class, 'notes'])->name('eleve.notes');
    Route::get('/absences', [EleveController::class, 'absences'])->name('eleve.absences');
});

//require __DIR__.'/auth.php';

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// Dashboards protégés par middleware auth
// Route::middleware(['auth'])->group(function () {
//     Route::get('/admin/dashboard', function(){return view('admin.dashboard');})->name('admin.dashboard');
//     Route::get('/enseignant/dashboard', function(){return view('enseignant.dashboard');})->name('enseignant.dashboard');
//     Route::get('/eleve/dashboard', function(){return view('eleve.dashboard');})->name('eleve.dashboard');
// });
