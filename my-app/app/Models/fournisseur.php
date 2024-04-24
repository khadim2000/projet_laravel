<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    protected $table = 'fournisseur'; // Nom de la table dans la base de données

    // Champs massivement assignables
    protected $fillable = [
        'nom',
        'telepone', // Correction d'orthographe: téléphone
        'mail',
        'adresse',
    ];

    // Champs à masquer lors des réponses JSON
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // Indique que les timestamps doivent être traités comme des instances Carbon
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Relations avec d'autres modèles, s'il y en a
    // Vous pouvez ajouter des méthodes pour gérer des relations entre les modèles

    // Autres méthodes ou propriétés peuvent être ajoutées ici
}
