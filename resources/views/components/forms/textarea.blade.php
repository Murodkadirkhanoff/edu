@props([
    'name',
    'label' => null,
    'value' => null,
    'placeholder' => '',
    'required' => false,
    'disabled' => false,
    'readonly' => false,
    'class' => '',
    'helpText' => null,
    'error' => null,
    'rows' => 4,
    'parentClass' => 'mb-3 row',
    'labelCol' => 'col-sm-4',
    'inputCol' => 'col-sm-8',
])

@php
    $textareaId = $name . '_' . uniqid();
    $hasError = $error || $errors->has($name);
    $textareaClass = 'form-control' . ($hasError ? ' is-invalid' : '') . ($class ? ' ' . $class : '');
@endphp

<div class="{{ $parentClass }}">
    @if($label)
        <label for="{{ $textareaId }}" class="col-form-label {{ $labelCol }}">
            {{ $label }}
            @if($required)
                <span class="text-danger">*</span>
            @endif
        </label>
    @endif

    <div class="{{ $inputCol }}">
        <textarea
            id="{{ $textareaId }}"
            name="{{ $name }}"
            class="{{ $textareaClass }}"
            placeholder="{{ $placeholder }}"
            rows="{{ $rows }}"
            @if($required) required @endif
            @if($disabled) disabled @endif
            @if($readonly) readonly @endif
            {{ $attributes }}
        >{{ old($name, $value) }}</textarea>

        @if($helpText)
            <div class="form-text">{{ $helpText }}</div>
        @endif

        @if($hasError)
            <div class="invalid-feedback d-block">
                {{ $error ?: $errors->first($name) }}
            </div>
        @endif
    </div>
</div>
