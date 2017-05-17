<?php


//dd(resolve('App\Billing\Stripe'));


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/', 'PostsController@index')->name('home');
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts','PostsController@store');
Route::get('/post/{post}','PostsController@show');

Route::post('/posts/{post}/comments','CommentsController@store');


Route::get('/posts/tags/{tag}','TagsController@index');

// Registeration

Route::get('/register', 'RegisterationController@create');
Route::post('/register', 'RegisterationController@store');

//Login
Route::get('/login' ,       'SessionController@create');
Route::post('/login' ,      'SessionController@store');


Route::get('/logout' ,      'SessionController@destroy');







//// Service container
//
//App::singleton('App\Binding\Stripe', function(){
//    return new \App\Billing\Stripe(config('services.stripe.secret')); // Register in service  provider
//});
//
//// Call / Resolve out the container
////$stripe = App::make('App\Billing\Stripe');
//$stripe1 = resolve('App\Billing\Stripe');
//$stripe2 = resolve('App\Billing\Stripe');
//
//dd ($stripe);