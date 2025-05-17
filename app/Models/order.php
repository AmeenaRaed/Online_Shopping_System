<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Shipments;


class Order extends Model
{
    protected $fillable = [
        'user_id',
        'total',
        'order_status',
        'discount_id',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product')->withPivot('quantity');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime'
        ];
    }

    public function shipments()
    {
        return $this->hasOne(Shipments::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
