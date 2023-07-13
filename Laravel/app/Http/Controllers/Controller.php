<?php

namespace App\Http\Controllers; //App\Http\Controllersフォルダにある

use Illuminate\Foundation\Auth\Access\AuthorizesRequests; //AuthorizesRequestsを使う
use Illuminate\Foundation\Bus\DispatchesJobs; //DispatchesJobsを使う
use Illuminate\Foundation\Validation\ValidatesRequests; //ValidatesRequests
use Illuminate\Routing\Controller as BaseController; //ControllerをBaseControllerとして使う
class Controller extends BaseController //BaseControllerを拡張するControllerクラス
{
    public function __construct(){
    $this->middleware('auth');
  }
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
