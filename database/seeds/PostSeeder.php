<?php

use Illuminate\Database\Seeder;

use App\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Post::truncate();

      for($i = 1; $i <= 20; $i++){
          $content = new Post();
          $content->naslov = "Example post ".$i;
          $content->sadrzaj = "This is example post No".$i.".";
          $content->save();
      }
    }
}
