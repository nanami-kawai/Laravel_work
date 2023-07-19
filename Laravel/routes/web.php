<?php

use Illuminate\Support\Facades\Route; //Routeを使う
use App\Http\Controllers\PostsController; //PostsControllerクラスを呼び出す

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

Route::get('/', function () { //https://127.0.0.1:8000/で
    return view('welcome'); //welcome.blade.phpを表示
});
Auth::routes(); //authのルーティング
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); //homeページでHomeControllerクラスのindexメソッド処理を実行し、名前をhomeとする
Route::get('index',[PostsController::class,'index']); //indexページでPostControllerのindexメソッド処理を実行
Route::get('/create-form', [PostsController::class, 'createForm']); //create-formページでPostControllerのcreateFormメソッド処理を実行
Route::post('post/create', [PostsController::class, 'create']); //createページでPostControllerのcreateメソッド処理を実行
Route::get('post/{id}/update-form', [PostsController::class, 'updateForm']); //get通信で送られてきたidを受け取るupdateページでPostControllerのupdateFormメソッド処理を実行
Route::post('post/update', [PostsController::class, 'update']);  //updateページでPostControllerのupdateメソッド処理を実行
Route::get('post/{id}/delete', [PostsController::class, 'delete']); //get通信で送られてきたidを受け取るdeleteページでPostControllerのdeleteメソッド処理を実行
