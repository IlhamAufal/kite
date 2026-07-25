<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MutasiHasilProduksiSeeder extends Seeder
{
    public function run()
    {
        DB::table('mutasi_hasil_produksi')->insert([
            [
                'bulan' => '01', 'tahun' => '2024',
                'kode_barang' => 'FG-001', 'nama_barang' => 'T-Shirt Cotton Basic', 'satuan' => 'PCS',
                'saldo_awal' => 2000, 'pemasukan' => 5000, 'pemasukan_other' => 0,
                'pengeluaran' => 4500, 'pengeluaran_other' => 0, 'saldo_akhir' => 2500,
                'gudang' => 'G03', 'created_by' => 'API_SYSTEM',
            ],
            [
                'bulan' => '01', 'tahun' => '2024',
                'kode_barang' => 'FG-002', 'nama_barang' => 'Polo Shirt Pique', 'satuan' => 'PCS',
                'saldo_awal' => 1500, 'pemasukan' => 3000, 'pemasukan_other' => 100,
                'pengeluaran' => 3200, 'pengeluaran_other' => 50, 'saldo_akhir' => 1350,
                'gudang' => 'G03', 'created_by' => 'API_SYSTEM',
            ],
            [
                'bulan' => '02', 'tahun' => '2024',
                'kode_barang' => 'FG-003', 'nama_barang' => 'Jacket Windbreaker', 'satuan' => 'PCS',
                'saldo_awal' => 500, 'pemasukan' => 1200, 'pemasukan_other' => 0,
                'pengeluaran' => 800, 'pengeluaran_other' => 0, 'saldo_akhir' => 900,
                'gudang' => 'G03', 'created_by' => 'API_SYSTEM',
            ],
            [
                'bulan' => '02', 'tahun' => '2024',
                'kode_barang' => 'FG-004', 'nama_barang' => 'Celana Jogger Poly', 'satuan' => 'PCS',
                'saldo_awal' => 3000, 'pemasukan' => 4000, 'pemasukan_other' => 200,
                'pengeluaran' => 5000, 'pengeluaran_other' => 100, 'saldo_akhir' => 2100,
                'gudang' => 'G04', 'created_by' => 'API_SYSTEM',
            ],
            [
                'bulan' => '03', 'tahun' => '2024',
                'kode_barang' => 'FG-005', 'nama_barang' => 'Hoodie Fleece', 'satuan' => 'PCS',
                'saldo_awal' => 800, 'pemasukan' => 2000, 'pemasukan_other' => 0,
                'pengeluaran' => 1500, 'pengeluaran_other' => 0, 'saldo_akhir' => 1300,
                'gudang' => 'G03', 'created_by' => 'API_SYSTEM',
            ],
        ]);
    }
}
