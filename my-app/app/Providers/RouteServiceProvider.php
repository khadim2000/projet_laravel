<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/dashboard'; // Chemin de redirection par défaut après authentification

    /**
     * Path for admin dashboard.
     *
     * Admins are redirected here after authentication.
     *
     * @var string
     */
    public const ADMIN = '/admin/dashboard'; // Chemin pour le tableau de bord des administrateurs

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        // Définition des limites de taux pour les requêtes API
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        // Configuration des routes de l'application
        $this->routes(function () {
            // Routes API
            Route::middleware('api')
                ->prefix('api') // Préfixe pour les routes API
                ->group(base_path('routes/api.php'));

            // Routes Web
            Route::middleware('web') // Middleware pour les routes Web
                ->group(base_path('routes/web.php'));
        });
    }
}
