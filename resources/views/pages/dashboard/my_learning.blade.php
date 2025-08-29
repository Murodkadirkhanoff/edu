<x-layouts.instructor.layout>
    <div class="db-content">
        <div class="container mb-4">
            <div class="row mb-5">
                <div class="col-12">
                    <div class="d-flex flex-row align-items-center justify-content-between">
                        <h1 class="h2 mb-0">Менинг курсларим </h1>
                    </div>
                </div>
            </div>
            <div class="row g-4 mb-5">
                <div class="col-12">
                    <div class="d-flex flex-row align-items-center gap-2 lh-1">
                        <div>
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_8175_5628)">
                                    <path
                                        d="M8.211 2.0467C8.14491 2.01594 8.07289 2 8 2C7.9271 2 7.85508 2.01594 7.789 2.0467L0.288996 5.5467C0.200678 5.58793 0.126334 5.65406 0.0751066 5.73698C0.0238794 5.81989 -0.00199738 5.91597 0.000658795 6.0134C0.00331497 6.11083 0.0343882 6.20536 0.0900571 6.28536C0.145726 6.36536 0.223563 6.42735 0.313996 6.4637L7.814 9.4637C7.93338 9.51155 8.06661 9.51155 8.186 9.4637L14 7.1397V12.9997C13.7348 12.9997 13.4804 13.1051 13.2929 13.2926C13.1054 13.4801 13 13.7345 13 13.9997V15.9997H16V13.9997C16 13.7345 15.8946 13.4801 15.7071 13.2926C15.5196 13.1051 15.2652 12.9997 15 12.9997V6.7387L15.686 6.4637C15.7764 6.42735 15.8543 6.36536 15.9099 6.28536C15.9656 6.20536 15.9967 6.11083 15.9993 6.0134C16.002 5.91597 15.9761 5.81989 15.9249 5.73698C15.8737 5.65406 15.7993 5.58793 15.711 5.5467L8.211 2.0467ZM8 8.4597L1.758 5.9647L8 3.0517L14.242 5.9647L8 8.4597Z"
                                        fill="#64748B" />
                                    <path
                                        d="M4.176 9.0321C4.11162 9.00784 4.04292 8.99714 3.97421 9.00065C3.9055 9.00416 3.83825 9.02182 3.77668 9.05251C3.7151 9.08321 3.66053 9.12628 3.61636 9.17903C3.57219 9.23179 3.53939 9.29309 3.52 9.3591L3.02 11.0591C2.98498 11.1784 2.9957 11.3066 3.05006 11.4184C3.10442 11.5303 3.19853 11.6179 3.314 11.6641L7.814 13.4641C7.93339 13.5119 8.06662 13.5119 8.186 13.4641L12.686 11.6641C12.8015 11.6179 12.8956 11.5303 12.9499 11.4184C13.0043 11.3066 13.015 11.1784 12.98 11.0591L12.48 9.3591C12.4606 9.29309 12.4278 9.23179 12.3836 9.17903C12.3395 9.12628 12.2849 9.08321 12.2233 9.05251C12.1618 9.02182 12.0945 9.00416 12.0258 9.00065C11.9571 8.99714 11.8884 9.00784 11.824 9.0321L8 10.4661L4.176 9.0321ZM4.108 10.9051L4.328 10.1571L7.824 11.4681C7.93746 11.5108 8.06255 11.5108 8.176 11.4681L11.672 10.1571L11.892 10.9051L8 12.4601L4.108 10.9051Z"
                                        fill="#64748B" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_8175_5628">
                                        <rect width="16" height="16" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                        <h2 class="mb-0">Таълим</h2>
                    </div>
                </div>

                @forelse($myLearning as $learning)
                    <div class="col-xl-3 col-md-6 col-12">
                        <!-- Card -->
                        <div class="card">
                            <a href="#"><img src="{{ route('files.show', $learning->purchasable->thumbnail?->id) }}" alt="course" class="card-img-top" /></a>
                            <!-- Card body -->
                            <div class="card-body d-flex flex-column gap-3">
                                <h3 class="h4 mb-0"><a href="#" class="text-inherit">{{$learning->purchasable->title}}</a></h3>

                                <div class="d-flex flex-column gap-2">
                                    <div class="d-flex flex-row justify-content-between align-items-center">
                                        <span class="text-truncate">0 of 10 lessons completed...</span>
                                        <span class="fw-bold">0%</span>
                                    </div>
                                    <div class="progress" style="height: 6px">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 35%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div>
                                    <span class="badge bg-light-subtle border rounded-pill text-secondary">Not Started</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-info text-center">
                                Фаол курслар мавжуд эмас
                            </div>
                        </div>
                    @endforelse

            </div>
            <div class="row mb-5">
                <div class="col-12">
                    <div class="d-flex flex-md-row flex-column align-items-md-center justify-content-md-between gap-md-0 gap-2 mb-4">
                        <div class="d-flex flex-row align-items-center gap-2 lh-1">
                            <div>
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_8175_5628)">
                                        <path
                                            d="M8.211 2.0467C8.14491 2.01594 8.07289 2 8 2C7.9271 2 7.85508 2.01594 7.789 2.0467L0.288996 5.5467C0.200678 5.58793 0.126334 5.65406 0.0751066 5.73698C0.0238794 5.81989 -0.00199738 5.91597 0.000658795 6.0134C0.00331497 6.11083 0.0343882 6.20536 0.0900571 6.28536C0.145726 6.36536 0.223563 6.42735 0.313996 6.4637L7.814 9.4637C7.93338 9.51155 8.06661 9.51155 8.186 9.4637L14 7.1397V12.9997C13.7348 12.9997 13.4804 13.1051 13.2929 13.2926C13.1054 13.4801 13 13.7345 13 13.9997V15.9997H16V13.9997C16 13.7345 15.8946 13.4801 15.7071 13.2926C15.5196 13.1051 15.2652 12.9997 15 12.9997V6.7387L15.686 6.4637C15.7764 6.42735 15.8543 6.36536 15.9099 6.28536C15.9656 6.20536 15.9967 6.11083 15.9993 6.0134C16.002 5.91597 15.9761 5.81989 15.9249 5.73698C15.8737 5.65406 15.7993 5.58793 15.711 5.5467L8.211 2.0467ZM8 8.4597L1.758 5.9647L8 3.0517L14.242 5.9647L8 8.4597Z"
                                            fill="#64748B" />
                                        <path
                                            d="M4.176 9.0321C4.11162 9.00784 4.04292 8.99714 3.97421 9.00065C3.9055 9.00416 3.83825 9.02182 3.77668 9.05251C3.7151 9.08321 3.66053 9.12628 3.61636 9.17903C3.57219 9.23179 3.53939 9.29309 3.52 9.3591L3.02 11.0591C2.98498 11.1784 2.9957 11.3066 3.05006 11.4184C3.10442 11.5303 3.19853 11.6179 3.314 11.6641L7.814 13.4641C7.93339 13.5119 8.06662 13.5119 8.186 13.4641L12.686 11.6641C12.8015 11.6179 12.8956 11.5303 12.9499 11.4184C13.0043 11.3066 13.015 11.1784 12.98 11.0591L12.48 9.3591C12.4606 9.29309 12.4278 9.23179 12.3836 9.17903C12.3395 9.12628 12.2849 9.08321 12.2233 9.05251C12.1618 9.02182 12.0945 9.00416 12.0258 9.00065C11.9571 8.99714 11.8884 9.00784 11.824 9.0321L8 10.4661L4.176 9.0321ZM4.108 10.9051L4.328 10.1571L7.824 11.4681C7.93746 11.5108 8.06255 11.5108 8.176 11.4681L11.672 10.1571L11.892 10.9051L8 12.4601L4.108 10.9051Z"
                                            fill="#64748B" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_8175_5628">
                                            <rect width="16" height="16" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <h3 class="mb-0">My Learning Paths</h3>
                        </div>
                        <div>
                            <a href="#!" class="btn btn-primary">
                  <span>
                    <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path
                          d="M6.293 0.706849C6.10545 0.894342 6.00006 1.14865 6 1.41385V3.99985H1C0.734784 3.99985 0.48043 4.10521 0.292893 4.29274C0.105357 4.48028 0 4.73463 0 4.99985V8.99985C0 9.26507 0.105357 9.51942 0.292893 9.70696C0.48043 9.89449 0.734784 9.99985 1 9.99985H6V15.9998H8V9.99985H11.532C11.6786 9.99979 11.8233 9.96752 11.9561 9.90531C12.0888 9.8431 12.2062 9.75247 12.3 9.63985L14.233 7.31985C14.3078 7.23001 14.3488 7.11678 14.3488 6.99985C14.3488 6.88292 14.3078 6.76969 14.233 6.67985L12.3 4.35985C12.2062 4.24723 12.0888 4.1566 11.9561 4.09439C11.8233 4.03218 11.6786 3.9999 11.532 3.99985H8V1.41385C7.99996 1.2161 7.94129 1.0228 7.8314 0.858391C7.72152 0.693981 7.56535 0.565841 7.38265 0.490171C7.19995 0.414501 6.99892 0.394698 6.80497 0.433266C6.61102 0.471834 6.43285 0.56704 6.293 0.706849Z"
                          fill="white" />
                    </svg>
                  </span>
                                <span class="ms-1">Create New</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body d-flex flex-column gap-4">
                            <div class="d-flex flex-row gap-3 align-items-center">
                                <h4 class="mb-0">Frontend Developer</h4>
                                <div class="d-flex flex-row">
                                    <a href="#!" class="btn-icon btn btn-ghost btn-sm rounded-circle" data-bs-toggle="tooltip" data-placement="top" title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                            <path
                                                d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                        </svg>
                                    </a>
                                    <a href="#!" class="btn-icon btn btn-ghost btn-sm rounded-circle" data-bs-toggle="tooltip" data-placement="top" title="Share">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-share" viewBox="0 0 16 16">
                                            <path
                                                d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.5 2.5 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5m-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3m11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="row align-items-center gy-5 gy-lg-0">
                                <div class="col-lg-6 col-12">
                                    <div class="d-flex flex-column gap-4">
                                        <div class="d-flex flex-column gap-2">
                                            <span class="mb-0 h5">CSS</span>
                                            <div class="progress" style="height: 6px">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 9%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column gap-2">
                                            <span class="mb-0 h5">HTML</span>
                                            <div class="progress" style="height: 6px">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 70%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column gap-2">
                                            <span class="mb-0 h5">Javascript</span>
                                            <div class="progress" style="height: 6px">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 9%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div id="languageExpenseChart"></div>
                                </div>
                                <div class="col-12">
                                    <div>
                                        <a href="../pages/learning-path-single.html" class="btn btn-primary">Resume Learning</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row gap-4">
                <div class="col-12">
                    <div class="d-flex flex-row align-items-center gap-2 lh-1">
                        <div class="align-middle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-briefcase" viewBox="0 0 16 16">
                                <path
                                    d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5m1.886 6.914L15 7.151V12.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V7.15l6.614 1.764a1.5 1.5 0 0 0 .772 0M1.5 4h13a.5.5 0 0 1 .5.5v1.616L8.129 7.948a.5.5 0 0 1-.258 0L1 6.116V4.5a.5.5 0 0 1 .5-.5" />
                            </svg>
                        </div>
                        <h3 class="mb-0">My Projects</h3>
                    </div>
                </div>
                <div class="col-12">
                    <div class="border-dashed py-6 text-center rounded-3 px-4 px-md-7 px-lg-0">
                        <div class="bg-gray-300 rounded-circle icon-shape icon-xl mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-briefcase text-secondary" viewBox="0 0 16 16">
                                <path
                                    d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5m1.886 6.914L15 7.151V12.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V7.15l6.614 1.764a1.5 1.5 0 0 0 .772 0M1.5 4h13a.5.5 0 0 1 .5.5v1.616L8.129 7.948a.5.5 0 0 1-.258 0L1 6.116V4.5a.5.5 0 0 1 .5-.5" />
                            </svg>
                        </div>
                        <div class="d-flex flex-column gap-2 mb-4">
                            <h3 class="mb-0 h2">Real World Projects</h3>
                            <p class="mb-0">Apply your knowledge to real scenarios in a practical environment. Engage with real-world challenges.</p>
                        </div>
                        <div>
                            <a href="#!" class="btn btn-success">Start Projects</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-layouts.instructor.layout>
