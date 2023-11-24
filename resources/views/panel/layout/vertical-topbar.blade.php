<header id="page-topbar" class="isvertical-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="#" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{asset('/panel/borex/assets/images/logo-dark-sm.png') }}" alt="" height="22">
                                </span>
                    <span class="logo-lg">
                            <img src="{{ asset('/panel/borex/assets/images/logo-dark-sm.png') }}" alt="" height="22">
                        </span>
                </a>

                <a href="#" class="logo logo-light">
                                <span class="logo-lg">
                                    <img src="{{ asset('/panel/borex/assets/images/logo-light.png') }}" alt="" height="22">
                                </span>
                    <span class="logo-sm">
                                    <img src="{{ asset('/panel/borex/assets/images/logo-light-sm.png') }}" alt="" height="22">
                                </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item vertical-menu-btn topnav-hamburger">
                <div class="hamburger-icon open">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>

            <div class="d-none d-sm-block ms-3 align-self-center">
                <h4 class="page-title">@yield('title')</h4>
            </div>

        </div>

        <div class="d-flex">



            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle" id="right-bar-toggle">
                    <i class="icon-sm" data-eva="settings-outline"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item user text-start d-flex align-items-center" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    @if(Auth::user()->avatar)
                        <img class="rounded-circle header-profile-user"
                             src="{{ asset('uploads/'.Auth::user()->avatar) }}"
                         alt="Header Avatar">
                    @else
                        <img class="rounded-circle header-profile-user"
                             src="{{ asset('/panel/borex/assets/images/users/nophoto.png') }}"
                             alt="Header Avatar">
                    @endif
                </button>
                <div class="dropdown-menu dropdown-menu-end pt-0">
                    <div class="p-3 border-bottom">
                        <h6 class="mb-0">{{ Auth::user()->name }} {{ Auth::user()->last_name }}</h6>
                        <p class="mb-0 font-size-11 text-muted">{{ Auth::user()->email }}</p>
                    </div>
                    <a class="dropdown-item" href="{{ route('panel.user.edit', Auth::user()) }}"><i class="mdi mdi-account-circle text-muted font-size-16 align-middle me-1"></i> <span class="align-middle">Profile</span></a>
                    <div class="dropdown-divider"></div>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="dropdown-item"
                            type="submit">
                            <i class="mdi mdi-logout text-muted font-size-16 align-middle me-1"></i>
                            <span class="align-middle">Logout</span>
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
