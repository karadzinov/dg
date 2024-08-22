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
    <link rel="stylesheet" href="/dist/libs/dropzone/dist/min/dropzone.min.css">
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

        #male_name_message {
            display: none;
        }

        #female_text_message {
            display: none;
        }

        #female_name_message {
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

        #choose-from-list {
            display: none;
        }

        #choose-on-map {
            display: none;
        }

        .name {
            font-size: 28px;
            font-family: Pacifico,cursive,sans-serif;
        }

        #searchmap {
            background-color: #fff;
            font-size: 15px;
            font-weight: 300;
            margin-left: 35%;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 300px;
            position: absolute;
            z-index: 10;
            left: 5px !important;
        }


        [data-title] {
            z-index: 10000;
            position:relative; /* making the .tooltip span a container for the tooltip text */

        }

        [data-title]:before {
            font-size: 16px;
            text-transform: none;
            text-decoration: none;
            font-style: normal !important;
            font-family: sans-serif;
            content: attr(data-title); /* here's the magic */
            position:absolute;
            z-index: 10000;
            /* vertically center */
            top:50%;
            transform:translateY(-50%);

            /* move to right */
            left:100%;
            margin-left:15px; /* and add a small left margin */

            /* basic styles */
            width:200px;
            padding:10px;
            border-radius:10px;
            background:#000;
            color: #fff;
            text-align:center;

            display:none; /* hide by default */
            opacity:0;
            transition:.3s opacity;
        }

        [data-title]:hover:before {
            display:block;
            opacity:1;

        }


        [data-title].left:before {
            /* reset defaults */
            left:initial;
            margin:initial;

            /* set new values */
            right:100%;
            margin-right:15px;
        }

        [data-title].top:before {
            /* reset defaults */
            left:initial;
            margin:initial;


            left: 0%;
            top: -40px;

        }

        [data-title]:after {
            content: "";
            position:absolute;

            /* position tooltip correctly */
            left:100%;
            margin-left:-5px;

            /* vertically center */
            top:50%;
            transform:translateY(-50%);

            /* the arrow */
            border:10px solid #000;
            border-color: transparent black transparent transparent;

            display:none;
        }
        [data-title]:hover:before, [data-title]:hover:after {
            display:block;
        }

        [data-title].left:after {
            content: "";
            position:absolute;

            /* position tooltip correctly */
            left: -20px;


            /* vertically center */
            top:50%;
            transform:translateY(-50%);

            /* the arrow */
            border:10px solid #000;
            border-color:  transparent  transparent black transparent ;

            display:none;
        }
        [data-title].top:after {
            content: "";
            position:absolute;




            /* vertically center */
            top: 22px;
            left: 100px;
            transform:translateY(-150%);

            /* the arrow */
            border:10px solid #000;
            border-color: black  transparent   transparent  transparent ;

            display:none;
        }
        [data-title]:hover:before, [data-title]:hover:after {
            display:block;
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
                        <div id="group-upload"
                             style="background-color: transparent; border: 1px solid white; border-radius: 10px">
                            <div class="dz-message" data-dz-message>
                                <span>Кликнете за да ја смените заедничката слика</span>
                            </div>
                            <div class="fallback">
                                <input name="file" type="file"/>
                            </div>
                        </div>
                        <br>
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
                    <h2 class="text-center logo-font text-muted">{{ explode(' ', $invitation->male_name)[0] }} и <span
                            class="text-default">{{ explode(' ', $invitation->female_name)[0] }}</span>
                    </h2>
                    <div class="separator"></div>
                    <div id="main_text" contenteditable="true">
                        {!! $invitation->main_text !!}
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4 text-center" style="width: 200px">
                        <p class="alert alert-success btn btn-sm" id="main_text_message"><i class="fa fa-check"></i></p>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- section end -->

    <!-- ================ -->
    <section class="full-width-section">
        <div class="full-text-container left light-gray-bg border-clear text-right" id="male-photo">
            <div class="name" contenteditable="true" id="male_name">{{ $invitation->male_name }}</div>
            <div class="col text-left" style="width: 200px;">
                <p class="alert alert-success btn btn-sm" id="male_name_message"><i class="fa fa-check"></i></p>
            </div>
            <div class="separator-3 visible-lg"></div>
            <div id="male_text" contenteditable="true">
                {!! $invitation->male_text !!}
            </div>
            <div class="col text-right" style="width: 200px">
                <p class="alert alert-success btn btn-sm" id="male_text_message"></p>
            </div>
            <div class="separator-2 visible-lg"></div>
        </div>

        <div class="full-image-container light-gray-bg border-clear">
            <img src="/images/invitations/{{$invitation->male_photo}}" alt="">
            <div class="full-image-overlay text-center">
                <div id="male-upload"
                     style="background-color: transparent; border: 1px solid white; border-radius: 10px">
                    <div class="dz-message" data-dz-message>
                        <span>Кликнете за да ја смените сликата на младоженецот</span>
                    </div>
                    <div class="fallback">
                        <input name="file" type="file"/>
                    </div>
                </div>
                <h3>My <i class="fa fa-heart"></i> Is Yours</h3>
                <div id="male_quote" contenteditable="true" class="top">
                    {!! $invitation->male_quote !!}
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <div class="text-center" style="width: 200px">
                            <p class="alert alert-success btn btn-sm" id="male_quote_message"><i class="fa fa-check"></i></p>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
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
                <div id="female-upload"
                     style="background-color: transparent; border: 1px solid white; border-radius: 10px">
                    <div class="dz-message" data-dz-message><span>Кликнете за да ја смените сликата на невестата</span>
                    </div>
                    <div class="fallback">
                        <input name="file" type="file"/>
                    </div>
                </div>
                <h3>Yes <i class="fa fa-heart"></i></h3>
                <div id="female_quote" contenteditable="true" class="top">
                    {!! $invitation->female_quote !!}
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <div class="text-center" style="width: 200px">
                            <p class="alert alert-success btn btn-sm" id="female_quote_message"><i class="fa fa-check"></i></p>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>

            </div>
        </div>
        <div class="full-text-container default-bg">
            <div class="name left" contenteditable="true" id="female_name">{{ $invitation->female_name }}</div>
            <div class="col text-left" style="width: 200px;">
                <p class="alert alert-success btn btn-sm" id="female_name_message"></p>
            </div>
            <div class="separator-2 visible-lg"></div>
            <div id="female_text" contenteditable="true" class="left">
                {!! $invitation->female_text !!}
            </div>
            <div class="col text-left" style="width: 200px">
                <p class="alert alert-success btn btn-sm" id="female_text_message"></p>
            </div>
            <div class="separator-3 visible-lg"></div>
        </div>
    </section>
    <br>
    <!-- section end -->


    <div class="container">
        <div class="separator"></div>
        <form action="{{ route('invitations.update', $invitation->id) }}" method="post">
            @csrf
            <div class="choose-from-list">
                <h3 class="text-default text-center space-top logo-font"><span
                        class="text-muted">Одбери Ресторан</span></h3>
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="restaurant_option"> <span class="danger"></span>
                                </label>
                                <select class="form-control required" name="restaurant_option" id="restaurant_option"
                                        onchange='onSelectChangeHandler()'>
                                    <option value="none">Одберете</option>
                                    <option value="list">Одбери од листа на ресторани</option>
                                    <option value="map">Одбери на мапа</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </div>
            </div>
            <div class="choose-from-list" id="choose-from-list">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="restaurant_id"> <span class="danger"></span>
                                </label>
                                <select class="form-control required" id="restaurant_id" name="restaurant_id">
                                    <option value="null" selected>none</option>
                                    @foreach($restaurants as $restaurant)
                                        <option value="{{ $restaurant->id }}">{{ $restaurant->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </div>
            </div>
            <div class="choose-on-map" id="choose-on-map">
                <div class="separator"></div>
                <div class="row">
                    <input type="hidden" id="lat" class="form-control" name="lat">
                    <input type="hidden" id="lng" class="form-control" name="lng">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" id="searchmap" class="form-control" style="background-color: #fff; font-size: 15px;
                                    font-weight: 300;
                                    margin-left: 35%;
                                    padding: 0 11px 0 13px;
                                    text-overflow: ellipsis;
                                    width: 300px;
                                    position: absolute;
                                    z-index: 10"/>
                            <div id="map-canvas">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <input name="male_photo" id="male_photo" hidden type="text" value=""/>
            <input name="female_photo" id="female_photo" hidden type="text" value=""/>
            <input name="group_photo" id="group_photo" hidden type="text" value=""/>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-8"></div>
                    <div class="col-md-2">
                        <div class="text-right" style="color: #5D87FF">
                            <button type="submit" class="btn btn-sm btn-primary">Сочувај ги информациите</button>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="text-right" style="color: #5D87FF">
                            <a href="{{ route('frontend.invitations') }}" class="btn btn-sm btn-primary">Назад</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <br>
    </div>

    <!-- footer start (Add "dark" class to #footer in order to enable dark footer) -->
    <!-- ================ -->
    <footer id="footer" class="clearfix " style="overflow-x: hidden;">
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


<script src="/dist/js/jquery.min.js"></script>
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
<script src="/dist/libs/dropzone/dist/min/dropzone.min.js"></script>

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

                            if (response.success === 'female_name_message') {
                                $("#female_name_message").css('display', 'block');
                                $("#female_name_message").html("Successfully Saved");
                                $("#female_name_message").fadeOut(5000);
                            }

                            if (response.success === 'male_name_message') {
                                $("#male_name_message").css('display', 'block');
                                $("#male_name_message").html("Successfully Saved");
                                $("#male_name_message").fadeOut(5000);
                            }
                        }
                    });
                }
            }
        });
    });
