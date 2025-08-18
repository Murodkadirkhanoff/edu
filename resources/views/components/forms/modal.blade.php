@props([
  'id',        // идентификатор модала
  'title',     // заголовок
  'method' => 'POST',
  'action'     // URL для формы
])

<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form
            id="{{ $id }}-form"
            action="{{ $action }}"
            method="POST"
            class="modal-content"
        >
            @csrf
            @if(strtoupper($method) !== 'POST')
                @method($method)
            @endif

            <div class="modal-header">
                <h5 class="modal-title">{{ $title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                {{ $slot }}
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Сохранить</button>
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Отмена</button>
            </div>
        </form>
    </div>
</div>
