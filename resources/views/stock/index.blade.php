@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-8">
        <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Stock Management</h2>
        <p class="text-slate-500 text-sm mt-1">Record new deliveries from suppliers and track inventory history.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="bg-white p-6 rounded-2xl shadow-xl shadow-slate-200/50 border border-slate-200 h-fit">
            <div class="flex items-center gap-2 mb-6 border-b border-slate-100 pb-4">
                <div class="bg-red-600 p-2 rounded-lg shadow-md shadow-red-200">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900 tracking-tight">Record Delivery</h3>
            </div>

            <form action="{{ route('stock.store') }}" method="POST" class="space-y-5">
                @csrf
                
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-widest mb-2">Select Product</label>
                    <select name="product_id" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all outline-none bg-slate-50 text-sm font-medium" required>
                        <option value="">-- Choose Product --</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->product_name }} ({{ $product->product_code }})</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-widest mb-2">Select Supplier</label>
                    <select name="supplier_id" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all outline-none bg-slate-50 text-sm font-medium" required>
                        <option value="">-- Choose Supplier --</option>
                        @foreach($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-widest mb-2">Quantity Delivered</label>
                    <input type="number" name="quantity" min="1" placeholder="Enter number..." class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all outline-none bg-slate-50 text-sm font-medium" required>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-widest mb-2">Delivery Reference</label>
                    <input type="text" name="delivery_reference" placeholder="e.g. DEL-2026-001" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all outline-none bg-slate-50 text-sm font-medium uppercase placeholder:normal-case" required>
                </div>

                <button type="submit" class="w-full bg-slate-900 hover:bg-red-600 text-white font-bold py-3.5 rounded-xl transition-all duration-300 shadow-lg hover:shadow-red-500/30 transform hover:-translate-y-1">
                    Confirm Stock Entry
                </button>
            </form>
        </div>

        <div class="lg:col-span-2 bg-white rounded-2xl shadow-xl shadow-slate-200/50 border border-slate-200 overflow-hidden">
            <div class="px-6 py-5 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                <h3 class="text-lg font-bold text-slate-900">Recent Deliveries</h3>
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">History Log</span>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-900">
                            <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest">Product</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest">Supplier</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest text-center">Qty</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest text-right">Date</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($entries as $entry)
                        <tr class="hover:bg-slate-50/80 transition-colors group">
                            <td class="px-6 py-4">
                                <div class="font-bold text-slate-900 group-hover:text-red-600 transition-colors">{{ $entry->product->product_name }}</div>
                                <div class="text-[10px] text-slate-400 font-mono uppercase">{{ $entry->delivery_reference }}</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-600 font-medium">
                                {{ $entry->supplier->supplier_name }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="inline-flex items-center text-sm font-black text-red-600 bg-red-50 px-3 py-1 rounded-lg border border-red-100">
                                    +{{ $entry->quantity }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <span class="text-xs font-bold text-slate-400">
                                    {{ $entry->created_at->format('M d, Y') }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-20 text-center">
                                <div class="flex flex-col items-center">
                                    <svg class="w-12 h-12 text-slate-200 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                                    </svg>
                                    <p class="text-slate-400 text-sm font-bold uppercase tracking-widest">No Deliveries Logged</p>
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