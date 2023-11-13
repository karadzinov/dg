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

    <style>
        #male_text_message {
            display: none;
        }

        #female_text_message {
            display: none;
        }

        #main_text_message {
            display: none;
        }

        #female_quote_message {
            display: none;
        }

        #male_quote_message {
            display: none;
        }


    </style>

</head>

<body class="no-trans front-page   ">

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
                        $date = \Carbon\Carbon::parse($invitation->date)->format('M d,Y') ?>
                        <h3 class="text-center"><em>{{ $date  }}</em></h3>
                        <!-- countdown start -->
                        <div class="countdown clearfix"></div>
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
                    <div id="main_text" contenteditable="true">
                        {!! $invitation->main_text !!}
                    </div>
                    <div class="col">
                        <p class="alert alert-success" id="main_text_message"></p>
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
            <div id="male_text" contenteditable="true">
                {!! $invitation->male_text !!}
            </div>
            <div class="col">
                <p class="alert alert-success" id="male_text_message"></p>
            </div>
            <div class="separator-2 visible-lg"></div>
        </div>

        <div class="full-image-container light-gray-bg border-clear">
            <img src="/images/invitations/{{$invitation->male_photo}}" alt="">
            <div class="full-image-overlay text-center">
                <h3>My <i class="fa fa-heart"></i> Is Yours</h3>
                <div id="male_quote" contenteditable="true">
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
                <div class="col">
                    <p class="alert alert-success" id="male_quote_message"></p>
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
                <div id="female_quote" contenteditable="true">
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
                <div class="col">
                    <p class="alert alert-success" id="female_quote_message"></p>
                </div>
            </div>
        </div>
        <div class="full-text-container default-bg">
            <h2 class="logo-font">{{ $invitation->female_name }}</h2>
            <div class="separator-2 visible-lg"></div>
            <div id="female_text" contenteditable="true">
                {!! $invitation->female_text !!}
            </div>
            <div class="col">
                <p class="alert alert-success" id="female_text_message"></p>
            </div>
            <div class="separator-3 visible-lg"></div>
        </div>
    </section>
    <!-- section end -->
    <!-- section start -->
    <!-- ================ -->
    <section class="pv-30 clearfix">

        <div class="container">
            <!--
           <div class="row">
               <h2 class="text-center space-top text-default logo-font">Програма</h2>
               <div class="separator"></div>
               <div class="col-md-12">
                   <div class="image-box text-center">
                     <img src="/images/programa.jpg" alt="" class="img-responsive" style="display: inline-block;">
                    </div>
                </div>

            </div>
            -->
            <h3 class="text-default text-center space-top logo-font"><span class="text-muted">Ресторан</span> Аликас
            </h3>
            <div class="separator"></div>
            <div class="row">
                <div class="col-md-6">
                    <!--  <img src="/images/Slider_3.jpg" class="img-responsive"> -->
                    <iframe width="315" height="560" src="https://www.youtube.com/embed/ZWCuUmiaKxU"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>

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
    <footer id="footer" class="clearfix " style="overflow-x: hidden;">
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
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="http://cdn.ckeditor.com/4.4.7/standard/ckeditor.js"></script>
<script>
    CKEDITOR.disableAutoInline = true;
    $("div[contenteditable='true']").each(function (index) {
        var invitation_id = "{{ $invitation->id }}";
        var content_id = $(this).attr('id');
        CKEDITOR.inline(content_id, {
            on: {
                blur: function (event) {
                    var data = event.editor.getData();

                    $.ajax({
                        url: "{{ route('text.store') }}",
                        method: 'put',
                        data: {
                            invitation_id: invitation_id,
                            content: data,
                            content_id: content_id
                        },
                        headers: {
                            'X-CSRF-TOKEN': "{{ @csrf_token() }}"
                        },
                        success: function (response) {
                            if (response.success === 'male_text') {
                                $("#male_text_message").css('display', 'block');
                                $("#male_text_message").html("Successfully Saved");
                                $("#male_text_message").fadeOut(5000);
                            }
                            if (response.success === 'female_text') {
                                $("#female_text_message").css('display', 'block');
                                $("#female_text_message").html("Successfully Saved");
                                $("#female_text_message").fadeOut(5000);
                            }
                            if (response.success === 'main_text') {
                                $("#main_text_message").css('display', 'block');
                                $("#main_text_message").html("Successfully Saved");
                                $("#main_text_message").fadeOut(5000);
                            }
                            if (response.success === 'male_quote') {
                                $("#male_quote_message").css('display', 'block');
                                $("#male_quote_message").html("Successfully Saved");
                                $("#male_quote_message").fadeOut(5000);
                            }
                            if (response.success === 'female_quote') {
                                $("#female_quote_message").css('display', 'block');
                                $("#female_quote_message").html("Successfully Saved");
                                $("#female_quote_message").fadeOut(5000);
                            }
                        }
                    });
                }
            }
        });
    });
</script>
</body>
</html>
