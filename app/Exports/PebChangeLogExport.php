<?php

namespace App\Exports;

use App\Models\PebChangeLog;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PebChangeLogExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
    protected $from_date, $to_date;

    public function __construct($from_date = null, $to_date = null)
    {
        $this->from_date = $from_date;
        $this->to_date = $to_date;
    }

    public function query()
    {
        $q = PebChangeLog::query();
        if ($this->from_date && $this->to_date) {
            $q->whereBetween('datetimechange', [$this->from_date . ' 00:00:00', $this->to_date . ' 23:59:59']);
        }
        return $q->orderBy('datetimechange', 'desc');
    }

    public function headings(): array
    {
        return ['No', 'Datetime Change', 'Internal Packing Slip', 'Packing Slip ID', 'PEB Date Baru', 'PEB Date Lama', 'User ID', 'Data Area', 'Rec Version', 'Partition', 'Rec ID'];
    }

    public function map($row): array
    {
        static $i = 0;
        $i++;
        return [
            $i,
            $row->datetimechange?->format('d/m/Y H:i:s'),
            $row->internalpackingslipid,
            $row->packingslipid,
            $row->pebdatebaru?->format('d/m/Y'),
            $row->pebdatelama?->format('d/m/Y'),
            $row->userid,
            $row->dataareaid,
            $row->recversion,
            $row->partition_col,
            $row->recid,
        ];
    }
}
