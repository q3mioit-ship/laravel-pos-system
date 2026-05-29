@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">
            仕入一覧
        </h1>

        <a
            href="{{ route('purchases.create') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded"
        >
            仕入登録
        </a>
    </div>

    {{-- スマホ表示 --}}
    <div class="space-y-4 md:hidden">

        @forelse($purchases as $purchase)

            <x-card class="border">

                <div class="space-y-1">

                    <h2 class="text-lg font-semibold">
                        {{ $purchase->product->name }}
                    </h2>

                    <p class="text-sm text-gray-500">
                        {{ $purchase->purchased_at }}
                    </p>

                </div>

                <div class="mt-3 text-gray-700">
                    数量：{{ $purchase->quantity }}個
                </div>

            </x-card>

        @empty

            <x-card>
                <p class="text-center text-gray-500">
                    仕入データがありません
                </p>
            </x-card>

        @endforelse

    </div>


    {{-- PC表示 --}}
    <div class="hidden md:block bg-white rounded-lg shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-100">
                <tr>
                    <th class="p-4 text-left">商品名</th>
                    <th class="p-4 text-left">数量</th>
                    <th class="p-4 text-left">仕入日時</th>
                </tr>
            </thead>

            <tbody>

                @forelse($purchases as $purchase)

                    <tr class="border-t">

                        <td class="p-4">
                            {{ $purchase->product->name }}
                        </td>

                        <td class="p-4">
                            {{ $purchase->quantity }}
                        </td>

                        <td class="p-4 whitespace-nowrap">
                            {{ $purchase->purchased_at }}
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="3" class="p-6 text-center text-gray-500">
                            仕入データがありません
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>
    <div class="mt-6">
        {{ $purchases->links() }}
    </div>

</div>
@endsection