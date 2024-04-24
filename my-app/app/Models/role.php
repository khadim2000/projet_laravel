<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role'; // Nom de la table dans la base de données

    // Champs massivement assignables
    protected $fillable = [
        'nomRole',
        'idRole',
    ];

    // Champs masqués lors des réponses JSON
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // Indique que les champs de date doivent être traités comme des instances Carbon
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Relations avec d'autres modèles
    public function employes()
    {
        return $this->hasMany(Employe::class, 'idrole'); // Un rôle peut avoir plusieurs employés
    }

    // Autres méthodes ou relations peuvent être ajoutées ici
}
