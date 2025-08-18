{{-- User Profile Dropdown Menu --}}
<div class="dropdown-item">
    <div class="d-flex">
        <div class="avatar avatar-md avatar-indicators avatar-online">
            <img alt="avatar" src="../assets/images/avatar/avatar-1.jpg" class="rounded-circle"/>
        </div>
        <div class="ms-3 lh-1">
            <h5 class="mb-1">Annette Black</h5>
            <p class="mb-0">annette@geeksui.com</p>
        </div>
    </div>
</div>

<div class="dropdown-divider"></div>

<ul class="list-unstyled">
    {{-- Status Submenu --}}
    <li class="dropdown-submenu dropstart-lg">
        <a class="dropdown-item dropdown-list-group-item dropdown-toggle" href="#">
            <i class="fe fe-circle me-2"></i>
            Status
        </a>
        <ul class="dropdown-menu">
            <li>
                <a class="dropdown-item" href="#">
                    <span class="badge-dot bg-success me-2"></span>
                    Online
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="#">
                    <span class="badge-dot bg-secondary me-2"></span>
                    Offline
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="#">
                    <span class="badge-dot bg-warning me-2"></span>
                    Away
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="#">
                    <span class="badge-dot bg-danger me-2"></span>
                    Busy
                </a>
            </li>
        </ul>
    </li>
    
    {{-- Profile Links --}}
    <li>
        <a class="dropdown-item" href="../pages/profile-edit.html">
            <i class="fe fe-user me-2"></i>
            Profile
        </a>
    </li>
    <li>
        <a class="dropdown-item" href="../pages/student-subscriptions.html">
            <i class="fe fe-star me-2"></i>
            Subscription
        </a>
    </li>
    <li>
        <a class="dropdown-item" href="#">
            <i class="fe fe-settings me-2"></i>
            Settings
        </a>
    </li>
</ul>

<div class="dropdown-divider"></div>

<ul class="list-unstyled">
    <li>
        <a class="dropdown-item" href="../index.html">
            <i class="fe fe-power me-2"></i>
            Sign Out
        </a>
    </li>
</ul>
