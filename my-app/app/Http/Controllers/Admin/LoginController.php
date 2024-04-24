<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Providers\RouteServiceProvider;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    /**
     * Afficher la vue de connexion pour les administrateurs.
     *
     * @return Response
     */
    public function showLoginForm(): Response
    {
        return Inertia::render('Auth/admin', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
        ]);
    }

    /**
     * Traiter une demande d'authentification entrante pour les administrateurs.
     *
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        // Authentifier l'administrateur
        $credentials = $request->validated(); // Valider les informations fournies
        $remember = $request->boolean('remember'); // Gérer l'option de se souvenir

        if (Auth::attempt($credentials, $remember)) {
            // Regénérer la session en cas d'authentification réussie
            $request->session()->regenerate();

            // Rediriger vers la page d'accueil par défaut ou prévue
            return redirect()->intended(RouteServiceProvider::ADMIN);
        }

        // Si l'authentification échoue, retourner avec un message d'erreur
        return back()->withErrors([
            'email' => 'Les identifiants fournis ne correspondent pas.',
        ]);
    }

    /**
     * Détruire une session authentifiée et déconnecter l'utilisateur.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        // Déconnexion de l'utilisateur
        Auth::logout();

        // Invalider la session pour éviter tout accès non autorisé
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Rediriger vers la page d'accueil après déconnexion
        return redirect('/');
    }
}
