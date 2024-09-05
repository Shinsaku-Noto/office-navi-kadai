<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class OfficeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('offices')->insert([
            'name' => 'QQ English',
            'address' => 'Skyrise 4',
            'post_code' => '1234567',
            'stair' => 7,
        ]);
    }
}
