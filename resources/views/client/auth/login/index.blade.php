@extends('provider.layouts.login')

@section('title', 'Client Login')

@section('content')

<script>
    window.addEventListener("load", function (event) {
        document.getElementById('loginLogo').src = '/assets/imgs/template/marketing-black.png';
    });
</script>
<main class="main">
    <section class="section-box h-100 d-flex align-items-center" style="padding: 20% 0;">
        <div class="container">
            <div class="row align-items-center gap-sb-3 d-flex justify-content-center">
                <div class="col-lg-6 d-flex justify-content-center align-items-center">
                    <div class="box-form-register">
                        <h3 class="title-register">Добро пожаловать</h3>
                        <form class="form-register" method="POST" action="{{ route('client.login') }}">
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
                            <div class="form-group">
                                <label>Ваш логин <span class="brand-1">*</span></label>
                                <input class="form-control" type="text" name="email" required>
                            </div>
                            <div class="form-group">
                                <label>Ваш пароль <span class="brand-1">*</span></label>
                                <input class="form-control" name="password" type="password" required>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-black btn-rounded" style="color: #fff !important;">Войти
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="8" viewbox="0 0 23 8" fill="none">
                                        <path d="M22.5 4.00032L18.9791 0.479492V3.3074H0.5V4.69333H18.9791V7.52129L22.5 4.00032Z" fill="#ffffff"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="other-login">
                                <p class="text-md neutral-500">Нет аккаунта? &nbsp;<a class="brand-1-1" href="{{ route('register.client') }}">Зарегистрироваться</a></p>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-sm-none d-lg-flex justify-content-center align-items-center">
                    <div class="box-image-banner-login"><img src="/assets/imgs/page/login/banner.png" alt="Nivia">
                    <ul class="list-logos-login d-flex justify-content-center flex-wrap">
                        <li class="item-logo"><img src="/assets/imgs/page/homepage3/logo2.png" alt="Nivia"></li>
                        <li class="item-logo"><img src="/assets/imgs/page/homepage3/logo3.png" alt="Nivia"></li>
                        <li class="item-logo"><img src="/assets/imgs/page/homepage3/logo4.png" alt="Nivia"></li>
                        <li class="item-logo"><img src="/assets/imgs/page/homepage3/logo5.png" alt="Nivia"></li>
                        <li class="item-logo"><img src="/assets/imgs/page/homepage3/logo6.png" alt="Nivia"></li>
                        <li class="item-logo"><img src="/assets/imgs/page/homepage3/logo7.png" alt="Nivia"></li>
                        <li class="item-logo"><img src="/assets/imgs/page/homepage3/logo8.png" alt="Nivia"></li>
                        <li class="item-logo"><img src="/assets/imgs/page/homepage3/logo9.png" alt="Nivia"></li>
                        <li class="item-logo"><img src="/assets/imgs/page/homepage3/logo1.png" alt="Nivia"></li>
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<style>
    @media only screen and (max-width: 991px) {
        body {
            overflow: hidden;
            height: 100vh;
        }
        .main {
          height: 93vh;
        }
        .gap-sb-3{
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
        }
    }

    .d-flex {
        display: flex;
    }

    .justify-content-center {
        justify-content: center;
    }

    .align-items-center {
        align-items: center;
    }

    .flex-wrap {
        flex-wrap: wrap;
    }
</style>

@endsection
