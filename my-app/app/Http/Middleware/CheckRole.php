<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::user();

        // Supposons que le rôle de l'utilisateur est stocké dans le champ 'role'
        if ($user && $user->role === $role) {
            return $next($request); // Passe à la prochaine étape si le rôle correspond
        }

        // Si le rôle ne correspond pas, renvoie une réponse avec un statut 403 (Accès interdit)
        return response()->json(['message' => 'Accès interdit.'], 403);
    }
}

