<div
    {{ $attributes->merge([
        'class' => '
            
            shadow
            rounded-2xl
            p-8
        '
    ]) }}
>
    {{ $slot }}
</div>