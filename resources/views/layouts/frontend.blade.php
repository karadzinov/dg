<!DOCTYPE html>
<html lang="en">
<head>
    <!-- --------------------------------------------------- -->
    <!-- Title -->
    <!-- --------------------------------------------------- -->


    <!-- --------------------------------------------------- -->
    <!-- Required Meta Tag -->
    <!-- --------------------------------------------------- -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="handheldfriendly" content="true"/>
    <meta name="MobileOptimized" content="width"/>

    <meta name="author" content=""/>
    <meta name="keywords" content="свадбен планер, онлајн покани, покани за свадба"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <x-embed-styles/>


    @yield('metadata')



    <!-- --------------------------------------------------- -->
    <!-- Favicon -->
    <!-- --------------------------------------------------- -->
    <link rel="shortcut icon" type="image/png" href="/dist/images/2.svg"/>
    <link rel="icon" type="image/x-icon" href="/dist/images/2.svg">
    <link rel="stylesheet" href="/dist/libs/quill/dist/quill.snow.css">
    <link href="/dist/libs/quill/quill.snow.css" rel="stylesheet">

    <!-- --------------------------------------------------- -->
    <link href="/start/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css"/>

    <!-- --------------------------------------------------- -->

    <!-- --------------------------------------------------- -->

    <!-- Owl Carousel -->
    <!-- --------------------------------------------------- -->
    <link rel="stylesheet" href="/dist/libs/owl.carousel/dist/assets/owl.carousel.min.css">
    <link href="/css/swiper-bundle.min.css" rel="stylesheet">
    <!-- --------------------------------------------------- -->
    <!-- Prism Js -->
    <!-- --------------------------------------------------- -->
    <link rel="stylesheet" href="/dist/libs/prismjs/themes/prism-okaidia.min.css">

    <link rel="stylesheet" href="/dist/libs/dropzone/dist/min/dropzone.min.css">
    <!-- --------------------------------------------------- -->
    <!-- Core Css -->
    <!-- --------------------------------------------------- -->
    <link id="themeColors" rel="stylesheet" href="/dist/css/style.min.css"/>
    <link id="themeColors" rel="stylesheet" href="/dist/css/datepicker.min.css"/>
    <link rel="stylesheet" href="/dist/css/custom.css"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <style>
        #valid {
            display: none;
        }

        #not-valid {
            display: none;
        }

    </style>
    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-TS8GHQQ2');</script>
    <!-- End Google Tag Manager -->
</head>

<body>
<!-- --------------------------------------------------- -->
<!-- Body Wrapper -->
<!-- --------------------------------------------------- -->
<div
    class="page-wrapper"
    id="main-wrapper"
    data-layout="horizontal"
    data-navbarbg="skin6"
    data-sidebartype="full"
    data-sidebar-position="fixed"
    data-header-position="fixed"
