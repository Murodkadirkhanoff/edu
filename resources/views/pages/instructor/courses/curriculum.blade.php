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
                        <h1 class="h2 mb-0">Ўқув дастури</h1>
                    </div>
                    <div
                        class="border-bottom pb-3 d-flex flex-column flex-lg-row gap-3 align-items-lg-center justify-content-between">
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


            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
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
                                        <h2>Ўқув дастури</h2>
                                        <div>
                                            <div class="card mb-3 border-0">
                                                <!-- Card body -->
                                                <div class="card-body">
                                                    @foreach($course->modules as $module)
                                                        <div class="bg-light rounded p-2 mb-4"
                                                             id="lessons-list-{{ $module->id }}">
                                                            <div class="d-flex align-items-center mb-2">
                                                                {{-- Заголовок слева --}}
                                                                <h4 class="mb-0">{{ $module->title }}</h4>

                                                                {{-- Обёртка для кнопок — отодвинет их вправо --}}
                                                                <div class="ms-auto d-flex align-items-center">
                                                                    {{-- Редактировать --}}
                                                                    <a
                                                                        href="#"
                                                                        class="btn-edit-module text-inherit me-2"
                                                                        data-module='@json($module)'
                                                                        data-action="{{ route('instructor.courses.module.update', $module) }}"
                                                                        title="Бўлимни тахрирлаш"
                                                                    >
                                                                        <i class="fe fe-edit fs-6"></i>
                                                                    </a>

                                                                    {{-- Удалить --}}
                                                                    <a
                                                                        href="#"
                                                                        class="text-inherit"
                                                                        onclick="return confirm('Бўлимни ўчириш «{{ addslashes($module->title) }}»?');"
                                                                        title="Бўлимни ўчириш"
                                                                    >
                                                                        <i class="fe fe-trash-2 fs-6"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <!-- List group -->
                                                            <div class="list-group list-group-flush border-top-0"
                                                                 id="courseList{{$module->id}}">
                                                                <div class="list-group lessons-sortable"
                                                                     data-module-id="{{ $module->id }}">
                                                                    @foreach($module->lessons as $lesson)
                                                                        <div
                                                                            class="list-group-item rounded px-3 text-nowrap mb-1 lesson-item"
                                                                            id="{{$lesson->title}}"
                                                                            data-lesson-id="{{ $lesson->id }}">
                                                                            <div
                                                                                class="d-flex align-items-center justify-content-between">
                                                                                <h5 class="mb-0 text-truncate">
                                                                                    <a href="#" class="text-inherit">
                                                                                        <i class="fe fe-menu me-1 align-middle"></i>
                                                                                        <span
                                                                                            class="align-middle">{{$lesson->title}}</span>
                                                                                    </a>
                                                                                </h5>
                                                                                <div>
                                                                                    <a href="#"
                                                                                       class="me-1 text-inherit"
                                                                                       data-bs-toggle="tooltip"
                                                                                       data-placement="top"
                                                                                       title="Edit">
                                                                                        <i class="fe fe-edit fs-6"></i>
                                                                                    </a>
                                                                                    <a href="{{route('instructor.lessons.delete', $lesson->id)}}"
                                                                                       class="me-1 text-inherit"
                                                                                       data-bs-toggle="tooltip"
                                                                                       data-placement="top"
                                                                                       title="Delete"
                                                                                       onclick="return confirm('Вы уверены, что хотите удалить урок «{{ addslashes($lesson->title) }}»?');"
                                                                                    >
                                                                                        <i class="fe fe-trash-2 fs-6"></i>
                                                                                    </a>

                                                                                    <a href="#" class="text-inherit"
                                                                                       data-bs-toggle="collapse"
                                                                                       data-bs-target="#collapsedLesson{{$lesson->id}}"
                                                                                       aria-expanded="false"
                                                                                       aria-controls="collapsedLesson{{$lesson->id}}">
                                                                                        <span class="chevron-arrow"><i
                                                                                                class="fe fe-chevron-down"></i></span>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            <div id="collapsedLesson{{$lesson->id}}"
                                                                                 class="collapse"
                                                                                 aria-labelledby="{{$lesson->title}}"
                                                                                 data-bs-parent="#courseList">


                                                                                <!-- Card body -->
                                                                                <div class="card-body">
                                                                                    <!-- List inline -->
                                                                                    <ul class="mb-0 list-inline">

                                                                                        <li class="list-inline-item">
                                                                                            @if ($lesson->isVideo())
                                                                                                <i class="bi bi-play-circle align-baseline me-1 text-secondary"></i>
                                                                                                <span>{{ $lesson->video->duration ?? 0 }} секунд</span>
                                                                                            @else
                                                                                                <i class="bi bi-file-text align-baseline me-1 text-secondary"></i>
                                                                                                <span>12 min to read</span>
                                                                                            @endif
                                                                                        </li>

                                                                                        @if ($lesson->isVideo())
                                                                                            <li class="list-inline-item">
                                                                                                <span
                                                                                                    class="badge bg-{{ $lesson->status_color }}-soft">{{$lesson->status_text}}</span>
                                                                                            </li>
                                                                                        @endif

                                                                                        @if($lesson->formatted_price)
                                                                                            <li class="list-inline-item">
                                                                                                <i class="bi bi-cash align-baseline me-1 text-secondary"></i>
                                                                                                <span>{{ $lesson->formatted_price}}</span>
                                                                                            </li>
                                                                                        @endif
                                                                                    </ul>
                                                                                </div>

                                                                                <div class="card-footer">
                                                                                    <div
                                                                                        class="row align-items-center g-0">
                                                                                        <div class="col">

                                                                                            @if ($lesson->isVideo())
                                                                                                <a
{{--                                                                                                    href="{{route('lesson.show',['lesson' => $lesson])}}"--}}

                                                                                                    href="javascript:void(0)"
                                                                                                    class="open-video"
                                                                                                    data-course-title="{{ $lesson->module->course->title }}"
                                                                                                    data-module-title="{{ $lesson->module->title }}"
                                                                                                    data-lesson-title="{{ $lesson->title }}"
                                                                                                    data-author="{{ $lesson->module->course->instructor->full_name }}"
                                                                                                    data-duration="{{ $lesson->video?->duration }}"
                                                                                                    data-price="{{  $lesson->formatted_price }}"
                                                                                                    data-path="{{ route('files.show', $lesson->video->id) }}"
                                                                                                    data-lessonid="{{$lesson->id }}"
{{--                                                                                                    onclick="openLessonModal(this,{{ $lesson->id }}, 'video')"--}}
                                                                                                >
                                                                                                    Ko'rib chiqish
                                                                                                    <span>
                                                                                                        <svg
                                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                                            width="20"
                                                                                                            height="20"
                                                                                                            fill="currentColor"
                                                                                                            class="bi bi-arrow-right-short"
                                                                                                            viewBox="0 0 16 16">
                                                                                                            <path
                                                                                                                fill-rule="evenodd"
                                                                                                                d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path>
                                                                                                        </svg>
                                                                                                    </span>
                                                                                                </a>
                                                                                            @else
                                                                                                @php
                                                                                                    $encoded = base64_encode($lesson->text_content);
                                                                                                @endphp
                                                                                                <a
                                                                                                    href="javascript:void(0)"
                                                                                                    data-lesson-id="{{ $lesson->id }}"
                                                                                                    data-lesson-type="text"
                                                                                                    data-lesson-content-base64="{{ $encoded }}"
                                                                                                    onclick="openLessonFromElement(this)"
                                                                                                >
                                                                                                    Ko'rib chiqish
                                                                                                    <span>
                                                                                                        <svg
                                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                                            width="20"
                                                                                                            height="20"
                                                                                                            fill="currentColor"
                                                                                                            class="bi bi-arrow-right-short"
                                                                                                            viewBox="0 0 16 16">
                                                                                                            <path
                                                                                                                fill-rule="evenodd"
                                                                                                                d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path>
                                                                                                        </svg>
                                                                                                    </span>

                                                                                                </a>
                                                                                            @endif
                                                                                        </div>


                                                                                        <div class="col-auto">
                                                                                            @if($lesson->attachments->isNotEmpty())
                                                                                                <div class="col-auto">
                                                                                                    <div
                                                                                                        class="dropdown">
                                                                                                        <a href="#"
                                                                                                           data-bs-toggle="dropdown"
                                                                                                           aria-haspopup="true"
                                                                                                           aria-expanded="false"
                                                                                                           class=" btn-link">

                                                                                                            Biriktirilgan
                                                                                                            fayllar
                                                                                                            ( {{ $lesson->attachments->count() }}
                                                                                                            )
                                                                                                            <i class="fe fe-chevron-down"></i>
                                                                                                        </a>
                                                                                                        <div
                                                                                                            class="dropdown-menu"
                                                                                                            aria-labelledby="dropdownMenuButton">
                                                                                                            @foreach($lesson->attachments as $file)
                                                                                                                <li>
                                                                                                                    <a class="dropdown-item"
                                                                                                                       href="{{ route('files.download', $file->id) }}">
                                                                                                                        <i class="fe fe-file-text me-1"></i>
                                                                                                                        {{ $file->original_name }}
                                                                                                                    </a>
                                                                                                                </li>
                                                                                                            @endforeach

                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            @endif
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    @endforeach

                                                                </div>
                                                            </div>

                                                            <button onclick="openAddLessonModal({{ $module->id }})"
                                                                    class="btn btn-outline-primary btn-sm mt-3">
                                                                + Дарс қўшиш
                                                            </button>


                                                        </div>
                                                    @endforeach


                                                    <a href="#" class="btn btn-outline-primary btn-sm"
                                                       data-bs-toggle="modal"
                                                       data-bs-target="#addSectionModal">Бўлим қўшиш</a>
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
        </div>
    </div>


    <x-forms.modal id="editModuleModal" title="Редактировать раздел" method="PUT" action="#">
        {{-- Поля формы --}}
        <div class="mb-3">
            <label for="module-title" class="form-label">Бўлим номи</label>
            <input
                type="text"
                name="title"
                id="module-title"
                value=""
                class="form-control"
                required
            />
        </div>
        <input type="hidden" name="module_id" id="module-id" value="">
    </x-forms.modal>


    <!-- Add Module Modal -->
    <x-forms.modal
        id="addSectionModal"
        title="Бўлим қўшиш"
        method="POST"
        action="{{ route('instructor.courses.module.create', $course) }}"
    >
        <input
            type="text"
            name="title"
            class="form-control mb-3"
            placeholder="Бўлим қўшиш"
            required
        />
    </x-forms.modal>
    <!-- Add Module Modal -->

    <x-courses.lesson-modal/>

    @include('pages.instructor.courses.partials.add_lesson_modal')





    @push('styles')
        <style>
            @media (max-width: 768px) {
                #lesson-video {
                    max-height: 50vh;
                }

                .modal-dialog {
                    margin: 1rem;
                }
            }

            #lesson-video {
                box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
                background-color: #000;
            }
        </style>
    @endpush


    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>


        <script>
            document.addEventListener('DOMContentLoaded', () => {
                document.querySelectorAll('.btn-edit-module').forEach(btn => {
                    btn.addEventListener('click', e => {
                        e.preventDefault();

                        // Достаём данные модуля и URL обновления
                        const module = JSON.parse(btn.dataset.module);
                        const actionUrl = btn.dataset.action;

                        // Находим форму и поля
                        const form = document.getElementById('editModuleModal-form');
                        form.action = actionUrl;
                        form.querySelector('#module-id').value = module.id;
                        form.querySelector('#module-title').value = module.title;

                        // Показываем модал
                        new bootstrap.Modal(document.getElementById('editModuleModal')).show();
                    });
                });
            });

            // Открыть модал редактирования урока
            document.addEventListener('DOMContentLoaded', () => {
                document.querySelectorAll('.btn-edit-lesson').forEach(btn => {
                    btn.addEventListener('click', e => {
                        e.preventDefault();

                        const lesson = JSON.parse(btn.dataset.lesson);
                        const modalEl = document.getElementById('editLessonModal');
                        console.log('modalEl is HTMLElement?', modalEl instanceof HTMLElement, modalEl);

                        if (!modalEl) return;  // если null, дальше не идём

                        // подстановка action и полей…
                        const form = document.getElementById('editLessonModal-form');
                        form.action = btn.dataset.action;
                        form.querySelector('#lesson-module-id').value = lesson.module_id;
                        form.querySelector('#lesson-title').value = lesson.title;
                        form.querySelector('#lesson-price').value = lesson.price_minor;
                        form.querySelector('#lesson-is-free').checked = !!lesson.is_free;

                        // безопасный показ
                        const bsModal = bootstrap.Modal.getOrCreateInstance(modalEl);
                        bsModal.show();
                    });
                });
            });


        </script>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                document.querySelectorAll('.lessons-sortable').forEach(container => {
                    new Sortable(container, {
                        animation: 150,
                        handle: '.lesson-item', // или любой внутренний элемент, за который тащить
                        onEnd(evt) {
                            const moduleId = container.dataset.moduleId;
                            // Собираем новый порядок lesson_id
                            const order = Array.from(container.children)
                                .map(el => el.dataset.lessonId);

                            // Отправляем на сервер
                            fetch("{{ route('instructor.lessons.sort') }}", {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({module_id: moduleId, order})
                            })
                                .then(res => {
                                    if (!res.ok) throw new Error('Ошибка сохранения');
                                    return res.json();
                                })
                                .then(json => console.log('Порядок сохранён'))
                                .catch(err => alert(err.message));
                        }
                    });
                });
            });
        </script>

    @endpush
</x-layouts.instructor.layout>


