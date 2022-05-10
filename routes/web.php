<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;
use Whoops\Run;

Route::middleware('auth')->group(function(){
    Route::get('/',[QuestionController::class,'home'])->name('home');
    // Logout
    Route::get('/logout',[AuthController::class,'logout']);
    // EditUser
    Route::get('/profile/edituser',[PageController::class,'editUser']);
    Route::post('/profile/edituser',[PageController::class,'postEditUser']);
    // QuestionDetail
    Route::get('/question/detail',[QuestionController::class,'detail']);
    // Like
    Route::get('/question/like/{id}',[QuestionController::class,'like']);
});
Route::get('/delete',[AuthController::class,'delete']);
Route::middleware('guest')->group(function(){
    // Login
    Route::get('/login',[AuthController::class,'login'])->name('login');
    Route::post('/login',[AuthController::class,'postLogin']);
    // Register
    Route::get('/regist',[AuthController::class,'register']);
    Route::post('/regist',[AuthController::class,'postRegister']);
});

