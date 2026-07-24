<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            MutasiBahanBakuSeeder::class,
            MutasiHasilProduksiSeeder::class,
            PebChangeLogSeeder::class,
            PemakaianBahanBakuSeeder::class,
            PemasukanBahanBakuSeeder::class,
            PemasukanHasilProduksiSeeder::class,
            PencatatanPenyesuaianSeeder::class,
            PengeluaranHasilProduksiSeeder::class,
        ]);
    }
}
