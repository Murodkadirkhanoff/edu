@props([
    'title' => config('layouts.app.title'),
    'bodyClass' => config('layouts.app.body_class')
])

<x-layouts.base :title="$title" :bodyClass="$bodyClass">
    {{-- Header --}}
    <x-layouts.app.partials.header/>

    {{-- Main Content --}}
    {{ $slot }}

    {{-- Footer --}}
    <x-layouts.app.partials.footer/>
</x-layouts.base>
