<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users',[UserController::class,'index']);

Route::get('/users/{id}/comments',[UserController::class,'showComments']);

Route::get('/users/{id}',[UserController::class,'show']);

Route::get('/comments/{id}/users',[CommentController::class,'showUser']);

Route::get('/users/{id}/posts',[UserController::class,'showPosts']);

Route::get('/create-user',[UserController::class,'create']);

Route::post('/create-user',[UserController::class,'store']);

Route::post('/search',[UserController::class,'search']);
