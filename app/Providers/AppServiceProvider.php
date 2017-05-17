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
        view()->composer('partials.sidebar', function($view){    // u can pass class back

            $archives = \App\Post::archives();

            $tags =    \App\Tag::has('posts')->pluck('name');

             $view->with(compact('archives', 'tags'));

//             $view->with('archives',' archives ' );
//             $view->with('tags','$tags' );//$view->with('tags', \App\Tag::pluck('name'));
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
