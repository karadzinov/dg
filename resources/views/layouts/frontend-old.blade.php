<!DOCTYPE html>
<html lang="en">
<head>
    <!-- --------------------------------------------------- -->
    <!-- Title -->
    <!-- --------------------------------------------------- -->
    <title>Драги Гости</title>

    <!-- --------------------------------------------------- -->
    <!-- Required Meta Tag -->
    <!-- --------------------------------------------------- -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="handheldfriendly" content="true"/>
    <meta name="MobileOptimized" content="width"/>
    <meta name="description" content="Mordenize"/>
    <meta name="author" content=""/>
    <meta name="keywords" content="Mordenize"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <!-- --------------------------------------------------- -->
    <!-- Favicon -->
    <!-- --------------------------------------------------- -->
    <link rel="shortcut icon" type="image/png" href="/dist/images/2.svg"/>
    <link rel="stylesheet" href="/dist/libs/quill/dist/quill.snow.css">
    <link href="/dist/libs/quill/quill.snow.css" rel="stylesheet">
    <!-- --------------------------------------------------- -->
    <!-- Owl Carousel -->
    <!-- --------------------------------------------------- -->
    <link rel="stylesheet" href="/dist/libs/owl.carousel/dist/assets/owl.carousel.min.css">

    <!-- --------------------------------------------------- -->
    <!-- Prism Js -->
    <!-- --------------------------------------------------- -->
    <link rel="stylesheet" href="/dist/libs/prismjs/themes/prism-okaidia.min.css">

    <!-- --------------------------------------------------- -->
    <!-- Core Css -->
    <!-- --------------------------------------------------- -->

    <link id="themeColors" rel="stylesheet" href="/dist/css/style.min.css"/>
    <link id="themeColors" rel="stylesheet" href="/dist/css/datepicker.min.css"/>
    <link rel="stylesheet" href="/dist/css/custom.css"/>
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

    <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link sidebartoggler ms-n3" id="sidebarCollapse" href="javascript:void(0)">
                        <i class="ti ti-menu-2"></i>
                    </a>
                </li>
                <li class="nav-item d-none d-lg-block">
                    <a href="/" class="text-nowrap nav-link">
                        <img src="/dist/images/logo.svg" class="dark-logo" width="160" alt=""/>
                        <img src="/dist/images/logo.svg" class="light-logo" width="160" alt=""/>
                    </a>
                </li>
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)" data-bs-toggle="modal"
                       data-bs-target="#exampleModal">
                        <i class="ti ti-search"></i>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav quick-links d-none d-lg-flex">
                <li class="nav-item dropdown-hover d-none d-lg-block">
                    <a class="nav-link" href="/">Почетна</a>
                </li>
                <li class="nav-item dropdown-hover d-none d-lg-block">
                    <a class="mt-3 btn btn-danger" href="/">Креирајте покани</a>
                </li>
                <li class="nav-item dropdown-hover d-none d-lg-block">
                    <a class="nav-link" href="/">Услуги</a>
                </li>
                <li class="nav-item dropdown-hover d-none d-lg-block">
                    <a class="nav-link" href="{{ route('frontend.restaurants') }}">За нас</a>
                </li>
                <li class="nav-item dropdown-hover d-none d-lg-block">
                    <a class="nav-link" href="/">Контакт</a>
                </li>

            </ul>
            <div class="d-block d-lg-none">
                <a href="index.html" class="text-nowrap nav-link">
                    <img src="/dist/images/logo.svg" width="180" alt=""/>
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
                <div class="d-flex align-items-center justify-content-between px-0 px-lg-8">
                    <a href="javascript:void(0)"
                       class="nav-link round-40 p-1 ps-0 d-flex d-lg-none align-items-center justify-content-center"
                       type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar"
                       aria-controls="offcanvasWithBothOptions">
                        <i class="ti ti-align-justified fs-7"></i>
                    </a>

                </div>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <div class="d-flex align-items-center justify-content-between">
                    <a href="javascript:void(0)"
                       class="nav-link d-flex d-lg-none align-items-center justify-content-center"
                       type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar"
                       aria-controls="offcanvasWithBothOptions">
                        <i class="ti ti-align-justified fs-7"></i>
                    </a>
                    <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">

                        <!-- CHAT -->
                        <!-- CHAT
                         <li class="nav-item dropdown">
                             <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                 <i class="ti ti-bell-ringing"></i>
                                 <div class="notification bg-primary rounded-circle"></div>
                             </a>
                             <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                                  aria-labelledby="drop2">
                                 <div class="d-flex align-items-center justify-content-between py-3 px-7">
                                     <h5 class="mb-0 fs-5 fw-semibold">Notifications</h5>
                                     <span class="badge bg-primary rounded-4 px-3 py-1 lh-sm">5 new</span>
                                 </div>
                                 <div class="message-body" data-simplebar>
                                     <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
                         <span class="me-3">
                           <img src="../../dist/images/profile/user-1.jpg" alt="user" class="rounded-circle" width="48"
                                height="48" />
                         </span>
                                         <div class="w-75 d-inline-block v-middle">
                                             <h6 class="mb-1 fw-semibold">Roman Joined the Team!</h6>
                                             <span class="d-block">Congratulate him</span>
                                         </div>
                                     </a>
                                     <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
                         <span class="me-3">
                           <img src="../../dist/images/profile/user-2.jpg" alt="user" class="rounded-circle" width="48"
                                height="48" />
                         </span>
                                         <div class="w-75 d-inline-block v-middle">
                                             <h6 class="mb-1 fw-semibold">New message</h6>
                                             <span class="d-block">Salma sent you new message</span>
                                         </div>
                                     </a>
                                     <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
                         <span class="me-3">
                           <img src="../../dist/images/profile/user-3.jpg" alt="user" class="rounded-circle" width="48"
                                height="48" />
                         </span>
                                         <div class="w-75 d-inline-block v-middle">
                                             <h6 class="mb-1 fw-semibold">Bianca sent payment</h6>
                                             <span class="d-block">Check your earnings</span>
                                         </div>
                                     </a>
                                     <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
                         <span class="me-3">
                           <img src="../../dist/images/profile/user-4.jpg" alt="user" class="rounded-circle" width="48"
                                height="48" />
                         </span>
                                         <div class="w-75 d-inline-block v-middle">
                                             <h6 class="mb-1 fw-semibold">Jolly completed tasks</h6>
                                             <span class="d-block">Assign her new tasks</span>
                                         </div>
                                     </a>
                                     <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
                         <span class="me-3">
                           <img src="../../dist/images/profile/user-5.jpg" alt="user" class="rounded-circle" width="48"
                                height="48" />
                         </span>
                                         <div class="w-75 d-inline-block v-middle">
                                             <h6 class="mb-1 fw-semibold">John received payment</h6>
                                             <span class="d-block">$230 deducted from account</span>
                                         </div>
                                     </a>
                                     <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
                         <span class="me-3">
                           <img src="../../dist/images/profile/user-1.jpg" alt="user" class="rounded-circle" width="48"
                                height="48" />
                         </span>
                                         <div class="w-75 d-inline-block v-middle">
                                             <h6 class="mb-1 fw-semibold">Roman Joined the Team!</h6>
                                             <span class="d-block">Congratulate him</span>
                                         </div>
                                     </a>
                                 </div>
                                 <div class="py-6 px-7 mb-1">
                                     <button class="btn btn-outline-primary w-100"> See All Notifications </button>
                                 </div>
                             </div>
                         </li>
                         -->
                        <li class="nav-item dropdown">
                            <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown"
                               aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <div class="user-profile-img">
                                        <img src="../../dist/images/profile/user-1.jpg" class="rounded-circle"
                                             width="35" height="35"
                                             alt=""/>
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
                                            <img src="/dist/images/profile/user-1.jpg" class="rounded-circle"
                                                 width="80" height="80"
                                                 alt=""/>
                                            <div class="ms-3">
                                                <h5 class="mb-1 fs-3">Mathew Anderson</h5>
                                                <span class="mb-1 d-block text-dark">Designer</span>
                                                <p class="mb-0 d-flex text-dark align-items-center gap-2">
                                                    <i class="ti ti-mail fs-4"></i> info@modernize.com
                                                </p>
                                            </div>
                                        </div>
                                        <div class="message-body">
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
                                        </div>
                                        <div class="d-grid py-4 px-7 pt-8">
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
                                            <a href="{{ route('login') }}" class="btn btn-outline-primary">Логирај се</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Header End -->


    <!-- Sidebar Start -->

    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div>
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav scroll-sidebar">
                <ul id="sidebarnav">
                    <!-- ============================= -->
                    <!-- Home -->
                    <!-- ============================= -->
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Home</span>
                    </li>
                    <!-- =================== -->
                    <!-- Dashboard -->
                    <!-- =================== -->

                    <!-- ============================= -->
                    <!-- Apps -->
                    <!-- ============================= -->

                    <!-- ============================= -->
                    <!-- PAGES -->
                    <!-- ============================= -->
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Почетна</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('frontend.restaurants') }}" aria-expanded="false">
                  <span>
                    <i class="ti ti-home-2"></i>
                  </span>
                            <span class="hide-menu">Ресторани</span>
                        </a>

                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="javascript:void(0)" aria-expanded="false">
                  <span>
                    <i class="ti ti-music"></i>
                  </span>
                            <span class="hide-menu">Музичари</span>
                        </a>

                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="javascript:void(0)" aria-expanded="false">
                  <span>
                    <i class="ti ti-camera"></i>
                  </span>
                            <span class="hide-menu">Фотографи</span>
                        </a>

                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="javascript:void(0)" aria-expanded="false">
                  <span>
                    <i class="ti ti-hotel-service"></i>
                  </span>
                            <span class="hide-menu">Останато</span>
                        </a>

                    </li>


                </ul>
                <div
                    class="unlimited-access hide-menu bg-light-primary position-relative my-7 rounded d-block d-lg-none">
                    <div class="d-flex">
                        <div class="unlimited-access-title">
                            <h6 class="fw-semibold fs-4 mb-6 text-dark w-85">Unlimited Access</h6>
                            <button class="btn btn-primary fs-2 fw-semibold lh-sm">Signup</button>
                        </div>
                        <div class="unlimited-access-img">
                            <img src="/dist/images/backgrounds/rocket.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
        <div class="fixed-profile p-3 bg-light-secondary rounded sidebar-ad mt-3 mx-9 d-block d-lg-none">
            <div class="hstack gap-3 justify-content-between">
                <div class="john-img">
                    <img src="/dist/images/profile/user-1.jpg" class="rounded-circle" width="42" height="42" alt="">
                </div>
                <div class="john-title">
                    <h6 class="mb-0 fs-4">John Doe</h6>
                    <span class="fs-2">Designer</span>
                </div>
                <button class="border-0 bg-transparent text-primary ms-2" tabindex="0" type="button" aria-label="logout"
                        data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="logout">
                    <i class="ti ti-power fs-6"></i>
                </button>
            </div>
        </div>
    </aside>

    <!-- Sidebar End -->


    <!-- Main wrapper -->

    <div class="body-wrapper">
        @yield('content')
    </div>
