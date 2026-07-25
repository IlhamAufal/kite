<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PebChangeLog extends Model
{
    protected $table = 'peb_change_log';

    public $timestamps = false;

    protected $fillable = [
        'key_number', 'datetimechange', 'internalpackingslipid',
        'packingslipid', 'pebdatebaru', 'pebdatelama',
        'userid', 'dataareaid', 'recversion',
        'partition_col', 'recid', 'created_date', 'created_by', 'synced_at',
    ];

    protected $casts = [
        'datetimechange' => 'datetime',
        'pebdatebaru' => 'date',
        'pebdatelama' => 'date',
        'created_date' => 'datetime',
        'synced_at' => 'datetime',
    ];
}
