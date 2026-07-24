<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'user';

    public $timestamps = false;

    protected $primaryKey = null;
    public $incrementing = false;

    protected $fillable = [
        'userid',
        'userpswd',
        'company',
    ];

    protected $hidden = [
        'userpswd',
    ];

    /**
     * Get the password for authentication.
     */
    public function getAuthPassword()
    {
        return $this->userpswd;
    }

    /**
     * Get the unique identifier for the user (used by session guard).
     */
    public function getAuthIdentifierName()
    {
        return 'userid';
    }
}
