<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class PageController extends Controller
{
    public function home(){
        $questions=Question::with('comment','like','tag','saveQ')->get();
        return  Inertia::render('Home',[
            'questions'=>$questions
        ]);
    }
    public function editUser(){
      return Inertia::render('EditUser');
    }
    public function postEditUser(Request $request){
      $userId=Auth::user()->id;
      $user=User::find($userId);
      $user->name=$request->name;
      $user->email=$request->email;
      $user->password=Hash::make($request->password);
      $user->image=request()->file('image')->store('userImages');
      $user->save();
      return back()->with('success','Updated Successfully');
    }
}
