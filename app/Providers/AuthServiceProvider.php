<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\UserInfo;
// use Http\Client\Response;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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

        Gate::before(function ($user, $ability) {
            if ($user->isAdmin()) {
                return true;
            }
        });

        Gate::define('update-user-info', function(User $user, $user_id){

            if (Auth::user()->id == $user->find($user_id)->info->user_id) {
                return Response::allow();
            }
            return Response::deny('Нельзя редактировать чужой профиль!');
        });

        Gate::define('update-user-security-info', function(User $user, $id){

            if (Auth::user()->id == $user->find($id)->id) {
                return Response::allow();
            }
            return Response::deny('Нельзя редактировать чужой профиль!');
        });

    }
}
