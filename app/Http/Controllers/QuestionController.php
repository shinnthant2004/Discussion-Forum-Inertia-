<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Question;
use App\Models\QuestionLike;
use App\Models\QuestionTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function home(){
        $questions=Question::with('comment','tag','saveQ')->get();
        foreach($questions as $k=>$v){
            $questions[$k]->is_like=$this->likeDetail($v->id)['is_like'];
            $questions[$k]->like_count=$this->likeDetail($v->id)['like_count'];
        }
        return $questions;
        return  Inertia::render('Home',[
            'questions'=>$questions
        ]);
    }

    public function detail(){
         return Inertia::render('QuestionDetail');
    }
    public function likeDetail($question_id){
       $q_like=QuestionLike::where('question_id',$question_id)
                           ->where('user_id',Auth::user()->id)
                           ->first();
       if($q_like){
           $is_like='true';
       }else{
           $is_like='false';
       }

       $like_count=QuestionLike::where('question_id',$question_id)->count();
       $data['like_count']=$like_count;
       $data['is_like']=$is_like;
       return $data;
    }
}
