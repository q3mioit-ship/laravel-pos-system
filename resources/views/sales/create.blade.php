@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-6">

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-2xl font-bold">
            売上登録
        </h1>

        <a
            href="{{ route('sales.index') }}"
            class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg w-20 text-center"
        >
            戻る
        </a>

    </div>

    <form action="{{ route('sales.store') }}" method="POST" class="space-y-6">
        @csrf
        @error('product_id')
            <p class="text-red-500 text-sm mb-4">
                {{ $message }}
            </p>
        @enderror
        <div id="sale-items" class="space-y-4">

        @foreach(old('product_id', ['']) as $index => $oldProductId)
            <div class="sale-item border rounded-lg p-4 bg-gray-50 space-y-4">

                <div>
                    <label class="block mb-2 font-medium">商品</label>

                    <select
                        name="product_id[]"
                        class="w-full border rounded-lg px-4 py-3"
                    >
                        @foreach($products as $product)
                            <option
                                value="{{ $product->id }}"
                                @selected($oldProductId == $product->id)
                            >
                                {{ $product->name }}（在庫 {{ $product->stock }}）
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block mb-2 font-medium">数量</label>

                    <input
                        type="number"
                        name="quantity[]"
                        value="{{ old('quantity.' . $index, 1) }}"
                        min="1"
                        class="w-full border rounded-lg px-4 py-3"
                    >
                </div>

                <div class="flex justify-end">
                    <button
                        type="button"
                        onclick="removeSaleItem(this)"
                        class="text-red-600 text-sm hover:text-red-800"
                    >
                        この行を削除
                    </button>
                </div>

            </div>
        @endforeach

    </div>

        <button
            type="button"
            onclick="addSaleItem()"
            class="w-full bg-gray-200 py-3 rounded-lg hover:bg-gray-300"
        >
            ＋ 商品を追加
        </button>

        <div>
            <label class="block mb-2 font-medium">
                顧客（任意）
            </label>

            <select
                name="customer_id"
                class="w-full border rounded-lg px-4 py-3"
            >
                <option value="">
                    選択してください
                </option>

                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">
                        {{ $customer->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button
            type="submit"
            class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700"
        >
            登録する
        </button>

    </form>
</div>

@push('scripts')
<script>
function addSaleItem() {

    const container = document.getElementById('sale-items');

    const item = container.children[0].cloneNode(true);

    item.querySelector('input').value = 1;

    container.appendChild(item);
}
</script>
@endpush
@push('scripts')
<script>
function addSaleItem() {
    const container = document.getElementById('sale-items');

    const item = container.children[0].cloneNode(true);

    item.querySelector('input').value = 1;

    container.appendChild(item);
}

function removeSaleItem(button) {

    const container = document.getElementById('sale-items');

    if (container.children.length === 1) {
        return;
    }

    button.closest('.sale-item').remove();
}
</script>
@endpush

@endsection