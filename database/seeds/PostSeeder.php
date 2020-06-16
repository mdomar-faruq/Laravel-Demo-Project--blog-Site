<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
          ['User_id'=>1,'title'=>"post 4",'Content'=>"Post 4 Content"],
          ['User_id'=>1,'title'=>"post 5",'Content'=>"Post 5 Content"],
          ['User_id'=>2,'title'=>"post 6",'Content'=>"Post 6 Content"]
        ]);
    }
}
