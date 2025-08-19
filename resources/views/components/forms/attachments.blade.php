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

<x-forms.group
    :name="$name"
    :label="$label"
    :required="$required"
    :labelCols="$labelCols ?? 'col-sm-4'"
    :inputCols="$inputCols ?? 'col-sm-8'"
>
    <input
        multiple
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
