<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('release_state', ['public', 'private']); // 公開状態
            $table->enum('kind', ['cource_menu', 'only_table']); // 区分
            $table->string('title'); // メニュー名
            $table->integer('price'); // 料金
            $table->integer('duration_minutes'); // 滞在時間(分)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
