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
    <meta name="description" content="Покана за свадбата на {{ explode(' ', $invitation->male_name)[0] }} и {{ explode(' ', $invitation->female_name)[0] }}">
    <meta name="author" content="Martin Karadzinov">
    <meta charset="utf-8"/>
    <meta name="description" content="Покана за свадбата на {{ explode(' ', $invitation->male_name)[0] }} и {{ explode(' ', $invitation->female_name)[0] }}"/>
    <meta name="Author" content="Martin Karadzinov"/>
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Драги гости">
    <meta itemprop="description" content="Покана за свадбата на {{ explode(' ', $invitation->male_name)[0] }} и {{ explode(' ', $invitation->female_name)[0] }}">
    <meta itemprop="image" content="{{ env('SITE_NAME').'/images/invitations/'.$invitation->group_photo}}">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="{{  url()->full() }}">
    <meta name="twitter:title" content="Драги гости">
    <meta name="twitter:description" content="Покана за свадбата на {{ explode(' ', $invitation->male_name)[0] }} и {{ explode(' ', $invitation->female_name)[0] }}">
    <meta name="twitter:creator" content="@tiggaz">
    <meta name="twitter:image" content="{{ env('SITE_NAME').'/images/invitations/'.$invitation->group_photo}}">
    <!-- Open Graph data -->
    <meta property="og:title" content="Драги гости"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="{{  url()->full() }}"/>
    <meta property="og:image" content="{{ env('SITE_NAME').'/images/invitations/'.$invitation->group_photo}}"/>
    <meta property="og:description" content="Покана за свадбата на {{ explode(' ', $invitation->male_name)[0] }} и {{ explode(' ', $invitation->female_name)[0] }}"/>
    <meta property="og:site_name" content="Драги гости"/>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">

    <!-- Mobile Meta -->


    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="/dist/images/2.svg"/>

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
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-H7XM5SM8DV"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-H7XM5SM8DV');
    </script>
    <!-- Google Tag Manager -->
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
                                                                                  class="text-muted">{{ explode(' ', $invitation->male_name)[0] }}
                                        <span
                                            class="text-default"><i
                                                class="pl-10 pr-10 fa fa-heart"></i></span>{{ explode(' ', $invitation->female_name)[0] }}
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
                        <h1 class="page-title text-center logo-font">Здраво @isset($str){{ $str }} @endisset!</h1>
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
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="footer-content">
                @isset($guests)
                    <h2 class="title text-default">RSVP</h2>
                    <div class="separator-2 mt-10"></div>
                    <p>Доколку сакате да го потврдите Вашето присуство, Ве молиме пополнете ги полињата
                        подолу.</p>
                    <p>Напомена: Во било кој момент можете да го откажете присуството преку email или јавете ни се.
                    <p>Ветуваме дека личните податоци нема да бидат злоупотребени за други цели.</p>
                    <p>Вашата email адреса ни е потребна за да ги испратиме местата за седење 7 дена пред
                        почетокот на свадбата.</p>
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


                                <p> Избор на мени </p>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="menu_option" id="regular" value="regular" @if($guest->menu_option === "regular") checked @endif>
                                    <label class="form-check-label" for="regular">
                                        Регуларно
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="menu_option" id="vegetarian" value="vegetarian" @if($guest->menu_option === "vegetarian") checked @endif>
                                    <label class="form-check-label" for="vegetarian">
                                        Вегетаријанец
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="menu_option" id="vegan" value="vegan" @if($guest->menu_option === "vegan") checked @endif>
                                    <label class="form-check-label" for="vegan">
                                        Веган
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="menu_option" id="halal" value="halal" @if($guest->menu_option === "halal") checked @endif>
                                    <label class="form-check-label" for="halal">
                                        Халал
                                    </label>
                                </div>
                                @if(!$guest->confirmed)
                                    <input type="submit" value="Потврди" class="submit-button btn btn-default">
                                @else
                                    <input type="submit" value="Потврдено" class="success btn btn-default" disabled>
                                @endif
                            </form>

                            @if($guest->plus_one)
                                <form action="{{ route('plus_one', ["link_id" => $link->id, "guest_id" => $guest->id]) }}"
                                      method="POST">
                                    @csrf
                                    <input type="hidden" name="invitation_id" value="{{ $invitation->id }}" />
                                    <input type="hidden" name="confirmed" value="1" />
                                    <div class="form-group has-feedback">
                                        <label class="sr-only" for="name">Name*</label>
                                        <input type="text" placeholder="Name" class="form-control" id="name" name="name" required>
                                        <i class="fa fa-user form-control-feedback"></i>

                                    </div>
                                    <div class="form-group has-feedback">
                                        <label class="sr-only" for="email">Email*</label>
                                        <input type="email" placeholder="Email" class="form-control" id="email" name="email" required>
                                        <i class="fa fa-envelope form-control-feedback"></i>

                                    </div>

                                    <p> Избор на мени </p>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="menu_option" id="regular-1" value="regular" @if($guest->menu_option === "regular") checked @endif>
                                        <label class="form-check-label" for="regular-1">
                                            Регуларно
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="menu_option" id="vegetarian-1" value="vegetarian" @if($guest->menu_option === "vegetarian") checked @endif>
                                        <label class="form-check-label" for="vegetarian-1">
                                            Вегетаријанец
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="menu_option" id="vegan-1" value="vegan" @if($guest->menu_option === "vegan") checked @endif>
                                        <label class="form-check-label" for="vegan-1">
                                            Веган
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="menu_option" id="halal-1" value="halal" @if($guest->menu_option === "halal") checked @endif>
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
                    <h2 class="text-center logo-font text-muted">{{ explode(' ', $invitation->male_name)[0] }} и <span
                            class="text-default">{{ explode(' ', $invitation->female_name)[0] }}</span>
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
            <h2 class="logo-font">{{strip_tags($invitation->male_name)}}</h2>
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

            </div>
        </div>
        <div class="full-text-container default-bg">
            <h2 class="logo-font">{{strip_tags($invitation->female_name)}}</h2>
            <div class="separator-2 visible-lg"></div>
            <div>
                {!! $invitation->female_text !!}
            </div>
            <div class="separator-3 visible-lg"></div>
        </div>
    </section>
    <br>
    <h3 class="text-default text-center space-top logo-font"><span
            class="text-muted">Ресторан</span></h3>
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <div class="dark-translucent-bg"
                             style="background-image: url(/images/cover_images/restaurants/originals/{{$invitation->restaurant->coverImg}});background-position: 80% 50%;height: 450px">
                            <div class="container-fluid pv-40">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-8 text-center col-md-offset-2 pv-40">
                                            <div class="object-non-visible pv-40" data-animation-effect="fadeIn"
                                                 data-effect-delay="100">
                                                <h3 class="page-title text-center logo-font">Ве отчекуваме во</h3>
                                                <h2 class="page-title text-center logo-font">Ресторан <a
                                                        href="{{route('restaurants.profile', $invitation->restaurant->slug)}}"> {{ $invitation->restaurant->name }}</a>
                                                </h2>
                                                <!-- countdown end -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <div id="map-canvas"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endif
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-8"></div>
                <div class="col-md-2"></div>
                <div class="col-md-2">
                    <div class="text-right" style="color: #5D87FF">
                        <a href="{{ route('frontend.invitations') }}" class="btn btn-primary">Назад</a>
                    </div>
                </div>
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
@if(isset($invitation->lng))
    <script>
        $(document).ready(function () {
            window.addEventListener('load', (event) => {
                initAutocomplete();
            });

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
@endif
@if(isset($invitation->restaurant_id))
    <script>
        $(document).ready(function () {
            window.addEventListener('load', (event) => {
                initAutocomplete();
            });

            function initAutocomplete() {
                map = new google.maps.Map(document.getElementById('map-canvas'), {
                    center: {lat: {{ $invitation->restaurant->lat }}, lng: {{ $invitation->restaurant->lng }}},
                    zoom: 15
                });

                var marker = new google.maps.Marker({
                    position: {lat: {{ $invitation->restaurant->lat }}, lng: {{ $invitation->restaurant->lng }}},
                    map: map,
                    draggable: false
                });
            }
        });
    </script>
@endif


<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TS8GHQQ2"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-H7XM5SM8DV"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-H7XM5SM8DV');
</script>
</body>
</html>
