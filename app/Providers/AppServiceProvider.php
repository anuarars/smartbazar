<?php

namespace App\Providers;

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
            // $user_id = Auth::id();
            $homeUrl = env('APP_URL');
            $view->with('categories', Category::where('parent_id', 0)->with('children')->get())->with('homeUrl', env('APP_URL'));
            // $view->with('order', Order::where('user_id', $user_id)->where('status', 0)->get()->first());
        });
    }
}