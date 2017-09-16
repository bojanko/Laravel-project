<?php
namespace App\Seeders;

use Illuminate\Database\Seeder;

use App\About;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      About::truncate();

      $content = new About();
      $content->naslov = "Example about page";
      $content->sadrzaj = "This is example about page content.";
      $content->save();
    }
}