</div>

<!--  Shopping Cart -->
<div class="offcanvas offcanvas-end shopping-cart" tabindex="-1" id="offcanvasRight"
     aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header py-4">
        <h5 class="offcanvas-title fs-5 fw-semibold" id="offcanvasRightLabel">Shopping Cart</h5>
        <span class="badge bg-primary rounded-4 px-3 py-1 lh-sm">5 new</span>
    </div>
    <div class="offcanvas-body h-100 px-4 pt-0" data-simplebar>
        <ul class="mb-0">
            <li class="pb-7">
                <div class="d-flex align-items-center">
                    <img src="/dist/images/products/product-1.jpg" width="95" height="75"
                         class="rounded-1 me-9 flex-shrink-0" alt=""/>
                    <div>
                        <h6 class="mb-1">Supreme toys cooker</h6>
                        <p class="mb-0 text-muted fs-2">Kitchenware Item</p>
                        <div class="d-flex align-items-center justify-content-between mt-2">
                            <h6 class="fs-2 fw-semibold mb-0 text-muted">$250</h6>
                            <div class="input-group input-group-sm w-50">
                                <button class="btn border-0 round-20 minus p-0 bg-light-success text-success "
                                        type="button" id="add1"> -
                                </button>
                                <input type="text"
                                       class="form-control round-20 bg-transparent text-muted fs-2 border-0  text-center qty"
                                       placeholder="" aria-label="Example text with button addon"
                                       aria-describedby="add1" value="1"/>
                                <button class="btn text-success bg-light-success  p-0 round-20 border-0 add"
                                        type="button" id="addo2"> +
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="pb-7">
                <div class="d-flex align-items-center">
                    <img src="/dist/images/products/product-2.jpg" width="95" height="75"
                         class="rounded-1 me-9 flex-shrink-0" alt=""/>
                    <div>
                        <h6 class="mb-1">Supreme toys cooker</h6>
                        <p class="mb-0 text-muted fs-2">Kitchenware Item</p>
                        <div class="d-flex align-items-center justify-content-between mt-2">
                            <h6 class="fs-2 fw-semibold mb-0 text-muted">$250</h6>
                            <div class="input-group input-group-sm w-50">
                                <button class="btn border-0 round-20 minus p-0 bg-light-success text-success "
                                        type="button" id="add2"> -
                                </button>
                                <input type="text"
                                       class="form-control round-20 bg-transparent text-muted fs-2 border-0  text-center qty"
                                       placeholder="" aria-label="Example text with button addon"
                                       aria-describedby="add2" value="1"/>
                                <button class="btn text-success bg-light-success  p-0 round-20 border-0 add"
                                        type="button" id="addon34"> +
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="pb-7">
                <div class="d-flex align-items-center">
                    <img src="/dist/images/products/product-3.jpg" width="95" height="75"
                         class="rounded-1 me-9 flex-shrink-0" alt=""/>
                    <div>
                        <h6 class="mb-1">Supreme toys cooker</h6>
                        <p class="mb-0 text-muted fs-2">Kitchenware Item</p>
                        <div class="d-flex align-items-center justify-content-between mt-2">
                            <h6 class="fs-2 fw-semibold mb-0 text-muted">$250</h6>
                            <div class="input-group input-group-sm w-50">
                                <button class="btn border-0 round-20 minus p-0 bg-light-success text-success "
                                        type="button" id="add3"> -
                                </button>
                                <input type="text"
                                       class="form-control round-20 bg-transparent text-muted fs-2 border-0  text-center qty"
                                       placeholder="" aria-label="Example text with button addon"
                                       aria-describedby="add3" value="1"/>
                                <button class="btn text-success bg-light-success  p-0 round-20 border-0 add"
                                        type="button" id="addon3"> +
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="align-bottom">
            <div class="d-flex align-items-center pb-7">
                <span class="text-dark fs-3">Sub Total</span>
                <div class="ms-auto">
                    <span class="text-dark fw-semibold fs-3">$2530</span>
                </div>
            </div>
            <div class="d-flex align-items-center pb-7">
                <span class="text-dark fs-3">Total</span>
                <div class="ms-auto">
                    <span class="text-dark fw-semibold fs-3">$6830</span>
                </div>
            </div>
            <a href="./eco-checkout.html" class="btn btn-outline-primary w-100">Go to shopping cart</a>
        </div>
    </div>
