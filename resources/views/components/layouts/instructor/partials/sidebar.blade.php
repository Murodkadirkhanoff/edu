{{-- Instructor Sidebar --}}
<div class="position-relative">
    <nav class="navbar navbar-expand-lg sidenav sidenav-navbar">
        {{-- Menu Title --}}
        <a class="d-xl-none d-lg-none d-block text-inherit fw-bold" href="#">Menu</a>

        {{-- Mobile Toggle Button --}}
        <button
            class="navbar-toggler d-lg-none icon-shape icon-sm rounded bg-primary text-light"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#sidenavNavbar"
            aria-controls="sidenavNavbar"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="fe fe-menu"></span>
        </button>

        {{-- Sidebar Content --}}
        <div class="collapse navbar-collapse" id="sidenavNavbar">
            <div class="navbar-nav flex-column mt-4 mt-lg-0 d-flex flex-column gap-3">
                {{-- Main Navigation --}}
                <ul class="list-unstyled mb-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('instructor.dashboard') ? 'active' : '' }}"
                           href="{{ route('instructor.dashboard') }}">
                            <i class="fe fe-home nav-icon"></i>
                            Бошқарув панели
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('instructor.courses.index')}}">
                            <i class="fe fe-book nav-icon"></i>
                           Менинг Курсларим
                        </a>
                    </li>
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="../pages/instructor-reviews.html">--}}
{{--                            <i class="fe fe-star nav-icon"></i>--}}
{{--                            Reviews--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="../pages/instructor-earning.html">--}}
{{--                            <i class="fe fe-pie-chart nav-icon"></i>--}}
{{--                            Earnings--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="../pages/instructor-order.html">--}}
{{--                            <i class="fe fe-shopping-bag nav-icon"></i>--}}
{{--                            Orders--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="../pages/instructor-students.html">--}}
{{--                            <i class="fe fe-users nav-icon"></i>--}}
{{--                            Students--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="../pages/instructor-payouts.html">--}}
{{--                            <i class="fe fe-dollar-sign nav-icon"></i>--}}
{{--                            Payouts--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="../pages/instructor-quiz.html">--}}
{{--                            <i class="fe fe-help-circle nav-icon"></i>--}}
{{--                            Quiz--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="../pages/instructor-quiz-result.html">--}}
{{--                            <i class="fe fe-help-circle nav-icon"></i>--}}
{{--                            Quiz Result--}}
{{--                        </a>--}}
{{--                    </li>--}}
                </ul>

                {{-- Account Settings Section --}}
                <div class="d-flex flex-column gap-1">
                    <span class="navbar-header">Аккаунт созламалари</span>

                    <ul class="list-unstyled mb-0">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('profile')}}">
                                <i class="fe fe-settings nav-icon"></i>
                                Профилни тахрирлаш
                            </a>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="../pages/security.html">--}}
{{--                                <i class="fe fe-user nav-icon"></i>--}}
{{--                                Security--}}
{{--                            </a>--}}
{{--                        </li>--}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('social-profiles')}}">
                                <i class="fe fe-refresh-cw nav-icon"></i>
                                Ижтимоий тармоқ профиллари
                            </a>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="../pages/notifications.html">--}}
{{--                                <i class="fe fe-bell nav-icon"></i>--}}
{{--                                Notifications--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="../pages/profile-privacy.html">--}}
{{--                                <i class="fe fe-lock nav-icon"></i>--}}
{{--                                Profile Privacy--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="../pages/delete-profile.html">--}}
{{--                                <i class="fe fe-trash nav-icon"></i>--}}
{{--                                Delete Profile--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="../pages/linked-accounts.html">--}}
{{--                                <i class="fe fe-user nav-icon"></i>--}}
{{--                                Linked Accounts--}}
{{--                            </a>--}}
{{--                        </li>--}}
                        <li class="nav-item">
                            <a class="nav-link" href="../index.html">
                                <i class="fe fe-power nav-icon"></i>
                                Тизимдан чиқиш
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>
