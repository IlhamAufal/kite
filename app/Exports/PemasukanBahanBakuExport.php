<?php

namespace App\Exports;

use App\Models\PemasukanBahanBaku;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PemasukanBahanBakuExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
    protected $from_date, $to_date;

    public function __construct($from_date = null, $to_date = null)
    {
        $this->from_date = $from_date;
        $this->to_date = $to_date;
    }

    public function query()
    {
        $q = PemasukanBahanBaku::query();
        if ($this->from_date && $this->to_date) {
            $q->whereBetween('tgl_rekam', [$this->from_date, $this->to_date]);
        }
        return $q->orderBy('tgl_rekam', 'desc');
    }

    public function headings(): array
    {
        return ['No', 'Tgl Rekam', 'Jenis Dokumen', 'Nomor PIB', 'Tanggal PIB', 'Kode HS', 'GR Number', 'GR Date', 'Kode BB', 'Nama Barang', 'Satuan', 'Jumlah', 'Mata Uang', 'Nilai Barang', 'Gudang', 'Penerima Subkontrak', 'Negara Asal'];
    }

    public function map($row): array
    {
        static $i = 0;
        $i++;
        return [
            $i,
            $row->tgl_rekam?->format('d/m/Y'),
            $row->doc_type,
            $row->nomor_pib,
            $row->tanggal_pib?->format('d/m/Y'),
            $row->kode_hs,
            $row->gr_number,
            $row->gr_date?->format('d/m/Y'),
            $row->id_product,
            $row->name_product,
            $row->uom,
            $row->qty,
            $row->currency,
            $row->amount,
            $row->warehouse,
            $row->penerima_subkontrak,
            $row->country,
        ];
    }
}
