@props([
    'name',
    'label'       => null,
    'options'     => [],
    'placeholder' => 'Select an option',
    'required'    => false,
    'disabled'    => false,
    'readonly'    => false,
    'multiple'    => false,
    'value'       => null,
    'id' => null
])
@php
$id = $id ?? $name;
@endphp

<x-forms.group
    :name="$id"
    :label="$label"
    :required="$required"
    :labelCols="$labelCols ?? 'col-sm-4'"
    :inputCols="$inputCols ?? 'col-sm-8'"
>
    <select
        name="{{ $name }}{{ $multiple ? '[]' : '' }}"
        id="{{ $id }}"
        {{ $attributes
            ->merge(['placeholder' => $placeholder])
            ->class([
                'form-select choices w-100 mb-0',
                'is-invalid' => $errors->has($name),
            ])
        }}
        @if($required)  required @endif
        @if($disabled)  disabled @endif
        @if($readonly)  readonly @endif
        @if($multiple)  multiple @endif
    >
        @unless($multiple)
            <option value="">{{ $placeholder }}</option>
        @endunless

        @foreach($options as $key => $text)
            <option
                value="{{ $key }}"

            @if($multiple)
                @selected(collect(old($name, $value))->contains($key))
                @else
                @selected(old($name, $value) == $key)
                @endif
            >{{ $text }}</option>
        @endforeach
    </select>

    @error($name)
    <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror

    @if($helpText ?? false)
        <div class="form-text">{{ $helpText }}</div>
    @endif
</x-forms.group>

@once
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                document.querySelectorAll('.choices').forEach(el => {
                    new Choices(el, {
                        shouldSort: false,
                        removeItemButton: true,
                        placeholder: true,
                        placeholderValue: el.getAttribute('placeholder'),
                    });
                });
            });
        </script>
    @endpush
@endonce
