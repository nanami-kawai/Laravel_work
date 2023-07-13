<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([

        ['contents' => '1つ目の投稿になります'],

        ['contents' => '2つ目の投稿になります'],

        ['contents' => '3つ目の投稿になります'],

        ['contents' => '4つ目の投稿になります'],

        ['contents' => '5つ目の投稿になります']

        ['user_name' => 'aaa'],

        ['user_name' => 'bbb'],

        ['user_name' => 'ccc'],

        ['user_name' => 'ddd'],

        ['user_name' => 'eee'],

        ]);
    }
}
