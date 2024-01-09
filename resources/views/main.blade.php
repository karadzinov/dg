@extends('layouts.frontend')
@section('content')
<div class="main-container">
    <div class="row">
        <div class="col-12">


            <div id="myCarousel" class="carousel slide carousel-dark" data-bs-ride="carousel"
                 style="margin-top: 40px; max-height: 650px">
                <ul class="carousel-indicators">
                    <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" class="active"
                        aria-current="true"></li>
                </ul>
                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <video class="slider-image" autoplay loop muted>
                            <source src="/video/output.mp4" type="video/mp4">
                        </video>
                        <div class="carousel-caption d-md-block">
                            <h4>
                            <img src="/dist/images/logo.svg" class="dark-logo" width="460" alt=""/>
                            </h4>
                            <h5>единствениот свадбен планер кој ви е потребен</h5>

                        </div>

                    </div>


                    <a class="carousel-control-prev" href="#myCarousel" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Page Start -->
    <div class="container-fluid">

        <div class="row hexa">


            <div class="gallery">
                <div>

                    <img
                        src="https://kajabi-storefronts-production.kajabi-cdn.com/kajabi-storefronts-production/file-uploads/blogs/10496/images/a67164-f1f1-82e5-e8c-afffdbd7a060_AdobeStock_110110063.jpeg"
                        alt="a house on a mountain">
                </div>

                <div class="active" id="invitations">
                    <p class="hex-title">Онлајн Покани</p>
                    <video class="slider-image" autoplay loop muted>
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
                <div><img src="https://theweddingavenue.co.uk/wp-content/uploads/2022/10/gold-wedding-rings.jpeg"
                          alt="Wedding rings">
                </div>
                <div><img src="https://www.ripleys.com/wp-content/uploads/2018/06/shutterstock_117779707.jpg"
                          alt="Services">
                </div>
                <div>
                    <p class="hex-title">Музичари</p>
                    <img src="https://i.ytimg.com/vi/ePUHdvzNOVs/hqdefault.jpg"
                         alt="Musicians" data-link="musicians"></div>

            </div>


        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(".gallery div").on("mouseout", function () {
            $(this).removeClass("active");
            $("#invitations").addClass("active");

        });

        $(".gallery > div").on("click", function () {


           let img = $(this).children('img')[0];

           img = $(img).data('link');

           if(img) {
               window.location = '/' + img;
           }


        });

        $("#invitations").on("click", function() {
            window.location = '/invitation/create';
        });


        $(".gallery div").on("mouseover", function () {
            $("#invitations").removeClass("active");

        });


        function check_from_top_de() { // Create our function
            var scroll = $(window).scrollTop(); // Check scroll distance
            if (scroll >= 700) { // If it is equal or more than 300 - you can change this to what you want
                $("#invitations").parent().removeClass("gallery-gap");
            } else {
                $("#invitations").parent().addClass("gallery-gap");
            }
        }

        check_from_top_de(); // On load, run the function

        $(window).scroll(function () { // When scroll - run function
            check_from_top_de();
        });


    </script>
@endsection

