<x-layouts.auth.layout>
    <main>
        <section class="container d-flex flex-column vh-100">
            <div class="row align-items-center justify-content-center g-0 h-lg-100 py-8">
                <div class="col-lg-5 col-md-8 py-8 py-xl-0">
                    <div class="card">
                        <!-- Card Body -->
                        <div class="card-body">
                            <div>
                                <h4 class="mb-0">Профиль маълумотлари</h4>
                                <p class="mb-3">Давом этиш учун профиль маълумотларингизни киритинг.</p>
                                <!-- Form -->
                                <p class="text-muted small mb-2">
                                    <span class="text-danger">*</span> белгиси билан белгиланган майдонларни тўлдириш шарт.
                                </p>
                                <form class="row gx-3 needs-validation" action="{{route('profile.complete')}}" method="POST">
                                    @csrf
                                    <!-- First name -->
                                    <div class="mb-3 col-12 col-md-6">
                                        <label class="form-label" for="profileEditFname">Исм <span class="text-danger">*</span></label>
                                        <input type="text" id="profileEditFname" value="{{auth()->user()->first_name}}"
                                               name="first_name"
                                               class="form-control" placeholder="Исм" required/>
                                        <div class="invalid-feedback">Please enter first name.</div>
                                    </div>
                                    <!-- Last name -->
                                    <div class="mb-3 col-12 col-md-6">
                                        <label class="form-label" for="profileEditLname">Фамилия <span class="text-danger">*</span></label>
                                        <input type="text" id="profileEditLname" value="{{auth()->user()->last_name}}"
                                               name="last_name"
                                               class="form-control" placeholder="Фамилия" required/>
                                        <div class="invalid-feedback">Please enter last name.</div>
                                    </div>

                                    <div class="mb-3 col-12 col-md-6">
                                        <label class="form-label" for="profileEditLname">Электрон почта</label>
                                        <input type="text" id="profileEditLname" value="{{auth()->user()->last_name}}"
                                               name="email"
                                               class="form-control" placeholder="Электрон почта"/>
                                        <div class="invalid-feedback">Please enter email.</div>
                                    </div>

                                    <div class="col-12 mt-4">
                                        <!-- Button -->
                                        <button class="btn btn-primary" type="submit">Сақлаш</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-layouts.auth.layout>
