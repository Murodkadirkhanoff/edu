@props([
    'title' => config('layouts.instructor.title'),
    'bodyClass' => config('layouts.instructor.body_class')
])

<x-layouts.base :title="$title" :bodyClass="$bodyClass">
    {{-- Top Navigation --}}
    {{-- Flash-сообщение --}}
    {{-- Toast-контейнер --}}

    {{-- контейнер для уведомлений --}}
    {{-- Toast-контейнер --}}
    <x-layouts.instructor.partials.navbar/>

    {{-- Sidebar --}}
    <x-layouts.instructor.partials.sidebar/>
    {{-- Main Content --}}
    {{ $slot }}
</x-layouts.base>