</div>


<!--  Search Bar -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content rounded-1">
            <div class="modal-header border-bottom">
                <input type="search" class="form-control fs-3" placeholder="Search here" id="search"/>
                <span data-bs-dismiss="modal" class="lh-1 cursor-pointer">
              <i class="ti ti-x fs-5 ms-3"></i>
            </span>
            </div>
            <div class="modal-body message-body" data-simplebar="">
                <h5 class="mb-0 fs-5 p-1">Quick Page Links</h5>
                <ul class="list mb-0 py-2">
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="#">
                            <span class="fs-3 text-black fw-normal d-block">Modern</span>
                            <span class="fs-3 text-muted d-block">/dashboards/dashboard1</span>
                        </a>
                    </li>
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="#">
                            <span class="fs-3 text-black fw-normal d-block">Dashboard</span>
                            <span class="fs-3 text-muted d-block">/dashboards/dashboard2</span>
                        </a>
                    </li>
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="#">
                            <span class="fs-3 text-black fw-normal d-block">Contacts</span>
                            <span class="fs-3 text-muted d-block">/apps/contacts</span>
                        </a>
                    </li>
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="#">
                            <span class="fs-3 text-black fw-normal d-block">Posts</span>
                            <span class="fs-3 text-muted d-block">/apps/blog/posts</span>
                        </a>
                    </li>
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="#">
                            <span class="fs-3 text-black fw-normal d-block">Detail</span>
                            <span class="fs-3 text-muted d-block">/apps/blog/detail/streaming-video-way-before-it-was-cool-go-dark-tomorrow</span>
                        </a>
                    </li>
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="#">
                            <span class="fs-3 text-black fw-normal d-block">Shop</span>
                            <span class="fs-3 text-muted d-block">/apps/ecommerce/shop</span>
                        </a>
                    </li>
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="#">
                            <span class="fs-3 text-black fw-normal d-block">Modern</span>
                            <span class="fs-3 text-muted d-block">/dashboards/dashboard1</span>
                        </a>
                    </li>
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="#">
                            <span class="fs-3 text-black fw-normal d-block">Dashboard</span>
                            <span class="fs-3 text-muted d-block">/dashboards/dashboard2</span>
                        </a>
                    </li>
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="#">
                            <span class="fs-3 text-black fw-normal d-block">Contacts</span>
                            <span class="fs-3 text-muted d-block">/apps/contacts</span>
                        </a>
                    </li>
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="#">
                            <span class="fs-3 text-black fw-normal d-block">Posts</span>
                            <span class="fs-3 text-muted d-block">/apps/blog/posts</span>
                        </a>
                    </li>
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="#">
                            <span class="fs-3 text-black fw-normal d-block">Detail</span>
                            <span class="fs-3 text-muted d-block">/apps/blog/detail/streaming-video-way-before-it-was-cool-go-dark-tomorrow</span>
                        </a>
                    </li>
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="#">
                            <span class="fs-3 text-black fw-normal d-block">Shop</span>
                            <span class="fs-3 text-muted d-block">/apps/ecommerce/shop</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- --------------------------------------------------- -->
