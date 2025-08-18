@props([
    'name' => null,
    'label' => '',
    'checked' => false,
    'disabled' => false,
    'required' => false,
])

<div class="form-check">
    <input
        type="checkbox"
        id="{{ $name }}"
        name="{{ $name }}"
        {{ $attributes->merge([
            'class' => 'form-check-input',
            'wire:model.defer' => $attributes->wire('model.defer') ?? $name
        ]) }}
        {{ $checked ? 'checked' : '' }}
        {{ $required ? 'required' : '' }}
        {{ $disabled ? 'disabled' : '' }}
    >
    <label class="form-check-label" for="{{ $name }}">
        {{ $label }}
    </label>
</div>
