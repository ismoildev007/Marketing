<nav class="nxl-navigation">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="/public" class="b-brand">
                <!-- ========   change your logo hear   ============ -->
                <img src="{{ asset('/assets/images/logo/dacademy.png') }}" alt="" class="logo logo-lg">
                <img src="/assets/images/logo/icon.png" alt="" class="logo logo-sm">
            </a>
        </div>
        <div class="navbar-content">
            <ul class="nxl-navbar">
                <li class="nxl-item nxl-caption">
                    <label>Профиль</label>
                </li>
                <li class="nxl-item nxl-hasmenu {{ request()->is('/') ? 'active' : '' }}">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-airplay"></i></span>
                        <span class="nxl-mtext">Панели управления</span><span class="nxl-arrow"><i
                                class="feather-chevron-right"></i></span>
                    </a>
                    <ul class="nxl-submenu">
                        <li class="nxl-item {{ request()->is('/') ? 'active' : '' }}"><a class="nxl-link" href="/">Главная
                                страница</a></li>
                    </ul>
                </li>

                <li class="nxl-item nxl-hasmenu {{ request()->is('provider/providers') ? 'active' : '' }}">
                    <a href="{{ route('providers.profile') }}" class="nxl-link">
            <span class="nxl-micon">
                <i class="{{ request()->is('provider/providers') ? 'fa-solid fa-building' : 'fa-regular fa-building' }}"></i>
            </span>
                        <span class="nxl-mtext">Обзор</span><span class="nxl-arrow"></span>
                    </a>
                </li>
                <li class="nxl-item nxl-hasmenu {{ Request::routeIs('services.index') ? 'active' : '' }}">
                    <a href="{{ route('service.index') }}" class="nxl-link">
            <span class="nxl-micon">
            <i class="feather-search"></i>
            </span>
                        <span class="nxl-mtext">Услуги</span><span class="nxl-arrow"></span>
                    </a>
                </li>
                <li class="nxl-item nxl-hasmenu {{ Request::routeIs('reviews.index') ? 'active' : '' }}">
                    <a href="{{ route('reviews.index') }}" class="nxl-link">
            <span class="nxl-micon">
                            <i class="feather-tag"></i>
            </span>
                        <span class="nxl-mtext">Отзывы</span><span class="nxl-arrow"></span>
                    </a>
                </li>
                <li class="nxl-item nxl-hasmenu {{ Request::routeIs('portfolios.index') ? 'active' : '' }}">
                    <a href="{{ route('portfolios.index') }}" class="nxl-link">
            <span class="nxl-micon">
                        <i class="feather-check-circle"></i>
            </span>
                        <span class="nxl-mtext">Портфели</span><span class="nxl-arrow"></span>
                    </a>
                </li>
                <li class="nxl-item nxl-hasmenu {{ Request::routeIs('awards.index') ? 'active' : '' }}">
                    <a href="{{ route('awards.index') }}" class="nxl-link">
            <span class="nxl-micon">
                            <i class="feather-crosshair"></i>
            </span>
                        <span class="nxl-mtext">Награды</span><span class="nxl-arrow"></span>
                    </a>
                </li>
                <li class="nxl-item nxl-hasmenu {{ Request::routeIs('teams.index') ? 'active' : '' }} d-none">
                    <a href="{{ route('teams.index') }}" class="nxl-link">
            <span class="nxl-micon">
                            <i class="feather-life-buoy"></i>
            </span>
                        <span class="nxl-mtext">Команда</span><span class="nxl-arrow"></span>
                    </a>
                </li>
                <li class="nxl-item nxl-hasmenu {{ Request::routeIs('managers.index') ? 'active' : '' }}">
                    <a href="{{ route('managers.index') }}" class="nxl-link">
            <span class="nxl-micon">
                    <i class="feather-user"></i>
            </span>
                        <span class="nxl-mtext">Добавить менеджера</span><span class="nxl-arrow"></span>
                    </a>
                </li>


                {{--                <li class="nxl-item nxl-hasmenu {{ request()->is('marketer*') ? 'active' : '' }}">--}}
                {{--                    <a href="javascript:void(0);" class="nxl-link">--}}
                {{--                        <span class="nxl-micon"><i class="feather-user"></i></span>--}}
                {{--                        <span class="nxl-mtext">Marketer</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>--}}
                {{--                    </a>--}}
                {{--                    <ul class="nxl-submenu">--}}
                {{--                        <li class="nxl-item {{ request()->is('marketer/about') ? 'active' : '' }}"><a class="nxl-link" href="#">About</a></li>--}}
                {{--                        <li class="nxl-item {{ request()->is('marketer/services') ? 'active' : '' }}"><a class="nxl-link" href="#">Services</a></li>--}}
                {{--                        <li class="nxl-item {{ request()->is('marketer/portfolios') ? 'active' : '' }}"><a class="nxl-link" href="#">Portfolios</a></li>--}}
                {{--                        <li class="nxl-item {{ request()->is('marketer/awards') ? 'active' : '' }}"><a class="nxl-link" href="#">Awards</a></li>--}}
                {{--                        <li class="nxl-item {{ request()->is('marketer/resume') ? 'active' : '' }}"><a class="nxl-link" href="#">Resume</a></li>--}}
                {{--                    </ul>--}}
                {{--                </li>--}}

                {{--                <li class="nxl-item nxl-hasmenu {{ request()->is('client*') ? 'active' : '' }}">--}}
                {{--                    <a href="javascript:void(0);" class="nxl-link">--}}
                {{--                        <span class="nxl-micon"><i class="fa-solid fa-briefcase"></i></span>--}}
                {{--                        <span class="nxl-mtext">Client</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>--}}
                {{--                    </a>--}}
                {{--                    <ul class="nxl-submenu">--}}
                {{--                        <li class="nxl-item {{ request()->is('client/about') ? 'active' : '' }}"><a class="nxl-link" href="#">About</a></li>--}}
                {{--                    </ul>--}}
                {{--                </li>--}}

                {{--                <li class="nxl-item nxl-hasmenu }">--}}
                {{--                    <a href="javascript:void(0);" class="nxl-link">--}}
                {{--                        <span class="nxl-micon"><i class="fa-solid fa-gears"></i></span>--}}
                {{--                        <span class="nxl-mtext">settings</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>--}}
                {{--                    </a>--}}
                {{--                    <ul class="nxl-submenu">--}}
                {{--                        <li class="nxl-item {{ request()->is('categories') ? 'active' : '' }}"><a class="nxl-link" href="{{route('categories.index')}}">Category</a></li>--}}
                {{--                    </ul>--}}
                {{--                    <ul class="nxl-submenu">--}}
                {{--                        --}}{{-- <li class="nxl-item {{ request()->is('services-admin') ? 'active' : '' }}"><a class="nxl-link" href="{{route('services-admin.index')}}">Service</a></li> --}}
                {{--                    </ul>--}}
                {{--                </li>--}}

            </ul>

        </div>
    </div>
</nav>
