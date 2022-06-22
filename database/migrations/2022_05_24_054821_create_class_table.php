<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class', function (Blueprint $table) {
            $table->increments('id')->comment('班级编号');
            $table->string('class_name', 30)->comment('班级名称')->unique();
            $table->string('xibie', 20)->default('信息工程管理系')->comment('所属系别');
            $table->string('teacher', 10)->comment('辅导员');
            $table->integer('number')->comment('人数');
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
        Schema::dropIfExists('class');
    }
}
