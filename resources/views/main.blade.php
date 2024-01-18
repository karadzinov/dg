@extends('layouts.frontend')
@section('content')
    <div class="main-container">
        <div class="row">
            <div class="col-12">
                <div id="myCarousel" class="carousel slide" data-bs-ride="carousel"
                     style="margin-top: 40px; max-height: 650px">

                    <div class="carousel-inner">

                        <div class="carousel-item active">
                            <div class="slider-image"
                                 style="background-image: url('/dist/images/backgrounds/background.jpg');"></div>
                            <!--
                             <video class="slider-image" autoplay="" muted="" playsinline="" loop="">
                                 <source src="/video/output.mp4" type="video/mp4">
                             </video>
                             -->
                            <div class="carousel-caption">

                                <h5>Eдинствениот свадбен планер кој ви е потребен</h5>
                                <div class="box-1 scroll-to">
                                    <div class="butt btn-one">
                                        <span>ДОЗНАЈ ПОВЕЌЕ</span>
                                    </div>
                                    <div class="arrow scroll-to"></div>
                                </div>


                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>


        <div class="row party">
            <div class="col-12 text-center">

                <h1 class="title-gradient">Ваш е свадбениот план, се останато препуштете ни нам.</h1>


            </div>

        </div>


        <!-- Page Start -->


        <div class="row hexa">


            <div class="gallery none-mobile">
                <div>

                    <img
                        src="https://kajabi-storefronts-production.kajabi-cdn.com/kajabi-storefronts-production/file-uploads/blogs/10496/images/a67164-f1f1-82e5-e8c-afffdbd7a060_AdobeStock_110110063.jpeg"
                        alt="a house on a mountain">
                </div>

                <div class="active" id="invitations">
                    <p class="hex-title mob-hex-title">Онлајн Покани</p>
                    <video class="video-background" autoplay="" muted="" playsinline="" loop="">
                        <source src="/video/test.mp4" type="video/mp4">
                    </video>
                </div>
                <div>
                    <p class="hex-title">Ресторани</p>
                    <img
                        src="https://images.squarespace-cdn.com/content/v1/62125959ab8da87f49fb31cb/1680231108755-OUAGK6JP1X3ACHLLY6D0/059_Wedding+at+The+Paseo+venue+in+Apache+Junction%2C+Arizona+only+45+minutes+from+Phoenix..jpg"
                        alt="Restaurants" data-link="restaurants">
                </div>
                <div>
                    <p class="hex-title">Фотографи</p>
                    <img
                        src="https://photor.org/wp-content/uploads/2020/10/types-of-photographs-and-photographers-see-the-differences-between-one.jpg"
                        alt="Photographers" data-link="photographers">
                </div>
                <div><img
                        src="https://theweddingavenue.co.uk/wp-content/uploads/2022/10/gold-wedding-rings.jpeg"
                        alt="Wedding rings">
                </div>
                <div id="services">
                    <img
                        src="https://www.ripleys.com/wp-content/uploads/2018/06/shutterstock_117779707.jpg"
                        alt="Services">
                </div>
                <div id="musicians">
                    <p class="hex-title">Музичари</p>
                    <img src="https://i.ytimg.com/vi/ePUHdvzNOVs/hqdefault.jpg"
                         alt="Musicians" data-link="musicians"></div>

            </div>


        </div>

        <div class="row party">
            <div class="col-12 text-center">

                <h1 class="title-gradient">Направете го вашиот веб сајт во само три чекори.</h1>

            </div>

        </div>


        <section class="slice-lg sct-color-1 mt-2">
            <div class="container-fluid">


                <div class="swiper-container-coverflow swiper-container-horizontal swiper-container-3d"
                     data-swiper-initial-slide="1"
                     data-swiper-items="3" data-swiper-space-between="0" data-swiper-sm-items="2"
                     data-swiper-sm-space-between="0"
                     data-swiper-xs-items="1" data-swiper-xs-space-between="0" style="cursor: grab;">
                    <div class="swiper-wrapper"
                         style="transform: translate3d(-375px, 0px, 0px); transition-duration: 0ms;">
                        <div class="swiper-slide animate-on-scroll fadeIn" data-wow-delay="0.9s"
                             style="width: 450px; transform: translate3d(0px, 0px, -900px) rotateX(0deg) rotateY(0deg); z-index: -2; transition-duration: 0ms; visibility: visible; animation-delay: 0.9s; animation-name: fadeIn;">
                            <div class="block block--style-5 mb-0">
                                <div class="block-image">
                                    <div class="text-coming-soon">Наскоро</div>
                                    <div class="kartichka image2"></div>
                                </div>
                            </div>
                            <div class="swiper-slide-shadow-left" style="opacity: 3; transition-duration: 0ms;"></div>
                            <div class="swiper-slide-shadow-right" style="opacity: 0; transition-duration: 0ms;"></div>
                        </div>

                        <div class="swiper-slide animate-on-scroll fadeIn" data-wow-delay="0.6s"
                             style="width: 450px; transform: translate3d(0px, 0px, -600px) rotateX(0deg) rotateY(0deg); z-index: -1; transition-duration: 0ms; visibility: visible; animation-delay: 0.6s; animation-name: fadeIn;">
                            <div class="block block--style-5 mb-0">
                                <div class="border-wrapper">
                                    <div class="border"></div>
                                    <div class="kartichka image1"></div>
                                </div>
                            </div>
                            <div class="swiper-slide-shadow-left" style="opacity: 2; transition-duration: 0ms;"></div>
                            <div class="swiper-slide-shadow-right" style="opacity: 0; transition-duration: 0ms;"></div>
                        </div>

                        <div class="swiper-slide animate-on-scroll fadeIn" data-wow-delay="0.6s"
                             style="width: 450px; transform: translate3d(0px, 0px, -600px) rotateX(0deg) rotateY(0deg); z-index: -1; transition-duration: 0ms; visibility: visible; animation-delay: 0.6s; animation-name: fadeIn;">
                            <div class="block block--style-5 mb-0">
                                <div class="text-coming-soon">Наскоро</div>
                                <div class="kartichka image3"></div>
                            </div>
                            <div class="swiper-slide-shadow-left" style="opacity: 2; transition-duration: 0ms;"></div>
                            <div class="swiper-slide-shadow-right" style="opacity: 0; transition-duration: 0ms;"></div>
                        </div>


                    </div>
                </div>
            </div>
        </section>




    </div>


    <button
        class="btn  btn-outline-dark-light p-3 rounded-circle d-flex align-items-center justify-content-center customizer-btn"
        type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
        <i class="icon ti ti-phone-call fs-7"></i>
    </button>

    <div class="offcanvas customizer offcanvas-end" tabindex="-1" id="offcanvasExample"
         aria-labelledby="offcanvasExampleLabel">
        <div class="d-flex align-items-center justify-content-between p-3 border-bottom">
            <h4 class="offcanvas-title fw-semibold" id="offcanvasExampleLabel">
                Контакт
            </h4>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body" data-simplebar style="height: calc(100vh - 80px)">


        </div>
    </div>

