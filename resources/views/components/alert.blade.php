@php
    $isInactive = $status === "Tidak Aktif";

    $badgeClasses = $isInactive
        ? 'border-red-200 bg-red-50 text-red-700'
        : 'border-green-200 bg-green-50 text-green-700';


    $dotClasses = $isInactive ? 'bg-red-500' : 'bg-green-500';
    $label = $isInactive ? 'Tidak Aktif' : 'Aktif';

@endphp

<div
    class="inline-flex items-center gap-2 rounded-full border px-3 py-1 text-sm font-semibold shadow-sm {{ $badgeClasses }}">
    <div class="h-2.5 w-2.5 rounded-full {{ $dotClasses }}"></div>
    <span>{{ $label }}</span>
</div>