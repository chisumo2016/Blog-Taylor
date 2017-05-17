<?php

namespace App\Http\Controllers;

use App\Mail\Welcome;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
class RegisterationController extends Controller
{

    //
    public function create()
    {
      return view('registration.create');
    }

    public function store()
    {
        //validate the form
        $this->validate(request(), [
            'name'    => 'required',
            'email'   => 'required|email',
            'password'=> 'required|confirmed'
        ]);

        //create and save the user
        $user = User::create(request(['name','email','password']));

        //Sign the In
        auth()->login($user);

        // Mail Sending
        \Mail::to($user)->send(new Welcome($user));

        //redirect
        return redirect()->home();
    }
}
