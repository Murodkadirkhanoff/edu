<x-layouts.instructor.layout>
    <div class="db-content">
        <div class="container mb-4">

            <div class="row mb-5">
                <div class="col-12">
                    <div>
                        <h1 class="h2 mb-0">Менинг курсларим</h1>
                    </div>
                    <div
                        class="border-bottom pb-3 mb-4 d-flex flex-column flex-lg-row gap-3 align-items-lg-center justify-content-between">
                        <div class="d-flex flex-column gap-1">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('instructor.dashboard') }}">Бошқарув панели</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Менинг курсларим</li>
                                </ol>
                            </nav>
                        </div>
                        <div>
                            <a href="{{ route('instructor.courses.create') }}" class="btn btn-primary">
                                <i class="fe fe-plus me-2"></i>
                               Яни курс кўшиш
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Success Message --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- Courses List --}}
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4 overflow-hidden">
                        <!-- Card header -->
                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table mb-0 table-hover table-centered text-nowrap">
                                <!-- Table Head -->
                                <thead class="table-light">
                                <tr>
                                    <th>Курслар</th>
                                    <th>Сотувлар</th>
                                    <th>Холати</th>
                                    <th>Нархи</th>
                                    <th>Жойлаштирилган сана</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <!-- Table Body -->
                                <tbody>
                                @foreach($courses as $course)
                                    <tr>
                                        <td>
                                            <a href="#">
                                                <div class="d-flex align-items-center">
                                                    <img class="rounded img-4by3-lg"
                                                         src="{{ route('files.show', $course->thumbnail?->id) }}"
                                                         alt="Preview">
                                                    <h5 class="ms-3 text-primary-hover mb-0">{{$course->title}}</h5>
                                                </div>
                                            </a>
                                        </td>
                                        <td>0</td>
                                        <td>
                                            <span class="badge bg-{{ $course->status_color }}">
                                                {{ $course->status_text }}
                                            </span>
                                        </td>
                                        <td>{{$course->formatted_whole_price}}</td>
                                        <td>{{$course->created_at->diffForHumans()}}</td>
                                        <td>
                                        <span class="dropdown dropstart">
                                          <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button"
                                             id="courseDropdown1" data-bs-toggle="dropdown" data-bs-offset="-20,20"
                                             aria-expanded="false">
                                            <i class="fe fe-more-vertical"></i>
                                          </a>
                                          <span class="dropdown-menu" aria-labelledby="courseDropdown1">
                                            <span class="dropdown-header">Харакатлар</span>
                                            <a class="dropdown-item" href="{{ $course->path() }}/edit">
                                              <i class="fe fe-edit dropdown-item-icon"></i>
                                              Тахрирлаш
                                            </a>
                                            <a class="dropdown-item" href="#">
                                              <i class="fe fe-trash dropdown-item-icon"></i>
                                              Ўчириш
                                            </a>
                                          </span>
                                        </span>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>


                        </div>

                        <div class="card-footer">
                            <nav aria-label="Page navigation example">
                                {{$courses->links()}}
                            </nav>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>

</x-layouts.instructor.layout>
