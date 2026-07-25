<?php

namespace App\Exports;

use App\Models\PemasukanHasilProduksi;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PemasukanHasilProduksiExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
    protected $from_date, $to_date;

    public function __construct($from_date = null, $to_date = null)
    {
        $this->from_date = $from_date;
        $this->to_date = $to_date;
    }

    public function query()
    {
        $q = PemasukanHasilProduksi::query();
        if ($this->from_date && $this->to_date) {
            $q->whereBetween('dokumen_tanggal', [$this->from_date, $this->to_date]);
        }
        return $q->orderBy('dokumen_tanggal', 'desc');
    }

    public function headings(): array
    {
        return ['No', 'Dokumen Nomor', 'Dokumen Tanggal', 'Kode Barang', 'Nama Barang', 'Satuan', 'Jml Produksi', 'Jml Subkontrak', 'Gudang'];
    }

    public function map($row): array
    {
        static $i = 0;
        $i++;
        return [
            $i,
            $row->dokumen_nomor,
            $row->dokumen_tanggal?->format('d/m/Y'),
            $row->kode_barang,
            $row->nama_barang,
            $row->satuan,
            $row->jumlah_produksi,
            $row->jumlah_subkon,
            $row->gudang,
        ];
    }
}
