@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-8 flex items-center justify-between">
        <div>
            <a href="{{ route('suppliers.index') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-800">&larr; Back to Suppliers</a>
            <h2 class="text-3xl font-bold text-slate-800 mt-2">{{ $supplier->supplier_name }}</h2>
            <p class="text-slate-500">Supplier Code: <span class="font-mono font-bold">{{ $supplier->supplier_code }}</span></p>
        </div>
        <div class="flex gap-3">
            <div class="bg-white px-4 py-2 rounded-lg border border-slate-200 shadow-sm text-center">
                <span class="text-xs font-bold text-slate-400 uppercase block">Total Items Supplied</span>
                <span class="text-xl font-bold text-slate-800">{{ $supplier->products->count() }}</span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 h-fit">
            <h3 class="text-lg font-bold text-slate-800 mb-4 border-b pb-2">Contact Details</h3>
            <div class="space-y-4">
                <div>
                    <label class="text-xs font-bold text-slate-400 uppercase tracking-wider">Email Address</label>
                    <p class="text-slate-700 font-medium break-all">{{ $supplier->contact_email }}</p>
                </div>
                <div>
                    <label class="text-xs font-bold text-slate-400 uppercase tracking-wider">Phone Number</label>
                    <p class="text-slate-700 font-medium">{{ $supplier->contact_number }}</p>
                </div>
                <div class="pt-4">
                    <button class="w-full bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold py-2 rounded-lg transition text-sm">
                        Edit Supplier Info
                    </button>
                </div>
            </div>
        </div>

        <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-200 bg-slate-50 flex justify-between items-center">
                <h3 class="text-lg font-bold text-slate-800">Supply History</h3>
            </div>
            <table class="w-full text-left">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="px-6 py-3 text-xs font-bold text-slate-500 uppercase">Product Name</th>
                        <th class="px-6 py-3 text-xs font-bold text-slate-500 uppercase text-center">Qty Delivered</th>
                        <th class="px-6 py-3 text-xs font-bold text-slate-500 uppercase text-right">Unit Price</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($supplier->products as $product)
                    <tr>
                        <td class="px-6 py-4">
                            <a href="{{ route('products.show', $product->id) }}" class="text-indigo-600 font-semibold hover:underline">
                                {{ $product->product_name }}
                            </a>
                            <p class="text-xs text-slate-400">{{ $product->product_code }}</p>
                        </td>
                        <td class="px-6 py-4 text-center font-bold text-slate-700">
                            {{ $product->pivot->quantity }}
                        </td>
                        <td class="px-6 py-4 text-right text-slate-600">
                            ₱{{ number_format($product->price, 2) }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center">
                                <span class="text-slate-300 mb-2 font-medium">No products supplied yet.</span>
                                <a href="{{ route('stock.index') }}" class="text-indigo-600 text-sm font-bold hover:underline">Add first delivery &rarr;</a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection