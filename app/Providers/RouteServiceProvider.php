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
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        // Ini adalah konfigurasi default untuk rate limiting API.
        // Anda bisa sesuaikan jika diperlukan.
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        // Bagian ini yang krusial untuk memuat routes Anda.
        $this->routes(function () {
            // Memuat routes dari routes/api.php
            // Semua route di sini akan memiliki prefix '/api' dan menggunakan middleware 'api'
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            // Memuat routes dari routes/web.php
            // Semua route di sini akan menggunakan middleware 'web'
            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }
}