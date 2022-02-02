<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::get()->where('category', $request->itemCategory);

        return view('baldai', [
            'products' => $products,
        ]);
    }
}
