<?php

use Illuminate\Database\Seeder;
use App\Posts;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Posts::class, 5)->create();
    }
}
