<?php

use Illuminate\Database\Seeder;

class RestaurantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('restaurants')->insert([
            'user_id' => App\DataAccess\Eloquent\User::first()->id,
            'title' => 'hoge',
            'description' => 'hoge',
            'release_state' => 'public',
        ]);
    }
}
