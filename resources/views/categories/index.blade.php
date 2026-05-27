@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-8">
    部門一覧
</h1>

@foreach($categories as $category)

    <div class="relative">

        <a
            href="/categories/{{ $category->id }}"
            class="block border rounded-xl p-6 mb-4 bg-white shadow hover:shadow-lg transition"
        >

            <h2 class="text-2xl font-bold">
                {{ $category->name }}
            </h2>

        </a>

        {{-- 編集ボタン（右上） --}}
        <a
            href="{{ route('categories.edit', $category->id) }}"
            class="absolute top-4 right-4 text-sm bg-sky-200 text-gray-500 px-3 py-1 rounded hover:bg-sky-500 hover:text-white"
        >
            編集
        </a>

    </div>

@endforeach

@endsection