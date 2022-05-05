<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PageController::class,'home']);

Route::get('/login',[AuthController::class,'login']);

#Register
Route::get('/regist',[AuthController::class,'register']);
Route::post('/regist',[AuthController::class,'postRegister']);

