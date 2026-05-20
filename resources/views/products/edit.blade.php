@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto">

    <x-card>

        <h1 class="text-2xl font-bold mb-6">
            商品編集
        </h1>


        @if ($errors->any())

            <div class="bg-red-100 border border-red-400 text-red-700 p-4 rounded mb-6">

                <ul class="list-disc pl-5">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form
            action="/products/{{ $product->id }}"
            method="POST"
            class="space-y-6"
        >

            @csrf
            @method('PUT')

            <x-form-group
                label="商品名"
                field="name"
            >

                <x-input
                    type="text"
                    name="name"
                    value="{{ old('name', $product->name) }}"
                />

            </x-form-group>

            <x-form-group
                label="在庫数"
                field="stock"
            >

                <x-input
                    type="number"
                    name="stock"
                    value="{{ old('stock', $product->stock) }}"
                />

            </x-form-group>

            <x-form-group
                label="仕入価格"
                field="cost_price"
            >

                <x-input
                    type="number"
                    name="cost_price"
                    value="{{ old('cost_price', $product->cost_price) }}"
                />

            </x-form-group>
            <x-form-group
                label="販売価格"
                field="sale_price"
            >

                <x-input
                    type="number"
                    name="sale_price"
                    value="{{ old('sale_price', $product->sale_price) }}"
                />

            </x-form-group>

            <x-button
                type="submit"
                class="bg-sky-500 hover:bg-sky-700"
            >
                更新
            </x-button>

        </form>
    </x-card>
</div>
@endsection