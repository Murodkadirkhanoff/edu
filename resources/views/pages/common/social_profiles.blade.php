<x-layouts.instructor.layout>
    <div class="db-content">
        <div class="container mb-4">
            <div class="row mb-5">
                <div class="col-12">
                    <h1 class="h2 mb-0">Ижтимоий тармоқ профиллари</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Card -->
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header">
                            <h3 class="mb-0">Ижтимоий тармоқ профиллари</h3>
                            <p class="mb-0">Ижтимоий тармоқдаги профил маълумотларни киритиш</p>
                        </div>
                        <form action="{{route('social-profiles')}}" method="POST">
                            @csrf
                            <div class="card-body">

                                <!-- Twitter -->
                                <div class="row mb-5">
                                    <div class="col-lg-3 col-md-4 col-12">
                                        <h5>Twitter</h5>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-12">
                                        <div class="input-group mb-1">
                                            <span class="input-group-text bg-light"><i
                                                    class="bi bi-twitter text-primary"></i></span>
                                            <input type="text" value="{{auth()->user()->socialProfile->twitter_profile}}" name="twitter_profile" class="form-control"
                                                   placeholder="Twitter Profile Name"/>
                                        </div>
                                        <small>Twitter тармоғидаги фойдаланувчи номини киритинг</small>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-lg-3 col-md-4 col-12">
                                        <h5>Telegram</h5>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-12">
                                        <div class="input-group mb-1">
                                            <span class="input-group-text bg-light"><i
                                                    class="bi bi-telegram text-primary"></i></span>
                                            <input type="text" value="{{auth()->user()->socialProfile->telegram_profile}}" name="telegram_profile" class="form-control"
                                                   placeholder="Telegram Profile Name"/>
                                        </div>
                                        <small>Telegram тармоғидаги фойдаланувчи/гурух/канал номини киритинг</small>
                                    </div>
                                </div>

                                <!-- Facebook -->
                                <div class="row mb-5">
                                    <div class="col-lg-3 col-md-4 col-12">
                                        <h5>Facebook</h5>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-12">
                                        <div class="input-group mb-1">
                                            <span class="input-group-text bg-light"><i
                                                    class="bi bi-facebook text-primary"></i></span>
                                            <input type="text" value="{{auth()->user()->socialProfile->facebook_profile}}" class="form-control" placeholder="Facebook Profile Name"
                                                   id="socialProfileFacebook" name="facebook_profile"/>
                                        </div>
                                        <small>Facebook тармоғидаги фойдаланувчи номини киритинг</small>
                                    </div>
                                </div>

                                <!-- Instagram -->
                                <div class="row mb-5">
                                    <div class="col-lg-3 col-md-4 col-12">
                                        <h5>Instagram</h5>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-12">
                                        <div class="input-group mb-1">
                                            <span class="input-group-text bg-light"><i
                                                    class="bi bi-instagram text-danger"></i></span>
                                            <input type="text" value="{{auth()->user()->socialProfile->instagram_profile}}" class="form-control" placeholder="Instagram Profile Name"
                                                   id="socialProfileInstagram" name="instagram_profile"/>
                                        </div>
                                        <small>Instagram тармоғидаги фойдаланувчи номини киритинг</small>
                                    </div>
                                </div>

                                <!-- LinkedIn -->
                                <div class="row mb-5">
                                    <div class="col-lg-3 col-md-4 col-12">
                                        <h5>LinkedIn</h5>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-12">
                                        <div class="input-group mb-1">
                                            <span class="input-group-text bg-light"><i
                                                    class="bi bi-linkedin text-primary"></i></span>
                                            <input type="text" class="form-control" value="{{auth()->user()->socialProfile->linkedin_profile}}" placeholder="LinkedIn Profile URL"
                                                   id="socialProfileLinkedin" name="linkedin_profile"/>
                                        </div>
                                        <small>LinkedIn тармоғидаги профил URL манзилини киритинг (мисол учун,
                                            https://www.linkedin.com/in/alex-smith-12345678)</small>
                                    </div>
                                </div>

                                <!-- YouTube -->
                                <div class="row mb-3">
                                    <div class="col-lg-3 col-md-4 col-12">
                                        <h5>YouTube</h5>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-12">
                                        <div class="input-group mb-1">
                                            <span class="input-group-text bg-light"><i
                                                    class="bi bi-youtube text-danger"></i></span>
                                            <input type="text" value="{{auth()->user()->socialProfile->youtube_profile}}" class="form-control" placeholder="YouTube URL"
                                                   id="socialProfileYoutube" name="youtube_profile"/>
                                        </div>
                                        <small>YouTube платформасидаги профил URL манзили</small>
                                    </div>
                                </div>

                                <!-- Button -->
                                <div class="row">
                                    <div class="offset-lg-3 col-lg-6 col-12">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bi bi-save me-2"></i> Сақлаш
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.instructor.layout>
