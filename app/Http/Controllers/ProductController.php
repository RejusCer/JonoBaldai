<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::where('category', $request->itemCategory)->get();

        return view('baldai', [
            'products' => $products,
        ]);
    }

    public function discount()
    {
        $products = Product::where('discount', '!=', 0)->get();

        return view('baldai', [
            'products' => $products,
        ]);
    }
}
