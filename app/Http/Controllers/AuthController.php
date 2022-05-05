<?php

namespace App\Http\Controllers;

use App\Models\User;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function login(){
      return Inertia::render('Auth/Login');
    }
    public function register(){
      return Inertia::render('Auth/Register');
    }
    public function postRegister(){
        $formData=request()->validate([
            'name'=>['required','min:3',Rule::unique('users','name')],
            'email'=>['required',Rule::unique('users','email')],
            'password'=>['required','min:3'],
        ]);
        User::create($formData);
        return redirect('/');

    }
}
