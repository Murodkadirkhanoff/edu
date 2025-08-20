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

<x-layouts.instructor.layout>
    <div class="db-content">
        <div class="container mb-4">
            <div class="row mb-5">
                <div class="col-12">
                    <div>
                        <h1 class="h2 mb-0">Янги курс қўшиш</h1>
                    </div>
                    <div
                        class="border-bottom pb-3 mb-4 d-flex flex-column flex-lg-row gap-3 align-items-lg-center justify-content-between">
                        <div class="d-flex flex-column gap-1">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('instructor.dashboard') }}">Бошқарув панели</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('instructor.courses.index') }}">Курслар</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Янги курс қўшиш</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <form action="{{ route('instructor.courses.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    {{-- Левая часть: основные данные --}}
                    <div class="col-xl-8 col-lg-8 col-md-12 col-12">


                        <div class="card mb-4">
                            <!-- Card Header -->
                            <div class="card-header">
                                <h4 class="mb-0">Янги курс кўшиш</h4>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <!-- Form -->

                                    <x-forms.input
                                        name="title"
                                        label="Курс номи"
                                        required
                                        placeholder="Сарлавхани киритинг"
                                        class="mb-2"
                                        help-text="Курс номи ёрдамида фойдаланувчи курс мазмунини тушуниши керак."
                                    />

                                    <x-forms.textarea
                                        name="description"
                                        label="Курс тавсифини киритинг"
                                        required
                                        placeholder="Курс тавсифи"
                                        class="mb-2"
                                        help-text="Бу курсда нима ўргатилишини тавсифланг."
                                    />

                                <x-forms.depdrop
                                    :roots="$roots" {{-- коллекция [id => title] --}}
                                :subs="$subs" {{-- JSON строка {"parent":{"child":"title",…},…} --}}
                                />

                                    <x-forms.select
                                        name="lang_id"
                                        label="Курс тили"
                                        :options="$languageOptions"
                                        :value="old('category_id')"
                                        placeholder="Курс тилини танланг"
                                        required
                                        help-text="Курс қайси тилда ўқитилишини кўрсатинг."
                                    />
                                    <x-forms.select
                                        name="course_level_id"
                                        label="Кайси даражадаги ўқувчилар учун"
                                        :options="$courseLevelsOptions"
                                        :value="old('category_id')"
                                        placeholder="Даражани танланг"
                                        required
                                        help-text="Фойдаланувчи ўз билимига мос курсни танлаши учун даражани кўрсатинг."
                                    />

                                    <x-forms.select
                                        name="status"
                                        label="Холати"
                                        :options="$courseStatuses"
                                        :value="old('status')"
                                        placeholder="Курс холатини танланг"
                                        required
                                        help-text="Курс тайёр эмас бўлса, “Қораламa” ни танланг. Тасдиқ учун юбормоқчи бўлсангиз, “Модерация” ни танланг."
                                    />

                                    @php
                                        $showWholeInput  = old('is_whole_purchase_available', $course->is_whole_purchase_available ?? true);
                                        $wholePrice      = old('whole_price', $course->whole_price_minor ?? null);
                                    @endphp

                                    <x-forms.switch
                                        id="switch_whole"
                                        name="is_whole_purchase_available"
                                        :checked="$showWholeInput"
                                        label="Курсни бутунлигича сотиш имконияти"
                                        data-toggle="whole_price"
                                        helpText="Умумий курсни сотиш имконияти мавжуд булса танланг"
                                    />
                                    {{-- поле появится/скроется через JS --}}
                                    <div id="whole_price">
                                        <x-forms.input
                                            name="whole_price_minor"
                                            label="Курс нархи"
                                            required
                                            placeholder="Курс нархини киритинг"
                                            class="mb-2 currency-input"
                                            value="{{ $wholePrice }}"
                                            helpText="Сўмдаги умумий нарх. Масалан: 750 000"
                                        />
                                    </div>

                                    {{-- === Lesson purchase === --}}
                                    @php
                                        $showLessonInput = old('is_lesson_purchase_available', $course->is_lesson_purchase_available ?? false);
                                        $lessonPrice     = old('lesson_price', $course->lesson_price ?? 0);
                                    @endphp


                                    <x-forms.switch
                                        id="switch_lesson"
                                        name="is_lesson_purchase_available"
                                        :checked="$showLessonInput"
                                        label="Алохида дарслар сотиш имконияти"
                                        data-toggle="lesson_price"
                                        helpText="Хар бир дарсни алохида сотиш имконияти мавжуд бўлса танланг"
                                    />
                                    <div id="lesson_price">
                                        <x-forms.input
                                            name="lesson_price_minor"
                                            label="Дарс нархини киритинг"
                                            placeholder="Дарс нархини киритинг"
                                            class="mb-2 currency-input"
                                            value="{{ $lessonPrice }}"
                                            helpText="Хар бир дарснинг сўмдаги нарх. Масалан: 125 000"
                                        />
                                    </div>







                            </div>
                        </div>


                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12">
                        <div class="card rounded-3">
                            <div class="card-header">
                                <h5 class="mb-0">Обложка</h5>
                            </div>
                            <div class="card-body text-center">
                                {{-- Контрол загрузки --}}
                                <x-forms.file name="thumbnail"
                                              label="Юклаш"
                                              accept="image/png,image/jpeg"
                                              helpText="JPG/PNG, макс. 2 МБ">
                                </x-forms.file>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Сақлаш</button>
                    <a href="{{ route('instructor.courses.index') }}" class="btn btn-secondary">Бекор қилиш</a>
                </div>
            </form>
        </div>
    </div>
</x-layouts.instructor.layout>


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


