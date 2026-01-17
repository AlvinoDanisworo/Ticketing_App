@props(['label', 'active' => false])

<span {{ $attributes->merge(['class' => 'px-4 py-2 rounded-full text-sm font-medium transition-colors cursor-pointer ' . ($active ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300')]) }}>
    {{ $label }}
</span>
