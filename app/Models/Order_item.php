<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order_item extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity'
    ];

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }

    use HasFactory;
}
