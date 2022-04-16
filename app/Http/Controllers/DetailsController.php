<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    public function index(Request $request, Product $product)
    {
        return view('details', [
            'product' => $product
        ]);
    }
}
