@push('styles')

@endpush

@push('scripts')
    <script src="{{ asset('assets/libs/imask/dist/imask.min.js') }}"></script>
    <script>
        const element = document.getElementById('phone-mask');
        if (element) {
            IMask(element, {
                mask: '+{998} 00 000 00 00'
            });
        }
    </script>
@endpush

<x-layouts.auth.layout>
    <main>
        <section class="container d-flex flex-column vh-100">
            <div class="row align-items-center justify-content-center g-0 h-lg-100 py-8">
                <div class="col-lg-5 col-md-8 py-8 py-xl-0">
                    <!-- Card -->
                    <div class="card shadow">
                        <!-- Card body -->
                        <div class="card-body p-6 d-flex flex-column gap-4">
                            <div>
                                <a href="{{route('main')}}"><img
                                        src="{{asset('assets/images/brand/logo/logo-icon.svg')}}" class="mb-4"
                                        alt="logo-icon"/></a>
                                <div class="d-flex flex-column gap-1">
                                    <h1 class="mb-0 fw-bold">Tizimga kirish</h1>

                                </div>
                            </div>


                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Form -->
                            <form class="needs-validation" method="POST" action="{{route("login")}}">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Telefon raqamini kiriting !</label>
                                    <input class="form-control" id="phone-mask" placeholder="+998 12 345 67 89" name="phone_number" type="text" value="">
                                </div>
{{--                                <div class="mb-3">--}}
{{--                                    <label class="form-label">Role</label>--}}
{{--                                    <select name="role" id="" class="form-select">--}}
{{--                                        <option value="{{\App\Enums\Roles::ADMIN->value}}">{{\App\Enums\Roles::ADMIN->value}}</option>--}}
{{--                                        <option value="{{\App\Enums\Roles::INSTRUCTOR->value}}">{{\App\Enums\Roles::INSTRUCTOR->value}}</option>--}}
{{--                                        <option value="{{\App\Enums\Roles::STUDENT->value}}">{{\App\Enums\Roles::STUDENT->value}}</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
                                <div>
                                    <!-- Button -->
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Kirish</button>
                                    </div>
                                </div>
                            </form>

{{--                            <a href="tg://resolve?domain=chashma_authorization_bot/">Login with telegram</a>--}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-layouts.auth.layout>
