<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PemakaianBahanBakuSeeder extends Seeder
{
    public function run()
    {
        DB::table('pemakaian_bahan_baku')->insert([
            [
                'no_pengeluaran' => 'OUT-2024-0001',
                'tgl_pengeluaran' => '2024-01-05', 'id_product' => 'BB-001',
                'name_product' => 'Polyester Fiber', 'uom' => 'KG',
                'qty_usage' => 500, 'warehouse' => 'G01', 'created_by' => 'API_SYSTEM',
            ],
            [
                'no_pengeluaran' => 'OUT-2024-0002',
                'tgl_pengeluaran' => '2024-01-10', 'id_product' => 'BB-002',
                'name_product' => 'Cotton Yarn 30s', 'uom' => 'KG',
                'qty_usage' => 1200, 'warehouse' => 'G01', 'created_by' => 'API_SYSTEM',
            ],
            [
                'no_pengeluaran' => 'OUT-2024-0003',
                'tgl_pengeluaran' => '2024-01-15', 'id_product' => 'BB-003',
                'name_product' => 'Nylon Thread', 'uom' => 'ROLL',
                'qty_usage' => 200, 'warehouse' => 'G02', 'created_by' => 'API_SYSTEM',
            ],
            [
                'no_pengeluaran' => 'OUT-2024-0004',
                'tgl_pengeluaran' => '2024-02-01', 'id_product' => 'BB-004',
                'name_product' => 'Zipper Metal YKK', 'uom' => 'PCS',
                'qty_usage' => 3000, 'warehouse' => 'G01', 'created_by' => 'API_SYSTEM',
            ],
            [
                'no_pengeluaran' => 'OUT-2024-0005',
                'tgl_pengeluaran' => '2024-02-10', 'id_product' => 'BB-005',
                'name_product' => 'Elastic Band 2cm', 'uom' => 'MTR',
                'qty_usage' => 5000, 'warehouse' => 'G02', 'created_by' => 'API_SYSTEM',
            ],
        ]);
    }
}
