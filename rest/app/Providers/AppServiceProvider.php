<?php

namespace App\Providers;
use Countries;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        // $countries = Countries::all();
        View::share('countries', Countries::all());
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
