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

$factory->define(App\DataAccess\Eloquent\TableType::class, function (Faker $faker) {
    return [
        'release_state' => 'public',
        'table_type_name' => $faker->name,
        'available_start_time' => '10:00',
        'available_end_time' => '18:00',
        'minimum_capacity' => '1',
        'max_capacity' => '4',
        'number_of_sales' => '4',
        'connectable' => true,
    ];
});
