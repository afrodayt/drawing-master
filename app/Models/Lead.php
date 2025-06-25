<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'message',
        'event_id',
        'event_name',
        'event_date',
        'event_time',
        'event_price',
        'event_location',
        'payment_status',
        'security_nonce',
        'stripe_session_id',
        'stripe_payment_intent',
        'telegram_sent',
    ];
}

