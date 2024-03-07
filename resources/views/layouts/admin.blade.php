<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon icon-->
    <link
        rel="shortcut icon"
        type="image/png"
        href="/assets/images/logos/favicon.png"
    />

    <!-- Core Css -->
    <link rel="stylesheet" href="/assets/css/styles.css" />

    <title>Драги Гости - Admin</title>
    <!-- Owl Carousel  -->
    <link
        rel="stylesheet"
        href="/assets/libs/owl.carousel/dist/assets/owl.carousel.min.css"
    />

    <link rel="stylesheet" href="/assets/css/custom.css" />
</head>

<body>

<div id="main-wrapper">
    <!-- Sidebar Start -->
    <aside class="left-sidebar with-vertical">
        <div><!-- ---------------------------------- -->
            <!-- Start Vertical Layout Sidebar -->
            <!-- ---------------------------------- -->
            <div class="brand-logo d-flex align-items-center justify-content-between">
                <a href="../main/index.html" class="text-nowrap logo-img">
                    <img
                        src="/dist/images/logos/logo-main.png"
                        class="dark-logo w-50"
                        alt="Logo-Dark"
                    />

                </a>
                <a
                    href="javascript:void(0)"
                    class="sidebartoggler ms-auto text-decoration-none fs-5 d-block d-xl-none"
                >
                    <i class="ti ti-x"></i>
                </a>
            </div>


            <nav class="sidebar-nav scroll-sidebar" data-simplebar>
                <ul id="sidebarnav">
                    <!-- ---------------------------------- -->
                    <!-- Home -->
                    <!-- ---------------------------------- -->
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Home</span>
                    </li>
                    <!-- ---------------------------------- -->
                    <!-- Dashboard -->
                    <!-- ---------------------------------- -->
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('admin.users.index') }}" aria-expanded="false">
        <span>
          <i class="ti ti-aperture"></i>
        </span>
                            <span class="hide-menu">Users</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('admin.restaurants.index') }}" aria-expanded="false">
        <span>
          <i class="ti ti-salad"></i>
        </span>
                            <span class="hide-menu">Restaurants</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('admin.categories.index') }}" aria-expanded="false">
        <span>
          <i class="ti ti-aperture"></i>
        </span>
                            <span class="hide-menu">Categories</span>
                        </a>
                    </li>


        </div>
    </aside>
    <!--  Sidebar End -->
    <div class="page-wrapper">
        <!--  Header Start -->
        <header class="topbar">
            <div class="with-vertical"><!-- ---------------------------------- -->
                <!-- Start Vertical Layout Header -->
                <!-- ---------------------------------- -->
                <nav class="navbar navbar-expand-lg p-0">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a
                                class="nav-link sidebartoggler nav-icon-hover ms-n3"
                                id="headerCollapse"
                                href="javascript:void(0)"
                            >
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>

                    </ul>

                    <ul class="navbar-nav quick-links d-none d-lg-flex">
                        <!-- ------------------------------- -->
                        <!-- start apps Dropdown -->
                        <!-- ------------------------------- -->

                    </ul>

                    <div class="d-block d-lg-none">
                        <a href="{{ route('admin.users.index') }}" class="text-nowrap logo-img">
                            <img
                                src="/dist/images/logos/logo-main.png"
                                class="dark-logo "
                                alt="Logo-Dark"
                                style="max-width: 100px;"
                            />

                        </a>
                    </div>
                    <a
                        class="navbar-toggler nav-icon-hover p-0 border-0"
                        href="javascript:void(0)"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarNav"
                        aria-controls="navbarNav"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
    <span class="p-2">
      <i class="ti ti-dots fs-7"></i>
    </span>
                    </a>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                        <div class="d-flex align-items-center justify-content-between">

                            <ul
                                class="navbar-nav flex-row ms-auto align-items-center justify-content-center"
                            >


                                <!-- ------------------------------- -->
                                <!-- start notification Dropdown -->
                                <!-- ------------------------------- -->
                                <li class="nav-item dropdown">

                                    <a
                                        class="nav-link nav-icon-hover"
                                        href="javascript:void(0)"
                                        id="drop2"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false"
                                    >
                                        <i class="ti ti-bell-ringing"></i>
                                        <div class="notification bg-primary rounded-circle"></div>
                                    </a>
                                    <div
                                        class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                                        aria-labelledby="drop2"
                                    >
                                        <div class="d-flex align-items-center justify-content-between py-3 px-7">
                                            <h5 class="mb-0 fs-5 fw-semibold">Notifications</h5>
                                            <span class="badge text-bg-primary rounded-4 px-3 py-1 lh-sm">0 new</span>
                                        </div>
                                        <div class="message-body" data-simplebar>

                                        </div>
                                        <div class="py-6 px-7 mb-1">
                                            <button class="btn btn-outline-primary w-100">See All Notifications</button>
                                        </div>

                                    </div>
                                </li>
                                <!-- ------------------------------- -->
                                <!-- end notification Dropdown -->
                                <!-- ------------------------------- -->

                                <!-- ------------------------------- -->
                                <!-- start profile Dropdown -->
                                <!-- ------------------------------- -->
                                <li class="nav-item dropdown">
                                    <a
                                        class="nav-link pe-0"
                                        href="javascript:void(0)"
                                        id="drop1"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false"
                                    >
                                        <div class="d-flex align-items-center">
                                            <div class="user-profile-img">
                                                <img
                                                    src="/assets/images/profile/user-1.jpg"
                                                    class="rounded-circle"
                                                    width="35"
                                                    height="35"
                                                    alt=""
                                                />
                                            </div>
                                        </div>
                                    </a>
                                    <div
                                        class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                                        aria-labelledby="drop1"
                                    >
                                        <div class="profile-dropdown position-relative" data-simplebar>
                                            <div class="py-3 px-7 pb-0">
                                                <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
                                            </div>
                                            <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                                <img
                                                    src="/assets/images/profile/user-1.jpg"
                                                    class="rounded-circle"
                                                    width="80"
                                                    height="80"
                                                    alt=""
                                                />
                                                <div class="ms-3">
                                                    <h5 class="mb-1 fs-3">{{ auth()->user()->name }}</h5>
                                                    <span class="mb-1 d-block">{{ auth()->user()->role->name }}</span>
                                                    <p class="mb-0 d-flex align-items-center gap-2">
                                                        <i class="ti ti-mail fs-4"></i> {{ auth()->user()->email }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="d-grid py-4 px-7 pt-8">



                                                <a class="btn btn-outline-primary" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </li>
                                <!-- ------------------------------- -->
                                <!-- end profile Dropdown -->
                                <!-- ------------------------------- -->
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- ---------------------------------- -->
                <!-- End Vertical Layout Header -->
                <!-- ---------------------------------- -->

                <!-- ------------------------------- -->
                <!-- apps Dropdown in Small screen -->
                <!-- ------------------------------- -->



            </div>

        </header>
        <!--  Header End -->



        <div class="body-wrapper">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>



        <div class="offcanvas customizer offcanvas-end" tabindex="-1" id="offcanvasExample"
             aria-labelledby="offcanvasExampleLabel">
            <div class="d-flex align-items-center justify-content-between p-3 border-bottom">
                <h4 class="offcanvas-title fw-semibold" id="offcanvasExampleLabel">
                    Settings
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body h-n80" data-simplebar>
                <h6 class="fw-semibold fs-4 mb-2">Theme</h6>

                <div class="d-flex flex-row gap-3 customizer-box" role="group">
                    <input type="radio" class="btn-check light-layout" name="theme-layout" id="light-layout" autocomplete="off" />
                    <label class="btn p-9 btn-outline-primary rounded-2" for="light-layout"><i
                            class="icon ti ti-brightness-up fs-7 me-2"></i>Light</label>

                    <input type="radio" class="btn-check dark-layout" name="theme-layout" id="dark-layout" autocomplete="off" />
                    <label class="btn p-9 btn-outline-primary rounded-2" for="dark-layout"><i
                            class="icon ti ti-moon fs-7 me-2"></i>Dark</label>
                </div>

                <h6 class="mt-5 fw-semibold fs-4 mb-2">Theme Direction</h6>
                <div class="d-flex flex-row gap-3 customizer-box" role="group">
                    <input type="radio" class="btn-check" name="direction-l" id="ltr-layout" autocomplete="off" />
                    <label class="btn p-9 btn-outline-primary" for="ltr-layout"><i
                            class="icon ti ti-text-direction-ltr fs-7 me-2"></i>LTR</label>

                    <input type="radio" class="btn-check" name="direction-l" id="rtl-layout" autocomplete="off" />
                    <label class="btn p-9 btn-outline-primary" for="rtl-layout"><i
                            class="icon ti ti-text-direction-rtl fs-7 me-2"></i>RTL</label>
                </div>

                <h6 class="mt-5 fw-semibold fs-4 mb-2">Theme Colors</h6>

                <div class="d-flex flex-row flex-wrap gap-3 customizer-box color-pallete" role="group">
                    <input type="radio" class="btn-check" name="color-theme-layout" id="Blue_Theme"
                           autocomplete="off" />
                    <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center" onclick="handleColorTheme('Blue_Theme')"
                           for="Blue_Theme" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="BLUE_THEME">
                        <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-1">
                            <i class="ti ti-check text-white d-flex icon fs-5"></i>
                        </div>
                    </label>

                    <input type="radio" class="btn-check" name="color-theme-layout"  id="Aqua_Theme"
                           autocomplete="off" />
                    <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center" onclick="handleColorTheme('Aqua_Theme')"
                           for="Aqua_Theme" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="AQUA_THEME">
                        <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-2">
                            <i class="ti ti-check text-white d-flex icon fs-5"></i>
                        </div>
                    </label>

                    <input type="radio" class="btn-check" name="color-theme-layout" id="Purple_Theme" autocomplete="off" />
                    <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center" onclick="handleColorTheme('Purple_Theme')"
                           for="Purple_Theme" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="PURPLE_THEME">
                        <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-3">
                            <i class="ti ti-check text-white d-flex icon fs-5"></i>
                        </div>
                    </label>

                    <input type="radio" class="btn-check" name="color-theme-layout" id="green-theme-layout" autocomplete="off" />
                    <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center" onclick="handleColorTheme('Green_Theme')"
                           for="green-theme-layout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="GREEN_THEME">
                        <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-4">
                            <i class="ti ti-check text-white d-flex icon fs-5"></i>
                        </div>
                    </label>

                    <input type="radio" class="btn-check" name="color-theme-layout" id="cyan-theme-layout" autocomplete="off" />
                    <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center" onclick="handleColorTheme('Cyan_Theme')"
                           for="cyan-theme-layout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="CYAN_THEME">
                        <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-5">
                            <i class="ti ti-check text-white d-flex icon fs-5"></i>
                        </div>
                    </label>

                    <input type="radio" class="btn-check" name="color-theme-layout" id="orange-theme-layout" autocomplete="off" />
                    <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center" onclick="handleColorTheme('Orange_Theme')"
                           for="orange-theme-layout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="ORANGE_THEME">
                        <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-6">
                            <i class="ti ti-check text-white d-flex icon fs-5"></i>
                        </div>
                    </label>
                </div>

                <h6 class="mt-5 fw-semibold fs-4 mb-2">Layout Type</h6>
                <div class="d-flex flex-row gap-3 customizer-box" role="group">
                    <div>
                        <input type="radio" class="btn-check" name="page-layout" id="vertical-layout" autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary" for="vertical-layout"><i
                                class="icon ti ti-layout-sidebar-right fs-7 me-2"></i>Vertical</label>
                    </div>
                    <div>
                        <input type="radio" class="btn-check" name="page-layout" id="horizontal-layout" autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary" for="horizontal-layout"><i
                                class="icon ti ti-layout-navbar fs-7 me-2"></i>Horizontal</label>
                    </div>
                </div>

                <h6 class="mt-5 fw-semibold fs-4 mb-2">Container Option</h6>

                <div class="d-flex flex-row gap-3 customizer-box" role="group">
                    <input type="radio" class="btn-check" name="layout" id="boxed-layout" autocomplete="off" />
                    <label class="btn p-9 btn-outline-primary" for="boxed-layout"><i
                            class="icon ti ti-layout-distribute-vertical fs-7 me-2"></i>Boxed</label>

                    <input type="radio" class="btn-check" name="layout" id="full-layout" autocomplete="off" />
                    <label class="btn p-9 btn-outline-primary" for="full-layout"><i
                            class="icon ti ti-layout-distribute-horizontal fs-7 me-2"></i>Full</label>
                </div>

                <h6 class="fw-semibold fs-4 mb-2 mt-5">Sidebar Type</h6>
                <div class="d-flex flex-row gap-3 customizer-box" role="group">
                    <a href="javascript:void(0)" class="fullsidebar">
                        <input type="radio" class="btn-check" name="sidebar-type" id="full-sidebar" autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary" for="full-sidebar"><i
                                class="icon ti ti-layout-sidebar-right fs-7 me-2"></i>Full</label>
                    </a>
                    <div>
                        <input type="radio" class="btn-check " name="sidebar-type" id="mini-sidebar" autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary" for="mini-sidebar"><i
                                class="icon ti ti-layout-sidebar fs-7 me-2"></i>Collapse</label>
                    </div>
                </div>

                <h6 class="mt-5 fw-semibold fs-4 mb-2">Card With</h6>

                <div class="d-flex flex-row gap-3 customizer-box" role="group">
                    <input type="radio" class="btn-check" name="card-layout" id="card-with-border" autocomplete="off" />
                    <label class="btn p-9 btn-outline-primary" for="card-with-border"><i
                            class="icon ti ti-border-outer fs-7 me-2"></i>Border</label>

                    <input type="radio" class="btn-check" name="card-layout" id="card-without-border" autocomplete="off" />
                    <label class="btn p-9 btn-outline-primary" for="card-without-border"><i
                            class="icon ti ti-border-none fs-7 me-2"></i>Shadow</label>
                </div>
            </div>
        </div>
    </div>

    <!--  Search Bar -->


    <!--  Shopping Cart -->


</div>
<div class="dark-transparent sidebartoggler"></div>
<script src="/assets/js/vendor.min.js"></script>
<!-- Import Js Files -->
<script src="/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="/assets/libs/simplebar/dist/simplebar.min.js"></script>
<script src="/assets/js/theme/app.init.js"></script>
<script src="/assets/js/theme/theme.js"></script>
<script src="/assets/js/theme/app.min.js"></script>
<script src="/assets/js/theme/sidebarmenu.js"></script>

<!-- solar icons -->
<script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
<script src="/assets/libs/owl.carousel/dist/owl.carousel.min.js"></script>
<script src="/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="/assets/js/dashboards/dashboard.js"></script>

@yield('scripts')
</body>
</html>
