<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite('resources/css/app.css')

    <title>POSシステム</title>
</head>
<body class="bg-gray-100 text-gray-800">


    <header class="bg-green-700 text-white p-4">
        <h1 class="text-3xl font-bold">
            <a href="/products">簡易POSシステム</a>
        </h1>
        <nav>
            <a href="/products">商品一覧</a>
            <a href="/products/create">商品登録</a>
        </nav>

        <hr>
    </header>

    <main class="max-w-3xl mx-auto p-6">

        <div class="bg-white rounded-lg shadow p-6">
            @yield('content')
        </div>

    </main>

</body>
</html>