<div class="col d-flex">
    <div class="card h-100 d-flex flex-column card-lift">
        <a href="{{route('courses.show', $course)}}">
            <img src="{{ route('files.show', $course->thumbnail?->id) }}"
                 alt="thumbnail"
                 class="card-img-top img-fluid w-100"/>
        </a>

        <div class="card-body d-flex flex-column">
            {{-- Категория --}}
            <div class="mb-1">
                        <span class="badge bg-light text-dark">
                            {{ $course->childCategory()?->title }}
                        </span>
            </div>

            {{-- Заголовок на 2 строки максимум --}}
            <h3 class="h5 mb-1 text-inherit d-block"
                style="
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        min-height: 3em; /* фикс высоты для 2 строк */
        line-height: 1.5;
    ">
                {{ $course->title }}
            </h3>

            {{-- Преподаватель --}}
            <div class="d-flex align-items-center gap-1 mb-3 text-secondary small">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                     viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm9.784-1A2.928 2.928 0 0 0 13 12c0-.703-.405-1.605-1.68-2.252C10.343 9.27 9.177 9 8 9c-1.177 0-2.343.27-3.32.748C3.405 10.395 3 11.297 3 12c0 .35.09.606.216.784H12.784z"/>
                    <path fill-rule="evenodd"
                          d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8z"/>
                </svg>
                <span>{{ $course->instructor->full_name }}</span>
            </div>

            {{-- Spacer --}}
            <div class="mt-auto d-flex align-items-center gap-1">
                <i class="bi theme-icon bi-wallet2 text-primary fs-5"></i>
                <span class="fw-semibold text-dark">
                    {{ $course->formatted_whole_price }}
                </span>
            </div>
        </div>
    </div>
</div>


@push('styles')
    <style>
        .card-img-top {
            width: 100%;
            aspect-ratio: 16 / 9; /* или 4 / 3 для чуть квадратнее */
            object-fit: cover;
        }
    </style>
@endpush
