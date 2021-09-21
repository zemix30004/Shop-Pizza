<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getIndex()
    {
        $products = Product::all();
        return view('shop.index', ['product' => $products]);
    }
}
