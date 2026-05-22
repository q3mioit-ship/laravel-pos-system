@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-6">

    <h1 class="text-3xl font-bold mb-8">

        @isset($category)

            {{ $category->name }} 一覧

        @else

            商品一覧

        @endisset

    </h1>
    <form action="{{ route('products.index') }}" method="GET" class="mb-6 flex gap-2">

        <input
            type="text"
            name="keyword"
            value="{{ request('keyword') }}"
            placeholder="商品名を検索"
            class="border rounded-lg px-4 py-2 w-full"
        >

        <button
            type="submit"
            class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700"
        >
            検索
        </button>

    </form>
    <a
        href="/products/create"
        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700"
    >
        商品登録
    </a>

</div>

<div class="space-y-4">

    @foreach ($products as $product)

        <div class="border rounded-lg p-4 shadow bg-white">

            <div class="flex justify-between items-center">

                <div>

                    <h3 class="text-xl font-semibold">
                        {{ $product->name }}
                    </h3>

                    <p class="text-gray-600 mt-2">
                        在庫数：{{ $product->stock }}
                    </p>

                    <x-stock-badge :stock="$product->stock" />
                    
                    <p class="text-gray-600">
                        販売価格：¥{{ $product->sale_price }}
                    </p>

                </div>

                <div>

                    <a
                        href="/products/{{ $product->id }}"
                        class="text-sky-700 font-bold hover:underline"
                    >
                        詳細 →
                    </a>

                </div>

            </div>

        </div>

    @endforeach

    {{ $products->links() }}

</div>

@endsection