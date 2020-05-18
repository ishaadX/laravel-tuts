<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // factory(User::class, 2)->create();
        $this->call(UserSeeder::class);
        $this->call(PostsSeeder::class);
        $this->call(ProfileSeeder::class);
        $this->call(TagsSeeder::class);
    }
}
