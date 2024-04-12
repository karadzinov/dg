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
    <meta name="description" content="Покана за роденден на {{ $invitation->name }}">
    <meta name="author" content="Martin Karadzinov">
    <meta charset="utf-8"/>
    <meta name="description" content="Покана за роденден на {{ $invitation->name }}"/>
    <meta name="Author" content="Martin Karadzinov"/>
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Драги гости">
    <meta itemprop="description" content="Покана за роденден на {{ $invitation->name }}">
    <meta itemprop="image" content="{{ env('SITE_NAME').'/images/invitations/'.$invitation->group_photo}}">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="{{  url()->full() }}">
    <meta name="twitter:title" content="Драги гости">
    <meta name="twitter:description" content="Покана за роденден на {{ $invitation->name }}">
    <meta name="twitter:creator" content="@tiggaz">
    <meta name="twitter:image" content="{{ env('SITE_NAME').'/images/invitations/'.$invitation->group_photo}}">
    <!-- Open Graph data -->
    <meta property="og:title" content="Драги гости"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="{{  url()->full() }}"/>
    <meta property="og:image" content="{{ env('SITE_NAME').'/images/invitations/'.$invitation->group_photo}}"/>
    <meta property="og:description" content="Покана за роденден на {{ $invitation->name }}"/>
    <meta property="og:site_name" content="Драги гости"/>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">

    <!-- Mobile Meta -->


    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="/dist/images/2.svg"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Styles -->
    <link href="/css/all.css" rel="stylesheet">


    <link href='https://fonts.googleapis.com/css?family=Raleway:700,400,300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=PT+Serif' rel='stylesheet' type='text/css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
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
    <style>

        body {
            font-family:  "Montserrat", sans-serif;
        }
        .logo-font {
            font-family:  "Montserrat", sans-serif;
            font-weight: 100;
        }

        #footer {
            overflow: hidden !important;
        }

        .page-wrapper {
            overflow: hidden !important;
        }

        .site-slogan {
            font-size: 16px;
        }

        a:hover {
            color: #333f55;
        }

        .page-title {
            font-size: 32px !important;
        }


        .footer-content {
            padding-left: 20px;
            padding-right: 20px;
        }


        .cake {
            position: relative;
            width: 250px;
            height: 200px;
            top: 50%;
            left: 50%;
            margin-top: -70px;
            margin-left: -125px;
        }

        .plate {
            width: 270px;
            height: 110px;
            position: absolute;
            bottom: -10px;
            left: -10px;
            background-color: #ccc;
            border-radius: 50%;
            box-shadow: 0 2px 0 #b3b3b3, 0 4px 0 #b3b3b3, 0 5px 40px rgba(0, 0, 0, 0.5);
        }

        .cake > * {
            position: absolute;
        }

        .layer {
            position: absolute;
            display: block;
            width: 250px;
            height: 100px;
            border-radius: 50%;
            background-color: #553c13;
            box-shadow: 0 2px 0px #6a4b18, 0 4px 0px #33240b, 0 6px 0px #32230b, 0 8px 0px #31230b, 0 10px 0px #30220b, 0 12px 0px #2f220b, 0 14px 0px #2f210a, 0 16px 0px #2e200a, 0 18px 0px #2d200a, 0 20px 0px #2c1f0a, 0 22px 0px #2b1f0a, 0 24px 0px #2a1e09, 0 26px 0px #2a1d09, 0 28px 0px #291d09, 0 30px 0px #281c09;
        }

        .layer-top {
            top: 0px;
        }

        .layer-middle {
            top: 33px;
        }

        .layer-bottom {
            top: 66px;
        }

        .icing {
            top: 2px;
            left: 5px;
            background-color: #f0e4d0;
            width: 240px;
            height: 90px;
            border-radius: 50%;
        }

        .icing:before {
            content: "";
            position: absolute;
            top: 4px;
            right: 5px;
            bottom: 6px;
            left: 5px;
            background-color: #f4ebdc;
            box-shadow: 0 0 4px #f6efe3, 0 0 4px #f6efe3, 0 0 4px #f6efe3;
            border-radius: 50%;
            z-index: 1;
        }

        .drip {
            display: block;
            width: 50px;
            height: 60px;
            border-bottom-left-radius: 25px;
            border-bottom-right-radius: 25px;
            background-color: #f0e4d0;
        }

        .drip1 {
            top: 53px;
            left: 5px;
            transform: skewY(15deg);
            height: 48px;
            width: 40px;
        }

        .drip2 {
            top: 69px;
            left: 181px;
            transform: skewY(-15deg);
        }

        .drip3 {
            top: 54px;
            left: 90px;
            width: 80px;
            border-bottom-left-radius: 40px;
            border-bottom-right-radius: 40px;
        }

        .candle {
            background-color: #7b020b;
            width: 16px;
            height: 50px;
            border-radius: 8px/4px;
            top: -20px;
            left: 50%;
            margin-left: -8px;
            z-index: 10;
        }

        .candle:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 16px;
            height: 8px;
            border-radius: 50%;
            background-color: #ad030f;
        }

        .flame {
            position: absolute;
            background-color: orange;
            width: 15px;
            height: 35px;
            border-radius: 10px 10px 10px 10px/25px 25px 10px 10px;
            top: -34px;
            left: 50%;
            margin-left: -7.5px;
            z-index: 10;
            box-shadow: 0 0 10px rgba(255, 165, 0, 0.5), 0 0 20px rgba(255, 165, 0, 0.5), 0 0 60px rgba(255, 165, 0, 0.5), 0 0 80px rgba(255, 165, 0, 0.5);
            transform-origin: 50% 90%;
            animation: flicker 1s ease-in-out alternate infinite;
        }

        @keyframes flicker {
            0% {
                transform: skewX(5deg);
                box-shadow: 0 0 10px rgba(255, 165, 0, 0.2), 0 0 20px rgba(255, 165, 0, 0.2), 0 0 60px rgba(255, 165, 0, 0.2), 0 0 80px rgba(255, 165, 0, 0.2);
            }
            25% {
                transform: skewX(-5deg);
                box-shadow: 0 0 10px rgba(255, 165, 0, 0.5), 0 0 20px rgba(255, 165, 0, 0.5), 0 0 60px rgba(255, 165, 0, 0.5), 0 0 80px rgba(255, 165, 0, 0.5);
            }
            50% {
                transform: skewX(10deg);
                box-shadow: 0 0 10px rgba(255, 165, 0, 0.3), 0 0 20px rgba(255, 165, 0, 0.3), 0 0 60px rgba(255, 165, 0, 0.3), 0 0 80px rgba(255, 165, 0, 0.3);
            }
            75% {
                transform: skewX(-10deg);
                box-shadow: 0 0 10px rgba(255, 165, 0, 0.4), 0 0 20px rgba(255, 165, 0, 0.4), 0 0 60px rgba(255, 165, 0, 0.4), 0 0 80px rgba(255, 165, 0, 0.4);
            }
            100% {
                transform: skewX(5deg);
                box-shadow: 0 0 10px rgba(255, 165, 0, 0.5), 0 0 20px rgba(255, 165, 0, 0.5), 0 0 60px rgba(255, 165, 0, 0.5), 0 0 80px rgba(255, 165, 0, 0.5);
            }
        }

        #main_text {
            padding-top: 50px;
            padding-left: 20px;
            padding-right: 20px;
        }
    </style>
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
                                                                                  class="text-muted">{{ $invitation->name }}
                                    </a>
                                </h2>
                            </div>
                            <!-- name-and-slogan -->
                            <div class="site-slogan text-center">
                               <span>&#127881;</span> Те поканува на роденден <span>&#127874;</span>
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
         style="background-image: url('/images/invitations/{{$invitation->group_photo}}');background-position: 80% 40%;">
        <div class="container pv-40">
            <div class="row">
                <div class="col-md-8 text-center col-md-offset-2 pv-40">
                    <div class="object-non-visible pv-40" data-animation-effect="fadeIn" data-effect-delay="100">
                        <h1 class="page-title text-center logo-font">Здраво @isset($str)
                                {{ $str }}
                            @endisset</h1>
                        <h1 class="page-title text-center logo-font">Време е за мојот роденден</h1>
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

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="cake">
                <div class="plate"></div>
                <div class="layer layer-bottom"></div>
                <div class="layer layer-middle"></div>
                <div class="layer layer-top"></div>
                <div class="icing"></div>
                <div class="drip drip1"></div>
                <div class="drip drip2"></div>
                <div class="drip drip3"></div>
                <div class="candle">
                    <div class="flame"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="footer-content">
                @isset($guests)
                    <h2 class="title">RSVP</h2>
                    <div class="separator-2 mt-10"></div>
                    <p>Доколку сакате да го потврдите Вашето присуство, Ве молиме пополнете ги полињата
                        подолу.</p>
                    <p>Напомена: Во било кој момент можете да го откажете присуството преку email или јавете ни се.
                    <p>Ветуваме дека личните податоци нема да бидат злоупотребени за други цели.</p>

                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            Ви благодариме на потврдата!
                        </div>
                    @endif
                    @if(session()->has('plus_one'))
                        <div class="alert alert-success">
                            Ви благодариме на додавањето! Ве молиме потврдете.
                        </div>
                    @endif
                    <div class="contact-form">
                        @foreach($guests as $guest)

                            <form action="{{ route('confirm', ["id" => $guest->id]   ) }}" method="POST">
                                @csrf
                                <div class="form-group has-feedback">
                                    <label class="sr-only" for="name">Name*</label>
                                    <input type="text" placeholder="Name" class="form-control" id="name" name="name"
                                           value="{{ $guest->name }}" required>
                                    <i class="fa fa-user form-control-feedback"></i>

                                </div>
                                <div class="form-group has-feedback">
                                    <label class="sr-only" for="email">Email*</label>
                                    <input type="email" placeholder="Email" class="form-control" id="email" name="email"
                                           value="{{ $guest->email }}" required>
                                    <i class="fa fa-envelope form-control-feedback"></i>

                                </div>



                                @if(!$guest->confirmed)
                                    <input type="submit" value="Потврди" class="btn btn-primary">
                                @else
                                    <input type="submit" value="Потврдено" class="btn btn-primary" disabled>
                                @endif
                            </form>

                            @if($guest->plus_one)
                                <form
                                    action="{{ route('plus_one', ["link_id" => $link->id, "guest_id" => $guest->id]) }}"
                                    method="POST">
                                    @csrf
                                    <input type="hidden" name="invitation_id" value="{{ $invitation->id }}"/>
                                    <input type="hidden" name="confirmed" value="1"/>
                                    <div class="form-group has-feedback">
                                        <label class="sr-only" for="name">Name*</label>
                                        <input type="text" placeholder="Name" class="form-control" id="name" name="name"
                                               required>
                                        <i class="fa fa-user form-control-feedback"></i>

                                    </div>
                                    <div class="form-group has-feedback">
                                        <label class="sr-only" for="email">Email*</label>
                                        <input type="email" placeholder="Email" class="form-control" id="email"
                                               name="email" required>
                                        <i class="fa fa-envelope form-control-feedback"></i>

                                    </div>

                                    <p> Избор на мени </p>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="menu_option" id="regular-1"
                                               value="regular" @if($guest->menu_option === "regular") checked @endif>
                                        <label class="form-check-label" for="regular-1">
                                            Регуларно
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="menu_option"
                                               id="vegetarian-1" value="vegetarian"
                                               @if($guest->menu_option === "vegetarian") checked @endif>
                                        <label class="form-check-label" for="vegetarian-1">
                                            Вегетаријанец
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="menu_option" id="vegan-1"
                                               value="vegan" @if($guest->menu_option === "vegan") checked @endif>
                                        <label class="form-check-label" for="vegan-1">
                                            Веган
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="menu_option" id="halal-1"
                                               value="halal" @if($guest->menu_option === "halal") checked @endif>
                                        <label class="form-check-label" for="halal-1">
                                            Халал
                                        </label>
                                    </div>
                                    <input type="submit" value="Додади" class="submit-button btn btn-default">
                                </form>
                            @endif
                        @endforeach


                    </div>
                @endisset

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


                    <div id="main_text">
                        {!! $invitation->main_text !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section end -->

    <!-- ================ -->

    <br>
    <h3 class="text-default text-center space-top logo-font"><span
            class="text-muted">Локација</span></h3>
    <br>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="map-canvas"></div>
            </div>
        </div>
    </div>


    <!-- footer start (Add "dark" class to #footer in order to enable dark footer) -->
    <!-- ================ -->
    <footer id="footer" class="clearfix " style="overflow-x: hidden;">
        <div class="subfooter">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-center">Copyright © {{ date('Y') }} by <a target="_blank"
                                                                      href="https://dragigosti.com">Драги Гости</a>.
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
<script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
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

        var date = new Date("{{\Carbon\Carbon::parse($invitation->date)->format('Y-m-d')}}");
        $('#defaultCountdown').countdown({until: date});

    });
</script>

<script>
    $(document).ready(function () {
        window.addEventListener('load', (event) => {
            initAutocomplete();
        });

        function initAutocomplete() {
            map = new google.maps.Map(document.getElementById('map-canvas'), {
                center: {lat: {{ $invitation->lat }}, lng: {{ $invitation->lng }}},
                zoom: 25
            });

            var marker = new google.maps.Marker({
                position: {lat: {{ $invitation->lat }}, lng: {{ $invitation->lng }}},
                map: map,
                draggable: false
            });
        }
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
</body>
</html>






