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
            <div class="col-12">


                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <h3>Драги гости...</h3>
                        <p>
                            Тука сме за сите ваши прашања!
                            <br>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="mb-0 text-white">Контактирајте не (<i class="ti ti-phone fs-4"></i> 075 260 169)</h4>
            </div>
            <form action="{{ route('frontend.question') }}" method="post">
                @csrf
                <div>
                    <div class="card-body">
                        <h5>Вашите информации</h5>
                        <div class="row pt-3">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="firstName" class="control-label">Име</label>
                                    <input
                                        type="text"
                                        id="firstName"
                                        name="firstName"
                                        class="form-control"
                                        />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="control-label">Е-маил</label>
                                    <input
                                        type="email"
                                        id="email" name="email"
                                        class="form-control"
                                    />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="control-label">Телефон за контакт</label>
                                    <input
                                        type="text"
                                        id="phone" name="phone"
                                        class="form-control"

                                    />
                                </div>
                            </div>
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="category" class="control-label">Категорија</label>
                                    <select
                                        id="category" name="category"
                                        class="form-control form-select"
                                        data-placeholder="Choose a Category"
                                        tabindex="1">
                                        <option value="Ресторани">Ресторани</option>
                                        <option value="Музичари">Музичари</option>
                                        <option value="Фотографи">Фотографи</option>
                                        <option value="Покани">Покани</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <label for="description">Вашето прашање</label>
                                <input type="text" id="description" name="description" class="form-control" style="height: 200px">
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="card-body border-top text-end">
                                <button
                                    type="submit"
                                    class="btn btn-success rounded-pill px-4">
                                    <div class="d-flex align-items-center">
                                        <i class="ti ti-device-floppy me-1 fs-4"></i>
                                        Испрати
                                    </div>





                                </button>

                                @if(Session::has('message'))

                                    {{ Session::get('message') }}

                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection






















