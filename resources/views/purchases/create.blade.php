@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-6">

    <h1 class="text-2xl font-bold mb-6">
        仕入登録
    </h1>

    <form action="{{ route('purchases.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label class="block mb-2 font-medium">商品</label>

            <select
                name="product_id"
                class="w-full border rounded px-4 py-3"
            >
                @foreach($products as $product)
                    <option value="{{ $product->id }}">
                        {{ $product->name }}
                        （現在庫 {{ $product->stock }}）
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-2 font-medium">数量</label>

            <input
                type="number"
                name="quantity"
                min="1"
                value="{{ old('quantity', 1) }}"
                class="w-full border rounded px-4 py-3"
            >
        </div>

        <button
            type="submit"
            class="bg-sky-600 text-white px-6 py-3 rounded"
        >
            登録する
        </button>

    </form>

</div>
@endsection