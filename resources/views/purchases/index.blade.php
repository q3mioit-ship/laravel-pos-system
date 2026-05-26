@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">
            仕入一覧
        </h1>

        <a
            href="{{ route('purchases.create') }}"
            class="bg-sky-600 text-white px-4 py-2 rounded"
        >
            仕入登録
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

                        <td class="p-4">
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