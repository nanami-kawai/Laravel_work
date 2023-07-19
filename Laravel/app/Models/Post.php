<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model //Modelを拡張するPostクラス
{
    protected $table = 'posts'; //コントローラーからインスタンスを呼び出すとpostsテーブルを選択できる
}
