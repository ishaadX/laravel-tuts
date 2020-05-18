<?php

use Illuminate\Database\Seeder;
use App\Posts;
use App\Tags;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Tags::class, 5)->create();
        // factory(Tags::class, 5)->create()->each(function ($tags) {
        //     $tags->posts()->save(factory(Posts::class)->make());
        // });

    }
}
