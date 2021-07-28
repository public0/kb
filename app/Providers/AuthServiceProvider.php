<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('viewPerms', function ($user, $permission) {
            return $user->hasPermission($permission);
        });
        Gate::define('viewAdmin', function ($user, $permission) {
            return $user->isRole('admin') && $user->hasPermission($permission);
        });

        // Users
        Gate::define('userPerms', function ($user, $action, $item = null) {
            if (in_array($action, ['status', 'edit', 'passwordReset']) && $item) {
                if ($user->client_id) {
                    return $user->hasPermission('AdminUsers') && $user->client_id == $item->client_id;
                }
            }

            return $user->hasPermission('AdminUsers');
        });
    }
}
