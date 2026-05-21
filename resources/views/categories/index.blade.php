@extends('layouts.app')

@section('content')

    <h1 class="text-3xl font-bold mb-8">
        部門一覧
    </h1>

    @foreach($categories as $category)

        <a
            href="/categories/{{ $category->id }}"
            class="block border rounded-xl p-6 mb-4 bg-white shadow hover:shadow-lg transition"
        >

            <h2 class="text-2xl font-bold">

                {{ $category->name }}

            </h2>

        </a>

    @endforeach

@endsection