<?php

use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            'user_id' => App\User::first()->id,
            'title' => 'hoge',
            'description' => 'hoge',
            'release_state' => 'public',
        ]);
    }
}
