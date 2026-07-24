<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengeluaranHasilProduksiSeeder extends Seeder
{
    public function run()
    {
        DB::table('pengeluaran_hasil_produksi')->insert([
            [
                'key_number' => 'PH-2024-001', 'peb_nomor' => '000200',
                'peb_tanggal' => '2024-01-20', 'bk_pengeluaran_nomor' => 'BK-2024-001',
                'bk_pengeluaran_tanggal' => '2024-01-18', 'pembeli' => 'Nike Inc',
                'negara_tujuan' => 'United States', 'kode_barang' => 'FG-001',
                'nama_barang' => 'T-Shirt Cotton Basic', 'satuan' => 'PCS',
                'jumlah' => 2000, 'mata_uang' => 'USD', 'nilai_barang' => 12000,
                'net_weight' => 400, 'gross_weight' => 450,
                'total_kg_net' => 400, 'total_kg_gross' => 450, 'created_by' => 'API_SYSTEM',
            ],
            [
                'key_number' => 'PH-2024-002', 'peb_nomor' => '000201',
                'peb_tanggal' => '2024-02-05', 'bk_pengeluaran_nomor' => 'BK-2024-002',
                'bk_pengeluaran_tanggal' => '2024-02-03', 'pembeli' => 'Adidas AG',
                'negara_tujuan' => 'Germany', 'kode_barang' => 'FG-002',
                'nama_barang' => 'Polo Shirt Pique', 'satuan' => 'PCS',
                'jumlah' => 1500, 'mata_uang' => 'EUR', 'nilai_barang' => 15000,
                'net_weight' => 375, 'gross_weight' => 420,
                'total_kg_net' => 375, 'total_kg_gross' => 420, 'created_by' => 'API_SYSTEM',
            ],
            [
                'key_number' => 'PH-2024-003', 'peb_nomor' => '000202',
                'peb_tanggal' => '2024-02-15', 'bk_pengeluaran_nomor' => 'BK-2024-003',
                'bk_pengeluaran_tanggal' => '2024-02-13', 'pembeli' => 'Uniqlo Co Ltd',
                'negara_tujuan' => 'Japan', 'kode_barang' => 'FG-003',
                'nama_barang' => 'Jacket Windbreaker', 'satuan' => 'PCS',
                'jumlah' => 800, 'mata_uang' => 'JPY', 'nilai_barang' => 2400000,
                'net_weight' => 320, 'gross_weight' => 380,
                'total_kg_net' => 320, 'total_kg_gross' => 380, 'created_by' => 'API_SYSTEM',
            ],
            [
                'key_number' => 'PH-2024-004', 'peb_nomor' => '000203',
                'peb_tanggal' => '2024-03-01', 'bk_pengeluaran_nomor' => 'BK-2024-004',
                'bk_pengeluaran_tanggal' => '2024-02-28', 'pembeli' => 'H&M AB',
                'negara_tujuan' => 'Sweden', 'kode_barang' => 'FG-004',
                'nama_barang' => 'Celana Jogger Poly', 'satuan' => 'PCS',
                'jumlah' => 3000, 'mata_uang' => 'USD', 'nilai_barang' => 18000,
                'net_weight' => 600, 'gross_weight' => 680,
                'total_kg_net' => 600, 'total_kg_gross' => 680, 'created_by' => 'API_SYSTEM',
            ],
            [
                'key_number' => 'PH-2024-005', 'peb_nomor' => '000204',
                'peb_tanggal' => '2024-03-10', 'bk_pengeluaran_nomor' => 'BK-2024-005',
                'bk_pengeluaran_tanggal' => '2024-03-08', 'pembeli' => 'Zara Inditex',
                'negara_tujuan' => 'Spain', 'kode_barang' => 'FG-005',
                'nama_barang' => 'Hoodie Fleece', 'satuan' => 'PCS',
                'jumlah' => 1000, 'mata_uang' => 'EUR', 'nilai_barang' => 20000,
                'net_weight' => 500, 'gross_weight' => 560,
                'total_kg_net' => 500, 'total_kg_gross' => 560, 'created_by' => 'API_SYSTEM',
            ],
        ]);
    }
}
