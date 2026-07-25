<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MutasiBahanBaku extends Model
{
    protected $table = 'mutasi_bahan_baku';

    public $timestamps = false;

    protected $fillable = [
        'bulan', 'tahun', 'key_number', 'kode_barang', 'nama_barang',
        'satuan', 'saldo_awal', 'pemasukan', 'pemasukan_lain',
        'pengeluaran', 'pengeluaran_lain', 'saldo_akhir',
        'gudang', 'created_date', 'created_by', 'synced_at',
    ];

    protected $casts = [
        'saldo_awal' => 'decimal:4',
        'pemasukan' => 'decimal:4',
        'pemasukan_lain' => 'decimal:4',
        'pengeluaran' => 'decimal:4',
        'pengeluaran_lain' => 'decimal:4',
        'saldo_akhir' => 'decimal:4',
        'created_date' => 'datetime',
        'synced_at' => 'datetime',
    ];
}
