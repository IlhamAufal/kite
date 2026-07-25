<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'user';

    protected $primaryKey = 'userid';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'userid',
        'userpswd',
        'company',
    ];

    protected $hidden = [
        'userpswd',
    ];

    public function getAuthPassword()
    {
        return $this->userpswd;
    }
}
