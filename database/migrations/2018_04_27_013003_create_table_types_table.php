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
            $table->integer('page_id')->unsigned();
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->enum('release_state', ['public', 'private']); // 公開状態
            $table->string('title'); // 席名称
            $table->time('start_time'); // 利用開始時間
            $table->time('end_time'); // 利用終了時間
            $table->integer('minimum_capacity'); // 最低定員数
            $table->integer('max_capacity'); // 最大定員数
            $table->integer('number_of_sales'); // 販売可能数
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
