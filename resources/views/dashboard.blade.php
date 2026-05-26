@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto p-6">

    <h1 class="text-3xl font-bold mb-6">
        管理画面
    </h1>

    {{-- 上段カード --}}
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">

        <x-card class="bg-blue-50 border border-blue-100">
            <p class="text-sm text-gray-500 mb-2">商品数</p>
            <p class="text-4xl font-bold text-blue-600">
                {{ $productCount }}
            </p>
        </x-card>

        <x-card class="bg-green-50 border border-green-100">
            <p class="text-sm text-gray-500 mb-2">カテゴリ数</p>
            <p class="text-4xl font-bold text-green-600">
                {{ $categoryCount }}
            </p>
        </x-card>

        <x-card class="bg-yellow-50 border border-yellow-100">
            <p class="text-sm text-gray-500 mb-2">在庫不足</p>
            <p class="text-4xl font-bold text-yellow-500">
                {{ $lowStockCount }}
            </p>
        </x-card>

        <x-card class="bg-red-50 border border-red-100">
            <p class="text-sm text-gray-500 mb-2">売切</p>
            <p class="text-4xl font-bold text-red-500">
                {{ $outOfStockCount }}
            </p>
        </x-card>

    </div>

    <div class="grid gap-6 md:grid-cols-3 mt-8">

        <x-card class="bg-purple-50 border border-purple-100">
            <p class="text-sm text-gray-500">今日の売上</p>
            <p class="mt-2 text-3xl font-bold">
                ¥{{ number_format($todaySalesAmount) }}
            </p>
        </x-card>

        <x-card class="bg-purple-50 border border-purple-100">
            <p class="text-sm text-gray-500">今月の売上</p>
            <p class="mt-2 text-3xl font-bold">
                ¥{{ number_format($monthlySalesAmount) }}
            </p>
        </x-card>

        <x-card class="bg-purple-50 border border-purple-100">
            <p class="text-sm text-gray-500">今年の売上</p>
            <p class="mt-2 text-3xl font-bold">
                ¥{{ number_format($yearlySalesAmount) }}
            </p>
        </x-card>

    </div>

    <x-card class="bg-slate-50 border border-slate-100 mt-8">
        <h2 class="text-lg font-bold mb-4">
            月別売上推移
        </h2>

        <canvas id="monthlySalesChart"></canvas>
    </x-card>

        @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('monthlySalesChart');

            if (!ctx) return;

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: @json(
                        $monthlySales->map(fn($sale) => intval($sale->month) . '月')
                    ),
                    datasets: [{
                        label: '売上金額',
                        data: @json(
                            $monthlySales->pluck('total')
                        ),
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        });
        </script>
        @endpush 

       
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-6 mt-8">
    {{-- 在庫不足商品 --}}
        <x-card class="p-6 bg-yellow-50">

            <h2 class="text-xl font-bold mb-4">
                在庫不足商品
            </h2>

            <div class="space-y-3">

                @foreach($lowStockProducts as $product)
                    <div class="flex justify-between border-b pb-3">
                        <span>{{ $product->name }}</span>
                        <x-stock-badge :stock="$product->stock" />
                    </div>
                @endforeach

            </div>

        </x-card>
    {{-- 人気商品ランキング --}}
        <x-card class="bg-green-50 border border-green-100">

            <h2 class="text-xl font-bold mb-4">
                人気商品ランキング
            </h2>

            <div class="space-y-3">

                @foreach($popularProducts as $index => $popularProduct)

                    <div class="flex justify-between border-b pb-3">

                        <span>
                            {{ $index + 1 }}位
                            {{ $popularProduct->product?->name ?? '商品不明' }}
                        </span>

                        <span class="font-semibold">
                            {{ $popularProduct->total_quantity }}個
                        </span>

                    </div>

                @endforeach

            </div>

        </x-card>
    </div>
    <x-card class="bg-slate-50 border border-slate-100 mt-8">

        <h2 class="text-xl font-bold mb-4">
            今日売れた商品
        </h2>

        <div class="space-y-3">

            @forelse($todaySales as $sale)

                <div class="flex justify-between items-center border-b pb-3">

                    <div>
                        {{ $sale->product->name }}
                    </div>

                    <div class="text-right">

                        <div>
                            {{ $sale->quantity }}個
                        </div>

                        <div class="text-sm text-gray-500">
                            ¥{{ number_format($sale->quantity * $sale->unit_price) }}
                        </div>

                    </div>

                </div>

            @empty

                <p class="text-gray-500">
                    今日の売上はまだありません
                </p>

            @endforelse

        </div>

    </x-card>


</div>



    
@endsection