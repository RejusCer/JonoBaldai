<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $topOffers = Product::limit(3)->get();
        $newOffers = Product::limit(3)->orderByDesc('created_at')->get();
        $discountOffers = Product::limit(3)->orderByDesc('discount')->get();

        return view('home', [
            'topOffers' => $topOffers,
            'newOffers' => $newOffers,
            'discountOffers' => $discountOffers,
        ]);
    }
}
