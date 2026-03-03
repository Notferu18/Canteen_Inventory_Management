@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
        <div>
            <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Suppliers</h2>
            <p class="text-slate-500 text-sm mt-1">Manage your canteen's vendor partnerships and contact details.</p>
        </div>
        <a href="{{ route('suppliers.create') }}" 
           class="inline-flex items-center justify-center bg-red-600 hover:bg-red-700 text-white font-bold py-2.5 px-6 rounded-lg transition-all duration-200 shadow-lg shadow-red-500/20 transform hover:-translate-y-0.5">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Add New Supplier
        </a>
    </div>

    <div class="bg-white border border-slate-200 shadow-xl shadow-slate-200/50 rounded-2xl overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-900">
                    <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest">Supplier Code</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest">Company Name</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest">Contact Info</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($suppliers as $supplier)
                <tr class="hover:bg-slate-50/80 transition-colors group">
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-800 border border-slate-200 uppercase">
                            {{ $supplier->supplier_code }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-bold text-slate-900">{{ $supplier->supplier_name }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex flex-col">
                            <span class="text-sm text-slate-600 font-medium">{{ $supplier->contact_email }}</span>
                            <span class="text-xs text-slate-400">{{ $supplier->contact_number }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('suppliers.show', $supplier->id) }}" 
                           class="inline-flex items-center text-sm font-bold text-red-600 hover:text-red-700 transition-colors">
                            View Profile
                            <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-12 text-center text-slate-400">
                        <div class="flex flex-col items-center">
                            <svg class="w-12 h-12 text-slate-200 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                            </svg>
                            <span class="text-sm">No suppliers found in the registry.</span>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection