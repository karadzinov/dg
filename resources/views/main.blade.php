@extends('layouts.frontend')
@section('content')
    <div class="row">
        <div class="col-12">


            <div id="myCarousel" class="carousel slide carousel-dark" data-bs-ride="carousel"
                 style="margin-top: 140px;">
                <ul class="carousel-indicators">
                    <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" class="active"
                        aria-current="true"></li>
                </ul>
                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <video class="slider-image" autoplay loop muted playsinline>
                            <source
                                src="/video/dragigosti.webm"
                                type="video/webm">
                        </video>
                        <div class="carousel-caption d-md-block">
                            <img src="/dist/images/logo.svg" class="dark-logo" width="460" alt=""/>
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


    <!-- Page Start -->
    <div class="container-fluid">

        <div class="row hexa">


            <div class="gallery">
                <div>
                    <p class="hex-title">DJs</p>
                    <img src="https://kajabi-storefronts-production.kajabi-cdn.com/kajabi-storefronts-production/file-uploads/blogs/10496/images/a67164-f1f1-82e5-e8c-afffdbd7a060_AdobeStock_110110063.jpeg" alt="a house on a mountain">
                </div>

                <div class="active" id="invitations">
                    <p class="hex-title">Онлајн Покани</p>
                    <img src="https://www.brides.com/thmb/GOB3oUZwX5epKWGUUwBim6d48Bc=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/diy-wedding-invitations-getty-recirc-1123-85cf65e909bb426d951a250e4134d88e.jpg" alt="sime pink flowers">
                </div>
                <div>
                    <p class="hex-title">Ресторани</p>
                    <img src="https://images.squarespace-cdn.com/content/v1/62125959ab8da87f49fb31cb/1680231108755-OUAGK6JP1X3ACHLLY6D0/059_Wedding+at+The+Paseo+venue+in+Apache+Junction%2C+Arizona+only+45+minutes+from+Phoenix..jpg" alt="big rocks with some trees">
                </div>
                <div>
                    <p class="hex-title">Фотографи</p>
                    <img src="https://photor.org/wp-content/uploads/2020/10/types-of-photographs-and-photographers-see-the-differences-between-one.jpg"
                          alt="a waterfall, a lot of tree and a great view from the sky">
                </div>
                <div><img src="https://theweddingavenue.co.uk/wp-content/uploads/2022/10/gold-wedding-rings.jpeg" alt="a cool landscape"></div>
                <div><img src="https://www.ripleys.com/wp-content/uploads/2018/06/shutterstock_117779707.jpg" alt="inside a town between two big buildings">
                </div>
                <div>
                    <p class="hex-title">Музичари</p>
                    <img src="https://i.ytimg.com/vi/ePUHdvzNOVs/hqdefault.jpg" alt="a great view of the sea above the mountain"></div>

            </div>


        </div>
    </div>
        @endsection
        @section('scripts')
            <script>
                $(".hexa div").on("mouseout", function () {
                    $(this).removeClass("active");
                    $("#invitations").addClass("active");
                });


                $(".gallery div").on("mouseover", function () {
                    $("#invitations").removeClass("active");
                });


            </script>
@endsection

