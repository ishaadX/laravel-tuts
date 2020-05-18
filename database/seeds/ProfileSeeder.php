<?php

use App\Profile;
use App\User;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Profile::class, 2)->create();
        // factory(User::class, 5)->create()->each(function ($user) {
        //     $user->profile()->save(factory(Profile::class)->make());
        // });
    }
}
