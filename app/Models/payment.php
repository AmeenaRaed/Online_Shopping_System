<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    protected $fillable = [
        'payment_id',
        'method',
        'payment_status',
        'amount',
        'order_id',
    ];

protected function casts(): array
    {
        return [
            'paid_at' => 'datetime'
        ];
    }
}