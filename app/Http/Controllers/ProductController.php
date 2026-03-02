<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product; 

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

 public function store(Request $request)
{
    $validated = $request->validate([
        'product_code'  => 'required|unique:products,product_code',
        'product_name'  => 'required|string',
        'category'      => 'required|string',
        'price'         => 'required|numeric|min:0',
        'current_stock' => 'required|integer|min:0', 
    ]);

    Product::create($validated);

    return redirect()->route('products.index')->with('success', 'Product saved!');
}

    public function show($id)
    {
        $product = Product::with('suppliers')->findOrFail($id);
        
        return view('products.show', compact('product'));
    }
}