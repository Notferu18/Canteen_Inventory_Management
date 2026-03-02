<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}