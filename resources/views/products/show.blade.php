@extends('layouts.app')

@section('content')

<h2>商品詳細</h2>

<p>商品名：{{ $product->name }}</p>

<p>在庫数：{{ $product->stock }}</p>

<p>仕入価格：{{ $product->cost_price }}</p>

<p>販売価格：{{ $product->sale_price }}</p>

<p>
    <a href="/products">
        商品一覧へ戻る
    </a>
</p>
<p>
    <a href="/products/{{ $product->id }}/edit">
        編集
    </a>
</p>
<form action="/products/{{ $product->id }}" method="POST">

    @csrf
    @method('DELETE')

    <button type="submit">
        削除
    </button>

</form>

@endsection