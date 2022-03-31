<?php

namespace App\Models;

use App\Models\User;
use App\Models\Cart_items;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Cart_items()
    {
        return $this->hasMany(Cart_items::class);
    }

    // public function Cart_items()
    // {
    //     return $this->hasManyThrought(Cart_items::class);
    // }
}
