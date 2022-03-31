<?php

use App\Models\Cart_items;
use App\Models\Wishlist_items;

function cartItemCount(){
    
    if (!isset($_COOKIE['device'])) return 0;

    return Cart_items::join('carts', 'carts.id', '=', 'cart_items.cart_id')
        ->join('users', 'users.id', '=', 'carts.user_id')
        ->where('device', $_COOKIE['device'])->count();
}

function wishlistItemCount()
{
    if (!isset($_COOKIE['device'])) return 0;

    return Wishlist_items::join('wishlists', 'wishlists.id', '=', 'wishlist_items.wishlist_id')
        ->join('users', 'users.id', '=', 'wishlists.user_id')
        ->where('device', $_COOKIE['device'])->count();
}