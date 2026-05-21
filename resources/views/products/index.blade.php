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

</div>

@endsection