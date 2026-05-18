<h1>商品一覧</h1>

<a href="/products/create">商品登録</a>

@foreach($products as $product)
    <p>{{ $product->name }}</p>
@endforeach