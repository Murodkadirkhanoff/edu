<x-layouts.admin.layout>
    <!-- Container fluid -->
    <section class="container p-4">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Page Header -->
                <div
                    class="border-bottom pb-3 mb-3 d-flex flex-column flex-md-row gap-3 align-items-md-center justify-content-between">
                    <div class="d-flex flex-column gap-1">
                        <h1 class="mb-0 h2 fw-bold">Курслар</h1>
                        <!-- Breadcrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">Курслар</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Card -->
                <div class="card rounded-3">
                    <!-- Card header -->
                    <div class="p-4 row">
                        <!-- Form -->
                        <form class="d-flex align-items-center col-12 col-md-12 col-lg-12">
                            <span class="position-absolute ps-3 search-icon"><i class="fe fe-search"></i></span>
                            <input type="search" class="form-control ps-6" placeholder="Search Course"/>
                        </form>
                    </div>
                    <div class="card-footer">
                        <nav aria-label="Page navigation example">
                            @if($courses->total() > 10)
                                {{$courses->links()}}
                            @endif
                        </nav>
                    </div>
                    <div class="table-responsive border-0 overflow-y-hidden">
                        <table class="table table-fixed mb-0 text-nowrap table-centered table-hover">
                            <colgroup>
                                <!-- 40% ширины для первой колонки -->
                                <col style="width: 40%;">
                                <!-- 25% для второй (Instructor) -->
                                <col style="width: 25%;">
                                <!-- 15% для статуса -->
                                <col style="width: 15%;">
                                <!-- Оставшиеся 20% для действий -->
                                <col style="width: 20%;">
                            </colgroup>

                            <thead class="table-light">
                            <tr>
                                <th>Курслар</th>
                                <th>Инструктор</th>
                                <th>Холати</th>
                                <th>Харакатлар</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($courses as $course)
                                <tr>
                                    <td>
                                        <a href="{{route('admin.courses.show', $course->id)}}"
                                           class="d-flex align-items-stretch gap-3">
                                            <img src="{{ route('files.show', $course->thumbnail?->id) }}"
                                                 alt=""
                                                 class="img-4by3-lg rounded"
                                                 style="object-fit: cover;">
                                            <div class="course-info d-flex flex-column" style="height: 100%;">
                                                <h4 class="mb-1 text-primary-hover"
                                                    style="white-space: normal; word-wrap: break-word;">
                                                    {{ Str::limit($course->title, 100) }}
                                                </h4>
                                                <span class="mt-auto text-muted" style="font-size: .875rem;">
                {{ $course->created_at->translatedFormat('j F, Y H:i:s') }}
              </span>
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <img src="{{auth()->user()->avatar}}"
                                                 class="rounded-circle avatar-xs"
                                                 alt="">
                                            <h5 class="mb-0">{{ $course->instructor->full_name }}</h5>
                                        </div>
                                    </td>
                                    <td>
                                        <span
                                            class="badge-dot bg-{{ $course->status_color }} me-1 d-inline-block align-middle"></span>
                                        {{ $course->status_text }}
                                    </td>
                                    @php
                                        $statuses = [
                                            [
                                                'value' => \App\Enums\CourseStatus::REJECTED->value,
                                                'class' => 'btn-outline-danger',
                                                'label' => 'Рад этиш',
                                            ],
                                            [
                                                'value' => \App\Enums\CourseStatus::PUBLISHED->value,
                                                'class' => 'btn-outline-success',
                                                'label' => 'Тасдиқлаш',
                                            ]
                                        ];
                                    @endphp

                                    <td>
                                        @if ($course->status === \App\Enums\CourseStatus::PENDING->value)
                                            @foreach ($statuses as $status)
                                                <form method="POST" action="{{ route('admin.courses.status.update', $course) }}" class="d-inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="status" value="{{ $status['value'] }}">
                                                    <button type="submit" class="btn {{ $status['class'] }} btn-sm">
                                                        {{ $status['label'] }}
                                                    </button>
                                                </form>
                                            @endforeach
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Card Footer -->
                    <div class="card-footer">
                        <nav aria-label="Page navigation example">
                            {{$courses->links()}}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.admin.layout>
