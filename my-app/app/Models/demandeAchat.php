<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DemandeAchat extends Model
{
    protected $table = 'demande_achat'; // Nom de la table

    // Champs massivement assignables
    protected $fillable = [
        'detail',
        'statut',
        'idemploye',
        'idresponsableAchat',
        'iddirecteur',
        'idresponsableApprovisionnemnet',
    ];

    // Champs à masquer dans les réponses JSON
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // Indique que ces champs sont des instances Carbon
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Relations avec d'autres modèles
    public function employe()
    {
        return $this->belongsTo(Employe::class, 'idemploye'); // Relation avec Employé
    }

    public function responsableAchat()
    {
        return $this->belongsTo(Employe::class, 'idresponsableAchat'); // Responsable des Achats
    }

    public function directeur()
    {
        return $this->belongsTo(Employe::class, 'iddirecteur'); // Directeur
    }

    public function responsableApprovisionnement()
    {
        return $this->belongsTo(Employe::class, 'idresponsableApprovisionnemnet'); // Responsable Approvisionnement
    }
}
