<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Question;
use App\Models\QuestionLike;
use App\Models\QuestionTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\Question as QuestionTrait;
class QuestionController extends Controller
{
    use QuestionTrait;

    public function home(){
        $questions=Question::with('comment','tag','saveQ')->get();
        foreach($questions as $k=>$v){
            $questions[$k]->is_like=$this->likeDetail($v->id)['is_like'];
            $questions[$k]->like_count=$this->likeDetail($v->id)['like_count'];
        }
        return  Inertia::render('Home',[
            'questions'=>$questions
        ]);
    }

    public function detail($slug){
        $question=Question::where('slug',$slug)->with('comment.user','tag','saveQ')->first();
         $question->is_like=$this->likeDetail($question->id)['is_like'];
         $question->like_count=$this->likeDetail($question->id)['like_count'];
         return Inertia::render('QuestionDetail',[
             'question'=>$question
         ]);
    }
    public function like($id){
       QuestionLike::create([
           'question_id'=>$id,
           'user_id'=>Auth::user()->id
       ]);
       return response()->json(['success'=>true]);
    }
}
