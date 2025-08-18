<x-layouts.app.layout>
    <div class="db-content">
        <div class="container mb-4">
            <div class="row mb-5">
                <div class="col-12">
                    <h1 class="h2 mb-0">Аккаунт</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Card -->
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header">
                            <h3 class="mb-0">Аккаунт маълумотлари</h3>
                            <p class="mb-0">Шахсий маълумотларни бошқариш учун сизда тўлиқ назорат мавжуд.</p>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="d-lg-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center mb-4 mb-lg-0">
                                    <img src="../assets/images/avatar/avatar-1.jpg" id="img-uploaded"
                                         class="avatar-xl rounded-circle" alt="avatar"/>
                                    <div class="ms-3">
                                        <h4 class="mb-0">Аватар</h4>
                                        <p class="mb-0">PNG ёки JPG. Кенглиги ва баландлиги 800px дан ошмаслиги
                                            керак.</p>
                                    </div>
                                </div>
                                <div>
                                    <a href="#" class="btn btn-outline-secondary btn-sm">Тахрирлаш</a>
                                    <a href="#" class="btn btn-outline-danger btn-sm">Ўчириш</a>
                                </div>
                            </div>
                            <hr class="my-5"/>
                            <div>
                                <h4 class="mb-0">Шахсий маълумотлар</h4>
                                <p class="mb-4">Шахсий маълумотларингиз ва манзилингизни таҳрирланг.</p>
                                <!-- Form -->
                                <form class="row gx-3 needs-validation" action="{{route('profile')}}" method="POST">
                                    @csrf
                                    <!-- First name -->
                                    <div class="mb-3 col-12 col-md-6">
                                        <label class="form-label" for="profileEditFname">Исм</label>
                                        <input type="text" id="profileEditFname" value="{{auth()->user()->first_name}}" name="first_name"
                                               class="form-control" placeholder="Исм" required/>
                                        <div class="invalid-feedback">Please enter first name.</div>
                                    </div>
                                    <!-- Last name -->
                                    <div class="mb-3 col-12 col-md-6">
                                        <label class="form-label" for="profileEditLname">Фамилия</label>
                                        <input type="text" id="profileEditLname" value="{{auth()->user()->last_name}}" name="last_name"
                                               class="form-control" placeholder="Фамилия Name" required/>
                                        <div class="invalid-feedback">Please enter last name.</div>
                                    </div>
                                    <!-- Phone -->
                                    <div class="mb-3 col-12 col-md-6">
                                        <label class="form-label" for="profileEditPhone">Телефон рақами</label>
                                        <input type="text" id="profileEditPhone" value="{{auth()->user()->phone_number}}" name="phone_number"
                                               class="form-control" placeholder="Phone" required />
                                        <div class="invalid-feedback">Please enter phone number.</div>
                                    </div>


                                    <div class="col-12">
                                        <!-- Button -->
                                        <button class="btn btn-primary" type="submit">Сақлаш</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app.layout>
