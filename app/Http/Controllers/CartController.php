<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart_items;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $Cart_items = [];

        if (auth()->user() == null)
        {
            $Cart_items = Cart_items::join('carts', 'carts.id', '=', 'cart_items.cart_id')
                ->join('users', 'users.id', '=', 'carts.user_id')->select('cart_items.*', 'users.device')
                ->where('device', $_COOKIE['device'])->get();
        }
        else if (auth()->user() != null)
        {
            $Cart_items = Cart_items::join('carts', 'carts.id', '=', 'cart_items.cart_id')->select('cart_items.*', 'carts.user_id')
                ->where('user_id', auth()->user()->id)->get();
        }

        return view('cart', [
            'cart_items' => $Cart_items
        ]);
    }

    public function store(Product $product)
    {
        // sukurti cart'a neprisjungusiam naudotojui
        if(auth()->user() == null)
        {
            $device = $_COOKIE['device'];

            // iesko ar yra toks device id duomenu bazeje
            if (($user = User::where('device', $device)->first()) == null)
            {
                // jei ne tai sukuria nauja neprisijungusi vartotoja
                $user = User::create([
                    'device' => $device
                ]);
            }

            // sukurti cart jei tas neprisijunges naudotojas jos neturi
            if (($userCart = Cart::join("users", "users.id", "=", "carts.user_id")
                ->where('device', $user->device)->first()) == null){

                $userCart = Cart::create([
                    'user_id' => $user->id
                ]);
            }
        }
        
        if (auth()->user() != null)
        {
            // sukurti cart jei tas prisijunges naudotojas jos neturi
            if( ($userCart = Cart::where('user_id', auth()->user()->id)->first()) == null)
            {
                // sukurti cart
                $userCart = Cart::create([
                    'user_id' => auth()->user()->id
                ]);
            }
        }

        // prideti preke i cart'a
        Cart_items::create([
            'cart_id' => $userCart->id,
            'product_id' => $product->id
        ]);

        return back();
    }

    public function destroy($cart_item_id)
    {
        $item = Cart_items::find($cart_item_id);
        $item->delete();

        return back();
    }
}
