<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Comment;
use App\Models\Question;
use App\Models\QuestionTag;
use App\Models\QuestionLike;
use App\Models\QuestionSave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\Question as QuestionTrait;
use Illuminate\Database\Eloquent\Builder;

class QuestionController extends Controller
{
    use QuestionTrait;

    public function home(Request $request){
       if($slug=$request->tag){
          $tag=Tag::where('slug',$slug)->first();
          $questions=$tag->questions()->with('comment','tag','saveQ')->orderBy('created_at','DESC')->paginate(5)->withQueryString();
        }elseif($type=$request->type){
          if($type==='answer'){
             $questions=Question::whereHas('comment',function(Builder $q){$q->where('user_id',Auth::user()->id);})
               ->with('comment','tag','saveQ')->orderBy('created_at','DESC')->paginate(5);
          }
          if($type=='unanswer'){
            $questions=Question::has('comment','<',1)->with('comment','tag','saveQ')->orderBy('created_at','DESC')->paginate(5);
          }
        }else{
            $questions=Question::with('comment','tag','saveQ')->orderBy('created_at','DESC')->paginate(5);
        }

        foreach($questions as $k=>$v){
            $questions[$k]->is_like=$this->likeDetail($v->id)['is_like'];
            $questions[$k]->is_save=$this->likeDetail($v->id)['is_save'];
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
      return redirect('/')->with('success','New Question has been created');
    }
    public function questionUser(){
      $user_id=Auth::user()->id;
      $questions=Question::where('user_id',$user_id)->paginate(5);
      return Inertia::render('QuestionUser',[
          'questions'=>$questions
      ]);
    }
    public function delete($id){
      Question::where('id',$id)->delete();
      return response()->json(['success'=>true]);
    }
    public function fix(){
        $question=Question::where('id',request()->id)->first();
        $question->is_fixed=true;
        $question->save();
        return redirect()->back();
    }
    public function showSaveQuestion(){
        $questions=Question::whereHas('saveQ',function(Builder $q){
            $q->where('user_id',Auth::user()->id);
        })->with('comment','tag','saveQ')->orderBy('created_at','DESC')->paginate(5);
        return Inertia::render('saveQuestions',[
            'saveQuestions'=>$questions
        ]);
    }
    public function saveQuestion(){
        $q_id=request()->id;
        $user_id=Auth::user()->id;
        QuestionSave::create([
            'question_id'=>$q_id,
            'user_id'=>$user_id
        ]);
      return redirect()->back()->with('success','Question saved');
    }
}
