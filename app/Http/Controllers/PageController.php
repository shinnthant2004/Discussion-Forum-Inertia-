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
    public function editUser(){
      return Inertia::render('EditUser');
    }
    public function postEditUser(Request $request){

      $userId=Auth::user()->id;
      $user=User::find($userId);
      $user->name=$request->name;
      $user->email=$request->email;
      $user->password=Hash::make($request->password);
      if($request->file('image')){
        $image=$request->file('image');
        $image_name=uniqid().str_replace(" ","",$image->getClientOriginalName());
        $image_path='/images/profile/';
        $image->move(public_path('images/profile'),$image_name);
        $user->image=$image_path.$image_name;
        }
      $user->save();
      return back()->with('success','Updated Successfully');
    }
}
