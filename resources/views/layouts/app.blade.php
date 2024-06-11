@include('layouts.head')

@php
$routeName = Route::currentRouteName();
$routeName = explode('.', $routeName)[0];
@endphp

<div class="crancy-body-area">
    <!-- crancy Admin Menu -->
    <div class="crancy-smenu" id="CrancyMenu">
        <!-- Admin Menu -->
        <div class="admin-menu">
            <!-- Logo -->
            <div class="logo crancy-sidebar-padding pd-right-0">
                <a class="crancy-logo" href="{{route('dashboard')}}">
                    <img class="crancy-logo__main" width="50" src="{{asset('img/kartun.png')}}" alt="#" />
                    <img class="crancy-logo__main--small" src="{{asset('img/kartun.png')}}" alt="Logo" />
                </a>
                <div id="crancy__sicon" class="crancy__sicon close-icon">
                    <img src="{{asset('img/arrow-icon.svg')}}" />
                </div>
            </div>

            <!-- Main Menu -->
            <div class="admin-menu__one crancy-sidebar-padding mg-top-20">
                <h4 class="admin-menu__title">Menu</h4>
                <!-- Nav Menu -->
                <div class="menu-bar">
                    <ul id="CrancyMenu" class="menu-bar__one crancy-dashboard-menu">
                        <li class="{{$routeName == 'dashboard' ? 'active' : ''}}">
                            <a class="collapsed" href="{{route('dashboard')}}"><span class="menu-bar__text">
                                    <span class="crancy-menu-icon crancy-svg-icon__v1">
                                        <i class="bi bi-speedometer2"></i>
                                    </span>
                                    <span class="menu-bar__name">Dashboard</span></span>
                            </a>
                        </li>
                        <li class="{{$routeName == 'user' ? 'active' : ''}}">
                            <a class="collapsed" href="{{route('user.index')}}"><span class="menu-bar__text">
                                    <span class="crancy-menu-icon crancy-svg-icon__v1">
                                        <i class="bi bi-people"></i>
                                    </span>
                                    <span class="menu-bar__name">Anggota</span></span></a>
                        </li>
                        <li class="{{$routeName == 'cashflow' ? 'active' : ''}}">
                            <a class="collapsed" href="{{route('cashflow.index')}}"><span class="menu-bar__text">
                                    <span class="crancy-menu-icon crancy-svg-icon__v1">
                                        <i class="bi bi-cash"></i>
                                    </span>
                                    <span class="menu-bar__name">Anggaran</span></span></a>
                        </li>
                        <li class="{{$routeName == 'project' ? 'active' : ''}}">
                            <a class="collapsed" href="{{route('project.index')}}"><span class="menu-bar__text">
                                    <span class="crancy-menu-icon crancy-svg-icon__v1">
                                        <i class="bi bi-calendar2-event"></i>
                                    </span>
                                    <span class="menu-bar__name">Kegiatan</span></span></a>
                        </li>
                    </ul>
                </div>
                <!-- End Nav Menu -->
            </div>
        </div>
        <!-- End Admin Menu -->
    </div>
    <!-- End crancy Admin Menu -->

    <!-- Start Header -->
    <header class="crancy-header">
        <div class="container g-0">
            <div class="row g-0">
                <div class="col-12">
                    <!-- Dashboard Header -->
                    <div class="crancy-header__inner">
                        <div class="crancy-header__middle">
                            <div id="crancy__sicon" class="crancy__sicon close-icon d-none">
                                <img src="{{asset('img/arrow-icon.svg')}}" />
                            </div>
                            <div class="crancy-header__heading">
                                <h3 class="crancy-header__title m-0">@yield('title')</h3>
                            </div>


                            <div class="crancy-header__right">
                                <div class="crancy-header__group">
                                    <div class="crancy-header__group-two">
                                        <div class="crancy-header__right">
                                            <!-- Header Author -->
                                            <div class="crancy-header__single">
                                                <a href="profile-overview.html">
                                                    <div class="crancy-header__author-img">
                                                        <img src="img/profile-pic.png" alt="#" /></div>
                                                </a>
                                                <!-- crancy Profile Hover -->

                                                <!-- Dropdown List -->
                                                <div class="crancy-dropdown crancy-dropdown--acount">
                                                    <div class="crancy-dropdown__hover--inner">
                                                        <ul class="crancy-dmenu">
                                                            <li>
                                                                <a href="#">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none">
                                                                        <path
                                                                            d="M15 10L13.7071 11.2929C13.3166 11.6834 13.3166 12.3166 13.7071 12.7071L15 14M14 12L22 12M6 20C3.79086 20 2 18.2091 2 16V8C2 5.79086 3.79086 4 6 4M6 20C8.20914 20 10 18.2091 10 16V8C10 5.79086 8.20914 4 6 4M6 20H14C16.2091 20 18 18.2091 18 16M6 4H14C16.2091 4 18 5.79086 18 8"
                                                                            stroke-width="1.5" stroke-linecap="round" />
                                                                    </svg>
                                                                    Logout
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- End Dropdown List -->
                                            </div>
                                            <!-- End Header Author -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- End Header -->

    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-xxl-8 col-12 crancy-main__column">
                    <div class="crancy-body">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End crancy Dashboard -->
</div>

@include('layouts.tail')
