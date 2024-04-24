<?php

namespace App\Http\Controllers;

use App\Models\DemandeAchat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DemandeAchatController extends Controller
{
    // Appliquer le middleware au contrôleur ou à des méthodes spécifiques
    public function __construct()
    {
        // Seuls les employés ou responsables d'achat peuvent faire des demandes
        $this->middleware('checkRole:employe', ['only' => ['store', 'update', 'destroy']]);
        $this->middleware('checkRole:responsableAchat', ['only' => ['store', 'update', 'destroy']]);
    }

    // Les autres méthodes comme index et show restent accessibles
    public function index()
    {
        $demandes = DemandeAchat::all();
        return response()->json($demandes);
    }

    public function show($id)
    {
        $demande = DemandeAchat::find($id);
        return response()->json($demande);
    }

    // Créer une nouvelle demande d'achat
    public function store(Request $request)
    {
        $demande = DemandeAchat::create($request->all());
        return response()->json($demande);
    }

    // Mettre à jour une demande d'achat
    public function update(Request $request, $id)
    {
        $demande = DemandeAchat::find($id);
        $demande->update($request->all());
        return response()->json($demande);
    }

    // Supprimer une demande d'achat
    public function destroy($id)
    {
        DemandeAchat::destroy($id);
        return response()->json(["message" => "Demande d'achat supprimée"]);
    }
}
