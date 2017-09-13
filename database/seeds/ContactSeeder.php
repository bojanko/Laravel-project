<?php

use Illuminate\Database\Seeder;

use App\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Contact::truncate();

      $content = new Contact();
      $content->naslov = "Example contact page";
      $content->sadrzaj = "This is example contact page content.";
      $content->save();
    }
}
