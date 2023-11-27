<!DOCTYPE html>
<!--[if IE 9]>
<html lang="en" class="ie9"> <![endif]-->
<!--[if gt IE 9]>
<html lang="en" class="ie"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>Драги Гости</title>
    <meta name="description" content="Покана за свадбата на Зоки и Ане">
    <meta name="author" content="Martin Karadzinov">
    <meta charset="utf-8"/>
    <meta name="description" content="Покана за свадбата на Зоки и Ане"/>
    <meta name="Author" content="Martin Karadzinov"/>
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Драги гости">
    <meta itemprop="description" content="Покана за свадбата на Зоки и Ане">
    <meta itemprop="image" content="{{ env('SITE_NAME').'/images/couple.jpg' }}">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="https://dragigosti.com">
    <meta name="twitter:title" content="Драги гости">
    <meta name="twitter:description" content="Покана за свадбата на Зоки и Ане">
    <meta name="twitter:creator" content="@tiggaz">
    <meta name="twitter:image" content="{{ env('SITE_NAME').'/images/couple.jpg' }}">
    <!-- Open Graph data -->
    <meta property="og:title" content="Драги гости"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="https://dragigosti.com"/>
    <meta property="og:image" content="{{ env('SITE_NAME').'/images/couple.jpg' }}"/>
    <meta property="og:description" content="Покана за свадбата на Зоки и Ане"/>
    <meta property="og:site_name" content="Драги гости"/>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">

    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Styles -->
    <link href="/css/all.css" rel="stylesheet">

    <!-- Web Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,500italic,700,700italic'
          rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:700,400,300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=PT+Serif' rel='stylesheet' type='text/css'>

</head>

