<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\DataAccess\Eloquent\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'handle' => $faker->name,
        'twitter_id' => $faker->uuid,
        'avatar' => $faker->imageUrl(),
        'remember_token' => str_random(10),
    ];
});
