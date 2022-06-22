<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->increments('id')->comment('主键');
            $table->string('name', 10)->comment('姓名');
            $table->string('class_name', 30)->comment('班级名称');
            $table->string('number', 10)->comment('学号')->unique();
            $table->string('gender', 2)->default('男')->comment('性别');
            $table->string('age', 3)->comment('年龄');
            $table->string('teacher', 10)->comment('辅导员');
            $table->string('xibie', 20)->comment('系别');
            $table->unsignedInteger('class_id')->comment('班级编号');
            $table->foreign('class_id')->references('id')->on('class');
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
        Schema::dropIfExists('student');
    }
}
