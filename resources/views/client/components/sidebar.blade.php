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

                <li class="nxl-item nxl-hasmenu {{ request()->is('partner/client') ? 'active' : '' }}">
                    <a href="{{ route('client.profile') }}" class="nxl-link">
                        <span class="nxl-micon">
                            <i class="{{ request()->is('client/profile') ? 'fa-solid fa-building' : 'fa-regular fa-building' }}"></i>
                        </span>
                        <span class="nxl-mtext">Обзор</span><span class="nxl-arrow"></span>
                    </a>
                </li>
                <li class="nxl-item nxl-hasmenu {{ Request::routeIs('lots.index') ? 'active' : '' }}">
                    <a href="/partner/lots" class="nxl-link">
                        <span class="nxl-micon">
                        <i class="feather-search"></i>
                        </span>
                        <span class="nxl-mtext">Услуги</span><span class="nxl-arrow"></span>
                    </a>
                </li>

            </ul>

        </div>
    </div>
</nav>
