<?php

namespace HelpDesk\Providers;

use HelpDesk\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'HelpDesk\Model' => 'HelpDesk\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // foreach($this->getPermissions() as $permission) {
        //     Gate::define($permission->slug, function($admin) use ($permission) {
        //         return $admin->hasRole($permission->roles);
        //     });
        // }
    }

    // protected function getPermissions()
    // {
    //     return Permission::with('roles')->get();
    // }
}
