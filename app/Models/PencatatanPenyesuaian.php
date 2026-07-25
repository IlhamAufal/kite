<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PencatatanPenyesuaian extends Model
{
    protected $table = 'pencatatan_penyesuaian';

    public $timestamps = false;

    protected $fillable = [
        'peb_baru', 'peb_lama', 'packingslipid',
        'delivery_date', 'cust_name', 'county', 'item_id',
        'item_name', 'unit', 'qty', 'currency_code', 'amount', 'synced_at',
    ];

    protected $casts = [
        'delivery_date' => 'date',
        'qty' => 'decimal:4',
        'amount' => 'decimal:4',
        'synced_at' => 'datetime',
    ];
}
