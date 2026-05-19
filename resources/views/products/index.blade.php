@extends('layouts.app')

@section('content')

<h2>商品一覧</h2>

@foreach($products as $product)
    <p>{{ $product->name }}</p>
@endforeach

@endsection