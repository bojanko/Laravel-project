<?php

use Illuminate\Database\Seeder;

use App\Comment;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Comment::truncate();

      for($i = 1; $i <= 20; $i+=3){
          if($i == 1){
              $content = new Comment();
              $content->post_id = $i;
              $content->ime = "Name".$i;
              $content->sadrzaj = "This is example comment No".$i.".";
              $content->odobren = 1;
              $content->save();
          }
          
          $content = new Comment();
          $content->post_id = $i;
          $content->ime = "Name".$i;
          $content->sadrzaj = "This is example comment No".$i.".";
          $content->odobren = 1;
          $content->save();
      }
    }
}