<!-- Customizer -->
<!-- --------------------------------------------------- -->


<!-- ---------------------------------------------- -->
<!-- Customizer -->
<!-- ---------------------------------------------- -->

<!-- ---------------------------------------------- -->
<!-- Import Js Files -->
<!-- ---------------------------------------------- -->
<script src="/dist/libs/jquery/dist/jquery.min.js"></script>
<script src="/dist/libs/simplebar/dist/simplebar.min.js"></script>
<script src="/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- ---------------------------------------------- -->
<!-- core files -->
<!-- ---------------------------------------------- -->
<script src="/dist/js/app.min.js"></script>
<script src="/dist/js/app.horizontal.init.js"></script>
<script src="/dist/js/app-style-switcher.js"></script>
<script src="/dist/js/sidebarmenu.js"></script>

<script src="/dist/js/custom.js"></script>
<script src="/dist/libs/prismjs/prism.js"></script>

<!-- ---------------------------------------------- -->
<!-- current page js files -->
<!-- ---------------------------------------------- -->
<script src="/dist/js/apps/chat.js"></script>
<script src="/dist/js/moment.js"></script>
<script src="/dist/js/datepicker.min.js"></script>
<script src="/dist/js/index.global.min.js"></script>
<script src="/dist/js/calendar.init.js"></script>

