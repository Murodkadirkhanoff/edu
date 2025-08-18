@props([
    'name',
    'id'          => null,
    'label'       => null,
    'type'        => 'text',
    'value'       => null,
    'placeholder' => '',
    'required'    => false,
    'disabled'    => false,
    'readonly'    => false,
    'helpText'    => null,
])



<x-forms.group
    :name="$name"
    :label="$label"
    :required="$required"
    :labelCols="$labelCols ?? 'col-sm-4'"
    :inputCols="$inputCols ?? 'col-sm-8'"
>
    <input
        {{-- базовые атрибуты --}}
        id="{{ $name }}"
        name="{{ $name }}"
        type="{{ $type }}"
        value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}"

        {{-- флаги --}}
        @if($required)  required  @endif
        @if($disabled)  disabled  @endif
        @if($readonly)  readonly  @endif

        {{-- классы и любые дополнительные атрибуты --}}
        {{ $attributes
            ->merge([
                'class' => 'form-control',
            ])
            ->class([
                'is-invalid' => $errors->has($name),
            ])
        }}
    />

    @if($helpText)
        <div class="form-text">{{ $helpText }}</div>
    @endif
</x-forms.group>
