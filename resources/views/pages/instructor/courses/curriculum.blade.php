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
                                                                            data-lesson-id="{{ $lesson->id }}">
                                                                            <div
                                                                                class="d-flex align-items-center justify-content-between">
                                                                                <i class="fe
                                                                                 @if($lesson->type === \App\Enums\LessonType::VIDEO_CONTENT->value) fe-video
                                                                                 @else fe-file-text @endif
                                                                                 me-2 fs-5"></i>

                                                                                {{-- Блок с заголовком и ценой --}}
                                                                                <div class="flex-grow-1">
                                                                                    {{-- Только сам заголовок кликабелен --}}
                                                                                    <a href="#" class="text-inherit">
                                                                                        <h5 class="mb-1 text-truncate">{{ $lesson->title }}</h5>
                                                                                    </a>

                                                                                    {{-- Цена под заголовком --}}
                                                                                    @if($course->is_lesson_purchase_available)
                                                                                        <div class="small text-muted">
                                                                                            {{$lesson->formatted_price}}
                                                                                        </div>
                                                                                    @endif
                                                                                </div>
                                                                                <div>


                                                                                    {{-- Правая часть: вложения и действия --}}
                                                                                    <div
                                                                                        class="d-flex align-items-center">
                                                                                        {{-- Вложенные файлы --}}
                                                                                        @if ($lesson->isVideo())
                                                                                            <a href="javascript:void(0)"
                                                                                               class="me-1 text-inherit"
                                                                                               onclick="playVideo({{ $lesson->id }}, 'video')"
                                                                                               data-bs-toggle="tooltip"
                                                                                               data-placement="top"
                                                                                               title="Кўриш">
                                                                                                <i class="fe fe-eye fs-6"></i>
                                                                                            </a>
                                                                                        @endif

                                                                                        @if ($lesson->isText())
                                                                                            @php
                                                                                                $encoded = base64_encode( $lesson->text_content);
                                                                                            @endphp
                                                                                            <a href="javascript:void(0)"
                                                                                               class="me-1 text-inherit"
                                                                                               data-lesson-id="{{ $lesson->id }}"
                                                                                               data-lesson-type="text"
                                                                                               data-lesson-content-base64="{{ $encoded }}"
                                                                                               onclick="playFromElement(this)"
                                                                                               data-bs-toggle="tooltip"
                                                                                               title="Кўриш">
                                                                                                <i class="fe fe-eye fs-6"></i>
                                                                                            </a>
                                                                                        @endif
                                                                                        {{--                                                                                        <a href="#"--}}
                                                                                        {{--                                                                                           class="btn-edit-lesson text-inherit me-2"--}}
                                                                                        {{--                                                                                           data-lesson='@json($lesson)'--}}
                                                                                        {{--                                                                                           data-action="{{ route('instructor.courses.update_lesson', $lesson) }}"--}}
                                                                                        {{--                                                                                           title="Редактировать урок">--}}
                                                                                        {{--                                                                                            <i class="fe fe-edit fs-6"></i>--}}
                                                                                        {{--                                                                                        </a>--}}
                                                                                        <a href="{{route('instructor.lessons.delete', $lesson->id)}}"
                                                                                           class="ms-2 text-inherit"
                                                                                           data-bs-toggle="tooltip"
                                                                                           data-placement="top"
                                                                                           title="Ўчириш"
                                                                                           onclick="return confirm('Вы уверены, что хотите удалить урок «{{ addslashes($lesson->title) }}»?');"
                                                                                        >
                                                                                            <i class="fe fe-trash-2 fs-6"></i>
                                                                                        </a>

                                                                                        @if($lesson->attachments->isNotEmpty())
                                                                                            <div class="ms-2 dropdown">
                                                                                                <a
                                                                                                    href="#"
                                                                                                    class="text-inherit d-flex align-items-center"
                                                                                                    id="attachmentsDropdown{{ $lesson->id }}"
                                                                                                    data-bs-toggle="dropdown"
                                                                                                    aria-expanded="false"
                                                                                                    title="Бириктирилган файллар ({{ $lesson->attachments->count() }})"
                                                                                                >
                                                                                                    <i class="fe fe-paperclip fs-6"></i>
                                                                                                    <span
                                                                                                        class="badge bg-secondary ms-1">{{ $lesson->attachments->count() }}</span>
                                                                                                </a>
                                                                                                <ul class="dropdown-menu dropdown-menu-end"
                                                                                                    aria-labelledby="attachmentsDropdown{{ $lesson->id }}">
                                                                                                    @foreach($lesson->attachments as $file)
                                                                                                        <li>
                                                                                                            <a class="dropdown-item"
                                                                                                               href="{{ route('files.download', $file->id) }}">
                                                                                                                <i class="fe fe-file-text me-1"></i>
                                                                                                                {{ $file->original_name }}
                                                                                                            </a>
                                                                                                        </li>
                                                                                                    @endforeach
                                                                                                </ul>
                                                                                            </div>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach

                                                                </div>
                                                            </div>

                                                            <button onclick="openLessonModal({{ $module->id }})"
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
    <!-- Modal для видео (только один) -->
    <div class="modal fade" id="videoModal" tabindex="-1" style="max-width: 90%;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="max-height: 90vh; overflow: hidden;">
                <div class="modal-header">
                    <h5 class="modal-title">Дарсни кўриш</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Ёпиш"></button>
                </div>
                <div class="modal-body" style="overflow-y: auto;">
                    <video id="lesson-video" class="plyr w-100"
                           style="max-height: 70vh; border-radius: 8px; object-fit: contain" controls></video>

                    <div id="lesson-text" class="d-none">
                        <div id="lesson-text-content" class="p-2"
                             style="white-space: pre-line; font-size: 1.1rem;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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


        <script>


            let player = null;

            function playFromElement(el) {
                const id = el.dataset.lessonId;
                const type = el.dataset.lessonType;
                const base64Content = el.dataset.lessonContentBase64;
                const content = base64Content ? atob(base64Content) : null;

                playVideo(id, type, content);
            }

            function playVideo(lessonId, type, textContent = null) {
                const video = document.getElementById('lesson-video');
                const textContainer = document.getElementById('lesson-text');
                const textContentDiv = document.getElementById('lesson-text-content');

                video.classList.add('d-none');
                textContainer.classList.add('d-none');
                if (window.player) {
                    window.player.destroy();
                    window.player = null;
                }

                if (type === 'video') {
                    video.innerHTML = '';
                    const streamUrl = `/lessons/${lessonId}/stream`;
                    const source = document.createElement('source');
                    source.src = streamUrl;
                    source.type = 'video/mp4';
                    video.appendChild(source);
                    video.load();

                    setTimeout(() => {
                        window.player = new Plyr(video, {/* config */});
                        video.classList.remove('d-none');
                    }, 100);
                } else if (type === 'text') {
                    textContentDiv.innerHTML = textContent || '<p>Нет контента</p>';
                    textContainer.classList.remove('d-none');
                }

                const modal = new bootstrap.Modal(document.getElementById('videoModal'));
                modal.show();
            }


            document.addEventListener('DOMContentLoaded', function () {
                const modalEl = document.getElementById('videoModal');

                modalEl.addEventListener('hidden.bs.modal', function () {
                    const video = document.getElementById('lesson-video');

                    // Остановить воспроизведение
                    if (window.player) {
                        window.player.pause();
                        window.player.stop(); // если хочешь сбросить
                        window.player.destroy();
                        window.player = null;
                    }

                    // Полностью сбросить тег video
                    video.innerHTML = '';
                });
            });


        </script>

    @endpush
</x-layouts.instructor.layout>


