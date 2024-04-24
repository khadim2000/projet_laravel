<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Assurez-vous d'importer le modèle User

class AcceuilController extends Controller
{
    public function index()
    {
        // Créer un nouvel utilisateur
        $user = new User();
        $user->name = 'Nom de l\'utilisateur'; // Remplacez par le nom de l'utilisateur
        $user->email = 'email@example.com'; // Remplacez par l'email de l'utilisateur
        $user->password = bcrypt('mot_de_passe'); // Remplacez par le mot de passe de l'utilisateur (il doit être crypté)
        $user->save();

        // Vous pouvez également utiliser la méthode create() pour créer un utilisateur
        // User::create([
        //     'name' => 'Nom de l\'utilisateur',
        //     'email' => 'email@example.com',
        //     'password' => bcrypt('mot_de_passe'),
        // ]);

        return view('acceuil'); // Retourne la vue souhaitée après la création de l'utilisateur
    }
}
