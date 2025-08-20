<!-- resources/views/instructor/lessons/create.blade.php -->

<!-- Модальное окно -->
<div class="modal fade" id="createLessonModal" tabindex="-1" aria-labelledby="createLessonModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form action="{{ route('instructor.lessons.create', $course->id) }}" method="POST" enctype="multipart/form-data"
              class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="createLessonModalLabel">Янги дарс қўшиш</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="module_id" id="lesson-module-id">


                <x-forms.input
                    name="title"
                    label="Дарс номи"
                    required
                    placeholder="Сарлавхани киритинг"
                    class="mb-2"
                    label-cols="col-3"
                    input-cols="col-9"
                />

                @if($course->is_lesson_purchase_available)
                    <div id="lesson_price">
                        <div class="mt-2"></div>
                        <x-forms.input
                            name="price"
                            label="Дарс нархи"
                            required
                            placeholder="Move File…"
                            class="mb-2 currency-input"
                            value="{{ number_format($course->lesson_price_minor, 0, '.', ' ') }}"
                            label-cols="col-3"
                            input-cols="col-9"
                        />
                    </div>

                    <x-forms.switch
                        id="is_free"
                        name="is_free"
                        label="Дарсни бупул қилиш"
                        label-cols="col-3"
                        input-cols="col-9"
                    />
                @endif
                <x-forms.select
                    name="type"
                    label="Дарс тури"
                    :options="[
                       \App\Enums\LessonType::VIDEO_CONTENT->value => 'Video',
                       \App\Enums\LessonType::TEXT_CONTENT->value => 'Text'
                    ]"
                    :value="old('type')"
                    placeholder="Дарс тури"
                    required
                    id="contentTypeSelect"
                    label-cols="col-3"
                    input-cols="col-9"
                />


                {{--                <div id="uppy"></div>--}}


                <div class="mb-3 d-none" id="videoFields">
                    <x-forms.file
                        name="video_content"
                        label="Видеони юкланг"
                        helpText="Видеони юкланг"
                        accept="video/*"
                        label-cols="col-3"
                        input-cols="col-9"
                    >
                    </x-forms.file>
                </div>

                <div class="mb-8 d-none" id="textFields">
                    <x-forms.quill
                        name="text_content"
                        label="Контентни киритинг"
                        :value="old('text_content')"
                        required
                        label-cols="col-3"
                        input-cols="col-9"

                    />
                </div>

                <div class="mb-3">
                    <x-forms.attachments
                        name="attachments[]"
                        label="Қўшимча Файл бириктириш"
                        helpText="Қўшимча Файл бириктириш"
                        accept=".pdf,.doc,.docx,.ppt,.pptx,.xls,.xlsx,.txt,.zip,.rar,.jpg,.jpeg,.png,.gif,.mp4"
                        label-cols="col-3"
                        input-cols="col-9"
                    >
                    </x-forms.attachments>
                </div>

                {{--                <div class="mb-3 mt-8">--}}
                {{--                    <label>Қўшимча Файл бириктириш</label>--}}
                {{--                    <input type="file" name="attachments[]" multiple class="form-control">--}}
                {{--                </div>--}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Бекор қилиш</button>
                <button type="submit" class="btn btn-primary">Сақлаш</button>
            </div>
        </form>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>

<script>
    document.getElementById('contentTypeSelect').addEventListener('change', function () {
        const type = this.value;

        document.getElementById('videoFields').classList.toggle('d-none', type != {{\App\Enums\LessonType::VIDEO_CONTENT->value}});
        document.getElementById('textFields').classList.toggle('d-none', type != {{\App\Enums\LessonType::TEXT_CONTENT->value}});
    });

    function openAddLessonModal(moduleId) {
        document.getElementById('lesson-module-id').value = moduleId;
        const modal = new bootstrap.Modal(document.getElementById('createLessonModal'));
        modal.show();
    }
</script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const isFreeSwitch = document.getElementById('is_free');
        const priceField = document.getElementById('lesson_price');

        function togglePriceField() {
            if (isFreeSwitch.checked) {
                priceField.style.display = 'none';
            } else {
                priceField.style.display = 'block';
            }
        }

        // Сразу вызываем и вешаем слушатель
        togglePriceField();
        isFreeSwitch.addEventListener('change', togglePriceField);
    });
</script>
