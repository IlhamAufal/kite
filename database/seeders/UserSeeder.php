<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('user')->insert([
            ['userid' => 'admin01', 'userpswd' => 'admin123', 'company' => 'PT Yamaha Printing'],
            ['userid' => 'admin02', 'userpswd' => 'admin234', 'company' => 'PT Yamaha Printing'],
            ['userid' => 'admin03', 'userpswd' => 'admin345', 'company' => 'PT Yamaha Printing'],
            ['userid' => 'operator1', 'userpswd' => 'oper123', 'company' => 'PT Yamaha Printing'],
            ['userid' => 'viewer01', 'userpswd' => 'view123', 'company' => 'PT Yamaha Printing'],
        ]);
    }
}
