@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-8 flex items-center justify-between">
        <div>
            <a href="{{ route('products.index') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-800">&larr; Back to Inventory</a>
            <h2 class="text-3xl font-bold text-slate-800 mt-2">{{ $product->product_name }}</h2>
            <p class="text-slate-500">Code: <span class="font-mono font-bold">{{ $product->product_code }}</span></p>
        </div>
        <div class="text-right">
            <span class="text-sm text-slate-500 block mb-1">Current Price</span>
            <span class="text-3xl font-bold text-slate-900">₱{{ number_format($product->price, 2) }}</span>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
            <h3 class="text-lg font-bold text-slate-800 mb-4 border-b pb-2">Product Info</h3>
            <div class="space-y-4">
                <div>
                    <label class="text-xs font-bold text-slate-400 uppercase tracking-wider">Category</label>
                    <p class="text-slate-700 font-medium">{{ $product->category }}</p>
                </div>
                <div>
                    <label class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Stock on Hand</label>
                    <p class="text-2xl font-bold {{ $product->stock_level < 10 ? 'text-rose-600' : 'text-emerald-600' }}">
                        {{ $product->stock_level }} units
                    </p>
                </div>
            </div>
        </div>

        <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-200 bg-slate-50">
                <h3 class="text-lg font-bold text-slate-800">Delivery & Supplier History</h3>
            </div>
            <table class="w-full text-left">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="px-6 py-3 text-xs font-bold text-slate-500 uppercase">Supplier</th>
                        <th class="px-6 py-3 text-xs font-bold text-slate-500 uppercase text-center">Qty Delivered</th>
                        <th class="px-6 py-3 text-xs font-bold text-slate-500 uppercase text-right">Reference</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($product->suppliers as $supplier)
                    <tr>
                        <td class="px-6 py-4">
                            <a href="{{ route('suppliers.show', $supplier->id) }}" class="text-indigo-600 font-semibold hover:underline">
                                {{ $supplier->supplier_name }}
                            </a>
                        </td>
                        <td class="px-6 py-4 text-center font-medium">{{ $supplier->pivot->quantity }}</td>
                        <td class="px-6 py-4 text-right text-slate-500 font-mono text-sm">
                            {{ $supplier->pivot->delivery_reference ?? 'N/A' }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="px-6 py-10 text-center text-slate-400">
                            No delivery history recorded for this product yet.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection