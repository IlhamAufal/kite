<?php

namespace App\Exports;

use App\Models\MutasiHasilProduksi;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class MutasiHasilProduksiExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
    protected $from_date, $to_date;
    protected $month, $year;

    public function __construct($from_date = null, $to_date = null, $month = null, $year = null)
    {
        $this->from_date = $from_date;
        $this->to_date = $to_date;
        $this->month = $month;
        $this->year = $year;
    }

    public function query()
    {
        $q = MutasiHasilProduksi::query();
        if ($this->month && $this->year) {
            $q->where('bulan', $this->month)->where('tahun', $this->year);
        }
        return $q->orderBy('kode_barang');
    }

    public function headings(): array
    {
        return ['No', 'Bulan', 'Tahun', 'Kode Barang', 'Nama Barang', 'Satuan', 'Saldo Awal', 'Pemasukan', 'Pemasukan Other', 'Pengeluaran', 'Pengeluaran Other', 'Saldo Akhir', 'Gudang'];
    }

    public function map($row): array
    {
        static $i = 0;
        $i++;
        return [
            $i,
            $row->bulan,
            $row->tahun,
            $row->kode_barang,
            $row->nama_barang,
            $row->satuan,
            $row->saldo_awal,
            $row->pemasukan,
            $row->pemasukan_other,
            $row->pengeluaran,
            $row->pengeluaran_other,
            $row->saldo_akhir,
            $row->gudang,
        ];
    }
}
