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
    <x-embed-styles />
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
    <link href="/css/swiper-bundle.min.css" rel="stylesheet">
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
    <style>

    </style>
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
                        <img src="/dist/images/logo.svg" class="dark-logo" width="160" alt=""/>
                        <img src="/dist/images/logo.svg" class="light-logo" width="160" alt=""/>
                    </a>
                </li>
                <li class="nav-item dropdown-hover d-none d-lg-block">
                    <a class="nav-link " href="/" data-bs-toggle="modal"
                       data-bs-target="#exampleModal">
                        <i class="ti ti-search"></i>
                    </a>
                </li>
                <li class="nav-item dropdown-hover d-none d-lg-block">
                    <a class="nav-link" href="{{ route('frontend.index') }}">Почетна</a>
                </li>
                <li class="nav-item dropdown-hover d-none d-lg-block">
                    <a class="nav-link" href="{{ route('frontend.invitations') }}">Креирајте покани</a>
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
                                                <a href="./app-notes.html"
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
                <img src="/dist/images/logo.svg" class="dark-logo" width="160" alt=""/>
                <img src="/dist/images/logo.svg" class="light-logo" width="160" alt=""/>
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
                                        <img src="/dist/images/profile/user-1.jpg" class="rounded-circle"
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
                                                <h5 class="mb-1 fs-3">{{ Auth::user()->name }}</h5>
                                                <p class="mb-0 d-flex text-dark align-items-center gap-2">
                                                    <i class="ti ti-mail fs-4"></i> {{ Auth::user()->email }}
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
    <!--  Mobilenavbar -->
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="mobilenavbar"
         aria-labelledby="offcanvasWithBothOptionsLabel">
        <nav class="sidebar-nav scroll-sidebar">
            <div class="offcanvas-header justify-content-between">
                <img src="/dist/images/logo.svg" width="160" alt="" class="img-fluid">
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
                        <a class="sidebar-link" href="{{ route('frontend.invitations') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-photo"></i>
                </span>
                            <span class="hide-menu">Креирајте покани</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow"  aria-expanded="false">
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
                                <a href="./app-notes.html"
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
                        <a class="sidebar-link" href="app-calendar.html" aria-expanded="false">
                <span>
                  <i class="ti ti-info-square"></i>
                </span>
                            <span class="hide-menu">За над</span>
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
    <!-- Main wrapper End -->
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

<!-- ---------------------------------------------- -->
<!-- Import Js Files -->
<!-- ---------------------------------------------- -->
<script src="/dist/libs/jquery/dist/jquery.min.js"></script>
<script src="/dist/libs/simplebar/dist/simplebar.min.js"></script>
<script src="/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- ---------------------------------------------- -->
<!-- core files -->
<script src="/dist/libs/owl.carousel/dist/owl.carousel.min.js"></script>
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
<script src="/dist/js/productDetail.js"></script>
<script src="/dist/js/app.init.js"></script>
<script src="/dist/libs/dropzone/dist/min/dropzone.min.js"></script>
<!-- ---------------------------------------------- -->
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

@yield('scripts')

</body>
</html>
