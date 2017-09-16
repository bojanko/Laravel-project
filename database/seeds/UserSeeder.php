<?php
namespace App\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
      $content->name = env("ADMIN_USERNAME", "Admin");
	  $content->email = env("ADMIN_EMAIL", "admin@homestead.app");
      $content->password = Hash::make(env("ADMIN_PASSWORD", "Admin"));
      $content->manager = 1;
	  $content->superadmin = 1;
      $content->save();
    }
}
