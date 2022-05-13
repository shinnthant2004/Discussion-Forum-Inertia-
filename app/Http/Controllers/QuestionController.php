<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Comment;
use App\Models\Question;
use App\Models\QuestionTag;
use App\Models\QuestionLike;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\Question as QuestionTrait;

class QuestionController extends Controller
{
    use QuestionTrait;

    public function home(Request $request){
       if($slug=$request->tag){
          $tag=Tag::where('slug',$slug)->first();
          $questions=$tag->questions()->with('comment','tag','saveQ')->paginate(2)->withQueryString();
        }else{
        $questions=Question::with('comment','tag','saveQ')->paginate(2);
        }

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
    public function createComment(Request $request){
        $q_id=$request->question_id;
        $content=$request->content;
        $comment=Comment::create([
            'user_id'=>Auth::user()->id,
            'question_id'=>$q_id,
            'content'=>$content
        ]);
        $createdComment=Comment::where('id',$comment->id)->with('user')->first();
       return ['success'=>true,'comment'=>$createdComment];
    }
    public function create(){
        return Inertia::render('CreateQuestion');
    }
    public function store(Request $request){
       $tag_id=$request->tag;
       $q=Question::create([
           'user_id'=>Auth::user()->id,
           'title'=>$request->title,
           'slug'=>$request->title,
           'description'=>$request->description,
       ]);
       QuestionTag::create([
           'question_id'=>$q->id,
           'Tag_id'=>$tag_id,
       ]);
       return response()->json(['success'=>true]);
    }
    public function questionUser(){
      $user_id=Auth::user()->id;
      $questions=Question::where('user_id',$user_id)->paginate(2);
      return Inertia::render('QuestionUser',[
          'questions'=>$questions
      ]);
    }
    public function delete($id){
      Question::where('id',$id)->delete();
      return response()->json(['success'=>true]);
    }
    public function fix(){
        $q_id=request()->id;
        Question::where('id',$q_id)->update([
            'is_fixed'=>'true'
        ]);
        return response()->json(['success'=>true]);
    }
}
