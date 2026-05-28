<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
    @vite('resources/css/app.css')

    <title>POSシステム</title>
</head>

<body class="bg-gray-100 text-gray-800">

<header class="bg-sky-600 text-white shadow-md">

    <div class="max-w-7xl mx-auto px-6 py-4">

        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

            <h1 class="text-2xl font-bold">
                簡易POSシステム
            </h1>

            {{-- PCナビ --}}
            <nav class="hidden md:flex items-center gap-4 whitespace-nowrap">

                <a
                    href="{{ route('dashboard') }}"
                    class="text-lg text-center px-5 py-3 rounded-lg transition
                    {{ request()->routeIs('dashboard')
                        ? 'bg-blue-800'
                        : 'bg-sky-500 hover:bg-sky-400'
                    }}"
                >
                    管理画面
                </a>

                <a
                    href="{{ route('categories.index') }}"
                    class="text-lg text-center px-5 py-3 rounded-lg transition
                    {{ request()->routeIs('categories.*') || request()->routeIs('products.*')
                        ? 'bg-blue-800'
                        : 'bg-sky-500 hover:bg-sky-400'
                    }}"
                >
                    商品
                </a>

                <a
                    href="{{ route('sales.index') }}"
                    class="text-lg text-center px-5 py-3 rounded-lg transition
                    {{ request()->routeIs('sales.*')
                        ? 'bg-blue-800'
                        : 'bg-sky-500 hover:bg-sky-400'
                    }}"
                >
                    売上
                </a>

                <a
                    href="{{ route('purchases.index') }}"
                    class="text-lg text-center px-5 py-3 rounded-lg transition
                    {{ request()->routeIs('purchases.*')
                        ? 'bg-blue-800'
                        : 'bg-sky-500 hover:bg-sky-400'
                    }}"
                >
                    仕入
                </a>

                <a
                    href="{{ route('customers.index') }}"
                    class="text-lg text-center px-5 py-3 rounded-lg transition
                    {{ request()->routeIs('customers.*')
                        ? 'bg-blue-800'
                        : 'bg-sky-500 hover:bg-sky-400'
                    }}"
                >
                    顧客
                </a>

            </nav>

        </div>

    </div>

</header>

<main class="max-w-7xl mx-auto p-4 md:p-6 pb-24 md:pb-6">

    <div class="bg-white rounded-lg shadow p-6">
        @yield('content')
    </div>

</main>

{{-- スマホボトムメニュー --}}
<nav class="fixed bottom-0 left-0 right-0 z-50 bg-white border-t md:hidden">

    <div class="grid grid-cols-5 text-xs text-center">

        <a
            href="{{ route('dashboard') }}"
            class="py-3 {{ request()->routeIs('dashboard') ? 'text-blue-600 font-bold bg-slate-200 rounded-xl' : 'text-gray-500' }}"
        >
            <div><i class="fa-solid fa-house text-xl"></i></div>
            <div>管理</div>
        </a>

        <a
            href="{{ route('categories.index') }}"
            class="py-3 {{ request()->routeIs('categories.*')  || request()->routeIs('products.*')? 'text-blue-600 font-bold  bg-slate-200 rounded-xl' : 'text-gray-500' }}"
        >
            <div><i class="fa-solid fa-box text-xl"></i></div>
            <div>商品</div>
        </a>

        <a
            href="{{ route('sales.index') }}"
            class="py-3 {{ request()->routeIs('sales.*') ? 'text-blue-600 font-bold bg-slate-200 rounded-xl' : 'text-gray-500' }}"
        >
            <div><i class="fa-solid fa-cash-register text-xl"></i></div>
            <div>売上</div>
        </a>

        <a
            href="{{ route('purchases.index') }}"
            class="py-3 {{ request()->routeIs('purchases.*') ? 'text-blue-600 font-bold bg-slate-200 rounded-xl' : 'text-gray-500' }}"
        >
            <div><i class="fa-solid fa-truck text-xl"></i></div>
            <div>仕入</div>
        </a>

        <a
            href="{{ route('customers.index') }}"
            class="py-3 {{ request()->routeIs('customers.*') ? 'text-blue-600 font-bold bg-slate-200 rounded-xl' : 'text-gray-500' }}"
        >
            <div><i class="fa-solid fa-users text-xl"></i></div>
            <div>顧客</div>
        </a>

    </div>

</nav>

@stack('scripts')

</body>
</html>