@extends('layouts.frontend')
@section('content')


    <!-- Page Start -->
    <div class="container-fluid">
        <div class="row">
            @foreach($photographers as $photographer)
            <div class="col-md-6 col-lg-4">
                <div class="card blog position-relative overflow-hidden hover-img"
                     style="background-image: url(images/cover_images/photographers/originals/{{ $photographer->coverImg }});">
                    <div class="card-body position-relative">
                        <div class="d-flex flex-column justify-content-between h-100">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="position-relative" data-bs-toggle="tooltip" data-bs-placement="top"
                                     data-bs-title="Mollie Underwood">
                                </div>
                                <span class="badge text-bg-primary rounded-3 fs-2 fw-semibold">Топ понуда</span>
                            </div>
                            <div>
                                <a href="{{ route('photographers.profile', $photographer->slug) }}" class="fs-7 my-4 fw-semibold text-white d-block lh-sm"><h1
                                        class="text-white">25ти Август</h1>
                                    <p> {{ $photographer->name }}</p></a>
                                <div class="d-flex align-items-center gap-4">
                                    <div class="d-flex align-items-center gap-2 text-white fs-3 fw-normal">
                                        <i class="ti ti-eye fs-5"></i>
                                        Капацитет {{ $photographer->capacity }} гости
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


    </div>
@endsection
