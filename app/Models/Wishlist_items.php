<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wishlist_items extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'wishlist_id',
        'product_id'
    ];

    public function Wishlist()
    {
        return $this->belongsTo(Wishlist::class);
    }

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }
}
