<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Cart_items;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $Cart_items = [];

        if (!auth()->user() === null)
        {
            $Cart_items = Cart_items::join('carts', 'carts.id', '=', 'cart_items.cart_id')
                ->where('user_id', auth()->user()->id)->get();
        }

        return view('cart', [
            'cart_items' => $Cart_items
        ]);
    }

    public function store(Product $product)
    {
        // sukurti cart jei tas naudotojas jos neturi
        if( ($userCart = Cart::where('user_id', auth()->user()->id)->first()) == null)
        {
            // sukurti cart
            $userCart = Cart::create([
                'user_id' => auth()->user()->id
            ]);
        }

        // prideti preke i cart'a
        Cart_items::create([
            'cart_id' => $userCart->id,
            'product_id' => $product->id
        ]);

        return back();
    }
}
