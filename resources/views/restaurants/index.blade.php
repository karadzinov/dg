@extends('layouts.frontend')
@section('content')

    <!-- Page Start -->
    <div class="container-fluid">
        <div class="row">
            @foreach($restaurants as $restaurant)
                <div class="col-md-6 col-lg-4">
                    <a href="{{ route('restaurants.profile', $restaurant->slug) }}">
                        <div class="card blog position-relative overflow-hidden hover-img"
                             style="background-image: url(images/cover_images/restaurants/originals/{{ $restaurant->coverImg }});">
                            <div class="card-body position-relative">
                                <div class="d-flex flex-column justify-content-between h-100">
                                    <div class="d-flex align-items-start justify-content-between">
                                        <div class="position-relative" data-bs-toggle="tooltip" data-bs-placement="top"
                                             data-bs-title="">
                                        </div>

                                    </div>
                                    <div>
                                        <div class="fs-7 my-4 fw-semibold text-white d-block lh-sm">


                                        <div class="box-1">
                                            <div class="butt btn-one">
                                                <span>{{ $restaurant->name }}</span>
                                            </div>

                                        </div>

                                        </div>
                                        <div class="d-flex align-items-center gap-4">
                                            <div class="d-flex align-items-center gap-2 text-white fs-3 fw-normal">


                                            </div>

                                            <div class="d-flex align-items-center gap-1 text-white fw-normal ms-auto">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>


    </div>
@endsection
