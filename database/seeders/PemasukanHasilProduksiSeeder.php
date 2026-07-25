<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PemasukanHasilProduksiSeeder extends Seeder
{
    public function run()
    {
        DB::table('pemasukan_hasil_produksi')->insert([
            [
                'dokumen_nomor' => 'PROD-2024-001',
                'dokumen_tanggal' => '2024-01-10', 'kode_barang' => 'FG-001',
                'nama_barang' => 'T-Shirt Cotton Basic', 'satuan' => 'PCS',
                'jumlah_produksi' => 2500, 'jumlah_subkon' => 0, 'gudang' => 'G03',
                'created_by' => 'API_SYSTEM',
            ],
            [
                'dokumen_nomor' => 'PROD-2024-002',
                'dokumen_tanggal' => '2024-01-15', 'kode_barang' => 'FG-002',
                'nama_barang' => 'Polo Shirt Pique', 'satuan' => 'PCS',
                'jumlah_produksi' => 1800, 'jumlah_subkon' => 500, 'gudang' => 'G03',
                'created_by' => 'API_SYSTEM',
            ],
            [
                'dokumen_nomor' => 'PROD-2024-003',
                'dokumen_tanggal' => '2024-02-01', 'kode_barang' => 'FG-003',
                'nama_barang' => 'Jacket Windbreaker', 'satuan' => 'PCS',
                'jumlah_produksi' => 1200, 'jumlah_subkon' => 0, 'gudang' => 'G03',
                'created_by' => 'API_SYSTEM',
            ],
            [
                'dokumen_nomor' => 'PROD-2024-004',
                'dokumen_tanggal' => '2024-02-10', 'kode_barang' => 'FG-004',
                'nama_barang' => 'Celana Jogger Poly', 'satuan' => 'PCS',
                'jumlah_produksi' => 3000, 'jumlah_subkon' => 1000, 'gudang' => 'G04',
                'created_by' => 'API_SYSTEM',
            ],
            [
                'dokumen_nomor' => 'PROD-2024-005',
                'dokumen_tanggal' => '2024-03-01', 'kode_barang' => 'FG-005',
                'nama_barang' => 'Hoodie Fleece', 'satuan' => 'PCS',
                'jumlah_produksi' => 2000, 'jumlah_subkon' => 0, 'gudang' => 'G03',
                'created_by' => 'API_SYSTEM',
            ],
        ]);
    }
}
