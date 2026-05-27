@extends('layouts.app')

@section('content')

<div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-6">

    <h1 class="text-2xl md:text-3xl font-bold">

        @isset($category)

            {{ $category->name }} 一覧

        @else

            商品一覧

        @endisset

    </h1>
    <form
    action="{{ route('products.index') }}"
    method="GET"
    class="flex w-full md:w-auto gap-2"
    >

        <input
            type="text"
            name="keyword"
            value="{{ request('keyword') }}"
            placeholder="商品名を検索"
            class="border rounded-lg px-4 py-2 w-full flex-1"
        >

        <button
            type="submit"
            class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 basis-1/4"
        >
            検索
        </button>

    </form>
    <a
        href="/products/create"
        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 text-center"
    >
        商品登録
    </a>

</div>

<div class="space-y-4">

    @foreach ($products as $product)

        <a
            href="{{ route('products.show', $product) }}"
            class="block"
        >

            <x-card
                class="border hover:shadow-lg hover:bg-sky-50 transition"
            >

                <div class="flex justify-between items-center">

                    <div>

                        <h3 class="text-xl font-semibold">
                            {{ $product->name }}
                        </h3>

                        <p class="text-gray-600 mt-2">
                            在庫数：{{ $product->stock }}
                        </p>

                        <x-stock-badge :stock="$product->stock" />

                        <p class="text-gray-600 mt-2">
                            販売価格：¥{{ number_format($product->sale_price) }}
                        </p>

                    </div>

                    <div
                        class="text-sky-600 font-bold"
                    >
                        詳細 →
                    </div>

                </div>

            </x-card>

        </a>

    @endforeach

</div>
@endsection