<?php

use Illuminate\Database\Seeder;

class TableTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('table_types')->insert([
            'restaurant_id' => App\DataAccess\Eloquent\Restaurant::first()->id,
            'user_id' => App\DataAccess\Eloquent\User::first()->id,
            'release_state' => 'public',
            'table_type_name' => '小テーブル',
            'available_start_time' => '17:00:00',
            'available_end_time' => '23:00:00',
            'minimum_capacity' => 1,
            'max_capacity' => 2,
            'number_of_sales' => 5,
            'connectable' => true,
        ]);

        DB::table('table_types')->insert([
            'restaurant_id' => App\DataAccess\Eloquent\Restaurant::first()->id,
            'user_id' => App\DataAccess\Eloquent\User::first()->id,
            'release_state' => 'public',
            'table_type_name' => '中テーブル',
            'available_start_time' => '17:00:00',
            'available_end_time' => '23:00:00',
            'minimum_capacity' => 1,
            'max_capacity' => 4,
            'number_of_sales' => 5,
            'connectable' => true,
        ]);
    }
}
