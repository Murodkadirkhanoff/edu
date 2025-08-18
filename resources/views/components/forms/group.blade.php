@props([
    'name',
    'label'     => null,
    'required'  => false,
    'labelCols' => 'col-sm-4',
    'inputCols' => 'col-sm-8',
])



<div class="row mb-3">
    @if($label)
        <label for="{{ $name }}" class="form-label {{ $labelCols }}">
            {{ $label }}
            @if($required)<span class="text-danger">*</span>@endif
        </label>
    @endif

    <div class="{{ $inputCols }}">
        {{ $slot }}

        @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
