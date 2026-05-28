@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto">

    <x-card>

        <div class="flex justify-between items-start mb-6">
            <h1 class="text-2xl font-bold mb-6">
                商品登録
            </h1>
            <a
                href="{{ route('categories.show', request('category_id')) }}"
                class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg w-20 text-center"
            >
                戻る
            </a>
        </div>
        @if ($errors->any())

        <div class="bg-red-100 border border-red-400 text-red-700 p-4 rounded mb-6">

            <ul class="list-disc pl-5">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

        @endif

        <form action="/products" method="POST" class="space-y-6">

        @csrf
            <x-form-group
            label="部門"
            field="category_id"
            >

            <select
                name="category_id"
                class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-sky-500 focus:outline-none"
            >

                <option value="">
                    部門を選択してください
                </option>

                @foreach($categories as $category)

                    <option
                        value="{{ $category->id }}"
                        @selected(old('category_id') == $category->id)
                    >
                        {{ $category->name }}
                    </option>

                @endforeach

            </select>
            </x-form-group>

            <x-form-group
                label="商品名"
                field="name"
            >

                <x-input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                />

            </x-form-group>
            <x-form-group
                label="在庫数"
                field="stock"
            >

                <x-input
                    type="number"
                    name="stock"
                    value="{{ old('stock') }}"
                />

            </x-form-group>

            <x-form-group
                label="仕入価格"
                field="cost_price"
            >

                <x-input
                    type="number"
                    name="cost_price"
                    value="{{ old('cost_price') }}"
                />

            </x-form-group>

            <x-form-group
                label="販売価格"
                field="sale_price"
            >

                <x-input
                    type="number"
                    name="sale_price"
                    value="{{ old('sale_price') }}"
                />

            </x-form-group>

            <x-button
                type="submit"
                class="w-full bg-blue-500 hover:bg-blue-700"
            >
                登録
            </x-button>

        </form>
    </x-card>
</div>

@endsection