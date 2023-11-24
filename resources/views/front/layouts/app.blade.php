<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Prokkom</title>

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('/prokkom/dist/assets/plugins/fontawesome/css/all.min.css')}}" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('/prokkom/dist/assets/plugins/bootstrap/css/bootstrap.min.css')}}" />
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('/prokkom/dist/assets/plugins/select2/select2.min.css')}}" />
    <!-- Swiper -->
    <link rel="stylesheet" href="{{ asset('/prokkom/dist/assets/plugins/swiper/swiper.min.css')}}" />
    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('/prokkom/dist/assets/css/style.min.css')}}" />

    @yield('header-css-bottom')

</head>
<body class="d-flex flex-column h-100">
<!-- Header -->

<header class="header fixed-top" id="header-main">
    <nav class="navbar navbar-main navbar-expand-lg navbar-white navbar-light navbar-sticky" id="navbar-main">
        <div class="container px-0 px-lg-0"><a href="#" class="d-flex d-lg-none position-relative overflow-hidden bg__gray-light border-radius__50 login__btn ms-3">
                <i class="far fa-user text__black"></i>
            </a>

            <!-- Profile image -->
            <a class="navbar-brand mx-auto ms-lg-0" href="{{ url('/') }}">


                <img alt="Image placeholder" src="{{url('uploads/'.$options->logo)}}" class="img-fluid navbar-brand-img" />
            </a>
            <!-- Navbar collapse trigger -->
            <a class="navbar-toggler border-0 me-2" data-bs-toggle="collapse" data-bs-target="#navbar-main-collapse" aria-controls="navbar-main-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <div class="menu-btn">
                    <div class="menu-btn_burger"></div>
                </div>
            </a>

            <!-- Navbar nav -->
            <div class="collapse navbar-collapse" id="navbar-main-collapse">
                <a href="{{ route('login') }}"
                   class="nav-link text-decoration-none d-block d-md-none w-100 border-top border-color__light text__color fw-medium sub__title1 login__link"> Daxil ol </a>
                <a href="#"
                   class="nav-link text-decoration-none d-block d-md-none w-100 border-top border-color__light text__color fw-medium sub__title1 reg__link"> Qeydiyyat </a>




                <ul class="navbar-nav align-items-lg-center ms-auto">

                    @if($menus)
                        @foreach($menus as $menu)
                            <li class="nav-item active">
                                <a class="nav-link" href="{{url($menu->slug)}}">{{$menu->name}}</a>
                            </li>
                        @endforeach
                    @endif
                </ul>



                @auth
                    <a href="#" class="row d-flex text-decoration-none profile__btn align-items-center py-3 g-0 order-first order-md-last ms-auto">
                        <div class="col-3 col-md-3 order-first order-md-last">
                            <div class="profile__img profile__link">
                                @if(Auth::user()->avatar)
                                    <img class="rounded-circle header-profile-user"
                                         src="{{ url('uploads/'.Auth::user()->avatar) }}"
                                         alt="Header Avatar">
                                @else
                                    <img class="rounded-circle header-profile-user"
                                         src="{{ asset('/panel/borex/assets/images/users/nophoto.png') }}"
                                         alt="Header Avatar">
                                @endif
                            </div>
                        </div>
                        <div class="col-9 col-md-6 offset-0 offset-lg-3 order-last order-md-first">
                            <div class="text-start p-0">
                                <p class="body__text1 fw-semibold text__color mb-0">{{Auth::user()->name}} {{Auth::user()->last_name}}</p>
                            </div>
                        </div>
                    </a>
                @else
                    @if (Route::has('login'))
                    <a href="{{route('login')}}" class="btn btn-primary d-none d-lg-flex text-decoration-none border-radius__5 fw-bold px-5 ms-auto"><span>Daxil ol</span></a>
                    @endif
                    @if (Route::has('register'))
                    <a href="{{route('register')}}"
                       class="btn btn-primary d-none d-lg-flex text-decoration-none border-radius__5 fw-bold px-5 ms-auto"><span>Qeydiyyat</span></a>
                    @endif
                @endauth
            </div>
        </div>
    </nav>
</header>

@yield('content')


