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
        <nav class="text-center">
            <ul class="text-center">
                <li class="text-center">
                    <a class="text-nowrap nav-link">
                        <img src="/dist/images/logos/logo-main.png" class="dark-logo" width="80" alt=""/>

                    </a>
                </li>
            </ul>
        </nav>
    </header>
    <!-- Header End -->
    <!--  Mobilenavbar -->
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="mobilenavbar"
         aria-labelledby="offcanvasWithBothOptionsLabel">
        <nav class="sidebar-nav scroll-sidebar">
            <div class="offcanvas-header justify-content-between">
                <img src="/dist/images/logos/logo-main.png" width="60" alt="" class="img-fluid">
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
        </nav>
    </div>

    <!-- Main wrapper -->
    <div class="body-wrapper">
        @yield('content')
    </div>
    <!-- Main wrapper End -->
</div>

<!-- ---------------------------------------------- -->
<!-- Import Js Files -->
<!-- ---------------------------------------------- -->
<script src="/dist/libs/jquery/dist/jquery.min.js"></script>
<script src="/dist/libs/simplebar/dist/simplebar.min.js"></script>
<script src="/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

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
<!-- ---------------------------------------------- -->

</body>
</html>
