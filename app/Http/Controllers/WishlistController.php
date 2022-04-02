<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Models\Wishlist_items;

class WishlistController extends Controller
{
    public function index()
    {
        $Wishlist_items = [];

        if (isset($_COOKIE['device']))
        {
            $Wishlist_items = Wishlist_items::with(['Wishlist'])->whereHas('Wishlist', function($q){
                $q->with(['User'])->whereHas('User', function($w){
                    $w->where('device', $_COOKIE['device']);
                });
            })->get();
        }

        return view('wishList', [
            'Wishlist_items' => $Wishlist_items
        ]);
    }

    public function store(Product $product)
    {
        if (auth()->user() == null)
        {
            $device = $_COOKIE['device'];

            if (($user = User::where('device', $device)->first()) == null)
            {
                $user = User::create([
                    'device' => $device
                ]);
            }

            if (($wishlist = Wishlist::with(['User'])->whereHas('User', function($q) use($user){
                $q->where('device', $user->device);
            })->first()) == null)
            {
                $wishlist = Wishlist::create([
                    'user_id' => $user->id
                ]);
            }
        
        }

        if (auth()->user() != null)
        {
            if (($wishlist = Wishlist::where('user_id', auth()->user()->id)->first()) == null)
            {
                $wishlist = Wishlist::create([
                    'user_id' => auth()->user()->id
                ]);
            }
        }

        Wishlist_items::create([
            'wishlist_id' => $wishlist->id,
            'product_id' => $product->id
        ]);

        return back();
    }

    public function destroy(Wishlist_items $wish_item)
    {
        $wish_item->delete();

        return back();
    }
}
