@props(['align' => 'right', 'width' => '48'])

@php
switch ($align) {
    case 'left':
        $alignmentClasses = 'origin-top-left left-0';
        break;
    case 'top':
        $alignmentClasses = 'origin-top';
        break;
    case 'right':
    default:
        $alignmentClasses = 'origin-top-right right-0';
        break;
}

switch ($width) {
    case '48':
        $width = 'w-48';
        break;
}
@endphp

<div class="relative">
    <div @click="open = ! open" @keydown.escape="open = false" x-data="{ open: false }" x-on:click.away="open = false" class="inline-block text-left">
        {{ $trigger }}

        <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute z-50 mt-2 {{ $width }} rounded-md shadow-lg {{ $alignmentClasses }}" style="display: none;">
            <div class="rounded-md ring-1 ring-black ring-opacity-5 bg-white">
                {{ $content }}
            </div>
        </div>
    </div>
</div>
