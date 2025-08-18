<main>
    <section class="p-lg-5 py-7">
        <div class="container">
            <div class="row mb-8">
                @if($lesson->isVideo())
                    @php
                        $streamUrl = "/lessons/{$lesson->id}/stream";
                    @endphp

                    <div class="card rounded-3">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5>{{ $lesson->title }}</h5>

                            @if($lesson->attachments->isNotEmpty())
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-light dropdown-toggle" type="button"
                                            id="attachmentsMenu" data-bs-toggle="dropdown" aria-expanded="false">
                                        Бириктирилган файллар
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="attachmentsMenu">
                                        @foreach($lesson->attachments as $file)
                                            <li><a class="dropdown-item"
                                                   href="{{ route('files.download', $file->id) }}">{{$file->original_name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <div class="card-body">
                            <div style="width: 100%; max-width: 100%; aspect-ratio: 16 / 9; background-color: black;">
                                <video
                                    id="video-player"
                                    class="w-100 h-100"
                                    style="object-fit: contain;" {{-- или 'cover' если хочешь обрезать --}}
                                    controls
                                    playsinline
                                >
                                    <source src="{{ $streamUrl }}" type="video/mp4">
                                    Браузер видеони кўрсатишни қўлламайди.
                                </video>
                            </div>
                        </div>
                    </div>

                @else
                    <div class="card rounded-3">
                        <h5 class="card-header">
                            Дарс контенти
                        </h5>
                        <div class="card-body">
                            <p>{!! $lesson->text_content !!}</p>
                        </div>
                    </div>

                @endif

            </div>
            <!-- Content -->
            <div class="row">
                <div class="col-xl-8 col-lg-12 col-md-12 col-12 mb-4 mb-xl-0">
                    <!-- Card -->
                    <div class="card mb-5">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h1 class="fw-semibold mb-2">{{$course->title}}</h1>
                                <a href="#" data-bs-toggle="tooltip" data-placement="top" title="Add to Bookmarks">
                                    <i class="fe fe-bookmark fs-4 fs-3 text-inherit"></i>
                                </a>
                            </div>
                            <div class="d-flex mb-5 lh-1">
                    <span class="fs-6 align-top me-1">
                      <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                           class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                        <path
                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                      </svg>
                      <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                           class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                        <path
                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                      </svg>
                      <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                           class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                        <path
                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                      </svg>
                      <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                           class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                        <path
                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                      </svg>
                      <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                           class="bi bi-star-half text-warning" viewBox="0 0 16 16">
                        <path
                            d="M5.354 5.119 7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0 1 16 6.32a.548.548 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.52.52 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403.58.58 0 0 1 .085-.302.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894-.694-3.957a.565.565 0 0 1 .162-.505l2.907-2.77-4.052-.576a.525.525 0 0 1-.393-.288L8.001 2.223 8 2.226v9.8z"></path>
                      </svg>
                    </span>
                                <span class="fw-medium">(140)</span>

                                <span class="ms-4 d-none d-md-block">
                      <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE"></rect>
                        <rect x="7" y="5" width="2" height="9" rx="1" fill="#754FFE"></rect>
                        <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>
                      </svg>
                      <span>{{\App\Enums\CourseLevel::from($course->course_level_id)->title()}}</span>
                    </span>
                                {{--                                <span class="ms-4 d-none d-md-block">--}}
                                {{--                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"--}}
                                {{--                           class="bi bi-people" viewBox="0 0 16 16">--}}
                                {{--                        <path--}}
                                {{--                            d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z"></path>--}}
                                {{--                      </svg>--}}
                                {{--                      <span>Enrolled</span>--}}
                                {{--                    </span>--}}
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img src="{{$course->instructor->avatar()}}" class="rounded-circle avatar-md"
                                         alt="avatar"/>
                                    <div class="ms-2 lh-1">
                                        <h4 class="mb-1">{{$course->instructor->full_name}}</h4>
                                        <p class="fs-6 mb-0">{{$course->instructor->email}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Nav tabs -->
                        <ul class="nav nav-lt-tab" id="tab" role="tablist">
                            <!-- Nav item -->
                            <li class="nav-item">
                                <a class="nav-link active" id="description-tab" data-bs-toggle="pill"
                                   href="#description" role="tab" aria-controls="description" aria-selected="false">Description</a>
                            </li>
                            <!-- Nav item -->
                            <li class="nav-item">
                                <a class="nav-link" id="review-tab" data-bs-toggle="pill" href="#review" role="tab"
                                   aria-controls="review" aria-selected="false">Reviews</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Card -->
                    <div class="card rounded-3">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="tab-content" id="tabContent">
                                <!-- Tab pane -->
                                <div class="tab-pane fade show active" id="description" role="tabpanel"
                                     aria-labelledby="description-tab">
                                    {!! $course->description !!}
                                </div>
                                <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                    <div class="mb-3">
                                        <h3 class="mb-4">How students rated this courses</h3>
                                        <div class="row align-items-center">
                                            <div class="col-auto text-center">
                                                <h3 class="display-2 fw-bold">4.5</h3>
                                                <span class="fs-6">
                              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                   class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                              </svg>
                              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                   class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                              </svg>
                              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                   class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                              </svg>
                              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                   class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                              </svg>
                              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                   class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                              </svg>
                            </span>
                                                <p class="mb-0 fs-6">(Based on 27 reviews)</p>
                                            </div>
                                            <!-- Progress Bar -->
                                            <div class="col order-3 order-md-2">
                                                <div class="progress mb-3" style="height: 6px">
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                         style="width: 90%" aria-valuenow="90" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                                <div class="progress mb-3" style="height: 6px">
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                         style="width: 80%" aria-valuenow="80" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                                <div class="progress mb-3" style="height: 6px">
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                         style="width: 70%" aria-valuenow="70" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                                <div class="progress mb-3" style="height: 6px">
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                         style="width: 60%" aria-valuenow="60" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                                <div class="progress mb-0" style="height: 6px">
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                         style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-auto col-6 order-2 order-md-3">
                                                <!-- Rating -->
                                                <div>
                              <span class="fs-6 align-top">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                     class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                  <path
                                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                     class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                  <path
                                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                     class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                  <path
                                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                     class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                  <path
                                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                     class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                  <path
                                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                              </span>
                                                    <span class="ms-1">53%</span>
                                                </div>
                                                <div>
                              <span class="fs-6 align-top">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                     class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                  <path
                                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                     class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                  <path
                                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                     class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                  <path
                                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                     class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                  <path
                                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                     class="bi bi-star-fill text-light" viewBox="0 0 16 16">
                                  <path
                                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                              </span>
                                                    <span class="ms-1">36%</span>
                                                </div>
                                                <div>
                              <span class="fs-6 align-top">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                     class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                  <path
                                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                     class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                  <path
                                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                     class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                  <path
                                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                     class="bi bi-star-fill text-light" viewBox="0 0 16 16">
                                  <path
                                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                     class="bi bi-star-fill text-light" viewBox="0 0 16 16">
                                  <path
                                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                              </span>
                                                    <span class="ms-1">9%</span>
                                                </div>
                                                <div>
                              <span class="fs-6 align-top">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                     class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                  <path
                                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                     class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                  <path
                                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                     class="bi bi-star-fill text-light" viewBox="0 0 16 16">
                                  <path
                                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                     class="bi bi-star-fill text-light" viewBox="0 0 16 16">
                                  <path
                                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                     class="bi bi-star-fill text-light" viewBox="0 0 16 16">
                                  <path
                                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                              </span>
                                                    <span class="ms-1">3%</span>
                                                </div>
                                                <div>
                              <span class="fs-6 align-top">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                     class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                  <path
                                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                     class="bi bi-star-fill text-light" viewBox="0 0 16 16">
                                  <path
                                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                     class="bi bi-star-fill text-light" viewBox="0 0 16 16">
                                  <path
                                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                     class="bi bi-star-fill text-light" viewBox="0 0 16 16">
                                  <path
                                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                     class="bi bi-star-fill text-light" viewBox="0 0 16 16">
                                  <path
                                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                              </span>
                                                    <span class="ms-1">2%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-5"/>
                                    <div class="mb-3">
                                        <div class="d-lg-flex align-items-center justify-content-between mb-5">
                                            <!-- Reviews -->
                                            <div class="mb-3 mb-lg-0">
                                                <h3 class="mb-0">Reviews</h3>
                                            </div>
                                            <div>
                                                <form class="form-inline">
                                                    <div class="d-flex align-items-center me-2">
                                <span class="position-absolute ps-3">
                                  <i class="fe fe-search"></i>
                                </span>

                                                        <label for="courseSingleReviews"
                                                               class="visually-hidden">Reviews</label>
                                                        <input type="search" id="courseSingleReviews"
                                                               name="courseSingleReviews" class="form-control ps-6"
                                                               placeholder="Search Courses"/>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- Rating -->
                                        <div class="d-flex align-items-start border-bottom pb-4 mb-4">
                                            <img src="../assets/images/avatar/avatar-2.jpg" alt=""
                                                 class="rounded-circle avatar-lg"/>
                                            <div class="ms-3">
                                                <h4 class="mb-1">
                                                    Max Hawkins
                                                    <span class="ms-1 fs-6">2 Days ago</span>
                                                </h4>
                                                <div class="mb-2">
                              <span class="fs-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                     class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                  <path
                                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                     class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                  <path
                                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                     class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                  <path
                                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                     class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                  <path
                                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                     class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                  <path
                                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                              </span>
                                                </div>
                                                <p>Lectures were at a really good pace and I never felt lost. The
                                                    instructor was well informed and allowed me to learn and navigate
                                                    Figma easily.</p>
                                                <div class="d-lg-flex">
                                                    <p class="mb-0">Was this review helpful?</p>
                                                    <a href="#" class="btn btn-xs btn-primary ms-lg-3">Yes</a>
                                                    <a href="#" class="btn btn-xs btn-outline-secondary ms-1">No</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Rating -->
                                        <div class="d-flex align-items-start border-bottom pb-4 mb-4">
                                            <img src="../assets/images/avatar/avatar-3.jpg" alt=""
                                                 class="rounded-circle avatar-lg"/>
                                            <div class="ms-3">
                                                <h4 class="mb-1">
                                                    Arthur Williamson
                                                    <span class="ms-1 fs-6">3 Days ago</span>
                                                </h4>
                                                <div class="mb-2">
                              <span class="fs-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                     class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                  <path
                                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                     class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                  <path
                                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                     class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                  <path
                                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                     class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                  <path
                                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                     class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                  <path
                                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                              </span>
                                                </div>
                                                <p>Its pretty good.Just a reminder that there are also students with
                                                    Windows, meaning Figma its a bit different of yours. Thank you!</p>
                                                <div class="d-lg-flex">
                                                    <p class="mb-0">Was this review helpful?</p>
                                                    <a href="#" class="btn btn-xs btn-primary ms-lg-3">Yes</a>
                                                    <a href="#" class="btn btn-xs btn-outline-secondary ms-1">No</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Rating -->
                                        <div class="d-flex align-items-start border-bottom pb-4 mb-4">
                                            <img src="../assets/images/avatar/avatar-4.jpg" alt=""
                                                 class="rounded-circle avatar-lg"/>
                                            <div class="ms-3">
                                                <h4 class="mb-1">
                                                    Claire Jones
                                                    <span class="ms-1 fs-6">4 Days ago</span>
                                                </h4>
                                                <div class="mb-2">
                              <span class="fs-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                     class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                  <path
                                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                     class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                  <path
                                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                     class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                  <path
                                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                     class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                  <path
                                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                     class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                  <path
                                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                              </span>
                                                </div>
                                                <p>
                                                    Great course for learning Figma, the only bad detail would be that
                                                    some icons are not included in the assets. But 90% of the icons
                                                    needed are included, and the voice of
                                                    the instructor was very clear and easy to understood.
                                                </p>
                                                <div class="d-lg-flex">
                                                    <p class="mb-0">Was this review helpful?</p>
                                                    <a href="#" class="btn btn-xs btn-primary ms-lg-3">Yes</a>
                                                    <a href="#" class="btn btn-xs btn-outline-secondary ms-1">No</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Rating -->
                                        <div class="d-flex align-items-start">
                                            <img src="../assets/images/avatar/avatar-5.jpg" alt=""
                                                 class="rounded-circle avatar-lg"/>
                                            <div class="ms-3">
                                                <h4 class="mb-1">
                                                    Bessie Pena
                                                    <span class="ms-1 fs-6">5 Days ago</span>
                                                </h4>
                                                <div class="mb-2">
                              <span class="fs-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                     class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                  <path
                                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                     class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                  <path
                                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                     class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                  <path
                                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                     class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                  <path
                                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                     class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                  <path
                                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                              </span>
                                                </div>
                                                <p>I have really enjoyed this class and learned a lot, found it very
                                                    inspiring and helpful, thank you!</p>
                                                <div class="d-lg-flex">
                                                    <p class="mb-0">Was this review helpful?</p>
                                                    <a href="#" class="btn btn-xs btn-primary ms-lg-3">Yes</a>
                                                    <a href="#" class="btn btn-xs btn-outline-secondary ms-1">No</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-12 col-md-12 col-12">
                    <div class="card" id="courseAccordion">
                        <div>
                            <!-- List group -->
                            <ul class="list-group list-group-flush">
                                @forelse($course->modules as $module)
                                    <li class="list-group-item p-0 bg-transparent">
                                        <!-- Toggle -->
                                        <a class="h4 mb-0 d-flex align-items-center py-3 px-4" data-bs-toggle="collapse"
                                           href="#course{{$module->id}}" role="button" aria-expanded="false"
                                           aria-controls="course{{$module->id}}">
                                            <div class="me-auto">
                                                {{$module->title}}
                                                <p class="mb-0 fs-6 mt-1 fw-normal">Дарслар
                                                    сони:{{count($module->lessons)}}</p>
                                            </div>
                                            <!-- Chevron -->
                                            <span class="chevron-arrow ms-4">
                          <i class="fe fe-chevron-down fs-4"></i>
                        </span>
                                        </a>
                                        <!-- Row -->
                                        <!-- Collapse -->
                                        <div class="collapse" id="course{{$module->id}}"
                                             data-bs-parent="#courseAccordion">
                                            <!-- List group item -->
                                            <ul class="list-group list-group-flush">
                                                {{--                                                <li class="list-group-item">--}}
                                                {{--                                                    <div>--}}
                                                {{--                                                        <div class="progress" style="height: 6px">--}}
                                                {{--                                                            <div class="progress-bar bg-success" role="progressbar"--}}
                                                {{--                                                                 style="width: 10%" aria-valuenow="10" aria-valuemin="0"--}}
                                                {{--                                                                 aria-valuemax="100"></div>--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                        <small>5% Completed</small>--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                </li>--}}
                                                <!-- List group item -->
                                                @foreach($module->lessons as $lesson)
                                                    @if($lesson->is_free)
                                                        <li class="list-group-item">
                                                            <a href="{{route('courses.show',['course' =>  $course, 'lesson_id' => $lesson->id])}}"
                                                               class="d-flex justify-content-between align-items-center text-inherit">
                                                                <div class="text-truncate">
                                                                    <span
                                                                        class="icon-shape bg-success text-white icon-sm rounded-circle me-2">
                                                                      <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                           height="14" fill="currentColor"
                                                                           class="bi bi-play-fill" viewBox="0 0 16 16">
                                                                        <path
                                                                            d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z"></path>
                                                                      </svg>
                                                                    </span>
                                                                    <span>{{$lesson->title}}</span>
                                                                </div>
                                                                <div class="text-truncate">
                                                                    <span>{{$lesson->formatted_price}}</span>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    @else
                                                        <li class="list-group-item disabled" aria-disabled="true">
                                                            <a href="#"
                                                               class="d-flex justify-content-between align-items-center text-inherit">
                                                                <div class="text-truncate">
                                                                    <span
                                                                        class="icon-shape bg-light icon-sm rounded-circle me-2"><i
                                                                            class="fe fe-lock fs-4"></i></span>
                                                                    <span>{{$lesson->title}}</span>
                                                                </div>
                                                                <div class="text-truncate">
                                                                    <span>{{$lesson->formatted_price}}</span>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    @endif

                                                @endforeach
                                                <!-- List group item -->
                                                {{--                                                <li class="list-group-item list-group-item-action active">--}}
                                                {{--                                                    <a href="#"--}}
                                                {{--                                                       class="d-flex justify-content-between align-items-center text-white">--}}
                                                {{--                                                        <div class="text-truncate">--}}
                                                {{--                                <span class="icon-shape bg-light text-primary icon-sm rounded-circle me-2">--}}
                                                {{--                                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"--}}
                                                {{--                                       class="bi bi-play-fill" viewBox="0 0 16 16">--}}
                                                {{--                                    <path--}}
                                                {{--                                        d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z"></path>--}}
                                                {{--                                  </svg>--}}
                                                {{--                                </span>--}}
                                                {{--                                                            <span>Installing Development Software</span>--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                        <div class="text-truncate">--}}
                                                {{--                                                            <span>3m 11s</span>--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                    </a>--}}
                                                {{--                                                </li>--}}

                                                <!-- List group item -->
                                                {{--                                                <li class="list-group-item disabled" aria-disabled="true">--}}
                                                {{--                                                    <a href="#"--}}
                                                {{--                                                       class="d-flex justify-content-between align-items-center text-inherit">--}}
                                                {{--                                                        <div class="text-truncate">--}}
                                                {{--                                                            <span--}}
                                                {{--                                                                class="icon-shape bg-light icon-sm rounded-circle me-2"><i--}}
                                                {{--                                                                    class="fe fe-lock fs-4"></i></span>--}}
                                                {{--                                                            <span>Our Sample Website</span>--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                        <div class="text-truncate">--}}
                                                {{--                                                            <span>2m 15s</span>--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                    </a>--}}
                                                {{--                                                </li>--}}
                                            </ul>
                                        </div>
                                    </li>
                                @empty
                                    <li class="list-group-item">
                                        No modules added
                                    </li>

                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
