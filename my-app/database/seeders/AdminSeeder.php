<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin; // Si votre modèle utilisateur est nommé User
use Illuminate\Support\Facades\Hash; // Pour le hachage des mots de passe

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Exemple de création d'un compte administrateur
        Admin::create([
            'name' => 'Admin User', // Nom de l'administrateur
            'email' => 'admin@example.com', // E-mail de l'administrateur
            'password' => Hash::make('admin1234'), // Mot de passe haché
            'is_admin' => true, // Indique que c'est un administrateur
        ]);
    }
}
