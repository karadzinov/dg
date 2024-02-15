@extends('layouts.frontend')
@section('metadata')
    <title>Музичари - Драги Гости</title>
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

    </div>
@endsection
