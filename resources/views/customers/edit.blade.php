@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto">

    <x-card>

        <div class="flex justify-between items-center mb-6">

            <h1 class="text-2xl font-bold">
                顧客編集
            </h1>

            <a
                href="{{ route('customers.show', $customer->id) }}"
                class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg"
            >
                戻る
            </a>

        </div>

        <form
            action="{{ route('customers.update', $customer) }}"
            method="POST"
            class="space-y-6"
        >

            @csrf
            @method('PUT')

            <x-form-group label="顧客名" field="name">
                <x-input
                    type="text"
                    name="name"
                    value="{{ old('name', $customer->name) }}"
                />
            </x-form-group>

            <x-form-group label="電話番号" field="phone">
                <x-input
                    type="text"
                    name="phone"
                    value="{{ old('phone', $customer->phone) }}"
                />
            </x-form-group>

            <x-form-group label="メモ" field="memo">
                <textarea
                    name="memo"
                    rows="4"
                    class="w-full border rounded-lg px-4 py-3"
                >{{ old('memo', $customer->memo) }}</textarea>
            </x-form-group>

            <x-button
                type="submit"
                class="bg-sky-600 hover:bg-sky-700"
            >
                更新する
            </x-button>

        </form>

    </x-card>

</div>

@endsection