>
    <!-- Header Start -->
    <header class="app-header" style="background-color: white">
        <nav class="navbar navbar-expand-lg navbar-light">
            <ul class="navbar-nav quick-links d-none d-lg-flex">
                <li class="nav-item d-none d-lg-block">
                    <a href="{{ route('frontend.index') }}" class="text-nowrap nav-link">
                        <img src="/dist/images/logos/logo-main.png" class="dark-logo" width="60" alt=""/>
                    </a>
                </li>

                <li class="nav-item dropdown-hover d-none d-lg-block">
                    <a class="nav-link" href="{{ route('frontend.index') }}">Почетна</a>
                </li>
                <li class="nav-item dropdown-hover d-none d-lg-block">

                    <div id="button">
                        <span class="scali"></span>
                        <span class="clicki">  <a class="btn bg-main pokani" href="{{ route('invitations.create') }}">Креирајте покани</a>  </span>
                    </div>

                </li>
                <li class="nav-item dropdown hover-dd d-none d-lg-block">
                    <a class="nav-link" data-bs-toggle="dropdown">Услуги<span class="mt-1"><i
                                class="ti ti-chevron-down"></i></span></a>
                    <div class="dropdown-menu dropdown-menu-nav dropdown-menu-animate-up py-0"
                         style="max-width: 250px;">
                        <div class="col-12">
                            <div class=" ps-7 pt-7">
                                <div class="border-bottom">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="position-relative">
                                                <a href="{{ route('frontend.restaurants') }}"
                                                   class="d-flex align-items-center pb-9 position-relative text-decoration-none text-decoration-none text-decoration-none text-decoration-none">
                                                    <div class="d-inline-block">
                                                        <h6 class="mb-1 fw-semibold bg-hover-primary"><span>
                    <i class="ti ti-home-2"></i>
                  </span>
                                                            <span class="hide-menu">&nbsp;Ресторани</span></h6>
                                                    </div>
                                                </a>
                                                <a href="{{ route('frontend.musicians') }}"
                                                   class="d-flex align-items-center pb-9 position-relative text-decoration-none text-decoration-none text-decoration-none text-decoration-none">
                                                    <div class="d-inline-block">
                                                        <h6 class="mb-1 fw-semibold bg-hover-primary"><span>
                    <i class="ti ti-music"></i>
                  </span>
                                                            <span class="hide-menu">&nbsp;Музичари</span></h6>
                                                    </div>
                                                </a>
                                                <a href="{{ route('frontend.photographers') }}"
                                                   class="d-flex align-items-center pb-9 position-relative text-decoration-none text-decoration-none text-decoration-none text-decoration-none">
                                                    <div class="d-inline-block">
                                                        <h6 class="mb-1 fw-semibold bg-hover-primary"><span>
                    <i class="ti ti-camera"></i>
                  </span>
                                                            <span class="hide-menu">&nbsp;Фотографи</span></h6>
                                                    </div>
                                                </a>
                                                <a href="/"
                                                   class="d-flex align-items-center pb-9 position-relative text-decoration-none text-decoration-none text-decoration-none text-decoration-none">
                                                    <div class="d-inline-block">
                                                        <h6 class="mb-1 fw-semibold bg-hover-primary"><span>
                    <i class="ti ti-hotel-service"></i>
                  </span>
                                                            <span class="hide-menu">&nbsp;Останато</span></h6>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </li>
                <li class="nav-item dropdown-hover d-none d-lg-block">
                    <a class="nav-link" href="/">За нас</a>
                </li>
                <li class="nav-item dropdown-hover d-none d-lg-block">
                    <a class="nav-link" href="{{ route('frontend.contact') }}">Контакт</a>
                </li>
            </ul>
            <div class="d-block d-lg-none">
                <a href="{{ route('frontend.index') }}" class="text-nowrap nav-link">
                    <img src="/dist/images/logos/logo-main.png" class="dark-logo" width="60" alt=""/>
                </a>

            </div>
            <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
              <span class="p-2">
                <i class="ti ti-dots fs-7"></i>
              </span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <div class="d-flex align-items-center justify-content-between">
                    <a href="javascript:void(0)"
                       class="nav-link d-flex d-lg-none align-items-center justify-content-center" type="button"
                       data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar"
                       aria-controls="offcanvasWithBothOptions">
                        <i class="ti ti-align-justified fs-7"></i>
                    </a>
                    <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                        <li class="nav-item dropdown">
                            <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown"
                               aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <div class="user-profile-img">
                                        <span class="fa fa-user"></span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                                 aria-labelledby="drop1">
                                <div class="profile-dropdown position-relative" data-simplebar>
                                    @if(Auth::user())
                                        <div class="py-3 px-7 pb-0">
                                            <h5 class="mb-0 fs-5 fw-semibold">Профил на корисникот</h5>
                                        </div>
                                        <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                            <span class="fa fa-user"></span>
                                            <div class="ms-3">
                                                <h5 class="mb-1 fs-3">{{ Auth::user()->name }}</h5>
                                                <p class="mb-0 d-flex text-dark align-items-center gap-2">
                                                    <i class="ti ti-mail fs-4"></i> {{ Auth::user()->email }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="message-body">

                                            @if(auth()->user()->category === "invitations")
                                                <a href="{{ route('frontend.invitations') }}"
                                                   class="py-8 px-7 mt-8 d-flex align-items-center">
                          <span class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                            <img src="/dist/images/svgs/icon-account.svg" alt="" width="24" height="24">
                          </span>
                                                    <div class="w-75 d-inline-block v-middle ps-3">
                                                        <h6 class="mb-1 bg-hover-primary fw-semibold"> Мои покани </h6>
                                                        <span class="d-block text-dark">Погледни</span>
                                                    </div>
                                                </a>

                                            @else
                                                <a href="{{ route('users.index') }}"
                                                   class="py-8 px-7 mt-8 d-flex align-items-center">
                          <span class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                            <img src="/dist/images/svgs/icon-tasks.svg" alt="" width="24" height="24">
                          </span>
                                                    <div class="w-75 d-inline-block v-middle ps-3">
                                                        <h6 class="mb-1 bg-hover-primary fw-semibold"> Мои услуги </h6>
                                                        <span class="d-block text-dark">Подесувања</span>
                                                    </div>
                                                </a>
                                                <a href="{{ route('frontend.invitations') }}"
                                                   class="py-8 px-7 mt-8 d-flex align-items-center">
                          <span class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                            <img src="/dist/images/svgs/icon-account.svg" alt="" width="24" height="24">
                          </span>
                                                    <div class="w-75 d-inline-block v-middle ps-3">
                                                        <h6 class="mb-1 bg-hover-primary fw-semibold"> Мои покани </h6>
                                                        <span class="d-block text-dark">Погледни</span>
                                                    </div>
                                                </a>
                                            @endif
                                        </div>
                                        <div class="d-grid py-4 px-7 pt-8">
                                            <div
                                                class="upgrade-plan bg-primary-subtle position-relative overflow-hidden rounded-4 p-4 mb-9">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h5 class="fs-4 mb-3 w-50 fw-semibold">Bronze</h5>
                                                        <a class="btn btn-primary"
                                                           href="/invitation/package">Промени</a>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="m-n4 unlimited-img">
                                                            <img src="/dist/images/backgrounds/bronze.png" alt=""
                                                                 class="w-75">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="{{ route('logout') }}"
                                               class="btn btn-outline-primary"
                                               onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                @csrf
                                            </form>
                                        </div>
                                    @else
                                        <div class="d-grid py-4 px-7 pt-8">
                                            <div class="text-center">
                                                <p>Логирајте се за пристап до вашиот профил</p>
                                            </div>
                                            <a href="{{ route('login') }}" class="btn btn-outline-primary">Логирај
                                                се</a>
                                        </div>
                                    @endif
                                </div>


                            </div>

                        </li>


                        <li class="nav-item">
                            <button class="nav-link position-relative nav-icon-hover" data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvasRestaurants" aria-controls="offcanvasRestaurants"
                                    id="restaurant-list-trigger">
                                <i class="ti ti-calendar-check"></i>
                                <span class="popup-badge rounded-pill bg-danger text-white fs-2"
                                      id="countRestaurants">
                                    @if(session()->get('cart') &&  session()->get('cart-photo'))
                                        {{  count(session()->get('cart')) + count(session()->get('cart-photo')) }}
                                    @elseif(session()->get('cart-photo'))
                                        {{ count(session()->get('cart-photo')) }}
                                    @elseif(session()->get('cart'))
                                        {{ count(session()->get('cart')) }}
                                    @else
                                        0
                                    @endif</span>
                            </button>
                        </li>


                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- Header End -->
    <!--  Mobilenavbar -->
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="mobilenavbar"
         aria-labelledby="offcanvasWithBothOptionsLabel">
        <nav class="sidebar-nav scroll-sidebar">
            <div class="offcanvas-header justify-content-between">
                <a href="{{ route('frontend.index') }}" class="text-nowrap nav-link">
                    <img src="/dist/images/logos/logo-main.png" width="160" alt="" class="img-fluid">
                </a>

                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body profile-dropdown mobile-navbar" data-simplebar="" data-simplebar>
                <ul id="sidebarnav">
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('frontend.index') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-home"></i>
                </span>
                            <span class="hide-menu">Почетна</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/invitation/create" aria-expanded="false">
                <span>
                  <i class="ti ti-photo"></i>
                </span>
                            <span class="hide-menu">Креирајте покани</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow" aria-expanded="false">
                <span>
                  <i class="ti ti-apps"></i>
                </span>
                            <span class="hide-menu">Услуги</span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level my-3">
                            <li class="sidebar-item py-2">
                                <a href="{{ route('frontend.restaurants') }}"
                                   class="d-flex align-items-center pb-9 position-relative text-decoration-none text-decoration-none text-decoration-none text-decoration-none">
                                    <div class="d-inline-block">
                                        <h6 class="mb-1 fw-semibold bg-hover-primary"><span>
                    <i class="ti ti-home-2"></i>
                  </span>
                                            <span class="hide-menu">&nbsp;Ресторани</span></h6>
                                    </div>
                                </a>
                            </li>
                            <li class="sidebar-item py-2">
                                <a href="{{ route('frontend.musicians') }}"
                                   class="d-flex align-items-center pb-9 position-relative text-decoration-none text-decoration-none text-decoration-none text-decoration-none">
                                    <div class="d-inline-block">
                                        <h6 class="mb-1 fw-semibold bg-hover-primary"><span>
                    <i class="ti ti-music"></i>
                  </span>
                                            <span class="hide-menu">&nbsp;Музичари</span></h6>
                                    </div>
                                </a>
                            </li>
                            <li class="sidebar-item py-2">
                                <a href="{{ route('frontend.photographers') }}"
                                   class="d-flex align-items-center pb-9 position-relative text-decoration-none text-decoration-none text-decoration-none text-decoration-none">
                                    <div class="d-inline-block">
                                        <h6 class="mb-1 fw-semibold bg-hover-primary"><span>
                    <i class="ti ti-camera"></i>
                  </span>
                                            <span class="hide-menu">&nbsp;Фотографи</span></h6>
                                    </div>
                                </a>
                            </li>
                            <li class="sidebar-item py-2">
                                <a href="#"
                                   class="d-flex align-items-center pb-9 position-relative text-decoration-none text-decoration-none text-decoration-none text-decoration-none">
                                    <div class="d-inline-block">
                                        <h6 class="mb-1 fw-semibold bg-hover-primary"><span>
                    <i class="ti ti-hotel-service"></i>
                  </span>
                                            <span class="hide-menu">&nbsp;Останато</span></h6>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('frontend.contact') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-message-dots"></i>
                </span>
                            <span class="hide-menu">Контакт</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="" aria-expanded="false">
                <span>
                  <i class="ti ti-info-square"></i>
                </span>
                            <span class="hide-menu">За нас</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <!-- Main wrapper -->
    <div class="body-wrapper">
        @yield('content')
    </div>


    <div class="offcanvas customizer offcanvas-end" tabindex="-1" id="offcanvasRestaurants"
         aria-labelledby="offcanvasRestaurants">
        <div class="d-flex align-items-center justify-content-between p-3 border-bottom">
            <h4 class="offcanvas-title fw-semibold" id="offcanvasRestaurants">
                Листа за понуда
            </h4>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body" data-simplebar style="height: calc(100vh - 80px)">
            <form id="main-page-contant-list" method="post" action="/main-contant">


                <div class="row">
                    <div class="col-md-12">
                        <div class="card w-100">
                            <div class="card-body">


                                <div class="position-relative" id="display-list-restaurants">
                                    <input type="hidden" name="restaurants" id="restaurants" value="true"/>
                                    @if(session()->get('cart'))
                                        @foreach(session()->get('cart') as  $restaurant)

                                            <div
                                                class="d-flex align-items-center justify-content-between mb-4 restaurant-items">
                                                <div class="d-flex">
                                                    <div
                                                        class="p-8  d-flex align-items-center justify-content-center me-6">
                                                        <div class="rounded-circle"
                                                             style="width: 60px; height: 60px; background-image: url('/images/logos/restaurants/thumbnails/{{ $restaurant->logo }}'); background-size: cover; background-position: center; background-color: #ffffff"></div>
                                                    </div>
                                                    <div style="margin-top: 30px">
                                                        <p class="fw-semibold"> {{ $restaurant->name }}</p>

                                                    </div>
                                                </div>
                                                <h6 class="mb-0 fw-semibold remove-restaurant-list"
                                                    data-restaurant-id="{{ $restaurant->id }}" style="cursor:pointer;">
                                                    x</h6>
                                            </div>
                                        @endforeach
                                    @endif


                                </div>

                                <div class="position-relative" id="display-list-photographers">
                                    <input type="hidden" name="photographers" id="photographers" value="true"/>
                                    @if(session()->get('cart-photo'))
                                        @foreach(session()->get('cart-photo') as $photographer)

                                            <div
                                                class="d-flex align-items-center justify-content-between mb-4 photographer-items">
                                                <div class="d-flex">
                                                    <div
                                                        class="p-8  d-flex align-items-center justify-content-center me-6">
                                                        <div class="rounded-circle"
                                                             style="width: 60px; height: 60px; background-image: url('/images/logos/photographers/thumbnails/{{ $photographer->logo }}'); background-size: cover; background-position: center; background-color: #ffffff"></div>
                                                    </div>
                                                    <div style="margin-top: 30px">
                                                        <p class="fw-semibold"> {{ $photographer->name }}</p>

                                                    </div>
                                                </div>
                                                <h6 class="mb-0 fw-semibold remove-photographer-list"
                                                    data-photographer-id="{{ $photographer->id }}"
                                                    style="cursor:pointer;">
                                                    x</h6>
                                            </div>
                                        @endforeach
                                    @endif


                                </div>

                            </div>
                        </div>

                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="firstName" class="control-label">Име</label>
                            <input type="text" id="firstName" name="firstName" class="form-control"
                                   placeholder="Петар" required>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="phone" class="control-label">Телефон</label>
                            <input type="tel" id="phone" name="phone" class="form-control"
                                   placeholder="070 555 555" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="datetime-form" class="control-label">Датум и време за контант</label>
                            <input type="datetime-local" id="datetime-form"
                                   value="{{ date('Y-m-d H:i',strtotime("-1 days")) }}" required
                                   min="{{ date('Y-m-d') }}" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" id="form-submit" class="btn btn-block btn-primary  text-white">Побарај
                            понуда
                        </button>
                    </div>
                </div>
            </form>


            <div class="row">
                <div class="col-md-12">
                    <p id="messageForm"></p>
                </div>
            </div>

        </div>


    </div>
    <!-- Main wrapper End -->
    @include('partials.footer')
</div>


<!-- ---------------------------------------------- -->
<!-- Import Js Files -->
<!-- ---------------------------------------------- -->
<script src="/js/jquery.min.js"></script>
<script src="/js/simplebar.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
<!-- ---------------------------------------------- -->
<!-- core files -->
<script src="/js/owl.carousel.min.js"></script>
<!-- ---------------------------------------------- -->
<script src="/dist/js/app.min.js"></script>
<script src="/dist/js/app.horizontal.init.js"></script>
<script src="/dist/js/app-style-switcher.js"></script>
<script src="/dist/js/sidebarmenu.js"></script>
<script src="/dist/js/custom.js"></script>
<script src="/dist/libs/prismjs/prism.js"></script>
<script src="/dist/libs/quill/dist/quill.min.js"></script>

<!-- ---------------------------------------------- -->
<!-- current page js files -->
<!-- ---------------------------------------------- -->


<script src="/dist/js/app.init.js"></script>

<script src="/js/wow.min.js"></script>

<script src="/js/modernizr.min.js"></script>
<script src="/js/swiper.min.js"></script>
<script src="/js/boomerang.min.js"></script>
<script src="/js/custom.js"></script>

<!-- ---------------------------------------------- -->


@yield('scripts')


<script>


    $(".photographers-list").one("click", function (e) {
        e.preventDefault();
        let id = $(this).data('photographer-id');
        $.ajax({
            url: "{{ route('frontend.getPhotographer') }}",
            method: 'post',
            data: {
                id: id,
            },
            headers: {
                'X-CSRF-TOKEN': "{{ @csrf_token() }}"
            },
            success: function (response) {
                $("#display-list-photographers").append(response);
                $("#restaurant-list-trigger").click();
                $("#countRestaurants").html(parseInt($("#countRestaurants").html()) + 1);

            }
        });

    });

    $(".restaurant-list").one("click", function (e) {
        e.preventDefault();
        let id = $(this).data('restaurant-id');
        $.ajax({
            url: "{{ route('frontend.getRestaurant') }}",
            method: 'post',
            data: {
                id: id,
            },
            headers: {
                'X-CSRF-TOKEN': "{{ @csrf_token() }}"
            },
            success: function (response) {
                $("#display-list-restaurants").append(response);
                $("#restaurant-list-trigger").click();
                $("#countRestaurants").html(parseInt($("#countRestaurants").html()) + 1);

            }
        });

    });


    $("#display-list-restaurants").on('click', ".remove-restaurant-list", function (e) {

        e.preventDefault();

        let elm = $(this);
        let id = $(this).data('restaurant-id');

        elm.parent().remove();
        $.ajax({
            url: "{{ route('frontend.removeRestaurant') }}",
            method: 'post',
            data: {
                id: id,
            },
            headers: {
                'X-CSRF-TOKEN': "{{ @csrf_token() }}"
            },
            success: function (response) {

                elm.parent().remove();
                $("#countRestaurants").html(parseInt($("#countRestaurants").html()) - 1);
            }
        });

    });


    $("#display-list-photographers").on('click', ".remove-photographer-list", function (e) {

        e.preventDefault();

        console.log("here");
        let elm = $(this);
        let id = $(this).data('photographer-id');

        elm.parent().remove();
        $.ajax({
            url: "{{ route('frontend.removePhotographer') }}",
            method: 'post',
            data: {
                id: id,
            },
            headers: {
                'X-CSRF-TOKEN': "{{ @csrf_token() }}"
            },
            success: function (response) {

                elm.parent().remove();
                $("#countRestaurants").html(parseInt($("#countRestaurants").html()) - 1);
            }
        });

    });
</script>
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TS8GHQQ2"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-H7XM5SM8DV"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'G-H7XM5SM8DV');
</script>


<script>
    $("#main-page-contant-list").on("submit", function (e) {
        e.preventDefault();
        let sendData = {
            firstName: $("#firstName").val(),
            dateTime: $("#datetime-form").val(),
            phone: $("#phone").val(),
            restaurants: $("#restaurants").val()
        }

        $.ajax({
            url: "{{ route('main.contact') }}",
            method: 'post',
            data: sendData,
            headers: {
                'X-CSRF-TOKEN': "{{ @csrf_token() }}"
            },
            success: function (response) {
                $("#messageForm").text("Ви благодариме, ќе бидете контактирани во избраното време од тимот на Драги Гости");
            },
            error: function (response) {
                $("#messageForm").text("Се случи грешка при испраќање на барањето, Ве молиме пробајте подоцна");
            }
        });
    });
</script>


<script>
    window.fbAsyncInit = function () {
        FB.init({
            appId: '1339434706768448',
            cookie: true,
            xfbml: true,
            version: '19.0'
        });

        FB.AppEvents.logPageView();

    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
</body>
</html>
