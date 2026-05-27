@extends('layouts.app')

@section('content')

<div class="max-w-xl mx-auto">

    <x-card>

        <h1 class="text-2xl font-bold mb-6">
            カテゴリ編集
        </h1>

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