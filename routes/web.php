<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){
    Route::get('/',[PageController::class,'home']);
});

Route::middleware('guest')->group(function(){
    Route::get('/login',[AuthController::class,'login'])->name('login');
    Route::get('/regist',[AuthController::class,'register']);
    Route::post('/regist',[AuthController::class,'postRegister']);
});

