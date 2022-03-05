<?php

use App\Models\Cart_items;

function cartItemCount(){
    return Cart_items::join('carts', 'carts.id', '=', 'cart_items.cart_id')
        ->join('users', 'users.id', '=', 'carts.user_id')
        ->where('device', $_COOKIE['device'])->count();
}