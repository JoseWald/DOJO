<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //Show register /create form
    public function register(){
        return view('users.register');
    }

    //Create new users
    public function store(Request $request){
        $formFields=$request->validate([
            'name'=>['required','min:3'],
            'email'=>['required','email',Rule::unique('users','email')],
            'password'=>['required','confirmed','min:6']
        ]);

        $formFields['password']=bcrypt($formFields['password']);

        $user=User::create($formFields);

        auth()->login($user);
        
        return redirect('/')->with('message','user created and logged in');
    }
}
