<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    protected $table = 'employe'; // Le nom de la table dans la base de données

    // Propriétés de masse assignables
    protected $fillable = [
        'nom',
        'prenom',
        'matricule',
        'idrole',
    ];

    // Propriétés qui doivent être masquées lors des réponses JSON
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // Indiquez si vous souhaitez que les dates soient traitées comme des instances Carbon
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * Récupère le rôle associé à cet employé.
     */
    public function role()
    {
        return $this->belongsTo(Role::class, 'idrole'); // Associe le champ 'idrole' au modèle 'Role'
    }

    // Autres relations, méthodes, ou propriétés supplémentaires peuvent être ajoutées ici.
}
