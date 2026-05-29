@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto p-6">

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-2xl font-bold">
            顧客登録
        </h1>

        <a
            href="{{ route('customers.index') }}"
            class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg w-20 text-center"
        >
            戻る
        </a>

    </div>
    @if ($errors->any())
        <div class="mb-4 rounded-lg bg-red-100 border border-red-300 p-4 text-red-700">
            入力内容を確認してください。
        </div>
    @endif
    <form action="{{ route('customers.store') }}" method="POST">

        @csrf

        <div class="mb-4">
            <label class="block mb-2">顧客名</label>

            <x-input
                name="name"
                :value="old('name')"
            />
            @error('name')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-2">電話番号</label>

            <x-input
                name="phone"
                :value="old('phone')"
            />
        </div>

        <div class="mb-4">
            <label class="block mb-2">メモ</label>

            <textarea
                name="memo"
                rows="4"
                class="w-full border rounded-lg p-3"
            >{{ old('memo') }}</textarea>
        </div>

        <x-button class="bg-blue-600 hover:bg-blue-700">
            登録する
        </x-button>

    </form>

</div>

@endsection