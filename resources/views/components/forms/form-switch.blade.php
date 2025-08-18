@props([
    'name',
    'label' => null,
    'value' => true,
    'required' => false,
    'class' => '',
    'helpText' => null,
    'error' => null
])

@php
    $inputId = $name . '_' . uniqid();
    $hasError = $error || $errors->has($name);
    $inputClass = 'form-control' . ($hasError ? ' is-invalid' : '') . ($class ? ' ' . $class : '');
@endphp

<div class="form-check form-switch mb-2">
    <input name="{{ $name }}" class="form-check-input" type="checkbox" role="switch" id="{{$inputId}}" @if($value) checked @endif>

    @if($label)
        <label for="{{ $inputId }}" class="form-check-label">
            {{ $label }}
            @if($required)
                <span class="text-danger">*</span>
            @endif
        </label>
    @endif

</div>
@if($helpText)
    <div class="form-text">{{ $helpText }}</div>
@endif

@if($hasError)
    <div class="invalid-feedback">
        {{ $error ?: $errors->first($name) }}
    </div>
@endif