<script src="/dist/libs/jquery-steps/build/jquery.steps.min.js"></script>
<script src="/dist/libs/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="/dist/js/forms/form-wizard.js"></script>

<script src="/dist/libs/quill/dist/quill.min.js"></script>
<script src="/dist/libs/quill/quill.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Datatables Responsive
        $("#datatable").DataTable({
            "filter": false,
            "length": false
        });
    });
    var toolbarOptions = [
        ["bold", "underline"],
        ["link", "blockquote", "code", "image"],
        [{list: "ordered"}, {list: "bullet"}]
    ];
    $('.quill-editor').each(function (i, el) {
        var el = $(this), id = 'quilleditor-' + i, val = el.val(), editor_height = 200;
        var div = $('<div/>').attr('id', id).css('height', editor_height + 'px').html(val);
        el.addClass('d-none');
        el.parent().append(div);
        var quill = new Quill('#' + id, {
            modules: {toolbar: toolbarOptions},
            theme: 'snow'
        });
        quill.on('text-change', function () {
            console.log(quill.container.firstChild.innerHTML);
            el.html();
            $("#description").val(quill.container.firstChild.innerHTML);
        });
    });
</script>
<script>
    $('document').ready(function () {

        $('.clone').on('click', function (e) {
            e.preventDefault();
        });

        $('.remove').on('click', function (e) {
            e.preventDefault();
        });
        var regex = /^(.+?)(\d+)$/i;
        var cloneIndex = $(".clonedInput").length;

        function clone() {
            console.log('ok');
            $(".clonedInput").last().clone()
                .appendTo(".showHere")
                .attr("id", "clonedInput" + cloneIndex)
                .find("*")
                .each(function () {
                    var id = this.id || "";
                    var match = id.match(regex) || [];
                    if (match.length == 3) {
                        this.id = match[1] + (cloneIndex);
                    }
                })
                .on('click', 'button.clone', clone)
                .on('click', 'button.remove', remove);
            cloneIndex++;
        }

        function remove() {
            $(".clonedInput").last().remove();
        }

        $("button.clone").on("click", clone);

        $("button.remove").on("click", remove);

    });

</script>
<script>
    // Date Picker
    jQuery(".mydatepicker, #datepicker, .input-group.date").datepicker();
    jQuery("#datepicker-autoclose").datepicker({
        autoclose: true,
        todayHighlight: true,
    });
    jQuery("#date-range").datepicker({
        toggleActive: true,
    });
    jQuery("#datepicker-inline").datepicker({
        todayHighlight: true,
    });
</script>
</body>
</html>