<?php

namespace App\Http\Requests;

use App\Mail\Welcome;
use Illuminate\Foundation\Http\FormRequest;
use Mail;
use App\User;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //validdate

            'name'    => 'required',
            'email'   => 'required|email',
            'password'=> 'required|confirmed'


        ];
    }

    public function persist()
    {

        $user = User::create($this->only(['name', 'email', 'password']));

            //request(['name','email','password']));//create and save the user

        auth()->login($user);//Sign the In

        Mail::to($user)->send(new Welcome($user));    // Mail Sending
    }
}
