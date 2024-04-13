<!DOCTYPE html>
<html lang="en">

<head>

    <!-- metas -->
    <meta charset="utf-8">
    <title>Драги Гости</title>
    <meta name="author" content="Chitrakoot Web"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="keywords" content="Wedding Invitation Template"/>
    <meta name="description" content="Wedding Invitation Template"/>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="/dist/images/2.svg"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!-- plugins -->
    <link rel="stylesheet" href="/template_b/css/plugins.css"/>

    <!-- quform css -->
    <link rel="stylesheet" href="/template_b/quform/css/base.css">

    <!-- core style css -->
    <link rel="stylesheet" href="/template_b/css/style.css"/>
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

<body>

<!-- start page loading -->
<div id="preloader">
    <div class="row loader">
        <div class="loader-icon"></div>
    </div>
</div>
<!-- end page loading -->

<!-- start header -->
<header class="header" data-scroll-index="0">

    <!-- start navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container sm-padding-10px-tb sm-padding-15px-lr">

            <!-- navbar links -->
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav" style="margin: auto">
                    <li class="nav-item">
                        <h6 class="text" style="margin: 0px; color: #f07677">{{ strip_tags($invitation->female_name) }} <i
                                class="pl-10 pr-10 fa fa-heart"></i> {{ strip_tags($invitation->male_name) }}</h6>
                    </li>
                </ul>
            </div>
            <!-- end navbar links -->
        </div>

    </nav>
    <!-- end navbar  -->

    <div class="container-fluid bg-img cover-background full-screen" data-overlay-dark="6"
         data-background="/images/invitations/{{$invitation->group_photo}}">
        <div class="row align-items-center justify-content-center min-vh-100">
            <div class="col-12 display-table h-100 z-index-1 width-100">
                <div class="display-table-cell vertical-align-middle">
                    <div class="caption text-center wow fadeIn">

                        <div class="width-150px margin-30px-bottom mx-auto">
                            <img src="/template_b/img/pattern2.png" alt=""/>
                        </div>
                        <h3 class="text-white font-size18 font-weight-300 no-margin main-font letter-spacing-2">Здраво!</h3>
                        <h1 class="banner-headline clip text-white">Време е за нашата венчавка</h1>
                        <div class="width-150px mx-auto">
                            <img src="/template_b/img/pattern2.png" alt=""/>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="arrow">
        <a href="javascript:void(0);" data-scroll-nav="1">
            <i class="fas fa-chevron-down"></i>
        </a>
    </div>
</header>
<!-- end header -->

<!-- start testimonials section -->
<section class="cover-background parallax padding-eight-tb margin-five-lr theme-overlay" data-overlay-dark="8"
         data-background="/template_b/img/testmonials/bg-1.jpg">

    <div class="container">
        <div class="text-center testimonials owl-carousel owl-theme alt-font">
            <div>
                <p class="center-col margin-40px-bottom sm-margin-30px-bottom xs-margin-25px-bottom text-white width-70 sm-width-90 xs-width-100">
                    “Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                    est laborum. Sed ut perspiciatis unde omnis iste natus voluptatem accusantium”</p>
                <h5 class="text-white text-center opacity7 font-size16 no-margin-bottom">Todd J. Coyle</h5>
            </div>
        </div>
    </div>
