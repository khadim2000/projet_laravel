<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use App\Models\Employe;

class EmployeController extends Controller
{
    /**
    * Afficher le formulaire de création d'un employé.
    */
   public function create()
   {
       return Inertia::render('Employe/Create'); // Rendu du formulaire de création avec Inertia.js
   }

   /**
    * Stocker un nouvel employé.
    */
   public function store(Request $request): RedirectResponse
   {
       // Validation des données du formulaire
       $validatedData = $request->validate([
           'nom' => 'required|string|max:255',
           'prenom' => 'required|string|max:255',
           'matricule' => 'required|string|max:50|unique:employe,matricule', // Le matricule doit être unique
           'idrole' => 'required|exists:roles,id', // Le rôle doit exister
       ]);
    
       Employe::create($validatedData);

       // Redirige vers le tableau de bord avec un message de succès
       return redirect()->route('dashboard')->with('success', 'Employé ajouté avec succès.');
   }
}