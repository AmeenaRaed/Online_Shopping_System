<?php
//Fetch the categories

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        "name",
        "description",
        "image_url",
        "stock_quantity",
        "price",
        "supplier_id",
    ];
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_category');
    }

}
