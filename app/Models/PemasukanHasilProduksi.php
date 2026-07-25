<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PemasukanHasilProduksi extends Model
{
    protected $table = 'pemasukan_hasil_produksi';

    public $timestamps = false;

    protected $fillable = [
        'dokumen_nomor', 'dokumen_tanggal',
        'kode_barang', 'nama_barang', 'satuan',
        'jumlah_produksi', 'jumlah_subkon', 'gudang',
        'created_date', 'created_by', 'synced_at',
    ];

    protected $casts = [
        'dokumen_tanggal' => 'date',
        'jumlah_produksi' => 'decimal:4',
        'jumlah_subkon' => 'decimal:4',
        'created_date' => 'datetime',
        'synced_at' => 'datetime',
    ];
}
