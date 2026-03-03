@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
            <a href="{{ route('products.index') }}" class="inline-flex items-center text-xs font-bold text-red-600 hover:text-red-700 uppercase tracking-widest transition-colors mb-3">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
                </svg>
                Back to Inventory
            </a>
            <h2 class="text-4xl font-extrabold text-slate-900 tracking-tight">{{ $product->product_name }}</h2>
            <p class="text-slate-500 mt-1 flex items-center gap-2">
                <span class="text-xs font-bold uppercase tracking-wider text-slate-400">System Code:</span>
                <span class="font-mono font-bold text-slate-700 bg-slate-100 px-2 py-0.5 rounded border border-slate-200 text-sm">{{ $product->product_code }}</span>
            </p>
        </div>
        <div class="bg-white border border-slate-200 rounded-2xl p-4 shadow-sm flex items-center gap-4">
            <div class="text-right">
                <span class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] block">Market Price</span>
                <span class="text-3xl font-black text-slate-900">₱{{ number_format($product->price, 2) }}</span>
            </div>
            <div class="h-10 w-px bg-slate-100"></div>
            <div class="bg-red-50 p-2 rounded-lg">
                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="space-y-6">
            <div class="bg-white rounded-2xl shadow-xl shadow-slate-200/50 border border-slate-200 overflow-hidden">
                <div class="bg-slate-900 px-6 py-4">
                    <h3 class="text-xs font-bold text-slate-400 uppercase tracking-widest">General Specifications</h3>
                </div>
                <div class="p-6 space-y-6">
                    <div>
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-1">Category</label>
                        <span class="inline-flex items-center px-3 py-1 rounded-lg text-sm font-bold bg-slate-100 text-slate-700 border border-slate-200">
                            {{ $product->category }}
                        </span>
                    </div>
                    <div class="pt-4 border-t border-slate-100">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2">Inventory Status</label>
                        <div class="flex items-end gap-2">
                            <p class="text-4xl font-black tracking-tighter {{ $product->current_stock < 10 ? 'text-red-600' : 'text-emerald-600' }}">
                                {{ $product->current_stock }}
                            </p>
                            <span class="text-sm font-bold text-slate-400 mb-1.5 uppercase">Units on Hand</span>
                        </div>
                        @if($product->current_stock < 10)
                            <p class="mt-2 text-xs font-bold text-red-500 flex items-center gap-1">
                                <svg class="w-3 h-3 animate-pulse" fill="currentColor" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zM9 7V9H11V7H9ZM9 11V13H11V11H9Z"/></svg>
                                Action Required: Low Stock Warning
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="lg:col-span-2 bg-white rounded-2xl shadow-xl shadow-slate-200/50 border border-slate-200 overflow-hidden">
            <div class="px-6 py-5 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                <h3 class="text-lg font-bold text-slate-900">Procurement History</h3>
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Supplier Log</span>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-900">
                            <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest">Supplier Source</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest text-center">Qty Recieved</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest text-right">Reference No.</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($product->suppliers as $supplier)
                        <tr class="hover:bg-slate-50 transition-colors group">
                            <td class="px-6 py-4">
                                <a href="{{ route('suppliers.show', $supplier->id) }}" class="text-sm font-bold text-slate-900 hover:text-red-600 transition-colors flex items-center">
                                    {{ $supplier->supplier_name }}
                                    <svg class="w-3 h-3 ml-1 opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                </a>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="inline-flex items-center text-sm font-black text-slate-900 bg-slate-50 px-4 py-1 rounded-lg border border-slate-200">
                                    +{{ $supplier->pivot->quantity }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <span class="font-mono text-xs text-slate-400 font-bold tracking-tighter uppercase">
                                    {{ $supplier->pivot->delivery_reference ?? 'REF-NONE' }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="px-6 py-20 text-center">
                                <div class="flex flex-col items-center">
                                    <svg class="w-12 h-12 text-slate-200 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                                    </svg>
                                    <p class="text-slate-400 text-sm font-bold uppercase tracking-widest">No procurement history found</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection