<?php
namespace App\Traits;

use App\Models\QuestionLike;
use Illuminate\Support\Facades\Auth;

trait Question{
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
