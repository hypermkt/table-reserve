<?php

use Illuminate\Database\Seeder;

class CourseTableTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('course_table_type')->insert([
            'course_id' => 1,
            'table_type_id' => 1,
        ]);

        DB::table('course_table_type')->insert([
            'course_id' => 2,
            'table_type_id' => 2,
        ]);
    }
}
