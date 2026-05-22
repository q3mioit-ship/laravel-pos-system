@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto p-6">

    <h1 class="text-3xl font-bold mb-6">
        ダッシュボード
    </h1>

    {{-- 上段カード --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">

        <x-card>
            <p class="text-gray-500">商品数</p>
            <p class="text-3xl font-bold text-blue-600">
                {{ $productCount }}
            </p>
        </x-card>

        <x-card>
            <p class="text-gray-500">カテゴリ数</p>
            <p class="text-3xl font-bold text-sky-600">
                {{ $categoryCount }}
            </p>
        </x-card>

        <x-card>
            <p class="text-gray-500">在庫不足</p>
            <p class="text-3xl font-bold text-yellow-500">
                {{ $lowStockCount }}
            </p>
        </x-card>

        <x-card>
            <p class="text-gray-500">売切</p>
            <p class="text-3xl font-bold text-red-500">
                {{ $outOfStockCount }}
            </p>
        </x-card>

    </div>

    {{-- 在庫不足商品 --}}
    <x-card>

        <h2 class="text-2xl font-bold mb-4">
            在庫不足商品
        </h2>

        <div class="space-y-3">

            @forelse ($lowStockProducts as $product)

                <div class="flex items-center justify-between border-b pb-2">

                    <div>
                        <p class="font-bold">
                            {{ $product->name }}
                        </p>

                        <p class="text-gray-500">
                            在庫: {{ $product->stock }}
                        </p>
                    </div>

                    <x-stock-badge :stock="$product->stock" />

                </div>

            @empty

                <p class="text-gray-500">
                    在庫不足商品はありません
                </p>

            @endforelse

        </div>

    </x-card>

</div>

@endsection