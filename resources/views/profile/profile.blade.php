@extends('layouts.frontend')
@section('metadata')
    <title>{{ $profile->name }} - Драги Гости</title>
    <meta name="description"
          content="Дигитализирај ја твојата љубовна приказна. Одбери еден од многуте темплејти на нашата веб страна, додадте ја Вашата оригиналност  преку слики, видео или текст и изненадете ги сите гости со уникатно искуство."/>
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $profile->name }} - Драги Гости">
    <meta itemprop="description"
          content="{{ Str::of($profile->description)->words(25)->stripTags() }}">
    <meta itemprop="image" content="{{ env('APP_URL') }}/images/cover_images/profiles/originals/{{ $profile->coverImg }}">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@dragigosti">
    <meta name="twitter:title" content="{{ $profile->name }} - Драги Гости">
    <meta name="twitter:description" content="{{ Str::of($profile->description)->words(25)->stripTags() }}">
    <meta name="twitter:creator" content="@dragigosti">
    <meta name="twitter:image" content="{{ env('APP_URL') }}/images/cover_images/profiles/originals/{{ $profile->coverImg }}">

    <!-- Open Graph data -->

    <meta property="og:locale" content="mk_MK"/>
    <meta property="fb:app_id" content="1339434706768448"/>
    <meta property="og:title" content="{{ $profile->name }} - Драги Гости"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{  url()->full()  }}"/>
    <meta property="og:image" content="{{ env('APP_URL') }}/images/cover_images/profiles/originals/{{ $profile->coverImg }}"/>
    <meta property="og:description"
          content="{{ Str::of($profile->description)->words(25)->stripTags() }}"/>
    <meta property="og:site_name" content="DragiGosti"/>
@endsection
@section('menu')
    {!! $categoriesMenu !!}
