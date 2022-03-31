<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist_items extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'wishlist_id',
        'product_id'
    ];
}
