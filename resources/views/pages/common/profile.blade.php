<x-layouts.instructor.layout>
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


                            <x-profile.avatar-manager />





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
                                        <input type="text" id="profileEditFname" value="{{auth()->user()->first_name}}"
                                               name="first_name"
                                               class="form-control" placeholder="Исм" required/>
                                        <div class="invalid-feedback">Please enter first name.</div>
                                    </div>
                                    <!-- Last name -->
                                    <div class="mb-3 col-12 col-md-6">
                                        <label class="form-label" for="profileEditLname">Фамилия</label>
                                        <input type="text" id="profileEditLname" value="{{auth()->user()->last_name}}"
                                               name="last_name"
                                               class="form-control" placeholder="Фамилия" required/>
                                        <div class="invalid-feedback">Please enter last name.</div>
                                    </div>
                                    <!-- Phone -->
                                    <div class="mb-3 col-12 col-md-6">
                                        <label class="form-label" for="profileEditPhone">Телефон рақами</label>
                                        <input type="text" id="profileEditPhone"
                                               value="{{auth()->user()->phone_number}}" name="phone_number"
                                               class="form-control" placeholder="Phone" required/>
                                        <div class="invalid-feedback">Please enter phone number.</div>
                                    </div>

                                    <div class="mb-3 col-12 col-md-6">
                                        <label class="form-label" for="specialization">Мутахассислик</label>
                                        <input type="text" id="specialization"
                                               value="{{auth()->user()->specialization}}" name="specialization"
                                               class="form-control" placeholder="chashma.uz да ўқитувчи" required/>
                                        <div class="invalid-feedback">Please enter phone number.</div>
                                    </div>



                                    <div class="mb-auto col-12">
                                        <label class="form-label" for="specialization">Биография</label>
                                        <x-forms.quill-vertical
                                            name="biography"
                                            label="Биография киритинг"
                                            :value="old('biography')"
                                            required
                                            help-text="Ўқувчилар сиз ҳақингизда кўпроқ маълумотга эга бўлишлари учун, сизнинг таржимаи холингиз, иш тажрибангиз ва шахсиятиингизни кенгроқ ёритинг. Сизнинг таржимаи холиңиз камида 50 та сўздан иборат бўлиши шарт."
                                        />
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
        </div>
    </div>


    @push('scripts')
        <!-- Bootstrap JS + Preview Script -->
        <script>
            document.getElementById('avatar').addEventListener('change', function (e) {
                if (e.target.files && e.target.files[0]) {
                    let reader = new FileReader();
                    reader.onload = function (e) {
                        document.getElementById('avatarPreview').src = e.target.result;
                    }
                    reader.readAsDataURL(e.target.files[0]);
                }
            });
        </script>
    @endpush
</x-layouts.instructor.layout>
