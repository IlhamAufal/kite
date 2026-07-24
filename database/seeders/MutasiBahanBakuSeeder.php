<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MutasiBahanBakuSeeder extends Seeder
{
    public function run()
    {
        DB::table('mutasi_bahan_baku')->insert([
            [
                'bulan' => '01', 'tahun' => '2024', 'key_number' => 'MBB-2024-001',
                'kode_barang' => 'BB-001', 'nama_barang' => 'Polyester Fiber', 'satuan' => 'KG',
                'saldo_awal' => 5000, 'pemasukan' => 2000, 'pemasukan_lain' => 0,
                'pengeluaran' => 1500, 'pengeluaran_lain' => 0, 'saldo_akhir' => 5500,
                'gudang' => 'G01', 'created_by' => 'API_SYSTEM',
            ],
            [
                'bulan' => '01', 'tahun' => '2024', 'key_number' => 'MBB-2024-002',
                'kode_barang' => 'BB-002', 'nama_barang' => 'Cotton Yarn 30s', 'satuan' => 'KG',
                'saldo_awal' => 3000, 'pemasukan' => 1000, 'pemasukan_lain' => 200,
                'pengeluaran' => 2500, 'pengeluaran_lain' => 100, 'saldo_akhir' => 1600,
                'gudang' => 'G01', 'created_by' => 'API_SYSTEM',
            ],
            [
                'bulan' => '02', 'tahun' => '2024', 'key_number' => 'MBB-2024-003',
                'kode_barang' => 'BB-003', 'nama_barang' => 'Nylon Thread', 'satuan' => 'ROLL',
                'saldo_awal' => 800, 'pemasukan' => 500, 'pemasukan_lain' => 0,
                'pengeluaran' => 600, 'pengeluaran_lain' => 50, 'saldo_akhir' => 650,
                'gudang' => 'G02', 'created_by' => 'API_SYSTEM',
            ],
            [
                'bulan' => '02', 'tahun' => '2024', 'key_number' => 'MBB-2024-004',
                'kode_barang' => 'BB-004', 'nama_barang' => 'Zipper Metal YKK', 'satuan' => 'PCS',
                'saldo_awal' => 10000, 'pemasukan' => 5000, 'pemasukan_lain' => 0,
                'pengeluaran' => 8000, 'pengeluaran_lain' => 0, 'saldo_akhir' => 7000,
                'gudang' => 'G01', 'created_by' => 'API_SYSTEM',
            ],
            [
                'bulan' => '03', 'tahun' => '2024', 'key_number' => 'MBB-2024-005',
                'kode_barang' => 'BB-005', 'nama_barang' => 'Elastic Band 2cm', 'satuan' => 'MTR',
                'saldo_awal' => 15000, 'pemasukan' => 3000, 'pemasukan_lain' => 500,
                'pengeluaran' => 10000, 'pengeluaran_lain' => 200, 'saldo_akhir' => 8300,
                'gudang' => 'G02', 'created_by' => 'API_SYSTEM',
            ],
        ]);
    }
}
