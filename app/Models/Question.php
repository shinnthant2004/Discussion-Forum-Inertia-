<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    public function comment(){
    return $this->hasMany(Comment::class);
    }

    public function tag(){
    return $this->belongsToMany(Tag::class,'question_tag');
    }

    public function like(){
    return $this->belongsToMany(User::class,'question_like');
    }

    public function saveQ(){
    return $this->belongsToMany(User::class,'question_save');
    }
}
