@php use Illuminate\Support\Facades\Auth; @endphp
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#0E0E0E">
    <meta name="template-color" content="#0E0E0E">
    <meta name="description" content="Index page">
    <meta name="keywords" content="index, page">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="/assets/imgs/template/favicon.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
          integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="/assets/css/style.css?v=1.0.0" rel="stylesheet">
    <title>Маркетинговая Ассоциация Узбекистана - Marketing.uz | By DORA® System</title>
</head>

<body>
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="text-center"><img src="/assets/imgs/template/loading.gif" alt="DORA®"></div>
        </div>
    </div>
</div>
<header class="header header-style-2 header-style-4 sticky-bar">
    <div class="container">
        <div class="main-header">
            <div class="header-left">
                <div class="header-logo">
                    <a class="d-flex" href="/">
                        <img alt="Marketing" src="/assets/imgs/template/marketing-black.png" style="height: 50px;">
                    </a>
                </div>
                <div class="header-nav">
                    <nav class="nav-main-menu d-none d-xl-block">
                        <ul class="main-menu">
                            <li><a class="active" href="/">Главная</a></li>
                            <li><a href="{{ route('providers') }}">Поставщики услуг</a></li>
                            <li><a href="{{ route('marketers') }}">Маркетологи</a></li>
                            <li><a href="{{ route('partners') }}">Партнеры</a></li>
                            <li><a href="{{ route('contacts') }}">Контакты</a></li>
                            <li>
                                @auth
                                    @php
                                        $roleId = Auth::user()->role_id;
                                        $route = '';

                                        switch ($roleId) {
                                            case 2:
                                                $route = route('provider.dashboard');
                                                break;
                                            case 3:
                                                $route = route('client.dashboard');
                                                break;
                                            default:
                                                $route = route('default.dashboard');
                                                break;
                                        }
                                    @endphp
                                    <div class="dropdown nxl-h-item">
                                        <a class="hover_user py-4 d-flex align-items-center gap-3" href="javascript:void(0);" data-bs-toggle="dropdown" role="button" data-bs-auto-close="outside">
                                            {{ auth()->user()->name }}
                                            <img  width="50px"  src="{{ asset('storage/' . (Auth::user()->companies->first()->logo ?? 'default.png')) }}" alt="user-image" class="img-fluid user-avtar me-0 rounded-circle">
                                        </a>
                                        <div id="user_card" class="dropdown-menu dropdown-menu-end nxl-h-dropdown nxl-user-dropdown">
                                            <div class="dropdown-header">
                                                <p class="d-flex align-items-center">
                                                    <a href="{{ $route }}" class="p-1">
                                                        <small style="font-size: 14px">Profile</small>
                                                    </a>
                                                </p>
                                            </div>
                                            @auth
                                                <form class="d-block" action="{{ route('logout') }}" method="post">
                                                    @csrf
                                                    <button type="submit" class="dropdown-item"><i class="feather-log-out"></i>
                                                        chiqish
                                                    </button>
                                                </form>
                                            @endauth

                                            <div class="dropdown-divider"></div>
                                        </div>
                                    </div>

                                    <script>
                                        document.addEventListener("DOMContentLoaded", function() {
                                            let hoverUser = document.querySelector('.hover_user');
                                            let userCard = document.querySelector("#user_card");

                                            hoverUser.addEventListener('mouseenter', () => {
                                                userCard.classList.add('show');
                                            });

                                            document.querySelector('.dropdown').addEventListener('mouseleave', () => {
                                                userCard.classList.remove('show');
                                            });
                                        });
                                    </script>

                                @else
                                    <a href="{{ route('login') }}">
                                        Вход
                                        <i class="fa-solid fa-arrow-up-right-from-square" style="font-size: 14px;"></i>
                                    </a>
                                @endauth
                            </li>


                        </ul>

                    </nav>
                </div>
            </div>
            <div class="header-right d-block d-xl-none"><a class="btn btn-search hover-up" href="#"></a>
                <div class="form-search p-20 dark">
                    <form action="#">
                        <input class="form-control" type="text" placeholder="Поиск">
                        <input class="btn-search-2" type="submit" value="">
                    </form>
                    <div class="popular-keywords text-start mt-20">
                        <p class="mb-10 color-white">Популярные запросы:</p><a class="color-gray-600 mr-10 font-xs"
                                                                               href="#">Платформа,</a><a
                            class="color-gray-600 mr-10 font-xs" href="#">#
                            База данных,</a><a class="color-gray-600 mr-10 font-xs" href="#"># Цены</a>
                    </div>
                </div>
                <div class="burger-icon burger-icon-white"><span class="burger-icon-top"></span><span
                        class="burger-icon-mid"></span><span class="burger-icon-bottom"></span></div>
            </div>
        </div>
    </div>
