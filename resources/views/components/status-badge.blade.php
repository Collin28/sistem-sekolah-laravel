@php
    $isInactive = $status === 'Tidak Aktif';
    
    $badgeClasses = $isInactive 
        ? 'border-rose-200 bg-rose-50 text-rose-700' 
        : 'border-emerald-200 bg-emerald-50 text-emerald-700';
        
    $dotClasses = $isInactive ? 'bg-rose-500' : 'bg-emerald-500';
@endphp

<div class="inline-flex items-center gap-2 rounded-full border px-3 py-1 text-sm font-semibold shadow-sm {{ $badgeClasses }}">
    <div class="h-2.5 w-2.5 rounded-full {{ $dotClasses }}"></div>
    <span>{{ $status }}</span>
</div>