<?php

namespace App\Http\Controllers;

//use App\Mail\Welcome;
//use App\User;
//use Illuminate\Http\Request;

//use App\Http\Requests;
use Auth;

use App\Http\Requests\RegistrationRequest;
class RegisterationController extends Controller
{

    //
    public function create()
    {
      return view('registration.create');
    }

    public function store(RegistrationRequest  $request)
    {
        // This logic has been move to the delicated class in  RegistrationRequest store(RegistrationForm  $form
        $request->persist();

        session()->flash('message', 'Thanks so much for signing up!');

        return redirect()->home(); //redirect
    }
}

//validate the form has been move to RegistrationRequest
/*$this->validate(request(), [
    'name'    => 'required',
    'email'   => 'required|email',
    'password'=> 'required|confirmed'
]);*/

