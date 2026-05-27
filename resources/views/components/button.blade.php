<button
    {{ $attributes->merge([
        'class' => '
            px-6
            py-3
            rounded-lg
            text-white
            font-semibold
            transition
            bg-blue-600
            hover:bg-blue-700
        '
    ]) }}
>
    {{ $slot }}
</button>