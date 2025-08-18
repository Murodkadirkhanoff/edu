<div class="container border-bottom mt-2 pb-2">
    <div class="row">
        <div class="col">
            <div class="d-flex align-items-center gap-4">
                <div class="d-flex gap-2 align-items-center lh-0 d-none d-md-block">
                                    <span class="">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                           class="bi bi-clock-history" viewBox="0 0 16 16">
                                        <path
                                            d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022zm2.004.45a7 7 0 0 0-.985-.299l.219-.976q.576.129 1.126.342zm1.37.71a7 7 0 0 0-.439-.27l.493-.87a8 8 0 0 1 .979.654l-.615.789a7 7 0 0 0-.418-.302zm1.834 1.79a7 7 0 0 0-.653-.796l.724-.69q.406.429.747.91zm.744 1.352a7 7 0 0 0-.214-.468l.893-.45a8 8 0 0 1 .45 1.088l-.95.313a7 7 0 0 0-.179-.483m.53 2.507a7 7 0 0 0-.1-1.025l.985-.17q.1.58.116 1.17zm-.131 1.538q.05-.254.081-.51l.993.123a8 8 0 0 1-.23 1.155l-.964-.267q.069-.247.12-.501m-.952 2.379q.276-.436.486-.908l.914.405q-.24.54-.555 1.038zm-.964 1.205q.183-.183.35-.378l.758.653a8 8 0 0 1-.401.432z"/>
                                        <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0z"/>
                                        <path
                                            d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5"/>
                                      </svg>
                                    </span>
                    <span class="fs-6 fw-medium">Murojaat vaqti: Dushanba-Juma 9:00-18:00</span>
                </div>
                <div class="d-flex gap-2 align-items-center lh-0">
                                    <span>
                                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                           class="bi bi-telephone-forward" viewBox="0 0 16 16">
                                        <path
                                            d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877zm10.762.135a.5.5 0 0 1 .708 0l2.5 2.5a.5.5 0 0 1 0 .708l-2.5 2.5a.5.5 0 0 1-.708-.708L14.293 4H9.5a.5.5 0 0 1 0-1h4.793l-1.647-1.646a.5.5 0 0 1 0-.708"/>
                                      </svg>
                                    </span>
                    <span class="fs-6 fw-medium">0123 456 789</span>
                </div>
            </div>
        </div>
        <div class="col-auto">
            <div class="d-flex align-items-center gap-4">
                @guest
                    <div class="d-flex gap-2 align-items-center lh-0 d-none d-md-block">
                                    <span>
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                           class="bi bi-person-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                      </svg>
                                    </span>
                        <a href="{{route('login')}}" class="text-inherit fs-5 fw-medium">Tizimga kirish</a>
                    </div>
                @endguest

                @auth
                        <div class="d-flex gap-2 align-items-center lh-0">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                     class="bi bi-layout-text-sidebar-reverse" viewBox="0 0 16 16">
  <path d="M1 2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2zm12 0H2v12h11V2z"/>
  <path d="M15 2H5v12h10V2zm-4.5 1h3a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zM11 6h3a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zM11 9h3a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/>
</svg>
                            </span>
                            <a href="{{ route('admin.dashboard') }}" class="text-inherit fs-5 fw-medium">Админ-панель</a>
                        </div>

                        <div class="d-flex gap-2 align-items-center lh-0">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                     class="bi bi-mortarboard" viewBox="0 0 16 16">
                                    <path d="M8 0L0 4l8 4 6.25-3.125V8l.75.375V4z"/>
                                    <path d="M4.5 9.5v2.5s1.5 1 3.5 1 3.5-1 3.5-1V9.5L8 11l-3.5-1.5z"/>
                                </svg>
                            </span>
                            <a href="{{ route('instructor.dashboard') }}" class="text-inherit fs-5 fw-medium">Инструктор</a>
                        </div>

                    <div class="d-flex gap-2 align-items-center lh-0">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                <path fill-rule="evenodd"
                                      d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37
                                      C3.242 11.226 5.52 10 8 10s4.757 1.226
                                      5.468 2.37A7 7 0 0 0 8 1"/>
                            </svg>
                        </span>
                        <a href="{{ route('profile') }}" class="text-inherit fs-5 fw-medium">Профиль</a>
                    </div>
                @endauth

            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg bg-white">
    <div class="container px-0">
        <a class="navbar-brand" href="{{route('main')}}"><img src="../assets/images/brand/logo/logo.svg"
                                                              alt="Geeks"/></a>
        <!-- Mobile view nav wrap -->
        @auth
            <div class="ms-auto d-flex align-items-center order-lg-3">
                <a href="../pages/sign-up.html" class="btn btn-primary">Тизимдан чиқиш</a>
            </div>
        @endauth
        <div>
            <!-- Button -->
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
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="navbar-default">
            <ul class="navbar-nav mt-3 mt-lg-0 mx-xxl-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarBrowse" data-bs-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false" data-bs-display="static">Kurslar</a>
                    <ul class="dropdown-menu dropdown-menu-arrow" aria-labelledby="navbarBrowse">
                        @foreach(\App\Models\Category::whereNull('parent_id')->get() as $category)
                            @php $hasChildren = $category->children()->exists(); @endphp

                            @if ($hasChildren)
                                <li class="dropdown-submenu dropend">
                                    <a class="dropdown-item dropdown-list-group-item dropdown-toggle" href="#">
                                        {{ $category->title }}
                                    </a>
                                    <ul class="dropdown-menu">
                                        @foreach($category->children as $child)
                                            <li>
                                                <a class="dropdown-item"
                                                   href="{{route('categories.show', $child)}}">
                                                    {{ $child->title }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                                <li>
                                    <a href="#"
                                       class="dropdown-item">
                                        {{ $category->title }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>

                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('about')}}">Biz haqimizda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('support')}}">Biz haqimizda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('contacts')}}">Kontaktlar</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
