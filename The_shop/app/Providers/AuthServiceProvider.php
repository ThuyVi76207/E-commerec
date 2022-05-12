<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies\PostPolicy;
use App\Models\User;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
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

        Gate::define('category-list', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.list-category'));
        });

        Gate::define('category-add', function ($user) {
            return $user->checkPermissionAccess('category_add');
        });

        Gate::define('category-edit', function ($user) {
            return $user->checkPermissionAccess('category_edit');
        });

        Gate::define('category-delete', function ($user) {
            return $user->checkPermissionAccess('category_delete');
        });

        Gate::define('menu-list', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.list-menu'));
        });

        Gate::define('menu-add', function ($user) {
            return $user->checkPermissionAccess('menu_add');
        });

        Gate::define('menu-edit', function ($user) {
            return $user->checkPermissionAccess('menu_edit');
        });

        Gate::define('menu-delete', function ($user) {
            return $user->checkPermissionAccess('menu_delete');
        });
        
    }
}
