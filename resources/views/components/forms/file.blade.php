@props([
    'name',
    'label'      => null,
    'required'   => false,
    'accept'     => 'image/*',
    'previewUrl' => null,
    'helpText'   => null,
    'id'         => null,
])

@php
    $fieldId   = $id ?? $name . '_' . uniqid();
    $previewId = "preview_{$fieldId}";
@endphp

<x-forms.group :name="$name" :label="$label" :required="$required">
    <input
        type="file"
        name="{{ $name }}"
        id="{{ $fieldId }}"
        @isset($accept) accept="{{ $accept }}" @endisset
        {{ $required ? 'required' : '' }}
        {{ $attributes
            ->class([
                'form-control',
                'is-invalid' => $errors->has($name),
            ])
            ->merge([ 'data-preview-target' => $previewId ])
        }}
    />

    {{-- Всегда рендерим, скрыв если нет URL --}}
    <div class="mt-2">
        <img
            id="{{ $previewId }}"
            src="{{ $previewUrl ?: '' }}"
            class="img-thumbnail"
            style="max-height:150px; display: {{ $previewUrl ? 'block' : 'none' }};"
            alt="preview"
        >
    </div>

    @if($helpText)
        <div class="form-text">{{ $helpText }}</div>
    @endif

    @error($name)
    <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</x-forms.group>

@once
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                document.querySelectorAll('input[data-preview-target]').forEach(input => {
                    input.addEventListener('change', () => {
                        const file = input.files?.[0];
                        if (!file) return;

                        // Если файл не изображение — выходим
                        if (!file.type.startsWith('image/')) {
                            return;
                        }

                        const preview = document.getElementById(input.dataset.previewTarget);
                        if (!preview) return;

                        const reader = new FileReader();
                        reader.onload = e => {
                            preview.src = e.target.result;
                            preview.style.display = 'block';
                        };
                        reader.readAsDataURL(file);
                    });
                });
            });
        </script>
    @endpush
@endonce
