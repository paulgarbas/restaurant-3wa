<?php

namespace App\Providers;
use Countries;
use App\Cart;
use Illuminate\Support\Facades\Auth;
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

        View::composer('layout.nav', function($view) {
            if (Auth::check()) {

                $cart = Cart::where('user_id', Auth::user()->id)->first();

                if (!$cart) {
                    $cart = new Cart();
                    $cart->user_id = Auth::user()->id;
                    $cart->save();
                }

                $totalItems = count($cart->cartItems);

                $view->with('totalItems', $totalItems);
            }
        });
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
