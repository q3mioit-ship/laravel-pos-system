@extends('layouts.app')

@section('content')

<h2>商品編集</h2>

@if ($errors->any())

    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>

@endif

<form action="/products/{{ $product->id }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label>商品名</label><br>
        <input
            type="text"
            name="name"
            value="{{ old('name', $product->name) }}"
        >
    </div>

    <br>

    <div>
        <label>在庫数</label><br>
        <input
            type="number"
            name="stock"
            value="{{ old('stock', $product->stock) }}"
        >
    </div>

    <br>

    <div>
        <label>仕入価格</label><br>
        <input
            type="number"
            name="cost_price"
            value="{{ old('cost_price', $product->cost_price) }}"
        >
    </div>

    <br>

    <div>
        <label>販売価格</label><br>
        <input
            type="number"
            name="sale_price"
            value="{{ old('sale_price', $product->sale_price) }}"
        >
    </div>

    <br>

    <button type="submit">
        更新
    </button>

</form>

@endsection