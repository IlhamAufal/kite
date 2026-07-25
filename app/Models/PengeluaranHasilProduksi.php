<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengeluaranHasilProduksi extends Model
{
    protected $table = 'pengeluaran_hasil_produksi';

    public $timestamps = false;

    protected $fillable = [
        'peb_nomor', 'peb_tanggal',
        'bk_pengeluaran_nomor', 'bk_pengeluaran_tanggal',
        'pembeli', 'negara_tujuan', 'kode_barang', 'nama_barang',
        'satuan', 'jumlah', 'mata_uang', 'nilai_barang',
        'net_weight', 'gross_weight', 'total_kg_net', 'total_kg_gross',
        'created_date', 'created_by', 'synced_at',
    ];

    protected $casts = [
        'peb_tanggal' => 'date',
        'bk_pengeluaran_tanggal' => 'date',
        'jumlah' => 'decimal:4',
        'nilai_barang' => 'decimal:2',
        'net_weight' => 'decimal:4',
        'gross_weight' => 'decimal:4',
        'total_kg_net' => 'decimal:4',
        'total_kg_gross' => 'decimal:4',
        'created_date' => 'datetime',
        'synced_at' => 'datetime',
    ];
}
