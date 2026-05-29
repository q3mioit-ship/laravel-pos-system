@extends('layouts.app')

@section('content')

<div class="max-w-xl mx-auto">

    <x-card>

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">
                カテゴリ編集
            </h1>

            <a
                href="{{ route('categories.index') }}"
                class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg w-20 text-center"
            >
                戻る
            </a>
        </div>

        <form
            action="{{ route('categories.update', $category->id) }}"
            method="POST"
            class="space-y-6"
        >
            @csrf
            @method('PUT')

            <x-form-group
                label="カテゴリ名"
                field="name"
            >
                <x-input
                    type="text"
                    name="name"
                    value="{{ old('name', $category->name) }}"
                />
            </x-form-group>

            <x-button type="submit">
                更新
            </x-button>

        </form>

    </x-card>

</div>

@endsection