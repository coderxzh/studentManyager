<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('student')->insert([
            'name' => '徐宗辉',
            'number' => '2019551202',
            'gender' => '男',
            'class' => '2019级数媒1班',
            'age' => '22',
            'teacher' => '杨骏',
            'xibie' => '信息工程管理系',
            'class_id' => 1
        ]);
    }
}