<body class="no-trans front-page">
<!-- scrollToTop -->
<!-- ================ -->
<div class="scrollToTop circle"><i class="icon-up-open-big"></i></div>
<!-- page wrapper start -->
<!-- ================ -->
<div class="page-wrapper">
    <!-- header-container start -->
    <div class="header-container">
        <!-- ================ -->
        <header class="header centered fixed    clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- header-left start -->
                        <!-- ================ -->
                        <div class="header-left clearfix">
                            <!-- logo -->
                            <div id="logo" class="logo">
                                <h2 class="text-center logo-font margin-clear"><a href="#"
                                                                                  class="text-muted">{{ $invitation->male_name }}
                                        <span
                                            class="text-default"><i
                                                class="pl-10 pr-10 fa fa-heart"></i></span>{{ $invitation->female_name }}
                                    </a>
                                </h2>
                            </div>
                            <!-- name-and-slogan -->
                            <div class="site-slogan text-center">
                                Ве покануваат на нивната венчавка
                            </div>
                        </div>
                        <!-- header-left end -->
                    </div>
                </div>
            </div>
        </header>
        <!-- header end -->
    </div>
    <!-- header-container end -->
    <!-- banner start -->
    <!-- ================ -->
    <div class="pv-40 dark-translucent-bg"
         style="background-image: url(/images/invitations/{{$invitation->group_photo}});background-position: 80% 40%;">
        <div class="container pv-40">
            <div class="row">
                <div class="col-md-8 text-center col-md-offset-2 pv-40">
                    <div class="object-non-visible pv-40" data-animation-effect="fadeIn" data-effect-delay="100">
                        <h1 class="page-title text-center logo-font">Здраво!</h1>
                        <h1 class="page-title text-center logo-font">Време е за нашата венчавка</h1>
                        <div class="separator"></div>
                        <?php \Carbon\Carbon::setLocale('MK');
                        $dateYear = \Carbon\Carbon::parse($invitation->date)->format('Y');
                        $dateMonthDay = \Carbon\Carbon::parse($invitation->date)->format('d, M, ')
                        ?>
                            <!-- countdown start -->
                        <h3><em>{{ $dateMonthDay  }}</em><span id="year"> {{ $dateYear }}</span>.</h3>
                        <div id="defaultCountdown"></div>
                        <!-- countdown end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner end -->
    <!-- section start -->
    <!-- ================ -->
    <section class="light-gray-bg pv-30 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="text-center logo-font text-muted">{{ $invitation->male_name }} и <span
                            class="text-default">{{ $invitation->female_name }}</span>
                    </h2>
                    <div class="separator"></div>
                    <div id="main_text">
                        {!! $invitation->main_text !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section end -->

    <!-- ================ -->
    <section class="full-width-section">
        <div class="full-text-container left light-gray-bg border-clear text-right">
            <h2 class="logo-font">{{ $invitation->male_name }}</h2>
            <div class="separator-3 visible-lg"></div>
            <div id="male_text">
                {!! $invitation->male_text !!}
            </div>
            <div class="separator-2 visible-lg"></div>
        </div>

        <div class="full-image-container light-gray-bg border-clear">
            <img src="/images/invitations/{{$invitation->male_photo}}" alt="">
            <div class="full-image-overlay text-center">
                <h3>My <i class="fa fa-heart"></i> Is Yours</h3>
                <div id="male_quote">
                    {!! $invitation->male_quote !!}
                </div>
                <ul class="social-links circle animated-effect-1 text-center">
                    <li class="facebook"><a target="_blank" href="https://www.facebook.com/karadzinov"><i
                                class="fa fa-facebook"></i></a></li>
                    <li class="twitter"><a target="_blank" href="https://twitter.com/tiggaz"><i
                                class="fa fa-twitter"></i></a></li>
                    <li class="instagram"><a target="_blank" href="https://www.instagram.com/martin.karadzinov/"><i
                                class="fa fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </section>
    <!-- section end -->
    <!-- section start -->
    <!-- ================ -->
    <section class="full-width-section">
        <div class="full-image-container default-bg">
            <img class="to-right-block" src="/images/invitations/{{$invitation->female_photo}}" alt="">
            <div class="full-image-overlay text-center">
                <h3>Yes <i class="fa fa-heart"></i></h3>
                <div>
                    {!! $invitation->female_quote !!}
                </div>
                <ul class="social-links circle animated-effect-1 text-center">
                    <li class="facebook"><a target="_blank" href="https://www.facebook.com/tilia.ivanovska"><i
                                class="fa fa-facebook"></i></a></li>
                    <li class="twitter"><a target="_blank" href="https://twitter.com/tiliaiv/"><i
                                class="fa fa-twitter"></i></a></li>
                    <li class="instagram"><a target="_blank" href="https://www.instagram.com/tiliaiv/"><i
                                class="fa fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="full-text-container default-bg">
            <h2 class="logo-font">{{ $invitation->female_name }}</h2>
            <div class="separator-2 visible-lg"></div>
            <div>
                {!! $invitation->female_text !!}
            </div>
            <div class="separator-3 visible-lg"></div>
        </div>
    </section>
    <br>

    @if(isset($invitation->lng))
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="map-canvas"></div>
                </div>
            </div>
        </div>
    @endif
    @if(isset($invitation->restaurant_id))
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="dark-translucent-bg"
                         style="background-image: url(/images/cover_images/restaurants/originals/{{$invitation->restaurant->coverImg}});background-position: 80% 40%;">
                        <div class="container-fluid pv-40">
                            <div class="row">
                                <div class="col-md-8 text-center col-md-offset-2 pv-40">
                                    <div class="object-non-visible pv-40" data-animation-effect="fadeIn" data-effect-delay="100">
                                        <h3 class="page-title text-center logo-font">Ве отчекуваме во</h3>
                                        <h2 class="page-title text-center logo-font">Ресторан <a href="{{route('restaurants.profile', $invitation->restaurant->slug)}}"> {{ $invitation->restaurant->name }}</a></h2>
                                        <!-- countdown end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endif

    <!-- footer start (Add "dark" class to #footer in order to enable dark footer) -->
    <!-- ================ -->
    <footer id="footer" class="clearfix " style="overflow-x: hidden;">
        <div class="subfooter">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-center">Copyright © 2023 by <a target="_blank"
                                                                      href="https://pingdevs.com">PingDevs</a>.
                            All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer end -->
</div>
<!-- page-wrapper end -->



    {{--<script src="/dist/libs/jquery/dist/jquery.min.js"></script>--}}
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css"
      integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="/plugins/modernizr.js"></script>
<script src="/plugins/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script src="/plugins/isotope/isotope.pkgd.min.js"></script>
<script src="/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="/plugins/waypoints/jquery.waypoints.min.js"></script>
<script src="/plugins/jquery.countTo.js"></script>
<script src="/plugins/jquery.parallax-1.1.3.js"></script>
<script src="/plugins/jquery.validate.js"></script>
<script src="/js/google.map.config.js"></script>
<script src="/plugins/vide/jquery.vide.js"></script>
<script src="/plugins/owl-carousel/owl.carousel.js"></script>
<script src="/plugins/jquery.browser.js"></script>
<script src="/plugins/SmoothScroll.js"></script>
<script src="/js/template.js" defer></script>
<script src="/js/custom.js" defer></script>
<script src="/js/coming.soon.config.js"></script>
<script src="/plugins/jquery.countdown/jquery.plugin.js"></script>
<script src="/plugins/jquery.countdown/jquery.countdown.js"></script>
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAS05zxYcZTGI-KfGAk8l0xNC2eCWfNsPw"></script>

<script>
    $(document).ready(function () {

        var date = new Date("{{\Carbon\Carbon::parse($invitation->date)->format('Y, m, d')}}");
        $('#defaultCountdown').countdown({until: date});

    });
</script>
<script>
    $(document).ready(function () {
        window.addEventListener('load', (event) => { initAutocomplete(); });

        function initAutocomplete() {
            map = new google.maps.Map(document.getElementById('map-canvas'), {
                center: {lat: {{ $invitation->lat }}, lng: {{ $invitation->lng }}},
                zoom: 15
            });

            var marker = new google.maps.Marker({
                position: {lat: {{ $invitation->lat }}, lng: {{ $invitation->lng }}},
                map: map,
                draggable: false
            });
        }
    });
</script>

</body>
</html>
