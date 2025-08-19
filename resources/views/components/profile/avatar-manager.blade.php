@props([
    'user' => auth()->user(),
    'uploadRoute' => route('avatar.upload'),
    'deleteRoute' => route('avatar.delete'),
])

<div class="d-flex align-items-center justify-content-between flex-wrap gap-3">

    {{-- Upload form --}}
    <form action="{{ $uploadRoute }}" method="POST" enctype="multipart/form-data" class="d-flex align-items-center gap-3">
        @csrf
        <div class="position-relative">
            <img id="avatarPreview"
                 src="{{ $user->avatar_url }}"
                 class="rounded-circle border shadow-sm"
                 style="width:100px; height:100px; object-fit:cover;"
                 alt="avatar">

            <!-- Upload Button (overlayed) -->
            <label for="avatar"
                   class="position-absolute bottom-0 end-0 bg-primary text-white rounded-5 p-2 shadow-sm"
                   style="cursor:pointer;">
                <i class="bi bi-camera"></i>
            </label>
            <input type="file" id="avatar" name="avatar" class="d-none" accept="image/*" onchange="previewAvatar(event)">
        </div>

        <div>
            <h5 class="mb-1">Аватар</h5>
            <p class="mb-0 small text-muted">PNG/JPG. Максимум 800x800 px.</p>
            <button type="submit" class="btn btn-outline-primary btn-sm mt-2">Сақлаш</button>
        </div>
    </form>

    {{-- Delete form --}}
    <form action="{{ $deleteRoute }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-outline-danger btn-sm">Ўчириш</button>
    </form>
</div>

{{-- JS for preview --}}
<script>
    function previewAvatar(event) {
        const [file] = event.target.files;
        if (file) {
            document.getElementById('avatarPreview').src = URL.createObjectURL(file);
        }
    }
</script>
