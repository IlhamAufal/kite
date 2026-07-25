<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PebChangeLogSeeder extends Seeder
{
    public function run()
    {
        DB::table('peb_change_log')->insert([
            [
                'datetimechange' => '2024-01-15 10:30:00',
                'internalpackingslipid' => 'IPS-00001', 'packingslipid' => 'PS-00001',
                'pebdatebaru' => '2024-01-20', 'pebdatelama' => '2024-01-10',
                'userid' => 'admin01', 'dataareaid' => 'YP', 'recversion' => 1,
                'partition_col' => 'initial', 'recid' => 'REC-0001', 'created_by' => 'API_SYSTEM',
            ],
            [
                'datetimechange' => '2024-01-18 14:00:00',
                'internalpackingslipid' => 'IPS-00002', 'packingslipid' => 'PS-00002',
                'pebdatebaru' => '2024-01-25', 'pebdatelama' => '2024-01-12',
                'userid' => 'admin02', 'dataareaid' => 'YP', 'recversion' => 1,
                'partition_col' => 'initial', 'recid' => 'REC-0002', 'created_by' => 'API_SYSTEM',
            ],
            [
                'datetimechange' => '2024-02-05 09:15:00',
                'internalpackingslipid' => 'IPS-00003', 'packingslipid' => 'PS-00003',
                'pebdatebaru' => '2024-02-10', 'pebdatelama' => '2024-02-01',
                'userid' => 'admin01', 'dataareaid' => 'YP', 'recversion' => 2,
                'partition_col' => 'initial', 'recid' => 'REC-0003', 'created_by' => 'API_SYSTEM',
            ],
            [
                'datetimechange' => '2024-02-20 16:45:00',
                'internalpackingslipid' => 'IPS-00004', 'packingslipid' => 'PS-00004',
                'pebdatebaru' => '2024-02-28', 'pebdatelama' => '2024-02-15',
                'userid' => 'admin03', 'dataareaid' => 'YP', 'recversion' => 1,
                'partition_col' => 'initial', 'recid' => 'REC-0004', 'created_by' => 'API_SYSTEM',
            ],
            [
                'datetimechange' => '2024-03-10 11:00:00',
                'internalpackingslipid' => 'IPS-00005', 'packingslipid' => 'PS-00005',
                'pebdatebaru' => '2024-03-15', 'pebdatelama' => '2024-03-05',
                'userid' => 'admin01', 'dataareaid' => 'YP', 'recversion' => 1,
                'partition_col' => 'initial', 'recid' => 'REC-0005', 'created_by' => 'API_SYSTEM',
            ],
        ]);
    }
}