</section>
<!-- end testimonials section -->
<!-- start our story section -->
<section data-scroll-index="1">
    <div class="container">
        <div class="text-center margin-30px-bottom xs-margin-20px-bottom">
            <h3 class="large no-margin-bottom font-weight-500">Нашата љубовна приказна</h3>
        </div>
        <div class="text-center wow fadeInUp">
            <div id="main_text" class="width-70 center-col margin-40px-bottom" contenteditable="true">
                {!! $invitation->main_text !!}
            </div>
            <div class="col-md-2 text-center" style="width: 100px">
                <p class="alert alert-warning btn btn-sm" id="main_text_message"><i
                        class="fa fa-check">Тест</i></p>
            </div>
        </div>
        <div class="row align-items-center justify-content-center margin-40px-top">
            <div class="col-lg-5 col-md-6 wow fadeInLeft">
                <div class="abouts position-relative">
                    <img src="/images/invitations/{{$invitation->female_photo}}" alt="">
                    <div class="hover-info d-table h-100">
                        <div class="position-relative d-table-cell vertical-align-middle">
                            <div class="text-white" id="female_name" style="font-size: 24px" contenteditable="true">{!! $invitation->female_name !!}</div>
                            <div class="col text-left" style="width: 100px">
                                <p class="alert alert-warning btn btn-sm" id="female_name_message"><i
                                        class="fa fa-check"></i></p>
                            </div>
                            <br>
                            <div class="text-white" id="female_text" contenteditable="true" class="left">
                                {!! $invitation->female_text !!}
                            </div>
                            <div class="col text-left" style="width: 100px">
                                <p class="alert alert-warning btn btn-sm" id="female_text_message"><i
                                        class="fa fa-check"></i></p>
                            </div>
                            <ul class="mb-0 social-links">
                                <li><a href="#!"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#!"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#!"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-6 wow fadeInRight">
                <div class="abouts position-relative">
                    <img src="/images/invitations/{{$invitation->male_photo}}" alt="">
                    <div class="hover-info d-table h-100">
                        <div class="position-relative d-table-cell vertical-align-middle">
                            <div class="text-white" id="male_name" style="font-size: 24px" contenteditable="true">{!! $invitation->male_name !!}</div>
                            <div class="col text-right" style="width: 100px">
                                <p class="alert alert-warning btn btn-sm" id="male_name_message"><i
                                        class="fa fa-check"></i></p>
                            </div>
                            <br>
                            <div class="text-white" id="male_text" contenteditable="true">
                                {!! $invitation->male_text !!}
                            </div>
                            <div class="col text-right" style="width: 100px">
                                <p class="alert alert-warning btn btn-sm" id="male_text_message"><i
                                        class="fa fa-check"></i></p>
                            </div>
                            <ul class="mb-0 social-links">
                                <li><a href="#!"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#!"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#!"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-center margin-40px-top">
            <div class="col-lg-8 col-md-8">
                <div id="defaultCountdown"></div>
            </div>
        </div>
    </div>
</section>
<!-- end our story section -->



<!-- start event section -->
{{--<section class="position-relative" data-scroll-index="3">--}}
{{--    <div class="container">--}}

{{--        <div class="text-center margin-30px-bottom xs-margin-20px-bottom wow fadeInUp">--}}
{{--            <h3 class="large no-margin-bottom font-weight-500">When &amp; Where</h3>--}}
{{--        </div>--}}

