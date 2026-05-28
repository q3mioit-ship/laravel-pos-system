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
            <p class="mt-2 text-4xl md:text-5xl font-bold">
                ¥{{ number_format($todaySalesAmount) }}
            </p>
        </x-card>

        <x-card class="bg-purple-50 border border-purple-100">
            <p class="text-sm text-gray-500">今月の売上</p>
            <p class="mt-2 text-4xl md:text-5xl font-bold">
                ¥{{ number_format($monthlySalesAmount) }}
            </p>
        </x-card>

        <x-card class="bg-purple-50 border border-purple-100">
            <p class="text-sm text-gray-500">今年の売上</p>
            <p class="mt-2 text-4xl md:text-5xl font-bold">
                ¥{{ number_format($yearlySalesAmount) }}
            </p>
        </x-card>

    </div>
    {{-- 売り上げグラフ切替ボタン --}}
    <x-card class="bg-slate-50 border border-slate-100 mt-8">
        <div class="flex flex-col gap-3 md:flex-row md:justify-between md:items-center mb-4">
            <h2 class="text-lg font-bold mb-4">売上推移</h2>

            <div class="flex gap-2 flex-wrap">
                <button
                    onclick="switchChart('weekly')"
                    class="px-3 py-1 bg-gray-200 rounded-lg text-sm"
                >
                    1週間
                </button>

                <button
                    onclick="switchChart('monthly')"
                    class="px-3 py-1 bg-gray-200 rounded-lg text-sm"
                >
                    月別
                </button>
            </div>
        </div>    
    
        <div class="relative w-full h-72 md:h-80">
           <canvas id="salesChart"></canvas>
        </div>
    </x-card>

        @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
        const weeklySales = @json($weeklySales);
        const monthlySales = @json($monthlySales);
        const isMobile = window.innerWidth < 768;

        const ctx = document.getElementById('salesChart');

        let chart;

        function switchChart(type) {

            let labels = [];
            let data = [];

            if (type === 'weekly') {
                labels = weeklySales.map(item => {
                    const date = new Date(item.label);
                    return `${date.getMonth() + 1}/${date.getDate()}`;
                });
                data = weeklySales.map(item => item.total);
            } else {
                labels = monthlySales.map(item => item.month + '月');
                data = monthlySales.map(item => item.total);
            }

            if (chart) {
                chart.destroy();
            }

            chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: '売上',
                        data: data,
                        tension: 0,
                        pointRadius: isMobile ? 3 : 6,
                        pointHoverRadius: isMobile ? 4 : 8,
                        borderWidth: isMobile ? 2 : 3,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                    
                }
            });
        }

        switchChart('weekly');
        </script>
        @endpush 

       
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-6 mt-8">
    {{-- 在庫不足商品 --}}
        <x-card class="p-6 bg-yellow-50">

            <h2 class="text-xl font-bold mb-4">
                在庫不足商品
            </h2>

            <div class="space-y-3">
                @if($lowStockProducts->isEmpty())
                    <p class="text-gray-500">
                        在庫不足の商品はありません
                    </p>
                @else
                @foreach($lowStockProducts as $product)
                    <div class="flex justify-between border-b pb-3">
                        <span>{{ $product->name }}</span>
                        <x-stock-badge :stock="$product->stock" />
                    </div>
                @endforeach
                @endif
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