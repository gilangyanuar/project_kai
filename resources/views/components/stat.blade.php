@props(['title', 'value', 'icon' => 'analytics', 'color' => 'bg-indigo-50 text-indigo-600'])

<div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm flex items-start justify-between hover:shadow-md transition">
    <div>
        <p class="text-sm font-medium text-gray-500 mb-1">{{ $title }}</p>
        <h3 class="text-2xl font-bold text-gray-900">{{ $value }}</h3>
    </div>
    <div class="p-3 rounded-lg {{ $color }}">
        <span class="material-symbols-outlined text-2xl">{{ $icon }}</span>
    </div>
</div>