@extends('layouts.frontend')
@section('metadata')
    <meta name="description"
          content="Дигитализирај ја твојата љубовна приказна. Одбери еден од многуте темплејти на нашата веб страна, додадте ја Вашата оригиналност  преку слики, видео или текст и изненадете ги сите гости со уникатно искуство."/>
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $restaurant->name }} - Драги Гости">
    <meta itemprop="description"
          content="{{ Str::of($restaurant->description)->words(25)->stripTags() }}">
    <meta itemprop="image" content="{{ env('APP_URL') }}/images/cover_images/restaurants/originals/{{ $restaurant->coverImg }}">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@dragigosti">
    <meta name="twitter:title" content="{{ $restaurant->name }} - Драги Гости">
    <meta name="twitter:description" content="{{ Str::of($restaurant->description)->words(25)->stripTags() }}">
    <meta name="twitter:creator" content="@dragigosti">
    <meta name="twitter:image" content="{{ env('APP_URL') }}/images/cover_images/restaurants/originals/{{ $restaurant->coverImg }}">

    <!-- Open Graph data -->

    <meta property="og:locale" content="mk_MK"/>
    <meta property="fb:app_id" content="1339434706768448"/>
    <meta property="og:title" content="{{ $restaurant->name }} - Драги Гости"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{  url()->full()  }}"/>
    <meta property="og:image" content="{{ env('APP_URL') }}/images/cover_images/restaurants/originals/{{ $restaurant->coverImg }}"/>
    <meta property="og:description"
          content="{{ Str::of($restaurant->description)->words(25)->stripTags() }}"/>
    <meta property="og:site_name" content="DragiGosti"/>
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
                                 style="background-image: url('/images/cover_images/restaurants/originals/{{ $restaurant->coverImg }}');"></div>

                            <div class="carousel-caption">

                                <h5>{{ $restaurant->name }}</h5>
                                <div class="box-1 scroll-to">
                                    <div class="butt btn-one">
                                        <span>ПОБАРАЈ ПОНУДА</span>
                                    </div>
                                    <div class="arrow scroll-to" style="margin-top: -200px"></div>
                                </div>


                            </div>
                        </div>
                        @foreach($restaurant->album as $album)
                            @foreach($album->pictures  as $picture)
                                <div class="carousel-item">
                                    <div class="slider-image"
                                         style="background-image: url('/images/gallery/restaurants/{{$restaurant->name}}/{{$picture->image}}');"></div>
                                    <div class="carousel-caption">

                                        <h5>{{ $restaurant->name }}</h5>
                                        <div class="box-1 scroll-to">
                                            <div class="butt btn-one">
                                                <span>ПОБАРАЈ ПОНУДА</span>
                                            </div>
                                            <div class="arrow scroll-to" style="margin-top: -200px"></div>
                                        </div>


                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselRestaurant" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselRestaurant" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                </div>
                <div class="row align-items-center">
                    <div class="col-lg-4 order-lg-1 order-2">
                        <div class="d-flex align-items-center justify-content-around m-4">
                            <div class="text-center">
                                <i class="ti ti-phone-call fs-6 d-block mb-2"></i>
                                <h4 class="mb-0 fw-semibold lh-1">{{ $restaurant->phone }}</h4>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-n3 order-lg-2 order-1">
                        <div class="mt-n5">
                            <div class="d-flex align-items-center justify-content-center mb-2">
                                <div
                                    class="linear-gradient d-flex align-items-center justify-content-center rounded-circle"
                                    style="z-index: 1; width: 110px; height: 110px; background-image: url('/images/logos/restaurants/thumbnails/{{ $restaurant->logo }}'); background-size: cover; background-position: center; background-color: #ffffff">

                                </div>
                            </div>
                            <div class="text-center">
                                <h5 class="fs-5 mb-0 fw-semibold">{{ $restaurant->name }}</h5>
                                <p class="mb-0 fs-4">{{ $restaurant->subtitle }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 order-last">
                        <ul class="list-unstyled d-flex align-items-center justify-content-center justify-content-lg-center my-3 gap-3">
                            <li class="position-relative">
                                <a class="text-white d-flex align-items-center justify-content-center bg-primary p-2 fs-4 rounded-circle"
                                   href="{{ $restaurant->facebook }}" width="30" height="30" target="_blank">
                                    <i class="ti ti-brand-facebook"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-white bg-secondary d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle "
                                   href="{{ $restaurant->instagram }}" target="_blank">
                                    <i class="ti ti-brand-instagram"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-white bg-secondary d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle "
                                   href="{{ $restaurant->weblink }}" target="_blank">
                                    <i class="ti ti-world-www"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-white bg-danger d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle "
                                   href="{{ $restaurant->youtube }}" target="_blank">
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
                                    {!! $restaurant->description !!}
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
                                                                src="/images/logos/restaurants/thumbnails/{{ $restaurant->logo }}"
                                                                class="me-3" width="80"
                                                                alt=""/></span></a>
                                                </div>
                                                <h5 class="mb-3 text-center">Испратете барање за состанок во ресторанот {{ $restaurant->name }}</h5>
                                                <form action="{{ route('messages.store', $restaurant->id) }}" method="post">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label for="name">Име</label>
                                                                <input
                                                                    type="text" required
                                                                    class="form-control"
                                                                    id="name" name="name"
                                                                    placeholder="Вашето име"
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
                                                                    placeholder="Вашиот е-маил"
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
                                                                    placeholder="Вашиот телефон"
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
                                                                    class="form-control quill-editor"
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

                    <div class="card w-100">
                        <div class="card-body">
                            <div class="text-center">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="text-center">
                                            <button
                                                type="button"
                                                class="btn bg-main text-white"
                                                data-bs-toggle="modal"
                                                data-bs-target="#login-modal">
                                                Побарај понуда
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-center">
                                            <button
                                                class="btn bg-main text-white">
                                                <i class="ti ti-phone-call fs-5 text-center"></i>
                                                {{ $restaurant->phone }}
                                            </button>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                </div>
                            </div>
                        </div>
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
    </div>

@endsection
@section('scripts')
    <!-- Google Maps -->
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAS05zxYcZTGI-KfGAk8l0xNC2eCWfNsPw"></script>

    <script>



        $(document).ready(function () {
// Google Maps

            map = new google.maps.Map(document.getElementById('map-canvas'), {
                center: {lat: {{ $restaurant->lat }}, lng: {{ $restaurant->lng }}},
                zoom: 15
            });

            var marker = new google.maps.Marker({
                position: {lat: {{ $restaurant->lat }}, lng: {{ $restaurant->lng }}},
                map: map,
                draggable: false
            });

        });

    </script>
@endsection
