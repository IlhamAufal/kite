<?php

namespace App\Exports;

use App\Models\PengeluaranHasilProduksi;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PengeluaranHasilProduksiExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
    protected $from_date, $to_date;

    public function __construct($from_date = null, $to_date = null)
    {
        $this->from_date = $from_date;
        $this->to_date = $to_date;
    }

    public function query()
    {
        $q = PengeluaranHasilProduksi::query();
        if ($this->from_date && $this->to_date) {
            $q->whereBetween('bk_pengeluaran_tanggal', [$this->from_date, $this->to_date]);
        }
        return $q->orderBy('bk_pengeluaran_tanggal', 'desc');
    }

    public function headings(): array
    {
        return ['No', 'PEB Nomor', 'PEB Tanggal', 'BK Pengeluaran Nomor', 'BK Pengeluaran Tanggal', 'Pembeli', 'Negara Tujuan', 'Kode Barang', 'Nama Barang', 'Satuan', 'Jumlah', 'Mata Uang', 'Nilai Barang', 'Net Weight', 'Gross Weight', 'Total Kg Net', 'Total Kg Gross'];
    }

    public function map($row): array
    {
        static $i = 0;
        $i++;
        return [
            $i,
            $row->peb_nomor,
            $row->peb_tanggal?->format('d/m/Y'),
            $row->bk_pengeluaran_nomor,
            $row->bk_pengeluaran_tanggal?->format('d/m/Y'),
            $row->pembeli,
            $row->negara_tujuan,
            $row->kode_barang,
            $row->nama_barang,
            $row->satuan,
            $row->jumlah,
            $row->mata_uang,
            $row->nilai_barang,
            $row->net_weight,
            $row->gross_weight,
            $row->total_kg_net,
            $row->total_kg_gross,
        ];
    }
}
