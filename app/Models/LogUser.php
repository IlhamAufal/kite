<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogUser extends Model
{
    protected $table = 'loguser';

    public $timestamps = false;

    protected $fillable = [
        'userid',
        'ip_address',
        'status',
        'user_agent',
        'login_at',
    ];

    protected $casts = [
        'login_at' => 'datetime',
    ];
}
