<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SessionController extends Controller
{

    public  function __construct()
    {
        $this->middleware('guest',['except'=>'destroy']);
    }


    //
    public function create()
    {
       return view('session.login');
    }


    public function store()
    {
        // Attempt to authenticated the user
        if (! auth()->attempt(request(['email', 'password'])))
        {
            return  back()->withErrors([
                'message '=> 'Please check your credintial and try again'
            ]);    // //if not , redirect back
        }

         return redirect()->home();




        //redirect to the home page
    }


    public function destroy()
    {
        auth()->logout();
        return redirect()->home();
    }

}
