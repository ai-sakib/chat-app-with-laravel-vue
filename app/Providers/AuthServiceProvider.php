<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         //'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isAdmin', function($user){
            return $user->type === 1;
        });
        Gate::define('isSubAdmin', function($user){
            return $user->type === 2;
        });
        Gate::define('isEditor', function($user){
            return $user->type === 3;
        });
        Gate::define('isAdminOrSubAdmin', function($user){
            if($user->type === 1 || $user->type === 2){
                return true;
            }
        });
        Passport::routes();

        //
    }
}
