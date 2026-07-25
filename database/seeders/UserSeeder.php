<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('user')->insert([
            ['userid' => 'admin01', 'userpswd' => Hash::make('admin123'), 'company' => 'PT Yamaha Printing'],
            ['userid' => 'admin02', 'userpswd' => Hash::make('admin234'), 'company' => 'PT Yamaha Printing'],
            ['userid' => 'admin03', 'userpswd' => Hash::make('admin345'), 'company' => 'PT Yamaha Printing'],
            ['userid' => 'operator1', 'userpswd' => Hash::make('oper123'), 'company' => 'PT Yamaha Printing'],
            ['userid' => 'viewer01', 'userpswd' => Hash::make('view123'), 'company' => 'PT Yamaha Printing'],
        ]);
    }
}