@endsection
@section('content')

    <div class="container-fluid">
        <div class="card overflow-hidden">
            <div class="card-body p-0">
                <div class="carousel slide" data-bs-ride="carousel" data-bs-keyboard="true"
                     style="max-height: 650px" id="carouselRestaurant">

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="slider-image"
                                 style="background-image: url('/images/cover_images/profile/originals/{{ $profile->coverImg }}');"></div>

                            <div class="carousel-caption">

                                <h5>{{ $profile->name }}</h5>
                                <div class="box-1 scroll-to">
                                    <div class="butt btn-one">
                                        <span>ПОБАРАЈ ПОНУДА</span>
                                    </div>
                                    <div class="arrow scroll-to" style="margin-top: -200px"></div>
                                </div>


                            </div>
                        </div>


                    </div>

                </div>
                <div class="row align-items-center">
                    <div class="col-lg-4 order-lg-1 order-2">
                        <div class="d-flex align-items-center justify-content-around m-4">
                            <div class="text-center">

                                <button
                                    type="button"
                                    class="glow-on-hover"
                                    data-bs-toggle="modal"
                                    data-bs-target="#login-modal">
                                    Побарај понуда
                                </button>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-n3 order-lg-2 order-1">
                        <div class="mt-n5">
                            <div class="d-flex align-items-center justify-content-center mb-2">
                                <div
                                    class="linear-gradient d-flex align-items-center justify-content-center rounded-circle"
                                    style="z-index: 1; width: 110px; height: 110px; background-image: url('/images/logos/profile/thumbnails/{{ $profile->logo }}'); background-size: cover; background-position: center; background-color: #ffffff">

                                </div>
                            </div>
                            <div class="text-center">
                                <h5 class="fs-5 mb-0 fw-semibold">{{ $profile->name }}</h5>
                                <p class="mb-0 fs-4">{{ $profile->subtitle }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 order-last">
                        <ul class="list-unstyled d-flex align-items-center justify-content-center justify-content-lg-center my-3 gap-3">
                            <li class="position-relative">
                                <a class="text-white d-flex align-items-center justify-content-center bg-primary p-2 fs-4 rounded-circle"
                                   href="{{ $profile->facebook }}" width="30" height="30" target="_blank">
                                    <i class="ti ti-brand-facebook"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-white bg-secondary d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle "
                                   href="{{ $profile->instagram }}" target="_blank">
                                    <i class="ti ti-brand-instagram"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-white bg-secondary d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle "
                                   href="{{ $profile->weblink }}" target="_blank">
                                    <i class="ti ti-world-www"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-white bg-danger d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle "
                                   href="{{ $profile->youtube }}" target="_blank">
                                    <i class="ti ti-brand-youtube"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-profile" role="tabpanel"
                 aria-labelledby="pills-profile-tab" tabindex="0">
                <div class="row">

                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body border-bottom">
                                <div class="col-12">
                                    {!! $profile->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body border-bottom">
                                @foreach($contacts as $contact)
                                    <div class="row">
                                        <div class="col-sm-12 col-xl-12">

                                            <div class="text-center">
                                                <h6>{{ $contact->contactName }}</h6>
                                                <p>{{ $contact->contactPosition }}</p>
                                                <p>{{ $contact->contactEmail }} </p>
                                                <p>{{ $contact->contactPhone }} </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>


                <section class="wide-tb-80">
                    <div class="container">
                        <div id="js-styl2-mosaic" class="cbp" style="display: none;">
                            <div class="cbp-item" style="display: none;">
                            </div>
                        </div>
                        <div id="js-styl2-mosaic" class="masonry">

                            @foreach($profile->gallery  as $image)
                                <div class="item">

                                    <a href="/images/gallery/large/{{ $image->image }}" class="cbp-caption cbp-lightbox" data-title="">
                                        <div class="cbp-caption-defaultWrap">
                                            <img src="/images/gallery/medium/{{ $image->image }}" alt="{{  $profile->name }} - Gallery Image{{$image->position}}">
                                        </div>
                                        <div class="cbp-caption-activeWrap">
                                            <div class="cbp-l-caption-alignCenter">
                                                <div class="cbp-l-caption-body">
                                                    <i class="icofont-search icofont-2x txt-white"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </section>

                <div class="row">


                    <div id="login-modal"
                         class="modal fade"
                         tabindex="-1"
                         aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="text-center mt-2 mb-4">
                                        <a href="" class="text-success"><span><img
                                                    src="/images/logos/profiles/thumbnails/{{ $profile->logo }}"
                                                    class="me-3" width="80"
                                                    alt=""/></span></a>
                                    </div>
                                    <h5 class="mb-3 text-center">Испратете барање за понуда со {{ $profile->name }}</h5>
                                    <form action="{{ route('messages.store', $profile->id) }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="name">Име</label>
                                                    <input
                                                        type="text" required
                                                        class="form-control"
                                                        id="name" name="name"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="email">Е-маил</label>
                                                    <input
                                                        type="email" required
                                                        class="form-control"
                                                        id="email" name="email"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="phone">Телефон</label>
                                                    <input
                                                        type="text" required
                                                        class="form-control"
                                                        id="phone" name="phone"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="message">Вашата порака</label>
                                                    <textarea
                                                        type="text"
                                                        class="form-control"
                                                        id="message" name="message" rows="6"
                                                    ></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="d-md-flex align-items-center mt-3">
                                                    <div class="ms-auto mt-3 mt-md-0">
                                                        <button
                                                            type="submit"
                                                            class="btn btn-info font-medium rounded-pill px-4">
                                                            <div class="d-flex align-items-center">
                                                                <i class="ti ti-send me-2 fs-4"></i>
                                                                Испрати
                                                            </div>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>


            <div class="row">
                <div class="col-md-12">
                    <p class="text-center">
                        <button
                            type="button"
                            class="glow-on-hover"
                            data-bs-toggle="modal"
                            data-bs-target="#login-modal">
                            Побарај понуда
                        </button>
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div id="map-canvas"></div>
                    </div>
                </div>
            </div>




        </div>



    </div>


@endsection
@section('scripts')
    <!-- Google Maps -->
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAS05zxYcZTGI-KfGAk8l0xNC2eCWfNsPw"></script>

    <script type="text/javascript"  src="/assets/js/jquery.cubeportfolio.min.js"></script>
    <script>



        $(document).ready(function () {

            (function($, window, document, undefined) {
                'use strict';

                // init cubeportfolio
                $('#js-styl2-mosaic').cubeportfolio({
                    filters: '#js-filters-full-width',
                    loadMore: '#js-loadMore-full-width',
                    loadMoreAction: 'auto',
                    layoutMode: 'mosaic',
                    sortToPreventGaps: true,
                    defaultFilter: '*',
                    animationType: 'fadeOutTop',
                    gapHorizontal: 0,
                    gapVertical: 0,
                    gridAdjustment: 'responsive',
                    mediaQueries: [{
                        width: 999,
                        cols: 4
                    }, {
                        width: 767,
                        cols: 3
                    }, {
                        width: 480,
                        cols: 2
                    }, {
                        width: 320,
                        cols: 1
                    }],
                    caption: 'zoom',
                    displayType: 'fadeIn',
                    displayTypeSpeed: 100,

                    // lightbox
                    lightboxDelegate: '.cbp-lightbox',
                    lightboxGallery: true,
                    lightboxTitleSrc: 'data-title',

                });
            })(jQuery, window, document);

// Google Maps

            map = new google.maps.Map(document.getElementById('map-canvas'), {
                center: {lat: {{ $profile->lat }}, lng: {{ $profile->lng }}},
                zoom: 15
            });

            var marker = new google.maps.Marker({
                position: {lat: {{ $profile->lat }}, lng: {{ $profile->lng }}},
                map: map,
                draggable: false
            });

        });

    </script>
@endsection
