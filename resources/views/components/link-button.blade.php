<a
    {{ $attributes->merge([
        'class' => '
            inline-block
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
</a>