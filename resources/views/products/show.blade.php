@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto">

    <x-card>

        <div class="flex justify-between items-start mb-6">

            <div>
                <p class="text-sm text-gray-500 mb-2">
                    商品詳細
                </p>

                <h1 class="text-3xl font-bold text-gray-800">
                    {{ $product->name }}
                </h1>
            </div>

            <a
                href="/products"
                class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg"
            >
                戻る
            </a>

        </div>

        <div class="space-y-4 text-lg">

            <div class="border-b pb-4">
                <p class="text-gray-500 text-sm">
                    在庫数
                </p>

                <p class="font-semibold text-2xl">
                    {{ $product->stock }}
                </p>
            </div>

            <div class="border-b pb-4">
                <p class="text-gray-500 text-sm">
                    仕入価格
                </p>

                <p class="font-semibold text-2xl">
                    ¥{{ number_format($product->cost_price) }}
                </p>
            </div>

            <div>
                <p class="text-gray-500 text-sm">
                    販売価格
                </p>

                <p class="font-semibold text-2xl text-green-700">
                    ¥{{ number_format($product->sale_price) }}
                </p>
            </div>

        </div>

        <div class="flex gap-4 mt-8">

            <x-link-button
                href="/products/{{ $product->id }}/edit"
                class="bg-sky-500 hover:bg-sky-700"
            >
                編集
            </x-link-button>

            <form
                action="/products/{{ $product->id }}"
                method="POST"
            >
                @csrf
                @method('DELETE')

            <x-button
                type="submit"
                class="bg-red-600 hover:bg-red-700"
            >
                削除
            </x-button>

            </form>

        </div>
    </x-card>


</div>

@endsection