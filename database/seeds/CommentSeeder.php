<?php

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('comments')->insert([
        ['User_id'=>1,'Post_id'=>7,'Content'=>"1NewComment one Content"],
        ['User_id'=>2,'Post_id'=>8,'Content'=>"2NewComment two Content"],
        ['User_id'=>3,'Post_id'=>9,'Content'=>"3NewComent three Content"]
      ]);
    }
}
