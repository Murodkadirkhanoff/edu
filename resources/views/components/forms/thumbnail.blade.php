@props([
    'name' => 'thumbnail',
    'label' => 'Project Logo',
    'title' => 'Thumbnail',
    'previewText' => 'Preview Image',
    'error' => null,
])

@php
    $inputId = $name . '_' . uniqid();
    $hasError = $error || $errors->has($name);
@endphp

<div class="card">
    <div class="card-body border-bottom d-flex flex-column gap-4">
        <div class="d-flex justify-content-between align-items-center">
            <h4 class="mb-0">{{ $title }}</h4>
        </div>

        <div class="d-flex flex-column gap-2">
            <div class="d-flex align-items-center">
                <div>
                    <h5 class="mb-3">{{ $label }}</h5>

                    <div class="icon-shape icon-xxl border rounded position-relative overflow-hidden" style="width: 240px; height: 240px;">
                        <img id="preview-{{ $inputId }}" src="#" alt="Preview" class="img-thumbnail rounded d-none">
                        <span class="position-absolute top-50 start-50 translate-middle text-muted">
                            <i class="bi bi-image fs-3"></i>
                        </span>

                        <input
                            id="{{ $inputId }}"
                            class="form-control border-0 opacity-0 position-absolute top-0 start-0 w-100 h-100"
                            name="{{ $name }}"
                            type="file"
                            accept="image/*"
                            onchange="previewImage(event, '{{ $inputId }}')"
                            {{ $attributes }}
                        />
                    </div>

                    @if($hasError)
                        <div class="text-danger small mt-2">
                            {{ $error ?: $errors->first($name) }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="d-flex align-items-center">
                <span class="ms-2">{{ $previewText }}</span>
            </div>
        </div>
    </div>
</div>


<script>
    function previewImage(event, inputId) {
        const input = document.getElementById(inputId);
        const preview = document.getElementById(`preview-${inputId}`);
        const file = input.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('d-none');
            };
            reader.readAsDataURL(file);
        }
    }
</script>
