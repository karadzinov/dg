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
                        <div class="slider-image"
                             style="background-image: url('/dist/images/flowers.png');"></div>
                        <div class="carousel-caption d-md-block">
                            <h4>Музичари/Бендови</h4>
                            <h5>се за вашето расположение</h5>
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
        <div class="row">
            @foreach($musicians as $musician)
            <div class="col-md-6 col-lg-4">
                <div class="card blog position-relative overflow-hidden hover-img"
                     style="background-image: url(images/cover_images/musicians/originals/{{ $musician->coverImg }});">
                    <div class="card-body position-relative">
                        <div class="d-flex flex-column justify-content-between h-100">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="position-relative" data-bs-toggle="tooltip" data-bs-placement="top"
                                     data-bs-title="Mollie Underwood">
                                </div>
                                <span class="badge text-bg-primary rounded-3 fs-2 fw-semibold">Топ понуда</span>
                            </div>
                            <div>
                                <a href="{{ route('musicians.profile', $musician->slug) }}" class="fs-7 my-4 fw-semibold text-white d-block lh-sm"><h1
                                        class="text-white">25ти Август</h1>
                                    <p> {{ $musician->name }}</p></a>
                                <div class="d-flex align-items-center gap-4">
                                    <div class="d-flex align-items-center gap-2 text-white fs-3 fw-normal">
                                        <i class="ti ti-eye fs-5"></i>
                                        Капацитет {{ $musician->capacity }} гости
                                    </div>
                                    <div class="d-flex align-items-center gap-2 text-white fs-3 fw-normal">

                                        <i class="ti ti-currency-euro fs-5"></i> / порција

                                    </div>
                                    <div class="d-flex align-items-center gap-1 text-white fw-normal ms-auto">
                                        <i class="ti ti-point"></i>
                                        <small>Петок, Август 25</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

        <nav aria-label="...">
            <ul class="pagination justify-content-center mb-0 mt-4">
                <li class="page-item">
                    <a class="page-link border-0 rounded-circle text-dark round-32 d-flex align-items-center justify-content-center"
                       href="#"><i class="ti ti-chevron-left"></i></a>
                </li>
                <li class="page-item active" aria-current="page">
                    <a class="page-link border-0 rounded-circle round-32 mx-1 d-flex align-items-center justify-content-center"
                       href="#">1</a>
                </li>
                <li class="page-item">
                    <a class="page-link border-0 rounded-circle text-dark round-32 mx-1 d-flex align-items-center justify-content-center"
                       href="#">2</a>
                </li>
                <li class="page-item">
                    <a class="page-link border-0 rounded-circle text-dark round-32 mx-1 d-flex align-items-center justify-content-center"
                       href="#">3</a>
                </li>
                <li class="page-item">
                    <a class="page-link border-0 rounded-circle text-dark round-32 mx-1 d-flex align-items-center justify-content-center"
                       href="#">4</a>
                </li>
                <li class="page-item">
                    <a class="page-link border-0 rounded-circle text-dark round-32 mx-1 d-flex align-items-center justify-content-center"
                       href="#">5</a>
                </li>
                <li class="page-item">
                    <a class="page-link border-0 rounded-circle text-dark round-32 mx-1 d-flex align-items-center justify-content-center"
                       href="#">...</a>
                </li>
                <li class="page-item">
                    <a class="page-link border-0 rounded-circle text-dark round-32 mx-1 d-flex align-items-center justify-content-center"
                       href="#">10</a>
                </li>
                <li class="page-item">
                    <a class="page-link border-0 rounded-circle text-dark round-32 d-flex align-items-center justify-content-center"
                       href="#"><i class="ti ti-chevron-right"></i></a>
                </li>
            </ul>
        </nav>
    </div>
@endsection
