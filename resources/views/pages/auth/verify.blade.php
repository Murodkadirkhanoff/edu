@push('scripts')
    <script>
        const resendBtn = document.getElementById('resendBtn');
        const countdown = document.getElementById('countdown');
        const timerSpan = document.getElementById('timer');

        function startCountdown(duration = 60) {
            let timeLeft = duration;
            resendBtn.disabled = true;
            countdown.style.display = 'block';

            const interval = setInterval(() => {
                timeLeft--;
                timerSpan.textContent = timeLeft;
                if (timeLeft <= 0) {
                    clearInterval(interval);
                    countdown.style.display = 'none';
                    resendBtn.disabled = false;
                }
            }, 1000);
        }

        resendBtn.addEventListener('click', function () {
            const phoneNumber = document.querySelector('input[name="phone_number"]').value;

            // spinner
            resendBtn.querySelector('.spinner-border').classList.remove('d-none');
            resendBtn.querySelector('.resend-text').textContent = 'Yuborilmoqda...';

            fetch("{{ route('resend_otp') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ phone_number: phoneNumber })
            })
                .then(response => response.json())
                .then(data => {
                    alert(data.message); // optional
                    startCountdown();
                })
                .catch(error => {
                    alert('Xatolik yuz berdi.');
                })
                .finally(() => {
                    resendBtn.querySelector('.spinner-border').classList.add('d-none');
                    resendBtn.querySelector('.resend-text').textContent = 'Qayta yuborish';
                });
        });

        // Start timer on page load
        startCountdown();
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
                            <a href="{{ route('main') }}">
                                <img src="{{ asset('assets/images/brand/logo/logo-icon.svg') }}" class="mb-4" alt="logo-icon" />
                            </a>
                            <div class="d-flex flex-column gap-1">
                                <h1 class="mb-0 fw-bold">Telefon raqamni tasdiqlash</h1>
                                <span>
                                    <strong>{{ $phoneNumber ?? session('phone_number') }}</strong> raqamiga yuborilgan
                                    6 xonali kodni kiriting
                                </span>
                            </div>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('message'))
                            <div class="alert alert-info">
                                {{ session('message') }}
                            </div>
                        @endif

                        <!-- OTP Verification Form -->
                        <form method="POST" action="{{ route('verify_otp') }}" id="otpForm">
                            @csrf
                            <input type="hidden" name="phone_number" value="{{ $phone_number }}">

                            <!-- OTP Input -->
                            <div class="mb-4">
                                <label for="otp_code" class="form-label">
                                    Tasdiqlash kodi <span class="text-danger">*</span>
                                </label>
                                <input type="text"
                                       id="otp_code"
                                       name="otp_code"
                                       class="form-control text-center @error('otp_code') is-invalid @enderror"
                                       placeholder="000000"
                                       maxlength="6"
                                       pattern="[0-9]{6}"
                                       autocomplete="one-time-code"
                                       style="font-size: 2rem; letter-spacing: 1rem; font-weight: bold;"
                                       required
                                       autofocus />
                                @error('otp_code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">
                                    Telefoningizga yuborilgan 6 xonali kodni kiriting
                                </small>
                            </div>

                            <!-- Submit Button -->
                            <div class="mb-4">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary" id="verifyBtn">
                                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                        <span class="btn-text">Kodni tasdiqlash</span>
                                    </button>
                                </div>
                            </div>

                            <!-- Resend Section -->
                            <div class="text-center">
                                <p class="mb-2 text-muted">Kod kelmadimi?</p>

                                <!-- Resend Button -->
                                <button type="button"
                                        class="btn btn-link p-0 text-decoration-none"
                                        id="resendBtn"
                                >
                                    <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                    <span class="resend-text">Qayta yuborish</span>
                                </button>

                                <!-- Countdown Timer -->
                                <div id="countdown" class="text-muted small mt-2" style="display: none;">
                                    Qayta yuborish <span id="timer">60</span> soniyadan keyin mumkin
                                </div>
                            </div>
                        </form>

                        <!-- Back to Phone Input -->
                        <div class="text-center mt-4">
                            <hr class="my-3">
                            <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-arrow-left me-1"></i>
                                Boshqa raqam bilan kirish
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>


<style>
.form-control:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
}

.btn-primary {
    background-color: #0d6efd;
    border-color: #0d6efd;
}

.btn-primary:hover {
    background-color: #0b5ed7;
    border-color: #0a58ca;
}

.btn-link {
    color: #0d6efd;
}

.btn-link:hover {
    color: #0b5ed7;
}

.alert {
    border-radius: 0.5rem;
}

.card {
    border-radius: 1rem;
    border: none;
}

.form-label {
    font-weight: 500;
    color: #495057;
}

.text-muted {
    color: #6c757d !important;
}

#otp_code {
    border: 2px solid #dee2e6;
    border-radius: 0.75rem;
    transition: all 0.3s ease;
}

#otp_code:focus {
    border-color: #0d6efd;
    transform: scale(1.02);
}

.spinner-border-sm {
    width: 1rem;
    height: 1rem;
}

@keyframes pulse {
    0% { opacity: 1; }
    50% { opacity: 0.5; }
    100% { opacity: 1; }
}

.btn:disabled {
    animation: pulse 1.5s infinite;
}
</style>
</x-layouts.auth.layout>
