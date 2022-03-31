<?php

namespace App\Models;

use App\Models\Cart_items;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    public function getisProductInCartAttribute()
    {
        if (auth()->user() != null)
        {
            $foundProduct = Cart_items::join('carts', 'carts.id', '=', 'cart_items.cart_id')->
                    where('user_id', auth()->user()->id)->where('product_id', $this->id)->get();
        }
        else
        {
            if(!isset($_COOKIE['device'])) return false;

            $foundProduct = Cart_items::join('carts', 'carts.id', '=', 'cart_items.cart_id')->
                        join('users', 'users.id', '=', 'carts.user_id')->
                        where('device', $_COOKIE['device'])->where('product_id', $this->id)->get();
        }


        if ($foundProduct->count() == 1)
        {
            return true;
        }

        return false;
    }
}
