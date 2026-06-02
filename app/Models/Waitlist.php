<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Waitlist extends Model
{
    protected $fillable = [
        'event_id',
        'name',
        'email',
        'phone',
        'telegram_sent',
    ];

    protected $casts = [
        'telegram_sent' => 'boolean',
    ];
}
