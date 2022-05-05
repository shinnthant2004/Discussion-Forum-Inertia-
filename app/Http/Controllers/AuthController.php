<?php

namespace App\Http\Controllers;

use App\Models\User;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function login(){
      return Inertia::render('Auth/Login');
    }
    public function postLogin(){
      $formData=request()->validate([
           'email'=>['required',Rule::exists('users','email')],
           'password'=>['required','min:5']
       ]);
       if(auth()->attempt($formData)){
           return redirect('/');
       }else{
           return redirect()->back();
       }

    }
    public function register(){
      return Inertia::render('Auth/Register');
    }
    public function postRegister(Request $request){
         request()->validate([
            'name'=>['required','min:3',Rule::unique('users','name')],
            'email'=>['required',Rule::unique('users','email')],
            'password'=>['required','min:6'],
            'image'=>['required']
        ]);
        $formData=[
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'image'=>request()->file('image')->store('userImages')
        ];
        $user=User::create($formData);
        auth()->login($user);
        return redirect('/');
    }
    public function logout(){
       auth()->logout();
       return redirect()->back()->with('success','successfully logout');
    }
}
