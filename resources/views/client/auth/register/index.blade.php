@extends('provider.layouts.login')

@section('content')
    <script>
        window.addEventListener("load", function(event) {
            document.getElementById('loginLogo').src = '/assets/imgs/template/marketing-black.png';
        });
    </script>
    <style>
        @media only screen and (max-width: 991px) {
            body {
                overflow: hidden;
                height: 100vh;
            }

            .main {
                height: 93vh;
            }

            .gap-sb-3 {
                gap: 3rem;
            }
        }

        @media only screen and (min-width: 992px) {
            .main {
                height: 100vh;
                overflow: hidden;
            }

            .footer {
                position: absolute;
                bottom: 0;
                left: 0;
                width: 100%;
                z-index: 999999;
            }
        }
    </style>
    <main class="main d-flex align-items-center">
        <section class="section-box box-content-login">
            <div class="container">
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="box-form-register">
                            <h3 class="title-register">Добро пожаловать!</h3>
                            <form class="form-register" method="post" action="{{ route('client.register') }}">
                                @csrf
                                <!-- Xatolarni ko'rsatish uchun blok -->
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="row">
                                    <div class="form-group">
                                        <label>полное имя <span class="brand-1">*</span></label>
                                        <input type="text" name="responsible_person_name" id="responsible_person_name" class="form-control text-center" required>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Укажите название вашей компании <span class="brand-1">*</span></label>
                                            <input type="text" name="name" id="name" class="form-control text-center" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email <span class="brand-1">*</span></label>
                                            <input type="email" name="email" id="email" class="form-control text-center" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Телефон номер <span class="brand-1">*</span></label>
                                            <input type="text" name="phone_number" id="phone-number" class="form-control text-center" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Тип деятельности <span class="brand-1">*</span></label>
                                            <input type="text" name="type_of_activity" id="activity-type" class="form-control text-center" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>Пароль <span class="brand-1">*</span></label>
                                            <input type="password" name="password" id="password" class="form-control text-center" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Подтверждение пароля <span class="brand-1">*</span></label>
                                            <input type="password" name="password_confirmation" id="password-confirmation" class="form-control text-center" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-black btn-rounded" style="color: #fff !important;">Зарегистрироваться
                                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="8" viewbox="0 0 23 8" fill="none">
                                                <path d="M22.5 4.00032L18.9791 0.479492V3.3074H0.5V4.69333H18.9791V7.52129L22.5 4.00032Z" fill="#ffffff"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 d-none d-sm-none d-lg-flex justify-content-center align-items-center">
                        <div class="box-image-banner-login">
                            <img src="/assets/imgs/page/login/banner.png" alt="DORA®">
                            <ul class="list-logos-login">
                                <li>
                                    <div class="item-logo"><img src="/assets/imgs/page/homepage3/logo2.png" alt="DORA®"></div>
                                </li>
                                <li>
                                    <div class="item-logo"><img src="/assets/imgs/page/homepage3/logo3.png" alt="DORA®"></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
