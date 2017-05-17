<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Register the composer , so to make the archives to be load in side bar
        view()->composer('partials.sidebar', function($view){ // u can pass class back
             $view->with('archives', \App\Post::archives());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Register to the Service container

        \App::singleton('App\Billing\Stripe', function(){
            return new \App\Billing\Stripe(config('services.stripe.secret')); // Register in service  provider
        });
    }
}
