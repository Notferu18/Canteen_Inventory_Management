<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StockEntry; 
use App\Models\Product; 
use App\Models\Supplier; 

class StockEntryController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $suppliers = Supplier::all();
        $entries = StockEntry::with(['product', 'supplier'])->get();
        
        return view('stock.index', compact('entries', 'products', 'suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'quantity' => 'required|integer|min:1',
            'delivery_reference' => 'required|unique:stock_entries,delivery_reference'
        ]);

        $product = Product::findOrFail($request->product_id);

        $product->suppliers()->attach($request->supplier_id, [
            'quantity' => $request->quantity,
            'delivery_reference' => $request->delivery_reference
        ]);

        $product->increment('current_stock', $request->quantity);

        return redirect()->back()->with('success', 'Stock entry recorded successfully!');
    }
}