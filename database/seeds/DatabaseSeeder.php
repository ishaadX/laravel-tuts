<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;
use App\Posts;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        // DB::table('users')->insert([
        //     'name'      => Str::random(10),
        //     'username'  => Str::random(8),
        //     'email'     => Str::random(10) . '@gmail.com',
        //     'password'  => Hash::make('password'),
        // ]);

        // factory(User::class, 50)->create();

        factory(User::class, 50)->create()->each(function ($user) {
            $user->posts()->save(factory(Posts::class)->make());
        });
    }
}