@endsection
@section('scripts')
    <script>

        window.mobileCheck = function () {
            let check = false;
            (function (a) {
                if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))) check = true;
            })(navigator.userAgent || navigator.vendor || window.opera);
            return check;
        };


        $(".gallery div").on("mouseout", function () {
            $(this).removeClass("active");
            $("#invitations").addClass("active");

        });

        $(".gallery > div").on("click", function () {


            let img = $(this).children('img')[0];

            img = $(img).data('link');

            if (img) {
                window.location = '/' + img;
            }


        });

        $("#invitations").on("click", function () {
            window.location = '/invitation/create';
        });


        $(".gallery div").on("mouseover", function () {
            $(this).removeClass("active");
            $("#invitations").removeClass("active");

        });

        let scrollVal;

        if (window.mobileCheck()) {
            scrollVal = 150;

            div1 = $('#musicians');
            div2 = $('#services');

            tdiv1 = div1.clone();
            tdiv2 = div2.clone();


            if (!div2.is(':empty')) {
                div1.replaceWith(tdiv2);
                div2.replaceWith(tdiv1);
            }

            $(tdiv1).on("click", function () {
                window.location = '/musicians';
            });
        } else {
            scrollVal = 400;
        }


        function check_from_top_de() { // Create our function
            var scroll = $(window).scrollTop(); // Check scroll distance
            if (scroll >= scrollVal) { // If it is equal or more than 300 - you can change this to what you want
                $("#invitations").parent().removeClass("gallery-gap");
            } else {
                $("#invitations").parent().addClass("gallery-gap");
            }
        }

        check_from_top_de(); // On load, run the function

        $(window).scroll(function () { // When scroll - run function
            check_from_top_de();
        });


        $(".scroll-to").click(function () {
            window.scrollTo({
                top: 800,
                behavior: "smooth",
            });
        })


        $(".image1").on("click", function () {
            window.location = '/invitation/create';
        });

    </script>

@endsection

