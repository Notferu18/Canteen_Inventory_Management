@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-8">
        <a href="{{ route('products.index') }}" class="text-sm text-indigo-600 hover:text-indigo-800 font-medium">&larr; Back to Inventory</a>
        <h2 class="text-2xl font-bold text-slate-800 mt-2">Add New Product</h2>
        <p class="text-sm text-slate-500">Enter the details for the new canteen item.</p>
    </div>

    <div class="bg-white shadow-sm border border-slate-200 rounded-xl p-6 sm:p-8">
        <form action="{{ route('products.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Product Name</label>
                    <input type="text" name="product_name" class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition" placeholder="e.g. Bottled Water" required>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Product Code</label>
                    <input type="text" name="product_code" class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition" placeholder="PROD-001" required>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Category</label>
                    <select name="category" class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition bg-white">
                        <option value="Beverages">Beverages</option>
                        <option value="Snacks">Snacks</option>
                        <option value="Meals">Meals</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Price (₱)</label>
                    <input type="number" name="price" step="0.01" class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition" required>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Initial Stock Level</label>
                    <input type="number" name="current_stock" class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition" required>
                </div>
            </div>

            <div class="pt-4 border-t border-slate-100 flex justify-end">
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-2.5 rounded-lg font-bold shadow-sm transition">
                    Save Product
                </button>
            </div>
        </form>
    </div>
</div>
@endsection