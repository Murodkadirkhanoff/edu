{{-- Instructor Top Navigation --}}
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid px-0">
        {{-- Logo --}}
        <x-forms.logo />

        {{-- Mobile view nav wrap --}}
       <x-profile.nav-dropdowns />

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