</script>


<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAS05zxYcZTGI-KfGAk8l0xNC2eCWfNsPw"></script>

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
                draggable: true
            });

            var input = document.getElementById('searchmap');
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(input);

            google.maps.event.addListener(searchBox, 'places_changed', function () {
                var places = searchBox.getPlaces();
                var bounds = new google.maps.LatLngBounds();
                var i, place;
                for (i = 0; place = places[i]; i++) {
                    bounds.extend(place.geometry.location);
                    marker.setPosition(place.geometry.location);
                }
                map.fitBounds(bounds);
                map.setZoom(15);

            });

            google.maps.event.addListener(marker, 'position_changed', function () {
                var lat = marker.getPosition().lat();
                var lng = marker.getPosition().lng();

                $('#lat').val(lat);
                $('#lng').val(lng);
            });


            $("form").bind("keypress", function (e) {
                if (e.keyCode == 13) {
                    $("#searchmap").attr('value');
                    //add more buttons here
                    return false;
                }
            });
        }
    });
</script>

<script>
    $(document).ready(function () {
        $(function () {
            var date = new Date("{{\Carbon\Carbon::parse($invitation->date)->format('Y-m-d')}}");
            $('#defaultCountdown').countdown({until: date});
        });
    });
</script>

<script>
    $("#searchmap").attr("placeholder", 'Внесете ресторан');
