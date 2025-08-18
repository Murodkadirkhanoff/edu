@props([
    'name',
    'id' => $name,
    'label' => null,
    'value' => null,
    'required' => false,
    'placeholder' => 'Введите текст...',
    'helpText' => null,
    'disabled' => false,
    'readonly' => false,
    'labelCols' => 'col-sm-3',
    'inputCols' => 'col-sm-9',
])

<x-forms.group
    :name="$name"
    :label="$label"
    :required="$required"
    :labelCols="$labelCols"
    :inputCols="$inputCols"
>
    <input type="hidden" name="{{ $name }}" id="{{ $id }}_input" value="{{ old($name, $value) }}">

    <div
        id="{{ $id }}_editor"
        style="min-height: 180px; border: 1px solid #ced4da; border-radius: .25rem;"
    >{!! old($name, $value) !!}</div>

    @if($helpText)
        <div class="form-text">{{ $helpText }}</div>
    @endif

    @once
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
        <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    @endonce

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const quill_{{ $id }} = new Quill('#{{ $id }}_editor', {
                    theme: 'snow',
                    placeholder: @json($placeholder),
                    modules: {
                        toolbar: [
                            [{ header: [1, 2, false] }],
                            ['bold', 'italic', 'underline'],
                            ['link', 'blockquote'],
                            [{ list: 'ordered' }, { list: 'bullet' }],
                            ['clean']
                        ]
                    }
                });

                // Устанавливаем текущее значение
                quill_{{ $id }}.root.innerHTML = document.getElementById('{{ $id }}_input').value;

                // Сохраняем при сабмите формы
                const form = document.getElementById('{{ $id }}_editor').closest('form');
                form.addEventListener('submit', function () {
                    document.getElementById('{{ $id }}_input').value = quill_{{ $id }}.root.innerHTML;
                });
            });
        </script>
    @endpush
</x-forms.group>
