@props([
    'name',
    'label'     => '',
    'checked'   => false,
    'required'  => false,
    'disabled'  => false,
    'helpText'  => null,
    'id'        => null,
])

@php
    $switchId = $id ?? $name;
@endphp

<x-forms.group
    :name="$name"
    :label="$label"
    :required="$required"
    :labelCols="$labelCols ?? 'col-sm-4'"
    :inputCols="$inputCols ?? 'col-sm-8'"
>
    {{-- hidden-поле, чтобы при «off» тоже пришёл 0 --}}
    <input type="hidden" name="{{ $name }}" value="0">

    <div class="form-check form-switch">
        <input
            type="checkbox"
            role="switch"
            id="{{ $switchId }}"
            name="{{ $name }}"
            value=1
            @checked(old($name, $checked))
            @if($required) required @endif
            @if($disabled) disabled @endif
            {{ $attributes
                ->class([
                    'form-check-input',
                    'is-invalid' => $errors->has($name),
                ]) }}
        >
    </div>

    @if($helpText)
        <div class="form-text">{{ $helpText }}</div>
    @endif
</x-forms.group>
