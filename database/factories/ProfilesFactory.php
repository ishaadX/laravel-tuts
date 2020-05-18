<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use App\User;
use Carbon\Factory;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class)->create(),
        'description' => $faker->sentence,
        'web_link' => $faker->unique()->url,
    ];
});
