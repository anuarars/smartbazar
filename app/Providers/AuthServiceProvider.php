<?php

namespace App\Providers;

use App\Models\Page;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        // Only admin can preview page
         Gate::define('see-page', function(?User $user, Page $page){
             // if user is not logged in then check by isActive
             return optional($user)->hasRole("admin") ? true : $page->active;
         });

    }
}