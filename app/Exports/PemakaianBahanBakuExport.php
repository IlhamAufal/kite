<?php

namespace App\Exports;

use App\Models\PemakaianBahanBaku;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PemakaianBahanBakuExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
    protected $from_date, $to_date;

    public function __construct($from_date = null, $to_date = null)
    {
        $this->from_date = $from_date;
        $this->to_date = $to_date;
    }

    public function query()
    {
        $q = PemakaianBahanBaku::query();
        if ($this->from_date && $this->to_date) {
            $q->whereBetween('tgl_pengeluaran', [$this->from_date, $this->to_date]);
        }
        return $q->orderBy('tgl_pengeluaran', 'desc');
    }

    public function headings(): array
    {
        return ['No', 'No Pengeluaran', 'Tgl Pengeluaran', 'Kode Barang', 'Nama Barang', 'Satuan', 'Jml Digunakan', 'Jml Disubkontrakkan', 'Penerima Subkontrak', 'Gudang'];
    }

    public function map($row): array
    {
        static $i = 0;
        $i++;
        return [
            $i,
            $row->no_pengeluaran,
            $row->tgl_pengeluaran?->format('d/m/Y'),
            $row->id_product,
            $row->name_product,
            $row->uom,
            $row->qty_usage,
            $row->jumlah_disubkontrakkan,
            $row->penerima_subkontrak,
            $row->warehouse,
        ];
    }
}
