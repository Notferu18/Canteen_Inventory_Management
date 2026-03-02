@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h2 class="text-2xl font-bold text-slate-800">Canteen Inventory</h2>
            <p class="text-sm text-slate-500 font-medium">Manage and track your products.</p>
        </div>
        <a href="{{ route('products.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-lg transition shadow-sm font-semibold text-sm">
            + New Product
        </a>
    </div>

    <div class="bg-white shadow-sm border border-slate-200 rounded-xl overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead class="bg-slate-50 border-b border-slate-200">
                <tr>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Product Name</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Category</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider text-center">Stock Level</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @foreach($products as $product)
                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="px-6 py-4">
                        <div class="font-semibold text-slate-900">{{ $product->product_name }}</div>
                        <div class="text-xs text-slate-400 font-mono">{{ $product->product_code }}</div>
                    </td>
                    <td class="px-6 py-4 text-sm text-slate-600">{{ $product->category }}</td>
                    <td class="px-6 py-4 text-center">
                        @if($product->stock_level <= 5)
                            <span class="bg-red-50 text-red-700 px-3 py-1 rounded-full text-xs font-bold border border-red-100">
                                Low: {{ $product->stock_level }}
                            </span>
                        @else
                            <span class="bg-emerald-50 text-emerald-700 px-3 py-1 rounded-full text-xs font-bold border border-emerald-100">
                                {{ $product->stock_level }}
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('products.show', $product->id) }}" class="text-indigo-600 hover:text-indigo-900 font-bold text-sm">View Details →</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection