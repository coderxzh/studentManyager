<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('admin')->insert([
            'username' => 'tinyxu',
            'password' => 'xzh1446266575',
            'token' => '44b4997c9a42b02e2ed3056fcdc80878',
            'type' => 'mannager'
        ]);
    }
}
