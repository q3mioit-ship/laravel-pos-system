@extends('layouts.app')

@section('content')

<h2>商品登録</h2>

<form action="/products" method="POST">
    @csrf

    <div>
        <label>商品名</label><br>
        <input type="text" name="name">
    </div>

    <br>

    <div>
        <label>在庫数</label><br>
        <input type="number" name="stock">
    </div>

    <br>

    <div>
        <label>仕入価格</label><br>
        <input type="number" name="cost_price">
    </div>

    <br>

    <div>
        <label>販売価格</label><br>
        <input type="number" name="sale_price">
    </div>

    <br>

    <button type="submit">
        登録
    </button>

</form>

@endsection