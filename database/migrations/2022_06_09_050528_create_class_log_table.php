<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_log', function (Blueprint $table) {
            $table->increments('id')->comment('日志id');
            $table->integer('pid', 10)->comment('创建日志的班级的id');
            $table->foreign('pid')->references('id')->on('class');
            $table->text('context')->comment('日志正文');
            $table->string('synopsis')->comment('日志简介');
            $table->string('title')->comment('日志标题');
            $table->string('cover')->comment('日志封面');
            $table->date('create')->comment('日志创建时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_log');
    }
}
