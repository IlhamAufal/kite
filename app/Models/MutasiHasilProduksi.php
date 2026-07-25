<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MutasiHasilProduksi extends Model
{
    protected $table = 'mutasi_hasil_produksi';

    public $timestamps = false;

    protected $fillable = [
        'bulan', 'tahun', 'kode_barang', 'nama_barang',
        'satuan', 'saldo_awal', 'pemasukan', 'pemasukan_other',
        'pengeluaran', 'pengeluaran_other', 'saldo_akhir',
        'gudang', 'created_date', 'created_by', 'synced_at',
    ];

    protected $casts = [
        'saldo_awal' => 'decimal:4',
        'pemasukan' => 'decimal:4',
        'pemasukan_other' => 'decimal:4',
        'pengeluaran' => 'decimal:4',
        'pengeluaran_other' => 'decimal:4',
        'saldo_akhir' => 'decimal:4',
        'created_date' => 'datetime',
        'synced_at' => 'datetime',
    ];
}
