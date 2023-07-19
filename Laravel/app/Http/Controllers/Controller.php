<?php

namespace App\Http\Controllers; //App\Http\Controllersフォルダにある

use Illuminate\Foundation\Auth\Access\AuthorizesRequests; //AuthorizesRequestsを使う
use Illuminate\Foundation\Bus\DispatchesJobs; //DispatchesJobsを使う
use Illuminate\Foundation\Validation\ValidatesRequests; //ValidatesRequests
use Illuminate\Routing\Controller as BaseController; //ControllerをBaseControllerとして使う
class Controller extends BaseController //BaseControllerを拡張するControllerクラス
{
    public function __construct(){ //コンストラクタでauth機能を読み込む
    $this->middleware('auth'); //ログインできているか確認
  }
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests; //Controllerクラス内でAuthorizesRequests, DispatchesJobs, ValidatesRequestsを使う
}
