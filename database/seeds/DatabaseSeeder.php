<?php

use Illuminate\Database\Seeder;

use App\Seeders\AboutSeeder;
use App\Seeders\CommentSeeder;
use App\Seeders\ContactSeeder;
use App\Seeders\PostSeeder;
use App\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(PostSeeder::class);
		$this->call(CommentSeeder::class);
        $this->call(AboutSeeder::class);
        $this->call(ContactSeeder::class);
    }
}
