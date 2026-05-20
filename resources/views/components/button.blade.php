<button
    {{ $attributes->merge([
        'class' => '
            px-6
            py-3
            rounded-lg
            text-white
            font-semibold
            transition
        '
    ]) }}
>
    {{ $slot }}
</button>