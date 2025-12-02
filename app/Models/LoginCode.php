<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoginCode extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'expires_at' => 'datetime',
    ];

    public function isExpired()
    {
        return $this->expires_at->isPast();
    }

    public static function generateCode()
    {
        return str_pad(random_int(100000, 999999), 6, '0', STR_PAD_LEFT);
    }
}

