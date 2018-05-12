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

$factory->define(App\Course::class, function (Faker $faker) {
    return [
        'release_state' => 'public',
        'kind' => 'course_menu',
        'course_name' => 'hoge',
        'price' => 1000,
        'duration_minutes' => 60,
    ];
});
