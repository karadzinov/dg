@extends('layouts.frontend')
@section('metadata')
    <meta name="description"
          content="Дигитализирај ја твојата љубовна приказна. Одбери еден од многуте темплејти на нашата веб страна, додадте ја Вашата оригиналност  преку слики, видео или текст и изненадете ги сите гости со уникатно искуство."/>
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Заштедете време и направете прекрасни свадбени покани на dragigosti.com">
    <meta itemprop="description"
          content="Дигитализирај ја твојата љубовна приказна. Одбери еден од многуте темплејти на нашата веб страна, додадте ја Вашата оригиналност  преку слики, видео или текст и изненадете ги сите гости со уникатно искуство.">
    <meta itemprop="image" content="{{ env('APP_URL') }}/dist/images/logos/logo-main.png">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@dragigosti">
    <meta name="twitter:title" content="Заштедете време и направете прекрасни свадбени покани на dragigosti.com">
    <meta name="twitter:description"
          content="Дигитализирај ја твојата љубовна приказна. Одбери еден од многуте темплејти на нашата веб страна, додадте ја Вашата оригиналност  преку слики, видео или текст и изненадете ги сите гости со уникатно искуство.">
    <meta name="twitter:creator" content="@dragigosti">
    <meta name="twitter:image" content="{{ env('APP_URL') }}/dist/images/logos/logo-main.png">

    <!-- Open Graph data -->

    <meta property="og:locale" content="mk_MK"/>
    <meta property="fb:app_id" content="1339434706768448"/>
    <meta property="og:title" content="Заштедете време и направете прекрасни свадбени покани на dragigosti.com"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{ env('APP_URL') }}"/>
    <meta property="og:image" content="{{ env('APP_URL') }}/dist/images/logos/logo-main.png"/>
    <meta property="og:description"
          content="Дигитализирај ја твојата љубовна приказна. Одбери еден од многуте темплејти на нашата веб страна, додадте ја Вашата оригиналност  преку слики, видео или текст и изненадете ги сите гости со уникатно искуство."/>
    <meta property="og:site_name" content="DragiGosti"/>
@endsection
@section('content')

    <!-- Page Start -->
    <div class="container-fluid">
        <div class="row">
            @foreach($restaurants as $index => $restaurant)
                <div class="@if($index === 0) col-md-8 col-lg-8 @else col-md-6 col-lg-4 @endif">
                    <a href="{{ route('restaurants.profile', $restaurant->slug) }}">
                        <div class="card blog position-relative overflow-hidden hover-img"
                             style="background-image: url(images/cover_images/restaurants/originals/{{ $restaurant->coverImg }});">
                            <div class="card-body position-relative">
                                <div class="d-flex flex-column justify-content-between h-100">
                                    <div class="d-flex align-items-start justify-content-between">

                                        <div
                                            class="d-flex align-items-center justify-content-center mb-1 text-center logo-top">
                                            <div
                                                class="linear-gradient d-flex align-items-center justify-content-center rounded-circle"
                                                style="z-index: 1; width: 60px; height: 60px; background-image: url('/images/logos/restaurants/thumbnails/{{ $restaurant->logo }}'); background-size: cover; background-position: center; background-color: #ffffff">

                                            </div>
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
                                                <a class="restaurant-list btn bg-main btn-sm"
                                                   data-restaurant-id="{{ $restaurant->id }}"><i class="ti ti-plus"></i></a>


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