<!-- Footer -->
<footer class="footer mt-auto bg__primary z-1">
    <div class="container"><div class="row footer__header">
            <div class="col-12 col-sm-12 col-md-12 col-lg-8 px-3 px-md-0">
                <ul class="list-group list-group-flush list-group-horizontal-lg flex-lg-wrap list-unstyled links__list body__text1 float-start">
                    <li><a href="#" class="text-decoration-none text__white">Haqqımızda</a></li>
                    <li><a href="#" class="text-decoration-none text__white">Kommentariyalar</a></li>
                    <li><a href="#" class="text-decoration-none text__white">Sual - cavab</a></li>
                    <li><a href="#" class="text-decoration-none text__white">Daxil ol</a></li>
                    <li><a href="#" class="text-decoration-none text__white">Qeydiyyat</a></li>
                    <li><a href="#" class="text-decoration-none text__white">Əlaqə</a></li>
                </ul>
            </div>

            <div class="col-12 col-sm-12 col-md-12 col-lg-4 px-3 px-md-0 d-none d-md-none d-lg-flex justify-content-end">
                <ul class="list-group list-group-horizontal list-unstyled terms__list body__text1 float-end">
                    <li><a href="#" class="text-decoration-none text__white">Terms & Conditions</a></li>
                    <li><a href="#" class="text-decoration-none text__white">Privacy Policy</a></li>
                </ul>
            </div>
        </div>

        <div class="row footer__body">
            <div class="col-lg-4 d-flex align-items-center justify-content-start px-3 px-md-0">
                <ul class="list-group-horizontal list-unstyled social__links d-none d-md-none d-lg-flex align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fab fa-facebook"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-6 col-lg-4 d-flex align-items-center justify-content-start justify-content-lg-center">
                <img src="assets/images/logo-white.png" alt="" class="img-fluid" />
            </div>

            <div class="col-6 col-lg-4 d-flex align-items-center justify-content-end px-3 px-md-0">
                <a href="#" class="btn btn-white text__primary fw-bold body__text1 border-radius__5">
                    <i class="far fa-crown me-2"></i>
                    <span>Abunə ol</span>
                </a>
            </div>
        </div>

        <div class="row d-flex d-lg-none py-4">
            <div class="col-12 col-md-12 d-flex align-items-center justify-content-start px-3 px-md-0">
                <ul class="list-group-horizontal list-unstyled social__links d-inline-flex justify-content-center align-items-center w-100">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fab fa-facebook"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-12 col-sm-12 col-md-12 col-lg-4 px-3 px-md-0 pt-3 pb-3">
                <ul class="list-group list-group-horizontal list-unstyled terms__list body__text1 text-center justify-content-center">
                    <li><a href="#" class="text-decoration-none text__white">Terms & Conditions</a></li>
                    <li><a href="#" class="text-decoration-none text__white">Privacy Policy</a></li>
                </ul>
            </div>
        </div>

        <div class="row footer__foot">
            <div class="col-12 col-md-12 d-flex justify-content-center justify-content-md-start align-items-center px-3 px-md-0">
                <a href="#" class="rights__text text__white text-decoration-none mb-0 me-2">
                    © 2023 All Rights Reserved. Developed by
                    <picture class="ms-2">
                        <source srcset="assets/images/era-logo-white.svg" type="image/svg+xml" />
                        <img src="assets/images/era-logo-white.svg" class="img-fluid" alt="..." />
                    </picture>
                </a>
            </div>
        </div>
    </div>
</footer>

<!-- JS-Assets -->
<script src="{{ asset('/prokkom/dist/assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{ asset('/prokkom/dist/assets/plugins/bootstrap/js/popper.min.js')}}"></script>
<script src="{{ asset('/prokkom/dist/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- Select2 -->
<script src="{{ asset('/prokkom/dist/assets/plugins/select2/select2.min.js')}}"></script>
<script src="{{ asset('/prokkom/dist/assets/plugins/select2/select2.settings.js')}}"></script>
<!-- Swiper -->
<script src="{{ asset('/prokkom/dist/assets/plugins/swiper/swiper.min.js')}}"></script>
<script src="{{ asset('/prokkom/dist/assets/plugins/swiper/swiper-settings.js')}}"></script>
<script src="{{ asset('/prokkom/dist/assets/plugins/custom.js')}}"></script>
</body>
</html>
