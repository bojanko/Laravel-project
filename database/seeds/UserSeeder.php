<?php

use Illuminate\Database\Seeder;

use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::truncate();

      $content = new User();
      $content->name = 'Admin';
	  $content->email = 'admin@homestead.app';
      $content->password = 'Admin';
      $content->manager = 1;
      $content->save();
    }
}
