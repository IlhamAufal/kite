<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PencatatanPenyesuaianSeeder extends Seeder
{
    public function run()
    {
        DB::table('pencatatan_penyesuaian')->insert([
            [
                'key_number' => 'PP-2024-001', 'peb_baru' => 'PEB-2024-NEW-001',
                'peb_lama' => 'PEB-2024-OLD-001', 'packingslipid' => 'SLIP-2024-001',
                'delivery_date' => '2024-01-20', 'cust_name' => 'Nike Inc',
                'county' => 'United States', 'item_id' => 'FG-001',
                'item_name' => 'T-Shirt Cotton Basic', 'unit' => 'PCS',
                'qty' => 2000, 'currency_code' => 'USD', 'amount' => 12000,
            ],
            [
                'key_number' => 'PP-2024-002', 'peb_baru' => 'PEB-2024-NEW-002',
                'peb_lama' => 'PEB-2024-OLD-002', 'packingslipid' => 'SLIP-2024-002',
                'delivery_date' => '2024-02-05', 'cust_name' => 'Adidas AG',
                'county' => 'Germany', 'item_id' => 'FG-002',
                'item_name' => 'Polo Shirt Pique', 'unit' => 'PCS',
                'qty' => 1500, 'currency_code' => 'EUR', 'amount' => 15000,
            ],
            [
                'key_number' => 'PP-2024-003', 'peb_baru' => 'PEB-2024-NEW-003',
                'peb_lama' => 'PEB-2024-OLD-003', 'packingslipid' => 'SLIP-2024-003',
                'delivery_date' => '2024-02-15', 'cust_name' => 'Uniqlo Co Ltd',
                'county' => 'Japan', 'item_id' => 'FG-003',
                'item_name' => 'Jacket Windbreaker', 'unit' => 'PCS',
                'qty' => 800, 'currency_code' => 'JPY', 'amount' => 2400000,
            ],
            [
                'key_number' => 'PP-2024-004', 'peb_baru' => 'PEB-2024-NEW-004',
                'peb_lama' => 'PEB-2024-OLD-004', 'packingslipid' => 'SLIP-2024-004',
                'delivery_date' => '2024-03-01', 'cust_name' => 'H&M AB',
                'county' => 'Sweden', 'item_id' => 'FG-004',
                'item_name' => 'Celana Jogger Poly', 'unit' => 'PCS',
                'qty' => 3000, 'currency_code' => 'USD', 'amount' => 18000,
            ],
            [
                'key_number' => 'PP-2024-005', 'peb_baru' => 'PEB-2024-NEW-005',
                'peb_lama' => 'PEB-2024-OLD-005', 'packingslipid' => 'SLIP-2024-005',
                'delivery_date' => '2024-03-10', 'cust_name' => 'Zara Inditex',
                'county' => 'Spain', 'item_id' => 'FG-005',
                'item_name' => 'Hoodie Fleece', 'unit' => 'PCS',
                'qty' => 1000, 'currency_code' => 'EUR', 'amount' => 20000,
            ],
        ]);
    }
}
