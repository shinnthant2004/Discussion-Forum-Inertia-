<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function detail(){
         return Inertia::render('QuestionDetail');
    }
}