{{--        <div class="row">--}}
{{--            <div class="col-lg-4 sm-margin-30px-bottom wow fadeInUp" data-wow-delay="0.2s">--}}
{{--                <div class="padding-30px-lr padding-45px-tb text-center border-all hover-effect">--}}
{{--                    <i class="far fa-calendar-alt text-theme-color font-size32 margin-30px-bottom"></i>--}}
{{--                    <h5 class="text-uppercase font-size18 main-font">The Reception</h5>--}}
{{--                    <p>Sunday, 01 March--}}
{{--                        <script>document.write(new Date().getFullYear())</script>--}}
{{--                        <br>20:00 PM - 22:00 PM--}}
{{--                        <br>Glen Rose, TX 76043, Chicago--}}
{{--                    </p>--}}
{{--                    <a href="#appointment" class="appointment sm-margin-20px-top font-weight-700">View Map<i--}}
{{--                            class="fas fa-arrow-right vertical-align-middle font-size12 margin-5px-left"></i></a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-4 sm-margin-30px-bottom wow fadeInUp" data-wow-delay="0.4s">--}}
{{--                <div class="padding-30px-lr padding-45px-tb text-center border-all hover-effect">--}}
{{--                    <i class="fas fa-glass-cheers text-theme-color font-size32 margin-30px-bottom"></i>--}}
{{--                    <h5 class="text-uppercase font-size18 main-font">The Ceremony</h5>--}}
{{--                    <p>Monday, 02 March--}}
{{--                        <script>document.write(new Date().getFullYear())</script>--}}
{{--                        <br>19:00 PM - 20:00 PM--}}
{{--                        <br>Glen Rose, TX 76043, Chicago--}}
{{--                    </p>--}}
{{--                    <a href="#appointment" class="appointment sm-margin-20px-top font-weight-700">View Map<i--}}
{{--                            class="fas fa-arrow-right vertical-align-middle font-size12 margin-5px-left"></i></a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.6s">--}}
{{--                <div class="padding-30px-lr padding-45px-tb text-center border-all hover-effect">--}}
{{--                    <i class="fas fa-music text-theme-color font-size32 margin-30px-bottom"></i>--}}
{{--                    <h5 class="text-uppercase font-size18 main-font">The Party</h5>--}}
{{--                    <p>Monday, 02 March--}}
{{--                        <script>document.write(new Date().getFullYear())</script>--}}
{{--                        <br>20:00 PM - 22:00 PM--}}
{{--                        <br>Glen Rose, TX 76043, Chicago--}}
{{--                    </p>--}}
{{--                    <a href="#appointment" class="appointment sm-margin-20px-top font-weight-700">View Map<i--}}
{{--                            class="fas fa-arrow-right vertical-align-middle font-size12 margin-5px-left"></i></a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}

{{--</section>--}}
<!-- end event section -->

<!-- start team section -->
<section data-scroll-index="4">
    <div class="container">
        <div class="separator"></div>
        <form action="{{ route('invitations.saveRestaurant', $invitation->id) }}" method="post">
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
                            <input type="text" id="searchmap" class="form-control" />
                            <div id="map-canvas">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="text-right">
                <button type="submit" class="btn btn-sm btn-primary">Сочувај ги информациите</button>
            </div>
        </form>
        <br>
    </div>
</section>
<!-- end team section -->



<!--  start footer section -->
<footer class="bg-img cover-background padding-40px-bottom" data-background="/template_b/img/footer-bg.jpg" data-scroll-index="6">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-10 center-col">
                <div class="padding-40px-all sm-padding-30px-all rsvp-form border-radius-10">
                    <h3 class="large font-weight-500 text-center margin-30px-bottom xs-margin-20px-bottom">Will You
                        Attend?</h3>

                    <!-- start form here -->

                    <form class="quform" action="quform/contact.php" method="post" enctype="multipart/form-data"
                          onclick="">

                        <div class="quform-elements">

                            <div class="row">

                                <!-- Begin Text input element -->
                                <div class="col-md-12">
                                    <div class="quform-element form-group">
                                        <div class="quform-input">
                                            <input class="form-control" id="name" type="text" name="name"
                                                   placeholder="Your name here"/>
                                        </div>
                                    </div>

                                </div>
                                <!-- End Text input element -->

                                <!-- Begin Text input element -->
                                <div class="col-md-12">
                                    <div class="quform-element form-group">
                                        <div class="quform-input">
                                            <input class="form-control" id="email" type="text" name="email"
                                                   placeholder="Your email here"/>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Text input element -->

                                <!-- Begin Select element -->
                                <div class="col-md-12">
                                    <div class="quform-element form-group">
                                        <div class="quform-input">
                                            <select class="form-control" id="inquiry" name="inquiry">
                                                <option value="">-- Number of Guest --</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <!-- End Select element -->

                                <!-- Begin Textarea element -->
                                <div class="col-md-12">
                                    <div class="quform-element form-group">
                                        <div class="quform-input">
                                            <textarea class="form-control" id="message" name="message" rows="5"
                                                      placeholder="Tell us a few words"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Textarea element -->

                                <!-- Begin Textarea element -->
                                <div class="col-md-12">
                                    <div class="quform-element form-group">

                                        <div class="quform-input">
                                            <div class="row">
                                                <div class="col-lg-4">

                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" name="radio_button2" value="Yes"
                                                               class="custom-control-input" id="yes">
                                                        <label class="custom-control-label" for="yes">Yes, I will be
                                                            there</label>
                                                    </div>

                                                </div>
                                                <div class="col-lg-4">

                                                    <div class="custom-control custom-radio">
                                                        <input name="radio_button2" value="No" type="radio"
                                                               class="custom-control-input" id="no">
                                                        <label class="custom-control-label" for="no">Sorry, I can’t
                                                            come</label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- End Textarea element -->

                                <!-- Begin Captcha element -->
                                <div class="col-md-12">
                                    <div class="quform-element">
                                        <div class="form-group">
                                            <div class="quform-input">
                                                <input class="form-control" id="type_the_word" type="text"
                                                       name="type_the_word" placeholder="Type the below word"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="quform-captcha">
                                                <div class="quform-captcha-inner">
                                                    <img src="/template_b/quform/images/captcha/courier-new-light.png"
                                                         alt=""/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Captcha element -->

                                <!-- Begin Submit button -->
                                <div class="col-md-12">
                                    <div class="quform-submit-inner">
                                        <button class="btn btn-primary btn-md" type="submit"><span>Send Message</span>
                                        </button>
                                    </div>
                                    <div class="quform-loading-wrap text-left"><span class="quform-loading"></span>
                                    </div>
                                </div>
                                <!-- End Submit button -->

                            </div>

                        </div>

                    </form>

                    <!-- end form here -->

                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end footer section -->

<!-- start scroll to top -->
<a href="javascript:void(0)" class="scroll-to-top"><i class="fas fa-angle-up" aria-hidden="true"></i></a>
<!-- end scroll to top -->
<script src="/dist/js/jquery.min.js"></script>
<!-- JavaScript -->
<script src="/template_b/js/core.min.js"></script>

<!-- quform plugin js -->
<script src="/template_b/quform/js/plugins.js"></script>

<!-- quform scripts js -->
{{--<script src="/template_b/quform/js/scripts.js"></script>--}}

<!-- custom scripts -->
<script src="/template_b/js/main.js"></script>

{{--<script src="/js/google.map.config.js"></script>--}}
<!-- all js include end -->
<script src="/plugins/jquery.countdown/jquery.plugin.js"></script>
<script src="/plugins/jquery.countdown/jquery.countdown.js"></script>
{{--<script src="/js/coming.soon.config.js"></script>--}}
{{--<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>--}}
<!-- all js include start -->
<script src="/plugins/ckeditor/ckeditor.js"></script>

<script>
    CKEDITOR.disableAutoInline = true;
    $("div[contenteditable='true']").each(function (index) {
        var invitation_id = "{{ $invitation->id }}";
        var content_id = $(this).attr('id');
        CKEDITOR.inline(content_id, {
            on: {
                blur: function (event) {
                    var data = event.editor.getData();

                    console.log(data);

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
                                // $("#male_text_message").html("Successfully Saved");
                                $("#male_text_message").fadeOut(5000);
                            }
                            if (response.success === 'male_name') {
                                $("#male_name_message").css('display', 'block');
                                // $("#male_name_message").html("Successfully Saved");
                                $("#male_name_message").fadeOut(5000);
                            }
                            if (response.success === 'female_text') {
                                $("#female_text_message").css('display', 'block');
                                // $("#female_text_message").html("Successfully Saved");
                                $("#female_text_message").fadeOut(5000);
                            }
                            if (response.success === 'female_name') {
                                $("#female_name_message").css('display', 'block');
                                // $("#female_name_message").html("Successfully Saved");
                                $("#female_name_message").fadeOut(5000);
                            }
                            if (response.success === 'main_text') {
                                $("#main_text_message").css('display', 'block');
                                $("#main_text_message").fadeOut(5000);
                            }
                            if (response.success === 'male_quote') {
                                $("#male_quote_message").css('display', 'block');
                                // $("#male_quote_message").html("Successfully Saved");
                                $("#male_quote_message").fadeOut(5000);
                            }
                            if (response.success === 'female_quote') {
                                $("#female_quote_message").css('display', 'block');
                                // $("#female_quote_message").html("Successfully Saved");
                                $("#female_quote_message").fadeOut(5000);
                            }
                        }
                    });
                }
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        $(function () {
            {{--var date = new Date("{{\Carbon\Carbon::parse($invitation->date)->format('Y, m, d')}}");--}}

            var date = new Date("{{\Carbon\Carbon::parse($invitation->date)->format('Y, m, d')}}");
            console.log(date);
            $('#defaultCountdown').countdown({until: date});
        });
    });
</script>
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAS05zxYcZTGI-KfGAk8l0xNC2eCWfNsPw&loading=async"></script>

<script>
    $(document).ready(function () {
        window.addEventListener('load', (event) => {
            initAutocomplete();
        });

        function initAutocomplete() {
            map = new google.maps.Map(document.getElementById('map-canvas'), {
                center: {lat: 41.9981294, lng: 21.4254355},
                zoom: 10
            });

            var marker = new google.maps.Marker({
                position: {lat: 41.9981294, lng: 21.4254355},
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
    $("#searchmap").attr("placeholder", 'Внесете ресторан');
</script>
<script>
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