</header>
<div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
    <div class="mobile-header-wrapper-inner">
        <div class="burger-icon burger-icon-white">
            <span class="burger-icon-top"></span>
            <span class="burger-icon-mid"></span>
            <span class="burger-icon-bottom"></span>
        </div>
        <div class="mobile-header-top">
            <div class="user-account">
                <img src="/assets/imgs/page/homepage6/author.png" alt="Профиль">
                <div class="content">
                    <h6 class="user-name">Иван Иванов</h6>
                    <p class="font-xs text-muted">У вас 4 новых сообщения</p>
                </div>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="perfect-scroll">
                <div class="mobile-search mobile-header-border mb-30">
                    <form action="#!">
                        <input type="text" placeholder="Поиск..."><i class="fi-rr-search"></i>
                    </form>
                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <nav>
                        <ul class="mobile-menu font-heading">
                            <li><a href="#!">Главная</a></li>
                            <li class="has-children"><a href="#!">Страницы</a>
                                <ul class="sub-menu">
                                    <li><a class="active" href="/">Главная</a></li>
                                    <li><a href="{{ route('providers') }}">Поставщики услуг</a></li>
                                    <li><a href="{{ route('marketers') }}">Маркетологи</a></li>
                                    <li><a href="{{ route('partners') }}">Партнеры</a></li>
                                    <li><a href="{{ route('contacts') }}">Контакты</a></li>
                                </ul>
                            </li>
                            <li class="has-children"><a href="#!">Блог</a>
                                <ul class="sub-menu">
                                    <li><a href="#!">Все статьи</a></li>
                                    <li><a href="#!">Одна статья</a></li>
                                </ul>
                            </li>
                            <li class="has-children"><a href="#!">Аккаунт</a>
                                <ul class="sub-menu">
                                    <li><a href="#!">Регистрация</a></li>
                                    <li><a href="#!">Войти</a></li>
                                    <li><a href="#!">Забыли пароль</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="mobile-social-icon mb-50">
                    <h6 class="mb-25">Мы в соцсетях</h6>
                    <a class="icon-socials icon-facebook" href="#!"><img alt="Facebook"
                                                                         src="/assets/imgs/template/icons/fb.svg"></a>
                    <a class="icon-socials icon-instagram" href="#!"><img alt="Instagram"
                                                                          src="/assets/imgs/template/icons/in.svg"></a>
                    <a class="icon-socials icon-twitter" href="#!"><img alt="Twitter"
                                                                        src="/assets/imgs/template/icons/tw.svg"></a>
                </div>
                <div class="site-copyright">
                    Copyright 2024 &copy; Marketing.uz <br>Разработано DORA® System.
                </div>
            </div>
        </div>
    </div>
</div>

