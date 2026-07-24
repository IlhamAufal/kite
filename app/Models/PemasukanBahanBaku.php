<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PemasukanBahanBaku extends Model
{
    protected $table = 'pemasukan_bahan_baku';

    public $timestamps = false;

    protected $fillable = [
        'key_number', 'tgl_rekam', 'doc_type', 'nomor_pib', 'tanggal_pib',
        'kode_hs', 'gr_number', 'gr_date', 'id_product', 'name_product',
        'uom', 'qty', 'currency', 'amount', 'warehouse', 'country',
        'created_date', 'created_by', 'synced_at',
    ];

    protected $casts = [
        'tgl_rekam' => 'date',
        'tanggal_pib' => 'date',
        'gr_date' => 'date',
        'qty' => 'decimal:4',
        'amount' => 'decimal:2',
        'created_date' => 'datetime',
        'synced_at' => 'datetime',
    ];
}
