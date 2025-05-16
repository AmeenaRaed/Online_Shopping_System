<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
        "image_url",
        "stock_quantity",
        "price",
        "supplier_id",
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_category');
    }
    public function supplier()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    //
}
