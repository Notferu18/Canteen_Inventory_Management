<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier; 

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers.index', compact('suppliers'));
    }
        public function show($id)
    {
        $supplier = Supplier::with('products')->findOrFail($id);
        
        return view('suppliers.show', compact('supplier'));
    }
        public function create()
    {
        return view('suppliers.create');
    }

 public function store(Request $request)
{
    $validated = $request->validate([
        'supplier_name'   => 'required|string|max:255',
        'supplier_code'   => 'required|string|unique:suppliers',
        'contact_number'  => 'required|string',
        'contact_email'   => 'required|email',
    ]);

    Supplier::create($validated);
    
    return redirect()->route('suppliers.index')->with('success', 'Supplier saved!');
}
}