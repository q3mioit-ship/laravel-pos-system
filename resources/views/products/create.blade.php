@extends('layouts.app')

@section('content')

<h2 class="text-2xl font-bold mb-6">
    商品登録
</h2>

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

    <div>

        <label class="block font-semibold mb-2">
            商品名
        </label>

        <x-input
            type="text"
            name="name"
            value="{{ old('name') }}"
        />

    </div>

    <div>

        <label class="block font-semibold mb-2">
            在庫数
        </label>

        <x-input
            type="number"
            name="stock"
            value="{{ old('stock') }}"
        />

    </div>

    <div>

        <label class="block font-semibold mb-2">
            仕入価格
        </label>

        <x-input
            type="number"
            name="cost_price"
            value="{{ old('cost_price') }}"
        />

    </div>

    <div>

        <label class="block font-semibold mb-2">
            販売価格
        </label>

        <x-input
            type="number"
            name="sale_price"
            value="{{ old('sale_price') }}"
        />

    </div>

    <x-button
        type="submit"
        class="bg-blue-500 hover:bg-blue-700"
    >
        登録
    </x-button>

</form>

@endsection