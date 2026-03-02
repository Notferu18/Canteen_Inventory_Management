<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StockEntry; 

class StockEntryController extends Controller
{
    public function index()
    {
        $entries = StockEntry::all();
        return view('stock.index', compact('entries'));
    }

    public function store(Request $request) 
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'quantity' => 'required|integer|min:1',
            'delivery_reference' => 'required|unique:stock_entries,delivery_reference'
        ]);

        StockEntry::create($validated);

        return redirect()->back()->with('success', 'Stock entry added successfully!');
    }
}