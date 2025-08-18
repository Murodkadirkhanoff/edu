{{-- Instructor Top Navigation --}}
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid px-0">
        {{-- Logo --}}
        <x-forms.logo />

        {{-- Mobile view nav wrap --}}
        <div class="ms-auto d-flex align-items-center order-lg-3">
            {{-- Theme Toggle --}}


            {{-- Notifications --}}
            <ul class="navbar-nav navbar-right-wrap ms-2 flex-row d-none d-md-block">
                <li class="dropdown d-inline-block stopevent position-static">
                    <a
                        class="btn btn-light btn-icon rounded-circle indicator indicator-primary"
                        href="#"
                        role="button"
                        id="dropdownNotificationSecond"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">
                        <i class="fe fe-bell"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-lg position-absolute mx-3 my-5"
                         aria-labelledby="dropdownNotificationSecond">
                        <x-layouts.instructor.partials.notifications />
                    </div>
                </li>

                {{-- User Profile Dropdown --}}
                <li class="dropdown ms-2 d-inline-block position-static">
                    <a class="rounded-circle" href="#" data-bs-toggle="dropdown" data-bs-display="static"
                       aria-expanded="false">
                        <div class="avatar avatar-md avatar-indicators avatar-online">
                            <img alt="avatar" src="../assets/images/avatar/avatar-1.jpg" class="rounded-circle"/>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end position-absolute mx-3 my-5">
                        <x-layouts.instructor.partials.user-menu />
                    </div>
                </li>
            </ul>
        </div>

        {{-- Mobile Toggle Button --}}
        <div>
            <button
                class="navbar-toggler collapsed ms-2"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbar-default"
                aria-controls="navbar-default"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="icon-bar top-bar mt-0"></span>
                <span class="icon-bar middle-bar"></span>
                <span class="icon-bar bottom-bar"></span>
            </button>
        </div>
    </div>
</nav>
