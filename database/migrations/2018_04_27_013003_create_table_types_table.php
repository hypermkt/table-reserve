<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_types', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('release_state', ['public', 'private']); // 公開状態
            $table->string('title'); // 席名称
            $table->time('start_time'); // 利用開始時間
            $table->time('end_time'); // 利用終了時間
            $table->time('minimum_capacity'); // 最低定員数
            $table->time('max_capacity'); // 最大定員数
            $table->time('number_of_sales'); // 販売可能数
            $table->boolean('connectable'); // コネクト

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
        Schema::dropIfExists('table_types');
    }
}
