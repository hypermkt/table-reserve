<?php

use Illuminate\Database\Seeder;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            'user_id' => App\User::first()->id,
            'release_state' => 'public',
            'kind' => 'course_menu',
            'course_name' => '店長オススメ！2時間飲み放題付『国産牛すき焼きと刺身７点盛りプラン』',
            'price' => 10000,
            'duration_minutes' => 120,
        ]);

        DB::table('courses')->insert([
            'user_id' => App\User::first()->id,
            'release_state' => 'public',
            'kind' => 'course_menu',
            'course_name' => '2時間飲み放題付『牛タンの野菜蒸しコース』4,000円(打上げ　歓送迎会　飲み会　女子会)',
            'price' => 8000,
            'duration_minutes' => 120,
        ]);
    }
}
