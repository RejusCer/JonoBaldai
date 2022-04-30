<?php

namespace App\Models;

use App\Models\Order_item;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'status',
        'payment'
    ];

    public function Order_item()
    {
        return $this->hasMany(Order_item::class);
    }

    use HasFactory;
}
