@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-6">
        <a href="{{ route('suppliers.index') }}" class="inline-flex items-center text-xs font-bold text-red-600 hover:text-red-700 uppercase tracking-widest transition-colors">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
            </svg>
            Back to Suppliers List
        </a>
    </div>

    <div class="bg-white border border-slate-200 shadow-xl shadow-slate-200/50 rounded-2xl p-8 mb-8 relative overflow-hidden">
        <div class="absolute top-0 right-0 p-8 opacity-10">
            <svg class="w-32 h-32 text-slate-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
            </svg>
        </div>
        
        <div class="relative z-10">
            <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-black bg-slate-900 text-white uppercase tracking-[0.2em] mb-4">
                Supplier Profile
            </span>
            <h2 class="text-4xl font-extrabold text-slate-900 tracking-tight">{{ $supplier->supplier_name }}</h2>
            <div class="mt-4 flex flex-wrap gap-6 text-sm">
                <div class="flex items-center text-slate-500">
                    <span class="font-bold text-slate-400 mr-2 uppercase tracking-tighter text-xs">Code:</span>
                    <span class="font-mono bg-slate-100 px-2 py-0.5 rounded border border-slate-200">{{ $supplier->supplier_code }}</span>
                </div>
                <div class="flex items-center text-slate-500">
                    <span class="font-bold text-slate-400 mr-2 uppercase tracking-tighter text-xs">Email:</span>
                    <span class="font-medium hover:text-red-600 transition-colors">{{ $supplier->contact_email }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="flex items-center justify-between mb-4">
        <h3 class="text-lg font-extrabold text-slate-900 tracking-tight">Supply History</h3>
        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest bg-white border border-slate-200 px-3 py-1 rounded-full">Items Delivered</span>
    </div>

    <div class="bg-white border border-slate-200 shadow-xl shadow-slate-200/50 rounded-2xl overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-900">
                    <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest">Product Name</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest text-center">Quantity Delivered</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest text-right">Reference Code</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($supplier->products as $product)
                <tr class="hover:bg-slate-50 transition-colors group">
                    <td class="px-6 py-4 font-bold text-slate-900 group-hover:text-red-600 transition-colors">
                        {{ $product->product_name }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span class="inline-flex items-center text-sm font-black text-slate-900 bg-slate-50 px-4 py-1 rounded-lg border border-slate-200">
                            +{{ $product->pivot->quantity }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <span class="font-mono text-xs text-slate-400 font-bold tracking-tighter uppercase">
                            {{ $product->pivot->delivery_reference }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="px-6 py-20 text-center">
                        <p class="text-slate-400 text-sm font-bold uppercase tracking-widest">No products supplied by this vendor yet.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection