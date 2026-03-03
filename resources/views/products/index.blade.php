@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
        <div>
            <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Canteen Inventory</h2>
            <p class="text-slate-500 text-sm mt-1">Manage and track your products and current stock levels.</p>
        </div>
        <a href="{{ route('products.create') }}" 
           class="inline-flex items-center justify-center bg-red-600 hover:bg-red-700 text-white font-bold py-2.5 px-6 rounded-lg transition-all duration-200 shadow-lg shadow-red-500/20 transform hover:-translate-y-0.5">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            + New Product
        </a>
    </div>

    <div class="bg-white border border-slate-200 shadow-xl shadow-slate-200/50 rounded-2xl overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-900">
                    <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest">Product Info</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest">Category</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest text-center">Stock Level</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @foreach($products as $product)
                <tr class="hover:bg-slate-50/80 transition-colors group">
                    <td class="px-6 py-4">
                        <div class="font-bold text-slate-900">{{ $product->product_name }}</div>
                        <div class="text-[10px] text-slate-400 font-mono tracking-tighter uppercase">{{ $product->product_code }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="text-sm text-slate-600 font-medium bg-slate-100 px-2.5 py-1 rounded-md border border-slate-200">
                            {{ $product->category }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        @if($product->current_stock <= 5)
                            <span class="inline-flex items-center bg-red-50 text-red-700 px-3 py-1 rounded-full text-xs font-extrabold border border-red-100 animate-pulse">
                                <span class="w-1.5 h-1.5 bg-red-600 rounded-full mr-1.5"></span>
                                LOW: {{ $product->current_stock }}
                            </span>
                        @else
                            <span class="inline-flex items-center bg-emerald-50 text-emerald-700 px-3 py-1 rounded-full text-xs font-extrabold border border-emerald-100">
                                <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full mr-1.5"></span>
                                {{ $product->current_stock }}
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('products.show', $product->id) }}" 
                           class="inline-flex items-center text-sm font-bold text-red-600 hover:text-red-700 transition-colors">
                            View Details
                            <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection