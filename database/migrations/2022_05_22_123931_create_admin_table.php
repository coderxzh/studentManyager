<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('admin', function (Blueprint $table) {
            $table->increments('id')->comment('主键');
            $table->string('username', 30)->comment('用户名')->unique();
            $table->string('password', 100)->comment('密码');
            $table->string('token', 200)->comment('凭证')->unique();
            $table->string('type', 20)->comment('用户类型');
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
        Schema::dropIfExists('admin');
    }
}
