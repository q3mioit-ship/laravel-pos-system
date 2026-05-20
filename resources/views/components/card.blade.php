<div
    {{ $attributes->merge([
        'class' => '
            bg-white
            shadow
            rounded-2xl
            p-8
        '
    ]) }}
>
    {{ $slot }}
</div>