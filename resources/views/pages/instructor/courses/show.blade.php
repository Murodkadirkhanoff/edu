@push('styles')
    <style>
        .fade-toggle {
            opacity: 1;
            max-height: 200px;
            transition: opacity 0.5s ease, max-height 0.5s ease;
            overflow: hidden;
        }

        .fade-toggle.hidden {
            opacity: 0;
            max-height: 0;
            padding-top: 0;
            padding-bottom: 0;
            margin: 0;
        }
    </style>
@endpush

<x-layouts.instructor>
    <div class="db-content">
        <div class="container mb-4">
            <h1>Создать курс</h1>
            <form action="{{ route('instructor.courses.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    {{-- Левая часть: основные данные --}}
                    <div class="col-md-9">


                        <div class="card mb-4">
                            <!-- Card Header -->
                            <div class="card-header">
                                <h4 class="mb-0">SMTP Server Setting</h4>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <!-- Form -->

                                <x-forms.input
                                    name="title"
                                    label="Название курса"
                                    required
                                    placeholder="Введите заголовок"
                                    class="mb-2"
                                />

                                <x-forms.textarea
                                    name="description"
                                    label="Description of course"
                                    required
                                    placeholder="Введите заголовок"
                                    class="mb-2"
                                />

                                <x-forms.select
                                    name="lang_id"
                                    label="Language"
                                    :options="$languageOptions"
                                    :value="old('category_id')"
                                    placeholder="Выберите категорию"
                                    required
                                />
                                <x-forms.select
                                    name="course_level_id"
                                    label="Course Levels"
                                    :options="$courseLevelsOptions"
                                    :value="old('category_id')"
                                    placeholder="Выберите категорию"
                                    required
                                />

                                <x-forms.select
                                    name="status"
                                    label="Status"
                                    :options="$courseStatuses"
                                    :value="old('status')"
                                    placeholder="Выберите status"
                                    required
                                />

                                @php
                                    $showWholeInput  = old('is_whole_purchase_available', $course->is_whole_purchase_available ?? false);
                                    $wholePrice      = old('whole_price', $course->whole_price_minor ?? '');
                                @endphp

                                <x-forms.switch
                                    id="switch_whole"
                                    name="is_whole_purchase_available"
                                    :checked="$showWholeInput"
                                    label="Покупка всего курса целиком"
                                    data-toggle="whole_price"
                                />
                                {{-- поле появится/скроется через JS --}}
                                <div id="whole_price">
                                    <x-forms.input
                                        name="whole_price"
                                        label="Whole Price"
                                        required
                                        placeholder="Whole Price"
                                        class="mb-2 currency-input"
                                        value="{{ $wholePrice }}"
                                    />
                                </div>

                                {{-- === Lesson purchase === --}}
                                @php
                                    $showLessonInput = old('is_lesson_purchase_available', $course->is_lesson_purchase_available ?? false);
                                    $lessonPrice     = old('lesson_price', $course->lesson_price ?? '');
                                @endphp


                                <x-forms.switch
                                    id="switch_lesson"
                                    name="is_lesson_purchase_available"
                                    :checked="$showLessonInput"
                                    label="Покупка по урокам"
                                    data-toggle="lesson_price"
                                />
                                <div id="lesson_price">
                                    <x-forms.input
                                        name="lesson_price"
                                        label="Lesson Price"
                                        required
                                        placeholder="Lesson Price"
                                        class="mb-2"
                                        value="{{ $lessonPrice }}"
                                    />
                                </div>

                                {{--                                    <x-forms.switch--}}
                                {{--                                            name="is_whole_purchase_available"--}}
                                {{--                                            label="is Whole Purchase"--}}
                                {{--                                            :checked="old('is_featured', $course->is_featured ?? false)"--}}
                                {{--                                            helpText="Включите, чтобы сделать курс видимым в блоке «Рекомендуем»"--}}
                                {{--                                    />--}}

                                {{--                                    <x-forms.switch--}}
                                {{--                                            name="is_lesson_purchase_available"--}}
                                {{--                                            label="Purchase by lesson"--}}
                                {{--                                            :checked="old('is_featured', $course->is_featured ?? false)"--}}
                                {{--                                            helpText="Включите, чтобы сделать курс видимым в блоке «Рекомендуем»"--}}
                                {{--                                    />--}}

                                <x-forms.file
                                    name="thumbnail"
                                    label="Миниатюра курса"
                                    accept="image/png,image/jpeg"
                                    helpText="Загрузите JPG/PNG, максимум 2 МБ"
                                >
                                </x-forms.file>

                                {{--                                    <x-forms.select--}}
                                {{--                                            name="categories"--}}
                                {{--                                            label="Категории"--}}
                                {{--                                            :options="$categories->pluck('title','id')->toArray()"--}}
                                {{--                                            :value="old('categories', $selected ?? [])"--}}
                                {{--                                            multiple--}}
                                {{--                                            helpText="Выберите одну или несколько категорий"--}}
                                {{--                                    />--}}

                                <x-forms.depdrop
                                    :roots="$roots" {{-- коллекция [id => title] --}}
                                :subs="$subs" {{-- JSON строка {"parent":{"child":"title",…},…} --}}
                                />

                            </div>
                        </div>


                    </div>

                    {{-- Правая часть: модули и медиа --}}
                    <div class="col-md-3">
                        @include('components.course.modules-sidebar')
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Создать курс</button>
                    <a href="{{ route('instructor.courses.index') }}" class="btn btn-secondary">Отмена</a>
                </div>
            </form>
        </div>
    </div>
</x-layouts.instructor>


<script>
    function toggleInput(switchName, containerId) {
        const checkbox = document.querySelector(`input[name="${switchName}"]`);
        const container = document.getElementById(containerId);
        const inputs = container.querySelectorAll('input, select, textarea');

        if (checkbox.checked) {
            container.classList.remove('hidden');
            inputs.forEach(input => input.removeAttribute('disabled'));
        } else {
            container.classList.add('hidden');
            inputs.forEach(input => input.setAttribute('disabled', 'disabled'));
        }
    }

    document.addEventListener('change', e => {
        if (!e.target.matches('input[type="file"]')) return;

        const input = e.target;
        const previewImg = input.closest('.mb-3').querySelector('img');

        if (previewImg && input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = ev => previewImg.src = ev.target.result;
            reader.readAsDataURL(input.files[0]);
        }
    });


</script>

<script>
    document.addEventListener('DOMContentLoaded', () => {

        /** для каждого переключателя с атрибутом data-toggle */
        document.querySelectorAll('[data-toggle]').forEach(switchEl => {
            const inputId = switchEl.dataset.toggle;          // id поля
            const input = document.getElementById(inputId); // само поле

            if (!input) return;                               // на всякий случай

            const toggleVisibility = () => {
                input.style.display = switchEl.checked ? 'block' : 'none';
            };

            // сразу выставляем правильный вид
            toggleVisibility();

            // реагируем на изменение
            switchEl.addEventListener('change', toggleVisibility);
        });

    });
</script>


