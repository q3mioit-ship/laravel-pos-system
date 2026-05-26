@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6">

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">
            売上一覧
        </h1>

        <a
            href="{{ route('sales.create') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded"
        >
            売上登録
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full">

            <thead class="bg-gray-100">
                <tr>
                    <th class="text-left p-4">商品名</th>
                    <th class="text-left p-4">数量</th>
                    <th class="text-left p-4">金額</th>
                    <th class="text-left p-4">売上日時</th>
                </tr>
            </thead>

            <tbody>
                @forelse($sales as $sale)
                    <tr class="border-t">

                        <td class="p-4">
                            {{ $sale->product->name }}
                        </td>

                        <td class="p-4">
                            {{ $sale->quantity }}
                        </td>

                        <td class="p-4">
                            ¥{{ number_format($sale->quantity * $sale->unit_price) }}
                        </td>
                        <td class="p-4">
                            {{ $sale->sold_at }}
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="p-6 text-center text-gray-500">
                            売上データがありません
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>

    <div class="mt-6">
        {{ $sales->links() }}
    </div>

</div>
@endsection