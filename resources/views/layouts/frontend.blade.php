<?php error_reporting(0); ?>
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
    <meta name="description" content="Покана за свадбата на Бобан и Елена">
    <meta name="author" content="Martin Karadzinov">


    <meta charset="utf-8"/>


    <meta name="description" content="Покана за свадбата на Бобан и Елена"/>
    <meta name="Author" content="Martin Karadzinov"/>
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Драги гости">
    <meta itemprop="description" content="Покана за свадбата на Бобан и Елена">
    <meta itemprop="image" content="{{ env('SITE_NAME').'/images/pokana-svadba.jpg' }}">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="https://dragigosti.com">
    <meta name="twitter:title" content="Драги гости">
    <meta name="twitter:description" content="Покана за свадбата на Бобан и Елена">
    <meta name="twitter:creator" content="@tiggaz">
    <meta name="twitter:image" content="{{ env('SITE_NAME').'/images/pokana-svadba.jpg' }}">

    <!-- Open Graph data -->

    <meta property="og:title" content="Драги гости"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="https://dragigosti.com"/>
    <meta property="og:image" content="{{ env('SITE_NAME').'/images/pokana-svadba.jpg' }}"/>
    <meta property="og:description" content="Покана за свадбата на Бобан и Елена"/>
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

<!-- body classes:  -->
<!-- "boxed": boxed layout mode e.g. <body class="boxed"> -->
<!-- "pattern-1 ... pattern-9": background patterns for boxed layout mode e.g. <body class="boxed pattern-1"> -->
<!-- "transparent-header": makes the header transparent and pulls the banner to top -->
<!-- "gradient-background-header": applies gradient background to header -->
<!-- "page-loader-1 ... page-loader-6": add a page loader to the page (more info @components-page-loaders.html) -->
<body class="no-trans front-page   ">

<!-- scrollToTop -->
<!-- ================ -->
<div class="scrollToTop circle"><i class="icon-up-open-big"></i></div>

