<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Routes pour l'application web. Utilisez le middleware "web" pour
| les protéger et créez des groupes de routes pour améliorer
| la structure du code.
|
*/

// Page d'accueil
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});

// Routes pour l'administration
   Route::get('admin', [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('admin', [LoginController::class, 'login']); // Correction ici
    
    // Dashboard des administrateurs
    Route::get('dashboard', [AdminController::class, 'index'])
        ->middleware(['auth:admin', 'verified'])
        ->name('admin.dashboard');


// Dashboard pour les utilisateurs authentifiés
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Routes protégées pour les utilisateurs authentifiés
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Routes pour les employés
    Route::get('/employe/create', [EmployeController::class, 'create'])->name('employe.create'); // Formulaire d'ajout d'employé
    Route::post('/employe', [EmployeController::class, 'store'])->name('employe.store'); // Soumission du formulaire
});

require __DIR__.'/auth.php';
