<?php

namespace App\Models;

use App\Models\User;
use App\Models\Wishlist_items;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wishlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Wishlist_items()
    {
        return $this->hasMany(Wishlist_items::class);
    }
}
