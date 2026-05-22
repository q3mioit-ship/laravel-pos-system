@if ($stock === 0)

    <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">
        売切
    </span>

@elseif ($stock <= 2)

    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
        残りわずか
    </span>

@else

    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
        在庫あり
    </span>

@endif