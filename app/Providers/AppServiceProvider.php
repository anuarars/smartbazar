<?php

namespace App\Providers;

use App\Models\City;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Support\Facades\URL;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        URL::forceScheme('https');
        view()->composer('layouts.default', function ($view) {
            $view->with('categories', Category::where('parent_id', 0)->with('children')->get())->with('homeUrl', env('APP_URL'));
        });
        view()->composer('*', function ($view) {
            $view->with('cities', City::all());
        });

        session()->put('city', City::first());
    }
}
