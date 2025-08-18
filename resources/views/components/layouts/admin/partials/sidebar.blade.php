<nav class="navbar-vertical-compact">
    <!-- Brand logo -->
    <a class="navbar-brand" href="{{route('main')}}">
        <img src="../../../assets/images/brand/logo/logo-icon.svg" alt="Geeks" class="text-inverse" height="30"/>
    </a>
    <div class="h-100" data-simplebar>
        <!-- Navbar nav -->
        <ul class="navbar-nav flex-column" id="sideNavbar">

            <li class="nav-item">
                <a class="nav-link dropdownTooltip" href="{{ route('admin.dashboard') }}" data-template="admin.dashboard">
                        <span class="me-2">
                          <!-- Bar Chart icon -->
                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                               viewBox="0 0 24 24" fill="none" stroke="currentColor"
                               stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                               class="feather feather-bar-chart-2">
                            <line x1="18" y1="20" x2="18" y2="10"></line>
                            <line x1="12" y1="20" x2="12" y2="4"></line>
                            <line x1="6"  y1="20" x2="6"  y2="14"></line>
                          </svg>
                        </span>
                    <div id="admin.dashboard" class="d-none">
                        <span class="fw-semibold fs-6">Dashboard</span>
                    </div>
                </a>
            </li>




            <li class="nav-item dropdown dropend">
                <a class="nav-link" href="#" id="courseDropdown" role="button" data-bs-toggle="dropdown"
                   aria-expanded="false">
                    <i class="nav-icon fe fe-book"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="courseDropdown">
                    <li><span class="dropdown-header">Courses</span></li>
                    <li class="nav-item">
                        <a class="dropdown-item" href="{{route('admin.courses')}}">All
                            Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="dropdown-item" href="#">Courses
                            Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="dropdown-item" href="#">Category
                            Single</a>
                    </li>
                </ul>
            </li>





        </ul>
        <!-- Card -->
    </div>
</nav>
