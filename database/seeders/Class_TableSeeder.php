<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class Class_TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('class')->insert(
            [
                'id' => 2,
                'class_name' => '2019级数字媒体技术二班',
                'xibie' => '信息工程管理系',
                'teacher' => '杨骏',
                'number' => 30
            ]
        );
    }
}