</script>
<script>

    @if($invitation->lat)

    document.getElementById("choose-from-list").style.display = "none";
    document.getElementById("choose-on-map").style.display = "block";

    @endif


    function onSelectChangeHandler() {
        let val = document.getElementById("restaurant_option").value;
        switch (val) {
            case "map":
                document.getElementById("choose-from-list").style.display = "none";
                document.getElementById("choose-on-map").style.display = "block";
                break;
            case "list":
                document.getElementById("choose-from-list").style.display = "block";
                document.getElementById("choose-on-map").style.display = "none";
                break;
            case "none":
                document.getElementById("choose-from-list").style.display = "none";
                document.getElementById("choose-on-map").style.display = "none";
                break;
        }
    }
</script>
<script type="text/javascript">

    let myMaleDropzone = $("#male-upload").dropzone({
        addRemoveLinks: true,
        maxFiles: 1,
        init: function () {

            // Hack: Add the dropzone class to the element
            $(this.element).addClass("dropzone");

            this.on("removedfile", function (file) {
                let filename = JSON.parse(file.xhr.response);
                filename = filename.success;

                if (file) {
                    $.ajax({
                        url: "{{ route('dropzone.destroy') }}",
                        method: 'post',
                        data: {filename: filename},
                        headers: {
                            'X-CSRF-TOKEN': "{{ @csrf_token() }}"
                        },
                        success: function (response) {
                            console.log(response);
                        }
                    });
                }
            });
        },
        url: "{{ route('dropzone.store') }}",
        method: 'post',
        headers: {
            'X-CSRF-TOKEN': "{{ @csrf_token() }}"
        },
        success: function (file, response) {
            console.log(response['success']);
            $('#male_photo').attr('value', `${response.success}`);
        }
    });

    let myFemaleDropzone = $("#female-upload").dropzone({
        addRemoveLinks: true,
        maxFiles: 1,
        init: function () {

            // Hack: Add the dropzone class to the element
            $(this.element).addClass("dropzone");


            this.on("removedfile", function (file) {
                let filename = JSON.parse(file.xhr.response);
                filename = filename.success;

                if (file) {
                    $.ajax({
                        url: "{{ route('dropzone.destroy') }}",
                        method: 'post',
                        data: {filename: filename},
                        headers: {
                            'X-CSRF-TOKEN': "{{ @csrf_token() }}"
                        },
                        success: function (response) {
                            console.log(response);
                        }
                    });
                }
            });
        },
        url: "{{ route('dropzone.store') }}",
        method: 'post',
        headers: {
            'X-CSRF-TOKEN': "{{ @csrf_token() }}"
        },
        success: function (file, response) {
            console.log(response['success']);
            $('#female_photo').attr('value', `${response.success}`);
        }
    });

    let myGroupDropzone = $("#group-upload").dropzone({
        addRemoveLinks: true,
        maxFiles: 1,
        init: function () {

            // Hack: Add the dropzone class to the element
            $(this.element).addClass("dropzone");


            this.on("removedfile", function (file) {
                let filename = JSON.parse(file.xhr.response);
                filename = filename.success;

                if (file) {
                    $.ajax({
                        url: "{{ route('dropzone.destroy') }}",
                        method: 'post',
                        data: {filename: filename},
                        headers: {
                            'X-CSRF-TOKEN': "{{ @csrf_token() }}"
                        },
                        success: function (response) {
                            console.log(response);
                        }
                    });
                }
            });
        },
        url: "{{ route('dropzone.store') }}",
        method: 'post',
        headers: {
            'X-CSRF-TOKEN': "{{ @csrf_token() }}"
        },
        success: function (file, response) {
            console.log(response['success']);
            $('#group_photo').attr('value', `${response.success}`);
        }
    });

</script>

<script>
    $(document).ready(function () {
        setTimeout(function () {
            $("#female_name").attr('data-title', 'Кликнете за промена на името');
        }, 200);
        setTimeout(function () {
            $("#male_name").attr('data-title', 'Кликнете за промена на името');
        }, 200);
        setTimeout(function () {
            $("#male_text").attr('data-title', 'Кликнете за промена на текстот');
        }, 200);
        setTimeout(function () {
            $("#main_text").attr('data-title', 'Кликнете за промена на текстот');
        }, 200);
        setTimeout(function () {
            $("#male_quote").attr('data-title', 'Кликнете за промена на текстот');
        }, 200);
        setTimeout(function () {
            $("#female_quote").attr('data-title', 'Кликнете за промена на текстот');
        }, 200);
        setTimeout(function () {
            $("#female_text").attr('data-title', 'Кликнете за промена на текстот');
        }, 200);
    });
</script>
</body>
</html>
