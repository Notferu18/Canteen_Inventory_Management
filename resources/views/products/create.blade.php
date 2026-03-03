@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-8">
        <a href="{{ route('products.index') }}" class="inline-flex items-center text-xs font-bold text-red-600 hover:text-red-700 uppercase tracking-widest transition-colors">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
            </svg>
            Back to Inventory
        </a>
        <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight mt-3">Add New Product</h2>
        <p class="text-slate-500 text-sm mt-1">Enter the details for the new canteen item to begin tracking stock.</p>
    </div>

    <div class="bg-white shadow-xl shadow-slate-200/60 border border-slate-200 rounded-2xl overflow-hidden">
        <div class="bg-slate-900 px-8 py-4">
            <h3 class="text-xs font-bold text-slate-400 uppercase tracking-widest">Product Information</h3>
        </div>
        
        <form action="{{ route('products.store') }}" method="POST" class="p-8 space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-widest mb-2">Product Name</label>
                    <input type="text" name="product_name" 
                           class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all font-medium text-slate-900 placeholder:text-slate-400" 
                           placeholder="e.g. Bottled Water (500ml)" required>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-widest mb-2">Product Code</label>
                    <input type="text" name="product_code" 
                           class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all font-mono text-sm uppercase" 
                           placeholder="PROD-000" required>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-widest mb-2">Category</label>
                    <select name="category" 
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all font-medium text-slate-700">
                        <option value="Beverages">Beverages</option>
                        <option value="Snacks">Snacks</option>
                        <option value="Meals">Meals</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-widest mb-2">Price (₱)</label>
                    <div class="relative">
                        <span class="absolute left-4 top-3.5 text-slate-400 font-bold">₱</span>
                        <input type="number" name="price" step="0.01" 
                               class="w-full pl-8 pr-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all font-medium text-slate-900" 
                               placeholder="0.00" required>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-widest mb-2">Initial Stock Level</label>
                    <input type="number" name="current_stock" 
                           class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-all font-medium text-slate-900" 
                           placeholder="0" required>
                </div>
            </div>

            <div class="pt-8 border-t border-slate-100 flex items-center justify-between gap-4">
                <button type="reset" class="text-xs font-bold text-slate-400 hover:text-slate-600 uppercase tracking-widest transition-colors">
                    Reset Fields
                </button>
                <button type="submit" 
                        class="bg-slate-900 hover:bg-red-600 text-white px-10 py-3.5 rounded-xl font-bold shadow-lg shadow-slate-200 hover:shadow-red-500/30 transition-all duration-300 transform hover:-translate-y-1">
                    Save Product
                </button>
            </div>
        </form>
    </div>
</div>
@endsection