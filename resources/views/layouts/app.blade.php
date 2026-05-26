<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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

            <nav class="flex flex-col md:flex-row gap-3 w-full md:w-auto">
                <a
                    href="{{ route('dashboard') }}"
                    class="
                        text-lg
                        text-center
                        px-5 py-3
                        rounded-lg
                        transition

                        {{ request()->routeIs('dashboard')
                            ? 'bg-blue-800'
                            : 'bg-sky-500 hover:bg-sky-400'
                        }}
                    "
                >
                    管理画面
                </a>
                {{-- 商品一覧 --}}
                <a
                    href="{{ route('products.index') }}"
                    class="
                        text-lg
                        text-center
                        px-5 py-3
                        rounded-lg
                        transition

                        {{ request()->routeIs('products.index')
                            ? 'bg-blue-800'
                            : 'bg-sky-500 hover:bg-sky-400'
                        }}
                    "
                >
                    商品一覧
                </a>

                {{-- カテゴリ一覧 --}}
                <a
                    href="{{ route('categories.index') }}"
                    class="
                        text-lg
                        text-center
                        px-5 py-3
                        rounded-lg
                        transition

                        {{ request()->routeIs('categories.index')
                            ? 'bg-blue-800'
                            : 'bg-sky-500 hover:bg-sky-400'
                        }}
                    "
                >
                    カテゴリ一覧
                </a>

                {{-- 商品登録 --}}
                <a
                    href="{{ route('products.create') }}"
                    class="
                        text-lg
                        text-center
                        px-5 py-3
                        rounded-lg
                        transition

                        {{ request()->routeIs('products.create')
                            ? 'bg-blue-800'
                            : 'bg-sky-500 hover:bg-sky-400'
                        }}
                    "
                >
                    商品登録
                </a>
                <a
                    href="{{ route('sales.index') }}"
                    class="
                        text-lg
                        text-center
                        px-5 py-3
                        rounded-lg
                        transition

                        {{ request()->routeIs('products.create')
                            ? 'bg-blue-800'
                            : 'bg-sky-500 hover:bg-sky-400'
                        }}
                    "
                >
                    売上
                </a>
            </nav>

        </div>

    </div>

</header>
    <main class="max-w-3xl mx-auto p-6">

        <div class="bg-white rounded-lg shadow p-6">
            @yield('content')
        </div>

    </main>

</body>
</html>