<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::with('suppliers')->findOrFail($id);

        $totalStockHistory = $product->suppliers->sum('pivot.quantity');

        return view('products.show', compact('product', 'totalStockHistory'));
    }
}