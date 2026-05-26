@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto p-6">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">
            顧客一覧
        </h1>

        <a
            href="{{ route('customers.create') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded-lg"
        >
            顧客登録
        </a>
    </div>

    <div class="space-y-4">

        @foreach($customers as $customer)
            <a href="{{ route('customers.show', $customer->id) }}" >
            <x-card class="border mb-5 hover:shadow-lg transition">

                <h2 class="text-lg font-bold">
                    {{ $customer->name }}
                </h2>

                <p class="text-gray-600 mt-2">
                    {{ $customer->phone }}
                </p>

                <p class="mt-2">
                    {{ $customer->memo }}
                </p>

                <p class="text-blue-600 font-bold mt-2">
                    合計：¥{{ number_format($customer->total) }}
                </p>
            </x-card>
            </a>
        @endforeach

    </div>

</div>

@endsection