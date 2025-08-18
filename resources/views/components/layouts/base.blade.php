<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {{-- Meta Tags --}}
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Favicon --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{asset(config('layouts.assets.favicon'))}}"/>

    <script src="{{asset('assets/js/vendors/darkMode.js')}}"></script>

    <!-- Libs CSS -->
    <link href="{{asset('assets/fonts/feather/feather.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/libs/bootstrap-icons/font/bootstrap-icons.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/libs/simplebar/dist/simplebar.min.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('assets/css/theme.min.css')}}">
    {{-- Canonical URL --}}
    <link rel="canonical" href="{{config('layouts.assets.canonical_url')}}"/>


    {{-- Page Title --}}
    <title>{{ $title ?? config('layouts.defaults.title') }}</title>


    <!-- Plyr CSS -->
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css"/>
    {{-- Additional Styles --}}
    @stack('styles')
    @livewireStyles
</head>

<body class="{{ $bodyClass ?? config('layouts.defaults.body_class') }}">
<div
    aria-live="polite"
    aria-atomic="true"
    class="position-fixed top-0 end-0 p-3"
    style="z-index:1080;"
>
    @if(session('success'))
        <div
            id="customToast"
            class="toast align-items-center text-bg-success border-0 show"
            role="alert"
            aria-live="assertive"
            aria-atomic="true"
        >
            <div class="toast-header">
                {{-- Иконка вместо картинки --}}
                <i class="fe fe-check-circle text-success fs-3 me-2"></i>
                <strong class="me-auto">Успех</strong>
                <small class="text-muted ms-2">сейчас</small>
                <button
                    type="button"
                    class="btn-close btn-close-white ms-2 mb-1"
                    data-bs-dismiss="toast"
                    aria-label="Закрыть"
                ></button>
            </div>
            <div class="toast-body text-white">
                {{ session('success') }}
            </div>
        </div>
    @endif
</div>

{{-- Page Content --}}
{{ $slot }}
{{-- Scroll to Top --}}
<x-forms.scroll-to-top/>
<script src="{{asset('assets/libs/@popperjs/core/dist/umd/popper.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/libs/simplebar/dist/simplebar.min.js')}}"></script>

<!-- Theme JS -->
<script src="{{asset('assets/js/theme.min.js')}}"></script>

<script src="{{asset('assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/js/vendors/chart.js')}}"></script>
<script src="{{asset('assets/libs/flatpickr/dist/flatpickr.min.js')}}"></script>
<script src="{{asset('assets/js/vendors/flatpickr.js')}}"></script>


<!-- Plyr JS -->
<script src="https://cdn.plyr.io/3.7.8/plyr.polyfilled.js"></script>
<!-- HLS.js -->
<script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>


@stack('scripts')
@livewireScripts

@once
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const toastEl = document.getElementById('customToast');
                if (!toastEl) return;

                // Создаём и показываем тост
                const toast = new bootstrap.Toast(toastEl, {
                    delay: 4000  // время отображения в миллисекундах
                });
                toast.show();
            });
        </script>
    @endpush
@endonce

<script>
    document.addEventListener('DOMContentLoaded', function () {

        document.querySelectorAll('.currency-input').forEach(function (input) {
            input.addEventListener('input', function (e) {
                let raw = input.value.replace(/\D/g, '');
                if (raw === '') return input.value = '';

                let formatted = new Intl.NumberFormat('ru-RU').format(raw);
                input.value = formatted;
            });

            // При отправке формы убираем формат
            input.form?.addEventListener('submit', function () {
                input.value = input.value.replace(/\s/g, '').replace(',', '.');
            });
        });
    });
</script>

</body>
</html>
