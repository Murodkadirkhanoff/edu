@props(['lesson' => null, 'moduleId' => null])

<input type="hidden" name="module_id" id="lesson-module-id" value="{{ $lesson->module_id ?? $moduleId }}">
<div class="mb-3">
    <label for="lesson-title" class="form-label">Название урока</label>
    <input
        type="text"
        name="title"
        id="lesson-title"
        value="{{ old('title', $lesson->title ?? '') }}"
        class="form-control"
        required
    />
</div>
<div class="mb-3">
    <label for="lesson-price" class="form-label">Цена (минор)</label>
    <input
        type="number"
        name="price_minor"
        id="lesson-price"
        value="{{ old('price_minor', $lesson->price_minor ?? 0) }}"
        class="form-control"
    />
</div>
<div class="mb-3 form-check">
    <input
        type="checkbox"
        name="is_free"
        id="lesson-is-free"
        class="form-check-input"
        {{ old('is_free', $lesson->is_free ?? false) ? 'checked' : '' }}
    />
    <label class="form-check-label" for="lesson-is-free">Бесплатный</label>
</div>
