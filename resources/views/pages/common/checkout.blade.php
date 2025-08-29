<x-layouts.app.layout>

    <main>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="container py-6">
            <div class="row">
                {{--            <div class="col-xl-8 col-lg-8 col-md-12 col-12">--}}
                {{--                <div class="card card-body">--}}
                {{--                    <form class="row mb-4" {{route('checkout', ['course' => $course])}} method="POST">--}}
                {{--                        @csrf--}}

                {{--                        <input type="hidden" name="items[0][purchasable_type]" value="course">--}}
                {{--                        <input type="hidden" name="items[0][purchasable_id]" value="{{$course->id}}">--}}

                {{--                        <div class="mb-3 col-12 col-md-12 mb-4">--}}
                {{--                            <h5 class="mb-3">To'lov turini tanlang</h5>--}}
                {{--                            <!-- Radio button -->--}}
                {{--                            <div class="d-inline-flex">--}}
                {{--                                <div class="form-check me-2">--}}
                {{--                                    <input type="radio" id="paymentRadioOne" name="payment_method" value="payme" class="form-check-input" required>--}}
                {{--                                    <label class="form-check-label"  for="paymentRadioOne">--}}
                {{--                                        <img class="w-25" src="{{ asset('payme.svg') }}" alt="">--}}
                {{--                                    </label>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}

                {{--                        <!-- Button -->--}}
                {{--                        <div class="col-md-6 col-12">--}}
                {{--                            <button class="btn btn-primary" type="submit">Тўловга ўтиш</button>--}}
                {{--                            <button class="btn btn-outline-secondary" type="button" data-bs-dismiss="modal">Close</button>--}}
                {{--                        </div>--}}
                {{--                    </form>--}}
                {{--                    <span>--}}
                {{--                                                                <strong>Note:</strong>--}}
                {{--                                                                that you can later remove your card at the account setting page.--}}
                {{--                                                            </span>--}}
                {{--                </div>--}}
                {{--            </div>--}}
                <div class="col-4 offset-4">
                    <!-- Card -->
                    <div class="card shadow shadow-lg mb-3">
                        <!-- Card body -->
                        <div class="p-5 text-center">
                            <span class="badge bg-warning">{{$course->childCategory()->title}}</span>
                            <div class="mb-5 mt-3">
                                <h1 class="fw-bold">{{$course->title}}</h1>
                                <p class="mb-0">
                                    Access all
                                    <span
                                        class="text-dark fw-medium">premium courses, workshops, and mobile apps.</span>
                                    Renewed monthly.
                                </p>
                            </div>
                            <div class="d-flex justify-content-center">
                                <div class="display-4 fw-bold text-primary">{{$course->formattedWholePrice}}</div>
                            </div>
                        </div>
                        <hr class="m-0">
                        <div class="p-5">
                            <h4 class="fw-bold mb-4">Курс хақида маълумот:</h4>
                            <!-- List -->
                            <ul class="list-unstyled mb-0">
                                <li class="mb-1">
                      <span class="me-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                             class="bi bi-check-circle text-success" viewBox="0 0 16 16">
                          <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                          <path
                              d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"></path>
                        </svg>
                      </span>
                                    <span>10 та модул</span>
                                </li>
                                <li class="mb-1">
                      <span class="me-1">
                        <span class="me-1">
                          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                               class="bi bi-check-circle text-success" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                            <path
                                d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"></path>
                          </svg>
                        </span>
                        <span>
                          <span class="fw-bold text-dark">25 та видео</span>
                        </span>
                      </span>
                                </li>
                                <li class="mb-1">
                      <span class="me-1">
                        <span class="me-1">
                          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                               class="bi bi-check-circle text-success" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                            <path
                                d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"></path>
                          </svg>
                        </span>
                        <span>
                          <span class="fw-bold text-dark">20 та бириктирилган файллар</span>
                        </span>
                      </span>
                                </li>
                                <li class="mb-1">
                      <span class="me-1">
                        <span class="me-1">
                          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                               class="bi bi-check-circle text-success" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                            <path
                                d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"></path>
                          </svg>
                        </span>
                        <span>Курсга чексиз кириш имконият</span>
                      </span>
                                </li>

                            </ul>
                        </div>

                        <hr class="m-0">
                        <div class="p-4">
                            <form class="row mb-4" {{route('checkout', ['course' => $course])}} method="POST">
                                @csrf

                                <input type="hidden" name="items[0][purchasable_type]" value="course">
                                <input type="hidden" name="items[0][purchasable_id]" value="{{$course->id}}">

                                <div class="mb-3 col-12 col-md-12 mb-4">
                                    <h5 class="mb-3">Тўлов турини танланг</h5>
                                    <!-- Radio button -->
                                    <div class="d-inline-flex">
                                        <div class="form-check me-2">
                                            <input type="radio" id="paymentRadioOne" name="payment_method" value="payme"
                                                   class="form-check-input" required>
                                            <label class="form-check-label" for="paymentRadioOne">
                                                <img class="w-25" src="{{ asset('payme.svg') }}" alt="">
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Button -->
                                <div class="col-md-6 col-12 mt-4">
                                    <button class="btn btn-primary" type="submit">Тўловга қилиш</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </main>


</x-layouts.app.layout>
