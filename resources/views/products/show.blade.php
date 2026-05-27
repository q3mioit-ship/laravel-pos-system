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
        <div class="mt-6 flex items-center gap-3">

            <form action="{{ route('products.stock.increase', $product->id) }}" method="POST">
                @csrf
                <button class="bg-green-600 text-white px-4 py-2 rounded-lg text-lg">
                    ＋1
                </button>
            </form>
            <form action="{{ route('products.stock.decrease', $product->id) }}" method="POST">
                @csrf
                <button class="bg-red-600 text-white px-4 py-2 rounded-lg text-lg">
                    −1
                </button>
            </form>
        </div>
    
        <!-- <div id="stockModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">

            <div class="bg-white p-6 rounded-lg w-80">

                <h2 id="modalTitle" class="text-xl font-bold mb-4"></h2>

                <form id="stockForm" method="POST">
                    @csrf

                    <input
                        type="number"
                        name="quantity"
                        min="1"
                        value="1"
                        class="border w-full px-3 py-2 rounded mb-4"
                    >

                    <button class="w-full bg-blue-600 text-white py-2 rounded">
                        実行
                    </button>
                </form>

                <button onclick="closeStockModal()" class="mt-3 text-gray-500 w-full">
                    閉じる
                </button>

            </div>

        </div> -->

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
<!-- @push('scripts')
<script>
    const productId = {{ $product->id }};

    function openStockModal(type) {

        const modal = document.getElementById('stockModal');
        const form = document.getElementById('stockForm');
        const title = document.getElementById('modalTitle');

        modal.classList.remove('hidden');

        if (type === 'increase') {
            title.innerText = '在庫を追加';
            form.action = `/products/${productId}/stock/increase`;
        } else {
            title.innerText = '在庫を減らす';
            form.action = `/products/${productId}/stock/decrease`;
        }
    }

    function closeStockModal() {
        document.getElementById('stockModal').classList.add('hidden');
    }
</script>
@endpush -->
@endsection