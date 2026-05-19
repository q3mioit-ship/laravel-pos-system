<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>POSシステム</title>
</head>
<body>

    <header>
        <h1>簡易POSシステム</h1>

        <nav>
            <a href="/products">商品一覧</a>
            <a href="/products/create">商品登録</a>
        </nav>

        <hr>
    </header>

    <main>
        @yield('content')
    </main>

</body>
</html>