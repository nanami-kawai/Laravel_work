<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;//DBクラスを使う

class Posts extends Migration //Migrationを拡張するPostsクラス
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) { /*postsテーブル作成*/
        $table->increments('id',11); //テーブルにidカラムを入れる
        $table->string('user_name', 255); //テーブルにuser_nameカラムを入れる
        $table->string('contents', 255); //テーブルにcontentsカラムを入れる
        $table->timestamps(); //テーブルに作成日時、更新日時カラムを入れる
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');//postsテーブルを削除する
    }
}
