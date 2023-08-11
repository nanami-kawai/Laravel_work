<?php

namespace App\Http\Controllers; //App\Http\Controllersフォルダにある
use App\Models\Post; //Postクラスを使う
use Illuminate\Http\Request; //Requestクラスを使用
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; //DBクラスを使用
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class PostsController extends Controller //Controllerクラスを拡張するPostsControllerクラス
{

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'newContents' => ['required', 'space', 'string', 'max:100'],
        ]);
    }

    public function index(Request $request) //indexメソッド
    {
        $keyword = $request->input('keyword'); //keyword変数にリクエストから呼び出したkeywordを代入
        $query=DB::table('posts');//query変数にデータベースから取得したpostsテーブルのレコード情報を代入
        if(!empty($keyword)) { //もしkeyword変数が空ではなかったら
            $query->where('contents', 'LIKE', "%{$keyword}%");//query変数の中のkeyword変数の内容に当てはまるcontentsを呼び出す
        }
        $list = $query->get();//list変数にquery変数から受け取った値を代入
        return view('posts.index', ['lists'=>$list]);//postsフォルダのindex.blade.phpでlistsを表示
    }


    public function createForm() //createFormメソッド
    {
    return view('posts.createForm'); //postsディレクトリの中にあるcreateForm.blade.phpを呼び出す
    }

    public function create(Request $request) //$request変数に値が渡される
    {
    //バリデートの実施
    $validator = Validator::make($request->all(), [
        'newContents' => 'required|space|max:100'
    ]);

    if ($validator->fails()) {
        return redirect('/create-form')
        ->withErrors($validator)
        ->withInput();
    }

    $contents = $request->input('newContents'); //contents変数にrequest変数で取得したnewContentsの値を代入
    $name = $request->input('userName'); //name変数にrequest変数で取得したuserNameの値を代入
    DB::table('posts')->insert([ //postsテーブルにインサートする
    'contents' => $contents, //＄contentsをcontentsとして
    'user_name' => $name, //＄nameをuser_nameとして
    'created_at' => Carbon::now(), // 現在時刻をcreated_atとして
    'updated_at' => Carbon::now() // 現在時刻をupdated_atとして
    ]);
    return redirect('/index');//index.blade.phpに遷移
    }

    public function updateForm($id) //updateFormメソッド
    {
    $contents = DB::table('posts') //contents変数にpostsテーブルを代入
    ->where('id', $id)//更新したい投稿のIDを受け取り、その投稿の現在の内容を取得
    ->first();
    return view('posts.updateForm', ['contents' => $contents]); //現在の内容を表示
    }

    public function update(Request $request) //updateメソッド
    {
    $id = $request->input('id'); //id変数にname属性がidで指定されている値を取得して代入
    //バリデートの実施
    $validator = Validator::make($request->all(), [
        'upContents' => 'required|space|max:100'
    ]);

    if ($validator->fails()) {
        return redirect('/post/'.$id.'/update-form')
        ->withErrors($validator)
        ->withInput();
    }

    $up_contents = $request->input('upContents'); //update_contents変数にname属性がupContentsで指定されている値を取得して代入
    DB::table('posts') //postsテーブルを呼び出す
    ->where('id', $id) //受け取ったidと一致した投稿を対象
    ->update( //postsテーブルのレコード更新
    ['contents' => $up_contents,
    'updated_at' => Carbon::now() // 現在時刻をupdated_atとして
    ] //$up_contentsをcontentsとして
    );
    return redirect('/index');//index.blade.phpに遷移
    }

    public function delete($id) //deleteメソッド
    {
    DB::table('posts') //postsテーブルを呼び出す
    ->where('id', $id) //受け取ったidと一致した投稿を対象
    ->delete(); //削除
    return redirect('/index');//index.blade.phpに遷移
    }

    public function __construct()
    {
    $this->middleware('auth'); //ログインできているか確認
    }

}
