<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    protected $fillable = [
        'email',
        'name',
        'status',
        'subscribed_at'
    ];

    protected $casts = [
        'subscribed_at' => 'datetime',
    ];

    public static function subscribe($email, $name = null)
    {
        return self::firstOrCreate(
            ['email' => $email],
            [
                'name' => $name,
                'status' => 'active',
                'subscribed_at' => now()
            ]
        );
    }
}
