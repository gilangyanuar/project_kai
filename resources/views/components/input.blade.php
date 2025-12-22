@props([
    'label',
    'type' => 'text',
    'value' => '',
    'name' => '',       
    'placeholder' => '' 
])

<div class="grid grid-cols-1 md:grid-cols-4 items-center gap-6">
    <label class="col-span-1 text-gray-800 font-medium">
        {{ $label }}
    </label>

    <input
        type="{{ $type }}"
        name="{{ $name }}"
        value="{{ $value }}"
        placeholder="{{ $placeholder }}"
        class="col-span-3 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
    />
</div>