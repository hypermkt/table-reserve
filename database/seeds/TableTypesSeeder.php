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
            'user_id' => App\User::first()->id,
            'release_state' => 'public',
            'title' => '小テーブル',
            'start_time' => '17:00:00',
            'end_time' => '23:00:00',
            'minimum_capacity' => 1,
            'max_capacity' => 2,
            'number_of_sales' => 5,
            'connectable' => true,
        ]);

        DB::table('table_types')->insert([
            'user_id' => App\User::first()->id,
            'release_state' => 'public',
            'title' => '中テーブル',
            'start_time' => '17:00:00',
            'end_time' => '23:00:00',
            'minimum_capacity' => 1,
            'max_capacity' => 4,
            'number_of_sales' => 5,
            'connectable' => true,
        ]);
    }
}