@yield('content')
<!-- Footer -->
<footer class="footer footer-style-3 footer-style-5">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-12 mb-30"><a href="/"><img alt="Marketing"
                                                                   src="/assets/imgs/template/marketing-white.png"
                                                                   style="height: 50px;"></a>
                <div class="mt-20 mb-20">
                    <p class="text-md neutral-600 mb-10">Крупнейшее маркетинговое сообщество Узбекистана –
                        объединяем бизнесы и услуги для вашего успеха</p>
                </div>
            </div>
            <div class="col-md-7 col-sm-12">
                <div class="row">
                    <div class="col-lg-3 col-md-6 mb-30">
                        <h5 class="neutral-0 mb-10 text-18-semibold neutral-0">Для клиентов</h5>
                        <ul class="menu-footer">
                            <li><a href="{{ route('rating') }}">Реестр компании</a></li>
                            <li><a href="#">Исследовать услуги</a></li>
                            <li><a href="#">Найти услугу</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-30">
                        <h5 class="neutral-0 mb-10 text-18-semibold neutral-0">Для поставщиков</h5>
                        <ul class="menu-footer">
                            <li><a href="#">Как это работает</a></li>
                            <li><a href="#">Цены</a></li>
                            <li><a href="#">Станьте нашим партнёром</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-30">
                        <h5 class="neutral-0 mb-10 text-18-semibold neutral-0">Ресурсы</h5>
                        <ul class="menu-footer">
                            <li><a href="#">Справка и поддержка</a></li>
                            <li><a href="#">Блог</a></li>
                            <li><a href="#">Руководства и обучение</a></li>
                            <li><a href="#">Справка и поддержка</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-30">
                        <h5 class="neutral-0 mb-10 text-18-semibold neutral-0">О компании</h5>
                        <ul class="menu-footer">
                            <li><a href="javascript: void(0);">О нас </a></li>
                            <li><a href="/contacts">Контакты</a></li>
                            <li><a href="/contacts">Политика конфиденциальности</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom mt-0">
            <div class="row align-items-end">
                <div class="col-lg-6 mb-20">
                    <h5 class="text-18-semibold neutral-0">Подписка на новости</h5>
                    <p class="text-sm neutral-600 mb-20">Подпишитесь на наши обновления – советы, акции и
                        возможности прямо на вашу почту</p>
                    <div class="form-newsletter form-newsletter-2">
                        <form>
                            <input class="form-control" type="text" placeholder="Электронную почту">
                            <button style="white-space: nowrap;" class="btn btn-brand-4-medium">Подписаться
                                <svg width="22" height="22" viewbox="0 0 22 22" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M22 11.0003L18.4791 7.47949V10.3074H0V11.6933H18.4791V14.5213L22 11.0003Z"
                                        fill=""></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 text-lg-end text-center">
                    <div class="row align-items-end">
                        <div class="col-md-6 mb-20">
                            <div class="text-center text-md-start">
                                <div class="text-start d-inline-block">
                                    <p class="text-lg title-follow neutral-0">Социальные сети
                                    <div class="box-socials-footer d-flex">
                                        <a class="icon-socials icon-facebook" href="#"><i
                                                class="fa-brands fa-facebook-f"></i></a>
                                        <a class="icon-socials icon-instagram" href="#"><i
                                                class="fa-brands fa-linkedin-in"></i></a>
                                        <a class="icon-socials icon-twitter" href="#"><i
                                                class="fa-brands fa-x-twitter"></i></a>
                                        <a class="icon-socials icon-be" href="#"><i
                                                class="fa-brands fa-instagram"></i></a>
                                    </div>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-20">
                            <p class="text-sm neutral-600">© 2024 Marketing.uz - Все права защищены.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
    .text-18-semibold {
        font-size: 15px;
    }

    .footer.footer-style-3 .menu-footer li a {
        font-size: 14px;
    }
</style>
<!--Vendors Scripts-->
<script src="/assets/js/vendor/jquery-3.7.0.min.js"></script>
<script src="/assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
<script src="/assets/js/vendor/bootstrap.bundle.min.js"></script>
<!--Other-->
<script src="/assets/js/plugins/magnific-popup.js"></script>
<script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="/assets/js/plugins/swiper-bundle.min.js"></script>
<script src="/assets/js/plugins/slick.js"></script>
<script src="/assets/js/plugins/jquery.carouselTicker.js"></script>
<script src="/assets/js/plugins/masonry.min.js"></script>
<script src="/assets/js/plugins/scrollup.js"></script>
<script src="/assets/js/plugins/wow.js"></script>
<script src="/assets/js/plugins/waypoints.js"></script>
<script src="/assets/js/plugins/counterup.js"></script>
<script src="/assets/js/plugins/show-more.js"></script>
<script src="/assets/js/plugins/show-form.js"></script>
<!--<script src="../assets/js/plugins/section.js"></script>-->
<script src="/assets/js/plugins/modal.js"></script>
<script src="/assets/js/plugins/salary-range.js"></script>
<!-- Count down-->
<script src="/assets/js/vendor/jquery.countdown.min.js"></script>
<!--Custom script for this template-->
<script src="/assets/js/main.js?v=1.0.0"></script>


</body>

</html>
