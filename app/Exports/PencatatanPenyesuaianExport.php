<?php

namespace App\Exports;

use App\Models\PencatatanPenyesuaian;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PencatatanPenyesuaianExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
    protected $from_date, $to_date;

    public function __construct($from_date = null, $to_date = null)
    {
        $this->from_date = $from_date;
        $this->to_date = $to_date;
    }

    public function query()
    {
        $q = PencatatanPenyesuaian::query();
        if ($this->from_date && $this->to_date) {
            $q->whereBetween('delivery_date', [$this->from_date, $this->to_date]);
        }
        return $q->orderBy('delivery_date', 'desc');
    }

    public function headings(): array
    {
        return ['No', 'PEB Baru', 'PEB Lama', 'Packing Slip', 'Delivery Date', 'Pembeli', 'Negara', 'Kode Barang', 'Nama Barang', 'Satuan', 'Jumlah', 'Mata Uang', 'Nilai'];
    }

    public function map($row): array
    {
        static $i = 0;
        $i++;
        return [
            $i,
            $row->peb_baru,
            $row->peb_lama,
            $row->packingslipid,
            $row->delivery_date?->format('d/m/Y'),
            $row->cust_name,
            $row->county,
            $row->item_id,
            $row->item_name,
            $row->unit,
            $row->qty,
            $row->currency_code,
            $row->amount,
        ];
    }
}
