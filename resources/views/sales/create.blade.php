@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-6">

    <h1 class="text-2xl font-bold mb-6">
        売上登録
    </h1>

    <form action="{{ route('sales.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label class="block mb-2 font-medium">
                商品
            </label>

            <select
                name="product_id"
                class="w-full border rounded-lg px-4 py-3"
            >
                @foreach($products as $product)
                    <option
                        value="{{ $product->id }}"
                        @selected(old('product_id') == $product->id)
                    >
                        {{ $product->name }}（在庫 {{ $product->stock }}）
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-2 font-medium">
                数量
            </label>

            <input
                type="number"
                name="quantity"
                value="{{ old('quantity', 1) }}"
                min="1"
                class="w-full border rounded-lg px-4 py-3"
            >
        </div>

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
                    <option
                        value="{{ $customer->id }}"
                        @selected(old('customer_id') == $customer->id)
                    >
                        {{ $customer->name }}
                    </option>
                @endforeach
            </select>
        </div>

        @error('quantity')
            <p class="text-red-500 text-sm">
                {{ $message }}
            </p>
        @enderror

        <button
            type="submit"
            class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700"
        >
            登録する
        </button>

    </form>
</div>
@endsection