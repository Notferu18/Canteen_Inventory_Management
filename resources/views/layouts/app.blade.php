<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Canteen Inventory System') }}</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; }
        /* Laravel-style scrollbar */
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: #111827; }
        ::-webkit-scrollbar-thumb { background: #ef4444; border-radius: 5px; }
    </style>
</head>
<body class="bg-[#fafafa] text-slate-900 antialiased min-h-screen flex flex-col">

    <nav class="bg-[#111827] border-b border-slate-800 sticky top-0 z-50 shadow-2xl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <div class="bg-red-600 p-1.5 rounded-lg mr-3">
                            <svg class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <span class="text-xl font-bold text-white tracking-tight">
                            Canteen<span class="text-red-500"> Inventory</span>
                        </span>
                    </div>

                    <div class="hidden md:ml-10 md:flex md:space-x-8">
                        <a href="{{ route('products.index') }}" 
                           class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition-all duration-200 {{ request()->routeIs('products.*') ? 'border-red-500 text-white' : 'border-transparent text-slate-400 hover:text-white hover:border-slate-500' }}">
                            Products
                        </a>

                        <a href="{{ route('suppliers.index') }}" 
                           class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition-all duration-200 {{ request()->routeIs('suppliers.*') ? 'border-red-500 text-white' : 'border-transparent text-slate-400 hover:text-white hover:border-slate-500' }}">
                            Suppliers
                        </a>

                        <a href="{{ route('stock.index') }}" 
                           class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition-all duration-200 {{ request()->routeIs('stock.*') ? 'border-red-500 text-white' : 'border-transparent text-slate-400 hover:text-white hover:border-slate-500' }}">
                            Stock Management
                        </a>
                    </div>
                </div>

                <div class="flex items-center">
                    <div class="h-8 w-8 rounded-full bg-slate-800 flex items-center justify-center border border-slate-700 shadow-inner">
                        <span class="text-xs font-bold text-red-500 font-mono">LX</span>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6 w-full">
        @if(session('success'))
            <div class="bg-white border-l-4 border-emerald-500 shadow-sm text-slate-700 px-4 py-3 rounded-r-xl flex items-center gap-3">
                <div class="bg-emerald-100 p-1 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-emerald-600" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                </div>
                <span class="font-medium text-sm">{{ session('success') }}</span>
            </div>
        @endif

        @if($errors->any())
            <div class="bg-white border-l-4 border-red-500 shadow-sm text-slate-700 px-4 py-3 rounded-r-xl mb-4">
                <div class="flex items-center gap-2 mb-1">
                    <div class="bg-red-100 p-1 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-600" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <span class="font-bold text-sm text-red-600">Errors Detected</span>
                </div>
                <ul class="list-disc list-inside text-xs space-y-1 text-slate-500 ml-7">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <main class="py-6 flex-grow">
        @yield('content')
    </main>

    <footer class="mt-auto py-10 border-t border-slate-200 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <div class="flex items-center gap-2">
                     <svg class="h-5 w-5 text-red-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span class="text-xs font-semibold text-slate-600">Canteen Inventory System</span>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>