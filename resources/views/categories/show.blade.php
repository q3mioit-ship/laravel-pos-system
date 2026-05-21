@extends('layouts.app')

@section('content')

    <h1 class="text-3xl font-bold mb-8">

        {{ $category->name }}

    </h1>

    <div class="space-y-4">

        @foreach($category->products as $product)

            <div class="bg-white shadow rounded-xl p-6">

                <h2 class="text-2xl font-bold">

                    {{ $product->name }}

                </h2>

                <p class="text-gray-600 mt-2">

                    在庫：
                    {{ $product->stock }}

                </p>

            </div>

        @endforeach

    </div>

@endsection