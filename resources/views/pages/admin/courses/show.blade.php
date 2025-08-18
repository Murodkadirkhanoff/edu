<x-layouts.admin.layout>

    <main>
        <!--hero section-->
        <section class="py-5">
            <div class="container">
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
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('admin.courses') }}">Курслар</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">{{$course->title}}</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--hero section-->
        <!--Figma design-->
        <section class="py-md-5 pb-5 card">
            <div class="container">
                <div class="row gy-5 gx-xl-8">
                    <div class="col-xl-8 col-12">
                        <div class="d-flex flex-column gap-5 product-content">
                            <div class="d-flex flex-column gap-5">
                                <div class="d-flex flex-column gap-2">
                                    <h1 class="mb-0 display-4">{{$course->title}}</h1>
                                    <p class="mb-0 lead text-gray-600">{!! $course->description !!}</p>
                                </div>

                                <div class="d-flex gap-2">
                                         <span class="d-flex flex-row gap-1 align-items-center">
                                            <span
                                                class="text-secondary">{{ $course->childCategory()->parent->title }}</span>
                                        </span>
                                    <i class="bi bi-chevron-right"></i>
                                    <span class="d-flex flex-row gap-1 align-items-center">
                                            <span class="text-secondary">{{ $course->childCategory()->title }}</span>
                                        </span>
                                </div>

                                <div class="d-flex flex-column gap-lg-3 gap-2">
                                    <div class="d-flex flex-lg-row flex-column gap-2 gap-md-3 align-items-lg-center">
                      <span class="d-flex flex-row gap-2 lh-1 align-items-center">
                        <span class="text-secondary">4.5</span>
                        <span class="align-text-bottom">
                          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                               class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                            <path
                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                          </svg>
                          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                               class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                            <path
                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                          </svg>
                          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                               class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                            <path
                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                          </svg>
                          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                               class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                            <path
                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                          </svg>
                          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                               class="bi bi-star-half text-warning" viewBox="0 0 16 16">
                            <path
                                d="M5.354 5.119 7.538.792A.52.52 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.54.54 0 0 1 16 6.32a.55.55 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.5.5 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403.6.6 0 0 1 .085-.302.51.51 0 0 1 .37-.245zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894-.694-3.957a.56.56 0 0 1 .162-.505l2.907-2.77-4.052-.576a.53.53 0 0 1-.393-.288L8.001 2.223 8 2.226z"/>
                          </svg>
                        </span>
                        <span class="text-primary">(13,245 ratings)</span>
                      </span>
                                        <span class="d-flex flex-row gap-2 align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-people" viewBox="0 0 16 16">
                          <path
                              d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
                        </svg>
                        <span class="text-secondary">992,240 students</span>
                      </span>
                                        <span class="d-flex flex-row gap-2 align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-exclamation-circle text-gray-500" viewBox="0 0 16 16">
                          <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                          <path
                              d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                        </svg>
                        <span
                            class="text-secondary">Охирги янгиланган сана {{$course->updated_at->diffForHumans()}}</span>
                      </span>
                                    </div>
                                    <div class="d-flex gap-2">
                                      <span class="d-flex flex-row gap-2 align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor"
                                             class="bi bi-globe2 text-gray-500" viewBox="0 0 16 16">
                                          <path
                                              d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m7.5-6.923c-.67.204-1.335.82-1.887 1.855q-.215.403-.395.872c.705.157 1.472.257 2.282.287zM4.249 3.539q.214-.577.481-1.078a7 7 0 0 1 .597-.933A7 7 0 0 0 3.051 3.05q.544.277 1.198.49zM3.509 7.5c.036-1.07.188-2.087.436-3.008a9 9 0 0 1-1.565-.667A6.96 6.96 0 0 0 1.018 7.5zm1.4-2.741a12.3 12.3 0 0 0-.4 2.741H7.5V5.091c-.91-.03-1.783-.145-2.591-.332M8.5 5.09V7.5h2.99a12.3 12.3 0 0 0-.399-2.741c-.808.187-1.681.301-2.591.332zM4.51 8.5c.035.987.176 1.914.399 2.741A13.6 13.6 0 0 1 7.5 10.91V8.5zm3.99 0v2.409c.91.03 1.783.145 2.591.332.223-.827.364-1.754.4-2.741zm-3.282 3.696q.18.469.395.872c.552 1.035 1.218 1.65 1.887 1.855V11.91c-.81.03-1.577.13-2.282.287zm.11 2.276a7 7 0 0 1-.598-.933 9 9 0 0 1-.481-1.079 8.4 8.4 0 0 0-1.198.49 7 7 0 0 0 2.276 1.522zm-1.383-2.964A13.4 13.4 0 0 1 3.508 8.5h-2.49a6.96 6.96 0 0 0 1.362 3.675c.47-.258.995-.482 1.565-.667m6.728 2.964a7 7 0 0 0 2.275-1.521 8.4 8.4 0 0 0-1.197-.49 9 9 0 0 1-.481 1.078 7 7 0 0 1-.597.933M8.5 11.909v3.014c.67-.204 1.335-.82 1.887-1.855q.216-.403.395-.872A12.6 12.6 0 0 0 8.5 11.91zm3.555-.401c.57.185 1.095.409 1.565.667A6.96 6.96 0 0 0 14.982 8.5h-2.49a13.4 13.4 0 0 1-.437 3.008M14.982 7.5a6.96 6.96 0 0 0-1.362-3.675c-.47.258-.995.482-1.565.667.248.92.4 1.938.437 3.008zM11.27 2.461q.266.502.482 1.078a8.4 8.4 0 0 0 1.196-.49 7 7 0 0 0-2.275-1.52c.218.283.418.597.597.932m-.488 1.343a8 8 0 0 0-.395-.872C9.835 1.897 9.17 1.282 8.5 1.077V4.09c.81-.03 1.577-.13 2.282-.287z"/>
                                        </svg>
                                        <span class="text-secondary">{{$course->language_text}}</span>
                                      </span>
                                        @php
                                            // Предположим, что уровень хранится как число 1, 2, 3
                                            $level = $course->course_level_id; // 1 - начальный, 2 - средний, 3 - продвинутый
                                            $activeColor = '#754FFE';
                                            $inactiveColor = '#DBD8E9';
                                        @endphp

                                        <span class="d-flex flex-row gap-1 align-items-center">
                                            <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16"
                                                 fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <rect x="3" y="8" width="2" height="6" rx="1"
                                                      fill="{{ $level >= 1 ? $activeColor : $inactiveColor }}"></rect>
                                                <rect x="7" y="5" width="2" height="9" rx="1"
                                                      fill="{{ $level >= 2 ? $activeColor : $inactiveColor }}"></rect>
                                                <rect x="11" y="2" width="2" height="12" rx="1"
                                                      fill="{{ $level >= 3 ? $activeColor : $inactiveColor }}"></rect>
                                            </svg>
                                            <span class="text-secondary">{{ $course->course_level_text }}</span>
                                        </span>
                                    </div>


                                </div>
                            </div>

                            <div class="d-flex flex-column gap-3">
                                <h2 class="mb-0">Ўқув дастури</h2>
                                <div class="accordion-single border" id="accordionExample">

                                    @foreach($course->modules as $module)
                                        <div class="accordion-item rounded-0">
                                            <div class="accordion-header-single">
                                                <div class="d-flex flex-row align-items-center justify-content-between">
                                                    <a class="h4 mb-0" data-bs-toggle="collapse"
                                                       href="#collapse{{$module->id}}"
                                                       role="button" aria-expanded="false"
                                                       aria-controls="collapse{{$module->id}}">
                                                        <div class="d-flex align-items-center gap-3 flex-row">
                                                            <div>
                                                                <span class="chevron-arrow">
                                                                  <i class="fe fe-chevron-down fs-4"></i>
                                                                </span>
                                                            </div>
                                                            <div class="">
                                                                <div class="">{{$module->title}}</div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <span class="d-flex flex-row gap-2 d-none d-md-block">
                                                        <span class="text-secondary fw-medium">3 lectures</span>
                                                        <span class="text-secondary fw-medium">30min</span>
                                                      </span>
                                                </div>
                                            </div>
                                            <div id="collapse{{$module->id}}" class="accordion-collapse collapse"
                                                 data-bs-parent="#accordionExample">
                                                <div class="accordion-body-single">
                                                    <ul class="list-unstyled mb-0 d-flex flex-column gap-2">
                                                        @foreach($module->lessons as $lesson)
                                                            <li class="d-flex flex-row align-items-center justify-content-between gap-2">
                                                                <div
                                                                    class="d-flex flex-row gap-2 align-items-md-center">
                                                                <span>
                                                                  <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                       height="16" fill="currentColor"
                                                                       class="bi bi-camera-video" viewBox="0 0 16 16">
                                                                    <path
                                                                        fill-rule="evenodd"
                                                                        d="M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2zm11.5 5.175 3.5 1.556V4.269l-3.5 1.556zM2 4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1z"/>
                                                                  </svg>
                                                                </span>

                                                                    <div>{{$lesson->title}}</div>
                                                                </div>
                                                                <div class="">
                                                                    <div class="d-flex flex-row gap-3">
                                                                        <div class="">

                                                                            @if ($lesson->isVideo())
                                                                                <a href="javascript:void(0)"
                                                                                   onclick="openLessonModal({{ $lesson->id }}, 'video')">
                                                                                    <i class="fe fe-eye fs-6"></i>
                                                                                </a>
                                                                            @endif

                                                                            @if ($lesson->isText())
                                                                                @php
                                                                                    $content = optional(optional($lesson->lesson_content)->contentable)->content ?? '';
                                                                                    $encoded = base64_encode($content);
                                                                                @endphp
                                                                                <a href="javascript:void(0)"
                                                                                   data-lesson-id="{{ $lesson->id }}"
                                                                                   data-lesson-type="text"
                                                                                   data-lesson-content-base64="{{ $encoded }}"
                                                                                   onclick="openLessonFromElement(this)">
                                                                                    <i class="fe fe-eye fs-6"></i>
                                                                                </a>
                                                                            @endif

                                                                        </div>
                                                                        <div class="text-gray-500 d-none d-md-block">
                                                                            02:53
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>


                            <div class="d-flex flex-column gap-3">
                                <h2 class="mb-0">Instructor</h2>
                                <div class="border rounded-3 p-4 d-flex flex-column gap-5">
                                    <div class="d-flex flex-row align-items-center gap-3">
                                        <div class="position-relative">
                                            <img src="{{$course->instructor->avatar()}}" alt="avatar"
                                                 class="rounded-circle avatar-xl"/>
                                            <a href="#!" class="position-absolute mt-7 ms-n4" data-bs-toggle="tooltip"
                                               data-placement="top" title="Verifed">
                                                <img src="{{asset('assets/images/course/check.svg')}}" alt="check"
                                                     height="30"
                                                     width="30"/>
                                            </a>
                                        </div>
                                        <div>
                                            <h3 class="mb-0 text-primary">{{$course->instructor->full_name}}</h3>
                                            <span>Developer and Lead Instructor</span>
                                        </div>
                                    </div>
                                    <div>
                                        <ul class="list-unstyled mb-0 d-flex flex-column gap-3">
                                            <li class="d-flex flex-row gap-2">
                          <span class="align-baseline lh-1">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                              <g clip-path="url(#clip0_7767_6877)">
                                <path
                                    d="M10.0001 14.7915L4.85677 17.4957L5.83927 11.7682L1.67261 7.71238L7.42261 6.87905L9.99427 1.66821L12.5659 6.87905L18.3159 7.71238L14.1493 11.7682L15.1318 17.4957L10.0001 14.7915Z"
                                    stroke="#475569"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"/>
                              </g>
                              <defs>
                                <clipPath id="clip0_7767_6877">
                                  <rect width="20" height="20" fill="white"/>
                                </clipPath>
                              </defs>
                            </svg>
                          </span>
                                                <span>
                            <span class="fw-semibold">4.7</span>
                            Instructor Rating
                          </span>
                                            </li>
                                            <li class="d-flex flex-row gap-2">
                          <span class="align-baseline lh-1">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                              <g clip-path="url(#clip0_7767_6882)">
                                <path d="M6.66675 7.5H13.3334" stroke="#475569" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                                <path d="M6.66675 10.8333H10.4167" stroke="#475569" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                                <path
                                    d="M8.60417 16.3374L6.66667 17.4999V14.9999H5C4.33696 14.9999 3.70107 14.7365 3.23223 14.2677C2.76339 13.7988 2.5 13.163 2.5 12.4999V5.83325C2.5 5.17021 2.76339 4.53433 3.23223 4.06549C3.70107 3.59664 4.33696 3.33325 5 3.33325H15C15.663 3.33325 16.2989 3.59664 16.7678 4.06549C17.2366 4.53433 17.5 5.17021 17.5 5.83325V9.58325"
                                    stroke="#475569"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"/>
                                <path
                                    d="M14.8333 17.3475L13.0233 18.2958C12.9696 18.3238 12.9091 18.3362 12.8488 18.3318C12.7884 18.3275 12.7304 18.3064 12.6813 18.2709C12.6322 18.2355 12.5939 18.1871 12.5707 18.1311C12.5475 18.0752 12.5403 18.0139 12.55 17.9541L12.8958 15.945L11.4316 14.5225C11.3879 14.4802 11.357 14.4265 11.3423 14.3676C11.3277 14.3086 11.3299 14.2466 11.3488 14.1889C11.3676 14.1311 11.4023 14.0797 11.449 14.0407C11.4956 14.0018 11.5522 13.9767 11.6125 13.9683L13.6358 13.675L14.5408 11.8475C14.5679 11.793 14.6096 11.7473 14.6612 11.7152C14.7129 11.6832 14.7725 11.6663 14.8333 11.6663C14.8941 11.6663 14.9537 11.6832 15.0053 11.7152C15.057 11.7473 15.0987 11.793 15.1258 11.8475L16.0308 13.675L18.0541 13.9683C18.1142 13.9769 18.1706 14.0022 18.217 14.0412C18.2634 14.0803 18.298 14.1315 18.3168 14.1892C18.3356 14.2468 18.3379 14.3086 18.3235 14.3675C18.309 14.4264 18.2783 14.4801 18.235 14.5225L16.7708 15.945L17.1158 17.9533C17.1261 18.0132 17.1195 18.0748 17.0966 18.1311C17.0737 18.1874 17.0355 18.2362 16.9863 18.2718C16.9371 18.3075 16.8788 18.3286 16.8182 18.3329C16.7576 18.3371 16.697 18.3243 16.6433 18.2958L14.8333 17.3475Z"
                                    stroke="#475569"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"/>
                              </g>
                              <defs>
                                <clipPath id="clip0_7767_6882">
                                  <rect width="20" height="20" fill="white"/>
                                </clipPath>
                              </defs>
                            </svg>
                          </span>
                                                <span class="fw-semibold">852,588</span>
                                                Reviews
                                            </li>
                                            <li class="d-flex flex-row gap-2">
                          <span class="align-baseline lh-1">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                              <g clip-path="url(#clip0_7767_6890)">
                                <path
                                    d="M8.33325 10.8334C8.33325 11.2754 8.50885 11.6994 8.82141 12.0119C9.13397 12.3245 9.55789 12.5001 9.99992 12.5001C10.4419 12.5001 10.8659 12.3245 11.1784 12.0119C11.491 11.6994 11.6666 11.2754 11.6666 10.8334C11.6666 10.3914 11.491 9.96746 11.1784 9.6549C10.8659 9.34234 10.4419 9.16675 9.99992 9.16675C9.55789 9.16675 9.13397 9.34234 8.82141 9.6549C8.50885 9.96746 8.33325 10.3914 8.33325 10.8334Z"
                                    stroke="#475569"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"/>
                                <path
                                    d="M6.66675 17.5V16.6667C6.66675 16.2246 6.84234 15.8007 7.1549 15.4882C7.46746 15.1756 7.89139 15 8.33341 15H11.6667C12.1088 15 12.5327 15.1756 12.8453 15.4882C13.1578 15.8007 13.3334 16.2246 13.3334 16.6667V17.5"
                                    stroke="#475569"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"/>
                                <path
                                    d="M12.5 4.16667C12.5 4.60869 12.6756 5.03262 12.9882 5.34518C13.3007 5.65774 13.7246 5.83333 14.1667 5.83333C14.6087 5.83333 15.0326 5.65774 15.3452 5.34518C15.6577 5.03262 15.8333 4.60869 15.8333 4.16667C15.8333 3.72464 15.6577 3.30072 15.3452 2.98816C15.0326 2.67559 14.6087 2.5 14.1667 2.5C13.7246 2.5 13.3007 2.67559 12.9882 2.98816C12.6756 3.30072 12.5 3.72464 12.5 4.16667Z"
                                    stroke="#475569"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"/>
                                <path
                                    d="M14.1667 8.33325H15.8334C16.2754 8.33325 16.6994 8.50885 17.0119 8.82141C17.3245 9.13397 17.5001 9.55789 17.5001 9.99992V10.8333"
                                    stroke="#475569"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"/>
                                <path
                                    d="M4.16675 4.16667C4.16675 4.60869 4.34234 5.03262 4.6549 5.34518C4.96746 5.65774 5.39139 5.83333 5.83341 5.83333C6.27544 5.83333 6.69937 5.65774 7.01193 5.34518C7.32449 5.03262 7.50008 4.60869 7.50008 4.16667C7.50008 3.72464 7.32449 3.30072 7.01193 2.98816C6.69937 2.67559 6.27544 2.5 5.83341 2.5C5.39139 2.5 4.96746 2.67559 4.6549 2.98816C4.34234 3.30072 4.16675 3.72464 4.16675 4.16667Z"
                                    stroke="#475569"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"/>
                                <path
                                    d="M2.5 10.8333V9.99992C2.5 9.55789 2.67559 9.13397 2.98816 8.82141C3.30072 8.50885 3.72464 8.33325 4.16667 8.33325H5.83333"
                                    stroke="#475569"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"/>
                              </g>
                              <defs>
                                <clipPath id="clip0_7767_6890">
                                  <rect width="20" height="20" fill="white"/>
                                </clipPath>
                              </defs>
                            </svg>
                          </span>
                                                <span class="fw-semibold">2,792,124</span>
                                                Students
                                            </li>
                                            <li class="d-flex flex-row gap-2">
                          <span class="align-baseline lh-1">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                              <g clip-path="url(#clip0_7767_6900)">
                                <path
                                    d="M12.5 8.33343L16.2942 6.43677C16.4212 6.37329 16.5623 6.34333 16.7042 6.34972C16.846 6.35611 16.9839 6.39864 17.1047 6.47327C17.2255 6.5479 17.3252 6.65216 17.3944 6.77616C17.4636 6.90015 17.4999 7.03977 17.5 7.18177V12.8184C17.4999 12.9604 17.4636 13.1 17.3944 13.224C17.3252 13.348 17.2255 13.4523 17.1047 13.5269C16.9839 13.6016 16.846 13.6441 16.7042 13.6505C16.5623 13.6569 16.4212 13.6269 16.2942 13.5634L12.5 11.6668V8.33343Z"
                                    stroke="#475569"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"/>
                                <path
                                    d="M2.5 6.66667C2.5 6.22464 2.67559 5.80072 2.98816 5.48816C3.30072 5.17559 3.72464 5 4.16667 5H10.8333C11.2754 5 11.6993 5.17559 12.0118 5.48816C12.3244 5.80072 12.5 6.22464 12.5 6.66667V13.3333C12.5 13.7754 12.3244 14.1993 12.0118 14.5118C11.6993 14.8244 11.2754 15 10.8333 15H4.16667C3.72464 15 3.30072 14.8244 2.98816 14.5118C2.67559 14.1993 2.5 13.7754 2.5 13.3333V6.66667Z"
                                    stroke="#475569"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"/>
                              </g>
                              <defs>
                                <clipPath id="clip0_7767_6900">
                                  <rect width="20" height="20" fill="white"/>
                                </clipPath>
                              </defs>
                            </svg>
                          </span>
                                                <span class="fw-semibold">34</span>
                                                Courses
                                            </li>
                                        </ul>
                                    </div>
                                    <div>
                                        <p class="mb-3">I am an Innovation designer focussing on UX/UI based in Berlin.
                                            As a
                                            creative resident at Figma explored the city of the future and how new
                                            technologies.</p>
                                        <a href="#!" class="fw-medium">Show Profile</a>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column gap-3">
                                <div class="d-flex flex-column flex-md-row align-items-md-center">
                    <span class="d-flex flex-row gap-2">
                      <span class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                             class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                          <path
                              d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                      </span>
                      <h2 class="mb-0">4.7 course rating</h2>
                    </span>
                                    <span class="d-none d-md-block">
                      <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                           class="bi bi-dot text-gray-500" viewBox="0 0 16 16">
                        <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3"/>
                      </svg>
                    </span>
                                    <h2 class="mb-0">30K ratings</h2>
                                </div>
                                <div class="row gy-4">
                                    <div class="col-lg-6 col-12">
                                        <div class="border rounded-3 p-4 d-flex flex-column gap-3">
                                            <div class="d-flex flex-row gap-3">
                                                <div>
                                                    <img src="{{asset('assets/images/avatar/avatar-10.jpg')}}"
                                                         alt="avatar"
                                                         class="icon-shape icon-lg rounded-circle"/>
                                                </div>
                                                <div class="d-flex flex-column gap-3">
                                                    <div class="d-flex flex-column gap-1">
                                                        <h3 class="mb-0 h4">Max Hawkins</h3>
                                                        <div class="d-flex flex-row gap-2 lh-1">
                                <span class="align-text-top">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                       class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                  </svg>
                                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                       class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                  </svg>
                                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                       class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                  </svg>
                                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                       class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                  </svg>
                                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                       class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                  </svg>
                                </span>

                                                            <span class="text-gray-400">1 Hour ago</span>
                                                        </div>
                                                    </div>
                                                    <p class="mb-0">Lectures were at a really good pace and I never felt
                                                        lost. The instructor was well informed and allowed me to learn
                                                        and
                                                        navigate Figma easily.</p>
                                                    <div class="d-flex flex-row gap-3 align-items-center">
                                                        <span>helpful?</span>
                                                        <div class="d-flex flex-row gap-2">
                                                            <a href="#!" class="text-inherit">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                     height="16" fill="currentColor"
                                                                     class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2 2 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a10 10 0 0 0-.443.05 9.4 9.4 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a9 9 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.2 2.2 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.9.9 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/>
                                                                </svg>
                                                            </a>
                                                            <a href="#!" class="text-inherit">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                     height="16" fill="currentColor"
                                                                     class="bi bi-hand-thumbs-down" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M8.864 15.674c-.956.24-1.843-.484-1.908-1.42-.072-1.05-.23-2.015-.428-2.59-.125-.36-.479-1.012-1.04-1.638-.557-.624-1.282-1.179-2.131-1.41C2.685 8.432 2 7.85 2 7V3c0-.845.682-1.464 1.448-1.546 1.07-.113 1.564-.415 2.068-.723l.048-.029c.272-.166.578-.349.97-.484C6.931.08 7.395 0 8 0h3.5c.937 0 1.599.478 1.934 1.064.164.287.254.607.254.913 0 .152-.023.312-.077.464.201.262.38.577.488.9.11.33.172.762.004 1.15.069.13.12.268.159.403.077.27.113.567.113.856s-.036.586-.113.856c-.035.12-.08.244-.138.363.394.571.418 1.2.234 1.733-.206.592-.682 1.1-1.2 1.272-.847.283-1.803.276-2.516.211a10 10 0 0 1-.443-.05 9.36 9.36 0 0 1-.062 4.51c-.138.508-.55.848-1.012.964zM11.5 1H8c-.51 0-.863.068-1.14.163-.281.097-.506.229-.776.393l-.04.025c-.555.338-1.198.73-2.49.868-.333.035-.554.29-.554.55V7c0 .255.226.543.62.65 1.095.3 1.977.997 2.614 1.709.635.71 1.064 1.475 1.238 1.977.243.7.407 1.768.482 2.85.025.362.36.595.667.518l.262-.065c.16-.04.258-.144.288-.255a8.34 8.34 0 0 0-.145-4.726.5.5 0 0 1 .595-.643h.003l.014.004.058.013a9 9 0 0 0 1.036.157c.663.06 1.457.054 2.11-.163.175-.059.45-.301.57-.651.107-.308.087-.67-.266-1.021L12.793 7l.353-.354c.043-.042.105-.14.154-.315.048-.167.075-.37.075-.581s-.027-.414-.075-.581c-.05-.174-.111-.273-.154-.315l-.353-.354.353-.354c.047-.047.109-.176.005-.488a2.2 2.2 0 0 0-.505-.804l-.353-.354.353-.354c.006-.005.041-.05.041-.17a.9.9 0 0 0-.121-.415C12.4 1.272 12.063 1 11.5 1"/>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="border rounded-3 p-4 d-flex flex-column gap-3">
                                            <div class="d-flex flex-row gap-3">
                                                <div>
                                                    <img src="{{asset('assets/images/avatar/avatar-9.jpg')}}"
                                                         alt="avatar"
                                                         class="icon-shape icon-lg rounded-circle"/>
                                                </div>
                                                <div class="d-flex flex-column gap-3">
                                                    <div class="d-flex flex-column gap-1">
                                                        <h3 class="mb-0 h4">Jesica Manotn</h3>
                                                        <div class="d-flex flex-row gap-2 lh-1">
                                <span class="align-text-top">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                       class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                  </svg>
                                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                       class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                  </svg>
                                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                       class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                  </svg>
                                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                       class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                  </svg>
                                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                       class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                  </svg>
                                </span>

                                                            <span class="text-gray-400">2 Hour ago</span>
                                                        </div>
                                                    </div>
                                                    <p class="mb-0">
                                                        I think it should have more downloadable resources for 'points
                                                        to
                                                        remember' or 'key learnings' kind of document for later
                                                        reference
                                                        after finishing each section.
                                                    </p>
                                                    <div class="d-flex flex-row gap-3 align-items-center">
                                                        <span>helpful?</span>
                                                        <div class="d-flex flex-row gap-2">
                                                            <a href="#!" class="text-inherit">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                     height="16" fill="currentColor"
                                                                     class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2 2 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a10 10 0 0 0-.443.05 9.4 9.4 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a9 9 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.2 2.2 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.9.9 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/>
                                                                </svg>
                                                            </a>
                                                            <a href="#!" class="text-inherit">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                     height="16" fill="currentColor"
                                                                     class="bi bi-hand-thumbs-down" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M8.864 15.674c-.956.24-1.843-.484-1.908-1.42-.072-1.05-.23-2.015-.428-2.59-.125-.36-.479-1.012-1.04-1.638-.557-.624-1.282-1.179-2.131-1.41C2.685 8.432 2 7.85 2 7V3c0-.845.682-1.464 1.448-1.546 1.07-.113 1.564-.415 2.068-.723l.048-.029c.272-.166.578-.349.97-.484C6.931.08 7.395 0 8 0h3.5c.937 0 1.599.478 1.934 1.064.164.287.254.607.254.913 0 .152-.023.312-.077.464.201.262.38.577.488.9.11.33.172.762.004 1.15.069.13.12.268.159.403.077.27.113.567.113.856s-.036.586-.113.856c-.035.12-.08.244-.138.363.394.571.418 1.2.234 1.733-.206.592-.682 1.1-1.2 1.272-.847.283-1.803.276-2.516.211a10 10 0 0 1-.443-.05 9.36 9.36 0 0 1-.062 4.51c-.138.508-.55.848-1.012.964zM11.5 1H8c-.51 0-.863.068-1.14.163-.281.097-.506.229-.776.393l-.04.025c-.555.338-1.198.73-2.49.868-.333.035-.554.29-.554.55V7c0 .255.226.543.62.65 1.095.3 1.977.997 2.614 1.709.635.71 1.064 1.475 1.238 1.977.243.7.407 1.768.482 2.85.025.362.36.595.667.518l.262-.065c.16-.04.258-.144.288-.255a8.34 8.34 0 0 0-.145-4.726.5.5 0 0 1 .595-.643h.003l.014.004.058.013a9 9 0 0 0 1.036.157c.663.06 1.457.054 2.11-.163.175-.059.45-.301.57-.651.107-.308.087-.67-.266-1.021L12.793 7l.353-.354c.043-.042.105-.14.154-.315.048-.167.075-.37.075-.581s-.027-.414-.075-.581c-.05-.174-.111-.273-.154-.315l-.353-.354.353-.354c.047-.047.109-.176.005-.488a2.2 2.2 0 0 0-.505-.804l-.353-.354.353-.354c.006-.005.041-.05.041-.17a.9.9 0 0 0-.121-.415C12.4 1.272 12.063 1 11.5 1"/>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <a href="#!" class="btn btn-outline-dark">Show More Reviews</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <aside class="col-xl-4 col-12">
                        <div id="sidebar">
                            <div class="sidebar__inner">
                                <div class="d-flex flex-column gap-4">
                                    <div class="card">
                                        <a href="#!"><img src="{{ route('files.show', $course->thumbnail?->id) }}"
                                                          alt="course thumbnail"
                                                          class="img-fluid w-100 card-img-top"/></a>
                                        <div class="card-body d-flex flex-column gap-4">
                                            <div class="d-flex flex-column gap-1">
                                                <div class="d-flex flex-row gap-2 align-items-center">
                                                    <h3 class="h2 mb-0">{{$course->formatted_whole_price}}</h3>
                                                    {{--                                                    <h3 class="mb-0 text-gray-500">--}}
                                                    {{--                                                        <del>$1,455</del>--}}
                                                    {{--                                                    </h3>--}}
                                                    {{--                                                    <span class="text-dark fw-semibold">83% off</span>--}}
                                                </div>
                                                <div class="d-flex flex-row gap-2 align-items-center lh-1">
                                                    {{--                                                    <span>--}}
                                                    {{--                                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"--}}
                                                    {{--                                                           class="bi bi-alarm-fill text-danger" viewBox="0 0 16 16">--}}
                                                    {{--                                                        <path--}}
                                                    {{--                                                            d="M6 .5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H9v1.07a7.001 7.001 0 0 1 3.274 12.474l.601.602a.5.5 0 0 1-.707.708l-.746-.746A6.97 6.97 0 0 1 8 16a6.97 6.97 0 0 1-3.422-.892l-.746.746a.5.5 0 0 1-.707-.708l.602-.602A7.001 7.001 0 0 1 7 2.07V1h-.5A.5.5 0 0 1 6 .5m2.5 5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9zM.86 5.387A2.5 2.5 0 1 1 4.387 1.86 8.04 8.04 0 0 0 .86 5.387M11.613 1.86a2.5 2.5 0 1 1 3.527 3.527 8.04 8.04 0 0 0-3.527-3.527"/>--}}
                                                    {{--                                                      </svg>--}}
                                                    {{--                                                    </span>--}}

                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </section>



    </main>

    <x-courses.lesson-modal title="asd"/>

    @push('styles')
        <style>
            .plyr--fullscreen-active {
                z-index: 99999 !important;
                position: fixed !important;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                width: 100% !important;
                height: 100% !important;
                background: black !important;
            }
        </style>
    @endpush
</x-layouts.admin.layout>
