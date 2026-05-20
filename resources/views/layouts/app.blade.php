<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite('resources/css/app.css')

    <title>POSシステム</title>
</head>
<body class="bg-gray-100 text-gray-800">


<header class="bg-sky-700 shadow">

    <div class="max-w-6xl mx-auto px-6 py-4">

        <div class="flex justify-between items-center">

            <h1 class="text-2xl font-bold text-white">
                POSシステム
            </h1>

            <nav class="flex gap-4">

                <a
                    href="/products"
                    class="text-white bg-sky-600 hover:bg-sky-500 px-4 py-2 rounded-lg"
                >
                    商品一覧
                </a>

                <a
                    href="/products/create"
                    class="text-white bg-white/30 hover:bg-white/40 px-4 py-2 rounded-lg"
                >
                    商品登録
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