<div class="mb-6">

    <label class="block text-lg font-semibold mb-2">

        {{ $label }}

    </label>

    {{ $slot }}

    <x-error :field="$field" />

</div>