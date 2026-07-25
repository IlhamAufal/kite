<?php

namespace App\Exports;

use App\Models\MutasiBahanBaku;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class MutasiBahanBakuExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
    protected $month, $year;

    public function __construct($month = null, $year = null)
    {
        $this->month = $month;
        $this->year = $year;
    }

    public function query()
    {
        $q = MutasiBahanBaku::query();
        if ($this->month && $this->year) {
            $q->where('bulan', $this->month)->where('tahun', $this->year);
        }
        return $q->orderBy('kode_barang');
    }

    public function headings(): array
    {
        return ['No', 'Kode Barang', 'Nama Barang', 'Satuan', 'Saldo Awal', 'Pemasukan', 'Pemasukan Lain', 'Pengeluaran', 'Pengeluaran Lain', 'Saldo Akhir', 'Gudang'];
    }

    public function map($row): array
    {
        static $i = 0;
        $i++;
        return [
            $i,
            $row->kode_barang,
            $row->nama_barang,
            $row->satuan,
            $row->saldo_awal,
            $row->pemasukan,
            $row->pemasukan_lain,
            $row->pengeluaran,
            $row->pengeluaran_lain,
            $row->saldo_akhir,
            $row->gudang,
        ];
    }
}
