<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PemakaianBahanBaku extends Model
{
    protected $table = 'pemakaian_bahan_baku';

    public $timestamps = false;

    protected $fillable = [
        'key_number', 'no_pengeluaran', 'tgl_pengeluaran',
        'id_product', 'name_product', 'uom',
        'qty_usage', 'warehouse', 'created_by', 'created_date', 'synced_at',
    ];

    protected $casts = [
        'tgl_pengeluaran' => 'date',
        'qty_usage' => 'decimal:4',
        'created_date' => 'datetime',
        'synced_at' => 'datetime',
    ];
}
