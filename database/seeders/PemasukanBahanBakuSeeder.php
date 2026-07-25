<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PemasukanBahanBakuSeeder extends Seeder
{
    public function run()
    {
        DB::table('pemasukan_bahan_baku')->insert([
            [
                'tgl_rekam' => '2024-01-03', 'doc_type' => 'PIB',
                'nomor_pib' => '000100', 'tanggal_pib' => '2024-01-02', 'kode_hs' => '5503.20.00',
                'gr_number' => 'GR-2024-001', 'gr_date' => '2024-01-03',
                'id_product' => 'BB-001', 'name_product' => 'Polyester Fiber', 'uom' => 'KG',
                'qty' => 2000, 'currency' => 'USD', 'amount' => 5000,
                'warehouse' => 'G01', 'country' => 'China', 'created_by' => 'API_SYSTEM',
            ],
            [
                'tgl_rekam' => '2024-01-08', 'doc_type' => 'PIB',
                'nomor_pib' => '000101', 'tanggal_pib' => '2024-01-07', 'kode_hs' => '5205.11.00',
                'gr_number' => 'GR-2024-002', 'gr_date' => '2024-01-08',
                'id_product' => 'BB-002', 'name_product' => 'Cotton Yarn 30s', 'uom' => 'KG',
                'qty' => 1000, 'currency' => 'USD', 'amount' => 3200,
                'warehouse' => 'G01', 'country' => 'India', 'created_by' => 'API_SYSTEM',
            ],
            [
                'tgl_rekam' => '2024-01-15', 'doc_type' => 'PIB',
                'nomor_pib' => '000102', 'tanggal_pib' => '2024-01-14', 'kode_hs' => '5402.19.00',
                'gr_number' => 'GR-2024-003', 'gr_date' => '2024-01-15',
                'id_product' => 'BB-003', 'name_product' => 'Nylon Thread', 'uom' => 'ROLL',
                'qty' => 500, 'currency' => 'USD', 'amount' => 1500,
                'warehouse' => 'G02', 'country' => 'Taiwan', 'created_by' => 'API_SYSTEM',
            ],
            [
                'tgl_rekam' => '2024-02-01', 'doc_type' => 'PIB',
                'nomor_pib' => '000103', 'tanggal_pib' => '2024-01-30', 'kode_hs' => '9607.11.00',
                'gr_number' => 'GR-2024-004', 'gr_date' => '2024-02-01',
                'id_product' => 'BB-004', 'name_product' => 'Zipper Metal YKK', 'uom' => 'PCS',
                'qty' => 5000, 'currency' => 'JPY', 'amount' => 250000,
                'warehouse' => 'G01', 'country' => 'Japan', 'created_by' => 'API_SYSTEM',
            ],
            [
                'tgl_rekam' => '2024-02-10', 'doc_type' => 'PIB',
                'nomor_pib' => '000104', 'tanggal_pib' => '2024-02-09', 'kode_hs' => '5604.10.00',
                'gr_number' => 'GR-2024-005', 'gr_date' => '2024-02-10',
                'id_product' => 'BB-005', 'name_product' => 'Elastic Band 2cm', 'uom' => 'MTR',
                'qty' => 3000, 'currency' => 'USD', 'amount' => 900,
                'warehouse' => 'G02', 'country' => 'China', 'created_by' => 'API_SYSTEM',
            ],
        ]);
    }
}
