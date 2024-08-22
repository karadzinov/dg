@extends('layouts.frontend')
@section('content')

    <div class="container-fluid">
        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">{{ $photographer->name }}</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-muted"
                                                               href="{{ route('frontend.index') }}"><i
                                            class="ti ti-home-2 text-dark me-1 fs-5"></i></a></li>
                                <li class="breadcrumb-item"><a class="text-muted"
                                                               href="{{ route('frontend.photographers') }}">Ресторани</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">{{ $photographer->name }}</li>
                                <li class="breadcrumb-item" aria-current="page">{{ $album->name }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="container py-3 py-lg-3">
            <h5 class="mb-5">{{ $album->name }}</h5>
            <div class="swiper swiper-1 position-relative">
                <div class="swiper-wrapper">
                    @foreach($pictures as $picture)
                        @if(isset($picture->youtube_link))
                            <div class="swiper-slide">
                                <div
                                    class="vh-75 d-flex w-100  text-white align-items-center justify-content-center">
                                    <iframe width="1300" height="650"
                                            src="{{$picture->youtube_link}}?autoplay=1"
                                            title="YouTube video player" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            allowfullscreen></iframe>
                                </div>
                            </div>
                        @else
                            <div class="swiper-slide">
                                <div
                                    class="vh-75 d-flex w-100  text-white align-items-center justify-content-center">
                                    <img src="/images/gallery/photographers/{{$photographer->name}}/{{$picture->image}}"
                                         class="img-fluid">
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="/js/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".swiper-1", {
            slidesPerView: 1,
            spaceBetween: 16,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });

        var swiper2 = new Swiper(".swiper-2", {
            slidesPerView: 2,
            spaceBetween: 8,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
        var swiper2 = new Swiper(".swiper-3", {
            slidesPerView: 1,
            spaceBetween: 8,
            centerSlides: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                }
            },
        });
        var swiperFlow = new Swiper('.swiper-flow', {
            effect: 'coverflow',
            coverflowEffect: {
                rotate: 60,
                slideShadows: false,
            },
        });
        var swiperFade = new Swiper('.swiper-fade', {
            effect: 'fade',
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            fadeEffect: {
                crossFade: true
            },
        });
        var swiperFade = new Swiper('.swiper-cards', {
            effect: "cards",
            grabCursor: true,
            cardsEffect: {
                slideShadows: false,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            }
        });

        //Thumbnails Demo
        var swiperThumb = new Swiper(".swiper-thumbs-thumbnails", {
            freeMode: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
            history: false,
            spaceBetween: 8,
            breakpoints: {
                480: {
                    slidesPerView: 4,
                    spaceBetween: 8,
                },
                768: {
                    slidesPerView: 6,
                    spaceBetween: 8,
                },
                1024: {
                    slidesPerView: 8,
                    spaceBetween: 8,
                },
            }
        });
        var swiperThumbsMain = new Swiper(".swiper-thumbs-main", {
            spaceBetween: 16,
            loop: true,
            autoHeight: true,
            thumbs: {
                swiper: swiperThumb,
            },
        });

        //Timeline progressbar
        var sliderThumbs = new Swiper('.progress-swiper-thumbs', {
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
            history: false,
            breakpoints: {
                480: {
                    slidesPerView: 2,
                    spaceBetween: 16,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 16,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 16,
                },
            },
            on: {
                'afterInit': function (swiper) {
                    swiper.el.querySelectorAll('.swiper-pagination-progress-inner')
                        .forEach($progress => $progress.style.transitionDuration =
                            `${swiper.params.autoplay.delay}ms`)
                }
            }
        });

        var sliderMain = new Swiper('.swiper-progress-main', {
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            thumbs: {
                swiper: sliderThumbs
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        })

    </script>
@endsection
