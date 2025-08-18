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
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <div>
                        <h1 class="h2 mb-0">Тахрирлаш</h1>
                    </div>
                    <div
                        class="border-bottom pb-3  d-flex flex-column flex-lg-row gap-3 align-items-lg-center justify-content-between">
                        <div class="d-flex flex-column gap-1">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('instructor.dashboard') }}">Бошқарув панели</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('instructor.courses.index') }}">Менинг курсларим</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{$course->title}}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>


            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Диққат!</h4>
                <span class="mb-0">Қоралама холатдан ташқари барча холатлардаги тахрирлаш курсни модерациядан қайта ўтказишга олиб келади</span>
            </div>

            <form action="{{ route('instructor.courses.update', $course->id) }}" method="POST"
                  enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card rounded-3">
                            <!-- Card Header -->
                            <div class="card-header p-0">
                                @include('pages.instructor.courses.partials.nav')
                            </div>
                            <div class="p-4 row">

                            </div>
                            <div>
                                <div class="tab-content" id="tabContent">
                                    <!-- Tab -->
                                    <div class="tab-pane fade active show" id="additional" role="tabpanel"
                                         aria-labelledby="additional">

                                        <div class="container">
                                            <h2>Умумий маълумотлар</h2>
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul class="mb-0">
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            <div>
                                                <div class="card mb-3 border-0">

                                                    <div class=" mb-4">
                                                        <!-- Card Header -->
                                                        <!-- Card Body -->
                                                        <div class="card-body">
                                                            <!-- Form -->

                                                            <x-forms.input
                                                                name="title"
                                                                label="Курс номи"
                                                                required
                                                                placeholder="Сарлавхани киритинг"
                                                                class="mb-2"
                                                                :value="$course->title"
                                                                help-text="Курс номи ёрдамида фойдаланувчи курс мазмунини тушуниши керак."
                                                            />

                                                            <x-forms.textarea
                                                                name="description"
                                                                label="Курс тавсифини киритинг"
                                                                required
                                                                placeholder="Курс тавсифи"
                                                                class="mb-2"
                                                                :value="$course->description"
                                                                help-text="Бу курсда нима ўргатилишини тавсифланг."
                                                            />

                                                            <x-forms.depdrop
                                                                :roots="$roots" {{-- коллекция [id => title] --}}
                                                                :subs="$subs"
                                                                {{-- JSON строка {"parent":{"child":"title",…},…} --}}
                                                                :course="$course"
                                                                :subcategory_id="$subcategory_id"
                                                                :category_id="$category_id"
                                                            />
                                                            <x-forms.select
                                                                name="lang_id"
                                                                label="Курс тили"
                                                                :options="$languageOptions"
                                                                :value="$course->lang_id"
                                                                placeholder="Курс тилини танланг"
                                                                required
                                                                help-text="Курс қайси тилда ўқитилишини кўрсатинг."
                                                            />
                                                            <x-forms.select
                                                                name="course_level_id"
                                                                label="Кайси даражадаги ўқувчилар учун"
                                                                :options="$courseLevelsOptions"
                                                                :value="$course->course_level_id"
                                                                placeholder="Даражани танланг"
                                                                required
                                                                help-text="Фойдаланувчи ўз билимига мос курсни танлаши учун даражани кўрсатинг."
                                                            />

                                                            <x-forms.select
                                                                name="status"
                                                                label="Холати"
                                                                :options="$courseStatuses"
                                                                :value="$course->status"
                                                                placeholder="Курс холатини танланг"
                                                                required
                                                                help-text="Курс тайёр эмас бўлса, “Қораламa” ни танланг. Тасдиқ учун юбормоқчи бўлсангиз, “Модерация” ни танланг."
                                                            />

                                                            @php
                                                                $showWholeInput  = old('is_whole_purchase_available', $course->is_whole_purchase_available ?? false);
                                                                $wholePrice      = number_format($course->whole_price_minor, 0, '.', ' ');
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
                                                                    :value="$wholePrice"
                                                                    helpText="Сўмдаги умумий нарх. Масалан: 750 000"
                                                                />
                                                            </div>

                                                            {{-- === Lesson purchase === --}}
                                                            @php
                                                                $showLessonInput = old('is_lesson_purchase_available', $course->is_lesson_purchase_available ?? false);
                                                                $lessonPrice     = number_format($course->lesson_price_minor, 0, '.', ' ');
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
                                                                    required
                                                                    placeholder="Дарс нархини киритинг"
                                                                    class="mb-2 currency-input"
                                                                    value="{{ $lessonPrice }}"
                                                                    helpText="Хар бир дарснинг сўмдаги нарх. Масалан: 125 000"
                                                                />
                                                            </div>


                                                            {{--                                    <x-forms.select--}}
                                                            {{--                                            name="categories"--}}
                                                            {{--                                            label="Категории"--}}
                                                            {{--                                            :options="$categories->pluck('title','id')->toArray()"--}}
                                                            {{--                                            :value="old('categories', $selected ?? [])"--}}
                                                            {{--                                            multiple--}}
                                                            {{--                                            helpText="Выберите одну или несколько категорий"--}}
                                                            {{--                                    />--}}


                                                            <button type="submit" class="btn btn-primary mt-5">Сақлаш
                                                            </button>
                                                        </div>

                                                    </div>


                                                </div>
                                            </div>

                                        </div>
                                    </div>
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
                                {{-- Текущее превью --}}
                                @if($course->thumbnail?->id)
                                    <img id=""
                                         src="{{ route('files.show', $course->thumbnail?->id) }}"
                                         class="img-fluid rounded mb-3"
                                         style="max-height: 200px; object-fit: contain;"
                                         alt="Превью курса">
                                @else
                                    <div id=""
                                         class="bg-light border rounded mb-3 d-flex align-items-center justify-content-center"
                                         style="height: 200px;">
                                        <span class="text-muted">Обложка мавжуд эмас</span>
                                    </div>
                                @endif

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


</script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const input = document.querySelector('input[name="thumbnail"]');
        const preview = document.getElementById('thumbnailPreview');
        const placeholder = document.getElementById('thumbnailPlaceholder');

        if (!input) return;

        input.addEventListener('change', () => {
            const file = input.files?.[0];
            if (!file || !file.type.startsWith('image/')) return;

            const reader = new FileReader();
            reader.onload = e => {
                // Если было placeholder — заменим его на <img>
                // if (!preview) {
                //     const img = document.createElement('img');
                //     img.id = 'thumbnailPreview';
                //     img.className = 'img-fluid rounded mb-3';
                //     img.style = 'max-height: 200px; object-fit: cover;';
                //     input.closest('.card-body').insertBefore(img, input.closest('.x-forms-file'));
                //     placeholder?.remove();
                // }
                document.getElementById('thumbnailPreview').src = e.target.result;
            };
            reader.readAsDataURL(file);
        });
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


