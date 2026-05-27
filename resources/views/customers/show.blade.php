@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto px-4 py-6">

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold flex-1">
            顧客詳細
        </h1>
        <a
            href="{{ route('customers.edit', $customer) }}"
            class="
            bg-sky-600
            text-white
            px-4 py-2
            rounded-lg
            hover:bg-sky-700
            transition
            text-sm md:text-base    ">
            編集する
        </a>
    </div>
    <x-card class="mb-6">
        <div class="space-y-3">

            <div>
                <p class="text-sm text-gray-500">顧客名</p>
                <p class="text-lg font-semibold">
                    {{ $customer->name }}
                </p>
            </div>

            <div>
                <p class="text-sm text-gray-500">電話番号</p>
                <p>
                    {{ $customer->phone ?? '未登録' }}
                </p>
            </div>

            <div>
                <p class="text-sm text-gray-500">メモ</p>
                <p>
                    {{ $customer->memo ?? 'なし' }}
                </p>
            </div>

        </div>
    </x-card>

    <div class="grid md:grid-cols-2 gap-4 mb-6">

        <x-card class="bg-green-50">
            <p class="text-sm text-gray-500">合計購入金額</p>
            <p class="text-2xl font-bold">
                ¥{{ number_format($total) }}
            </p>
        </x-card>

        <x-card class="bg-blue-50">
            <p class="text-sm text-gray-500">購入回数</p>
            <p class="text-2xl font-bold">
                {{ $purchaseCount }} 回
            </p>
        </x-card>

    </div>

    <x-card>

        <h2 class="text-xl font-semibold mb-4">
            購入履歴
        </h2>

        {{-- スマホ表示 --}}
        <div class="space-y-4 md:hidden">

            @forelse($sales as $sale)

                <div class="border rounded-lg p-4 bg-slate-50">

                    <div class="space-y-1">

                        <h3 class="font-semibold text-lg">
                            {{ $sale->product->name }}
                        </h3>

                        <p class="text-sm text-gray-500">
                            {{ $sale->sold_at }}
                        </p>

                    </div>

                    <div class="mt-3 text-gray-700">
                        数量：{{ $sale->quantity }}個
                    </div>

                    <div class="font-bold mt-1">
                        ¥{{ number_format($sale->quantity * $sale->unit_price) }}
                    </div>

                </div>

            @empty

                <p class="text-gray-500">
                    購入履歴はありません
                </p>

            @endforelse

        </div>

        {{-- PC表示 --}}
        <div class="hidden md:block overflow-x-auto">

            <table class="w-full text-left">

                <thead class="border-b">
                    <tr>
                        <th class="py-2">日時</th>
                        <th class="py-2">商品</th>
                        <th class="py-2">数量</th>
                        <th class="py-2">金額</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($sales as $sale)

                        <tr class="border-b">

                            <td class="py-3 whitespace-nowrap">
                                {{ $sale->sold_at }}
                            </td>

                            <td>
                                {{ $sale->product->name }}
                            </td>

                            <td>
                                {{ $sale->quantity }}
                            </td>

                            <td>
                                ¥{{ number_format($sale->quantity * $sale->unit_price) }}
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="4" class="py-4 text-gray-500">
                                購入履歴はありません
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </x-card>
</div>

@endsection