<!-- page wrapper start -->
<!-- ================ -->
<div class="page-wrapper">

    <!-- header-container start -->
    <div class="header-container">

        <!-- header start -->
        <!-- classes:  -->
        <!-- "fixed": enables fixed navigation mode (sticky menu) e.g. class="header fixed clearfix" -->
        <!-- "dark": dark version of header e.g. class="header dark clearfix" -->
        <!-- "full-width": mandatory class for the full-width menu layout -->
        <!-- "centered": mandatory class for the centered logo layout -->
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
                                <h2 class="text-center logo-font margin-clear"><a href="#" class="text-muted">Boban<span
                                            class="text-default"><i class="pl-10 pr-10 fa fa-heart"></i></span>Elena</a>
                                </h2>
                            </div>

                            <!-- name-and-slogan -->
                            <div class="site-slogan text-center">
                                Invite You to Celebrate their Wedding
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
    <div class="pv-40 dark-translucent-bg" style="background-image: url(/images/boban-elena.jpg);background-position: 80% 40%;">
        <div class="container pv-40">
            <div class="row">
                <div class="col-md-8 text-center col-md-offset-2 pv-40">
                    <div class="object-non-visible pv-40" data-animation-effect="fadeIn" data-effect-delay="100">
                        <h1 class="page-title text-center logo-font">Здраво @yield('guests')!</h1>
                        <h1 class="page-title text-center logo-font">We’re Getting Married</h1>
                        <div class="separator"></div>
                        <h3 class="text-center"><em>June 21st, Restaurant Alikas, Skopje</em></h3>
                        <!-- countdown start -->
                        <div class="countdown clearfix"></div>
                        <!-- countdown end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner end -->

    <div id="page-start"></div>


    @yield('gallery')
    <!-- section start -->
    <!-- ================ -->
    <section class="light-gray-bg pv-30 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="text-center logo-font text-muted">Boban &amp; <span class="text-default">Elena</span>
                    </h2>
                    <div class="separator"></div>
                    <p class="text-center">Со огромна чест и задоволство Ве покануваме заедно да ја прославиме една од
                        нашите најважни вечери во животот. Од Вас очекуваме да донесете само позитивна енергија и удобни
                        чевли за играње. Се гледаме!
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- section end -->
    <!-- section start -->
    <!-- ================ -->
    <section class="full-width-section">
        <div class="full-text-container left light-gray-bg border-clear text-right">
            <h2 class="logo-font">Boban Nikolovski</h2>
            <div class="separator-3 visible-lg"></div>
            <p>На секој човек му е потребен животен сопатник, многу љубов и разбирање. <br/>Ако сонцето ја има
                месечината, денот ја има ноќта, планината го има морето, животот ја има смртта, длабочината ја има
                висината, галамата ја има тишината, среќата ја има тагата, доброто го има злото - јас ја имам Елена. Таа
                е сè што недостасуваше во мојот живот, а заедно сме енергијата, земјата, водата, воздухот и огнот. Ви
                благодарам што сте дел од нашиот живот. <br/> Дојдете да си поминеме убаво!</p>
            <div class="separator-2 visible-lg"></div>
        </div>
        <div class="full-image-container light-gray-bg border-clear">
            <img src="/images/boban.jpg" alt="">
            <div class="full-image-overlay text-center">
                <h3>My <i class="fa fa-heart"></i> Is Yours</h3>
                <p>Доста време ерген одев, доста лични моми водев, дојде време да се женам, овој живот да го сменам.</p>
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
            <img class="to-right-block" src="/images/elena.jpg" alt="">
            <div class="full-image-overlay text-center">
                <h3>Yes <i class="fa fa-heart"></i></h3>
                <p>"We mature in knowledge and wisdom but never leave the playground of our hearts."</p>
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
            <h2 class="logo-font">Elena ...</h2>
            <div class="separator-2 visible-lg"></div>
            <p> Како секоја принцеза, така и јас сонував за принцот на бел коњ. Но, за кратко време сфатив дека
                реалноста е
                многу поубава од секоја бајка, од секој коњ, од секој сон... Наместо да се плашам од иднината, решив
                после
                една година да влезам во една друга реалност која ме научи на мир, среќа и на решителност. Заедно со
                Бобан
                постигнавме многу за кратко време и едвај чекам да видам што можеме да направиме понатаму. Но, без
                Вашата
                поддршка, љубов и грижа, никогаш немаше да бидеме тука. </p>
            <div class="separator-3 visible-lg"></div>
        </div>
    </section>
    <!-- section end -->


    @yield('content')

    <!-- section start -->
    <!-- ================ -->
    <section class="pv-30 clearfix">


        <div class="container">
            <div class="row">
                <h2 class="text-center space-top text-default logo-font">Events</h2>
                <div class="separator"></div>
                <div class="col-md-4">
                    <div class="image-box text-center style-2 mb-20">
                        <img src="/images/matichno.png" alt="" class="img-circle img-thumbnail">
                        <div class="body padding-horizontal-clear">
                            <h4 class="logo-font title">Exchange of Wedding Vows</h4>
                            <p class="lead text-default">18:30 - 19:00</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="image-box text-center style-2 mb-20">
                        <img src="/images/wedding.jpg" alt="" class="img-circle img-thumbnail">
                        <div class="body padding-horizontal-clear">
                            <h4 class="logo-font title">The Wedding</h4>
                            <p class="lead text-default">19:00 - 22:30</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="image-box text-center style-2 mb-20">
                        <img src="/images/dancing.jpg" alt="" class="img-circle img-thumbnail">
                        <div class="body padding-horizontal-clear">
                            <h4 class="logo-font title">Party</h4>
                            <p class="lead text-default">22:30 - 00:30</p>
                        </div>
                    </div>
                </div>
            </div>
            <h3 class="text-default text-center space-top logo-font"><span class="text-muted">Restaurant</span> Alikas
            </h3>
            <div class="separator"></div>
            <div class="row">
                <div class="col-md-6">
                    <img src="/images/Slider_3.jpg" class="img-responsive">

                </div>
                <div class="col-md-6">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11853.501157668741!2d21.4050789!3d42.0351322!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x135414c018653265%3A0x1fb5002215f81f9b!2sAllikas!5e0!3m2!1sen!2smk!4v1684963367605!5m2!1sen!2smk"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
    <!-- section end -->

    <!-- footer start (Add "dark" class to #footer in order to enable dark footer) -->
    <!-- ================ -->
    <footer id="footer" class="clearfix ">
        <!-- .footer start -->
        <!-- ================ -->
        <div class="footer">
            <div class="container">
                <div class="footer-inner">
                    <div class="row">
                        <div class=" d-flex justify-content-between">


                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="footer-content">
                                        @if($guests)
                                            <h2 class="title text-default">RSVP</h2>
                                            <div class="separator-2 mt-10"></div>
                                            <p>Доколку сакате да го потврдите Вашето присуство, Ве молиме пополнете ги
                                                полињата
                                                подолу.</p>
                                            <p>Напомена: Во било кој момент можете да го откажете присуството преку
                                                email или јавете ни се.
                                            <p>Ветуваме дека личните податоци нема да бидат злоупотребени за други
                                                цели.</p>
                                            <p>Вашата email адреса ни е потребна за да ги испратиме местата за седење 7
                                                дена пред
                                                почетокот на свадбата.</p>
                                        @endif
                                        @yield('form')
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- .footer end -->

        <!-- .subfooter start -->
        <!-- ================ -->
        <div class="subfooter">
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <p class="text-center">Copyright © 2023 by <a target="_blank" href="https://pingdevs.com">PingDevs</a>.
                            All Rights Reserved</p>
                    </div>

                </div>
            </div>
        </div>
        <!-- .subfooter end -->
    </footer>
    <!-- footer end -->

</div>
<!-- page-wrapper end -->

<!-- Scripts -->

<!-- Latest compiled and minified JavaScript -->
<!-- Optional theme -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css"
      integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
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
<script src="/plugins/jquery.countdown/jquery.plugin.js"></script>
<script src="/plugins/jquery.countdown/jquery.countdown.js"></script>


<script src="/js/template.js" defer></script>
<script src="/js/custom.js" defer></script>
<script src="/js/coming.soon.config.js"></script>


</body>
</html>
