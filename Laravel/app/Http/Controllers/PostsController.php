<?php

namespace App\Http\Controllers; //App\Http\Controllersフォルダにある
use App\Models\Post;
use Illuminate\Http\Request; //Requestクラスを使用
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; //DBクラスを使用

class PostsController extends Controller //Controllerクラスを拡張するPostsControllerクラス
{
    public function index(Request $request)
    {
    $keyword = $request->input('keyword');
    $query=DB::table('posts');
    if(!empty($keyword)) {
        $query->where('contents', 'LIKE', "%{$keyword}%");
    }
    $list = $query->get();
    return view('posts.index', ['lists'=>$list]);
    }


    public function createForm() //createFormメソッド
    {
    return view('posts.createForm'); //postsディレクトリの中にあるcreateForm.blade.phpを呼び出す
    }

    public function create(Request $request) //$request変数に値が渡される
    {
    $contents = $request->input('newContents');
    $name = $request->input('userName');
    DB::table('posts')->insert([
    'contents' => $contents,
    'user_name' => $name
    ]);
    return redirect('/index');//index.blade.phpに遷移
    }

    //public function show(Post $post)
    //{
    //    $usr_name = $post->user_name;
    //    $user = DB::table('users')->where('id', $usr_id)->first();
    //    return view('posts.detail',['post' => $post,'user' => $user]);
    //}

    public function updateForm($id)
    {
    $contents = DB::table('posts')
    ->where('id', $id)
    ->first();
    return view('posts.updateForm', ['contents' => $contents]);
    }

    public function update(Request $request)
    {
    $id = $request->input('id');
    $up_contents = $request->input('upContents');
    DB::table('posts')
    ->where('id', $id)
    ->update(
    ['contents' => $up_contents]
    );
    return redirect('/index');
    }

    public function delete($id)
    {
    DB::table('posts')
    ->where('id', $id)
    ->delete();
    return redirect('/index');
    }

    public function __construct()
    {
    $this->middleware('auth'); //ログインできているか確認
    }

}
