<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $appends=['date'];
    
    public function user(){
      return $this->belongsTo(User::class);
    }
    public function getDateAttribute(){
       $c=new Carbon($this->created_at);
       return $c->diffForHumans();
    }
}
