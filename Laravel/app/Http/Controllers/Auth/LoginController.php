<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; //Requestクラスを使用


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = 'index'; //ログイン成功後は投稿一覧ページに遷移
    protected $redirectTo = '/index'; //ログイン成功後は投稿一覧ページに遷移

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //protected function loggedOut(Request $request)
    //{
    //    return redirect('/login');//ログアウト後はログインページに遷移
    //}
    use AuthenticatesUsers;
    protected function loggedOut(Request $request)
    {
        return redirect(route('login'));
    }

    //public function register()
    //{
    //    $this->app->instance(LogoutResponse::class, new class implements LogoutResponse {
    //        public function toResponse($request)
    //        {
    //            return redirect('/login');
    //        }
    //    });
    //}
}
