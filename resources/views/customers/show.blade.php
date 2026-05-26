@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto p-6">

    {{-- 顧客情報 --}}
    <x-card>
        <h1 class="text-2xl font-bold">
            {{ $customer->name }}
        </h1>

        <p class="text-gray-600 mt-2">
            {{ $customer->phone }}
        </p>

        <p class="mt-2 text-lg font-bold text-blue-600">
            合計購入金額：¥{{ number_format($total) }}
        </p>
    </x-card>

    {{-- 購入履歴 --}}
    <div class="mt-6 space-y-4">

        <h2 class="text-xl font-bold">
            購入履歴
        </h2>

        @forelse($sales as $sale)

            <x-card>

                <div class="flex justify-between">
                    <div>
                        <p class="font-bold">
                            {{ $sale->product->name }}
                        </p>

                        <p class="text-gray-600">
                            {{ $sale->quantity }}個
                        </p>
                    </div>

                    <div class="text-right">
                        <p class="font-bold">
                            ¥{{ number_format($sale->quantity * $sale->unit_price) }}
                        </p>

                        <p class="text-sm text-gray-500">
                            {{ $sale->created_at->format('Y-m-d') }}
                        </p>
                    </div>
                </div>

            </x-card>

        @empty

            <p class="text-gray-500">
                購入履歴はありません
            </p>

        @endforelse

    </div>

</div>

@endsection