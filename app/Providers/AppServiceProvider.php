<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Category;
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
        view()->composer('layouts.default', function ($view) {
            // $user_id = Auth::id();
            $view->with('categories', Category::where('parent_id', 0)->with('children')->get());
            // $view->with('order', Order::where('user_id', $user_id)->where('status', 0)->get()->first());
        });
    }
}