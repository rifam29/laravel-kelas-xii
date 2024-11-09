<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any authentication / authorization services.
     */
    public function register(): void
    {
        // Jika ada service tambahan, daftarkan di sini.
    }

    /**
     * Bootstrap any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        Gate::define('isAdmin', function($user) {
            return $user->role_id == 2;
        });
        Gate::define('isUser', function($user) {
            return $user->role_id == 1;
        });
    }
}
