@props([
    'title' => config('layouts.auth.title'),
    'bodyClass' => config('layouts.auth.body_class')
])

<x-layouts.base :title="$title" :bodyClass="$bodyClass">
    {{-- Main Content --}}
    {{ $slot }}
</x-layouts.base>
