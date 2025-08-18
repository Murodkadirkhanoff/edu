@props(['module' => null])

<div class="mb-3">
    <label for="module-title" class="form-label">Название раздела</label>
    <input
        type="text"
        name="title"
        id="module-title"
        value="{{ old('title', $module->title ?? '') }}"
        class="form-control"
        required
    />
</div>
<input type="hidden" name="module_id" id="module-id" value="{{ $module->id ?? '' }}">
