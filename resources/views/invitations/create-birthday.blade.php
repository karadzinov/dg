@extends('layouts.frontend')
@section('metadata')
    <title>Покани - Драги Гости</title>
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

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Card -->
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6 text-center">
                                <a href="/invitation/create/birthday" class="btn btn-block btn-default">Роденден</a>
                            </div>

                            <div class="col-md-6 text-center">
                                <a href="/invitation/create" class="btn btn-block btn-outline-info">Свадба</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <!-- --------------------- start Custom Design Example---------------- -->
                <div class="card">
                    <div class="card-body wizard-content">

                        <h6 class="card-subtitle mb-3"></h6>
                        <form action="{{ route('invitations.store.birthday') }}" method="post" id="check_form"
                              class=" tab-validation-wizard"
                              enctype="multipart/form-data" name="invitations">
                            @csrf
                            <!-- Step 1 -->

                            <section>
                                <div class="row">
                                    <div class="col-md-6">


                                        <div class="form-floating mb-3">

                                            <input type="text" name="name" id="name"
                                                   class="form-control @error('name') is-invalid @enderror"
                                                   placeholder="" value="{{ old('name') }}" onkeyup="transcrire()"
                                                   required>
                                            <label for="name" class="form-label label-contact">Име на славеникот</label>

                                            @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>


                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">

                                            <input type="text" name="years" id="years"
                                                   class="form-control @error('years') is-invalid @enderror"
                                                   placeholder="" value="{{ old('years') }}" required>
                                            <label for="years" class="form-label label-contact">Години</label>

                                            @error('years')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="@if(auth()->user()) col-md-12 @else col-md-6 @endif">


                                        <div class="form-floating mb-3">

                                            <input type="date" name="date" id="date"
                                                   class="form-control @error('date') is-invalid @enderror"
                                                   placeholder="" value="{{ date('Y-m-d',strtotime("-1 days")) }}"
                                                   required>
                                            <label for="date" class="form-label label-contact">Изберете датум</label>

                                            @error('date')
                                            <div class="invalid-feedback" id="errorMessage_name">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    @if(auth()->user())
                                        <input type="hidden"
                                               class="form-control"
                                               name="email" id="email" placeholder=""
                                               value="{{ auth()->user()->email }}"/>
                                    @else
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">

                                                <input type="email" name="email" id="email"
                                                       class="form-control @error('email') is-invalid @enderror"
                                                       placeholder="" value="{{ old('email') }}" onkeyup="transcrire()"
                                                       required>
                                                <label for="email" class="form-label label-contact">Email</label>

                                                @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="fv-row mb-10">
                                        <!--begin::Label-->

                                        <label for="basic_url" class="form-label">Вашиот линк до поканата</label>
                                        <label id="basic_url-error" class="error" for="basic_url"></label>
                                        <!--end::Label-->
                                        <div class="input-group mb-5">
                                            <span class="input-group-text"
                                                  id="basic-addon3">https://dragigosti.com/birthday/</span>
                                            <input type="text" class="form-control" id="basic_url"
                                                   aria-describedby="basic-addon3" name="basic_url" data-valid="false">
                                            <span class="input-group-text" style="background-color: lightgreen"
                                                  id="valid">
                                            <i style="color: black" class="ti ti-check"></i></span>
                                            <span class="input-group-text" style="background-color: red" id="not-valid">
                                            <i style="color: black" class="ti ti-alert-triangle"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- Step 2 -->

                            <section>


                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="card">
                                            <div id="group-upload">
                                                <div class="dz-message" data-dz-message>
                                                    <span @error('group_photo') class="btn btn-danger"  @enderror>Изберете слика за позадина</span>

                                                </div>
                                                <div class="fallback">
                                                    <input name="file" type="file"/>

                                                </div>
                                            </div>


                                        </div>


                                    </div>
                                </div>
                                <input name="group_photo" id="group_photo" class="form-control"
                                       style="visibility: hidden;" type="text" value="" required/>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="main_text" class="form-label label-contact">Опис за
                                                поканата</label>
                                            <textarea name="main_text" id="main_text"
                                                      class="form-control">{{ old('main_text') }}</textarea>


                                            @error('main_text')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>


                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" id="searchmap" class="form-control" style="background-color: #fff; font-size: 15px;
                                    font-weight: 300;
                                    margin-left: 12px;
                                    padding: 0 11px 0 13px;
                                    text-overflow: ellipsis;
                                    width: 300px;">
                                                <div id="map-canvas">

                                                </div>
                                            </div>

                                            <input type="hidden" id="lat" class="form-control" name="lat" value="41.9981294">
                                            <input type="hidden" id="lng" class="form-control" name="lng" value="21.4254355">
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- Step 3 -->

                            <section>
                                <div class="row">
                                    <div class="text-center mt-50">
                                        <h5>Продолжете кон вашата покана</h5>
                                        <br>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12 text-center mb-10">

                                            <button class="btn btn-block button-large btn-primary" onclick="event.preventDefault();
                                              $('#check_form').append(`<input type='hidden' name='template' checked value='birthday' />`);
                                  document.getElementById('check_form').submit();"><span id="mainurl">https://dragigosti.com/birthday/</span>
                                            </button>


                                        </div>

                                    </div>
                                </div>
                            </section>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
@section('scripts')
    <script src="/js/dropzone.min.js"></script>
    <script src="/js/jquery.steps.min.js"></script>
    <script src="/js/jquery.validate.min.js"></script>
    <script src="/js/form-wizard.js"></script>
    <script src="/js/car-replace.js"></script>
    <script src="/assets/libs/ckeditor/ckeditor.js"></script>
    <script>
        Dropzone.autoDiscover = false;
        $('document').ready(function () {

            CKEDITOR.replace('main_text');
            CKEDITOR.skinName = 'icy-orange';

            let name = $("#name").val();

            $("#name").on("change paste keyup", function () {

                name = $(this).val().toLowerCase();

                $("#basic_url").val(toLatin(name));
                $("#mainurl").text("https://dragigosti.com/birthday/" + toLatin(name));


                var data = $("#basic_url").val();

                $.ajax({
                    url: "{{ route('invitations.checkUrl') }}",
                    method: 'post',
                    data: {
                        content: data,
                    },
                    headers: {
                        'X-CSRF-TOKEN': "{{ @csrf_token() }}"
                    },
                    success: function (response) {
                        if (response.status === 'Valid Url Link') {
                            $("#basic_url").removeClass('is-invalid');
                            $("#basic_url").addClass('is-valid');

                        }
                        if (response.status === 'Choose another Url') {
                            $("#basic_url").addClass('is-invalid');

                        }

                    }
                });
            });


            $("#basic_url").on("change paste keyup", function () {
                var data = $(this).val();


                $("#mainurl").text("https://dragigosti.com/" + toLatin($(this).val()));

                $.ajax({
                    url: "{{ route('invitations.checkUrl') }}",
                    method: 'post',
                    data: {
                        content: data,
                    },
                    headers: {
                        'X-CSRF-TOKEN': "{{ @csrf_token() }}"
                    },
                    success: function (response) {
                        if (response.status === 'Valid Url Link') {
                            validInvalid(true);
                            $("#valid").css('display', 'block');
                            $("#not-valid").css('display', 'none');
                        }
                        if (response.status === 'Choose another Url') {
                            validInvalid(false);
                            $("#valid").css('display', 'none');
                            $("#not-valid").css('display', 'block');
                        }
                    }
                });
            });

            function validInvalid(e) {
                jQuery.validator.addMethod("checkUrl", function () {
                    return e
                });
            }


            $("a[href$='previous']").hide();
        });


        let myGroupDropzone = $("#group-upload").dropzone({
            addRemoveLinks: true,
            maxFiles: 1,
            init: function () {

                // Hack: Add the dropzone class to the element
                $(this.element).addClass("dropzone");


                this.on("removedfile", function (file) {
                    let filename = JSON.parse(file.xhr.response);
                    filename = filename.success;

                    if (file) {
                        $.ajax({
                            url: "{{ route('dropzone.destroy') }}",
                            method: 'post',
                            data: {filename: filename},
                            headers: {
                                'X-CSRF-TOKEN': "{{ @csrf_token() }}"
                            },
                            success: function (response) {
                                console.log(response);
                            }
                        });
                    }
                });
            },
            url: "{{ route('dropzone.store') }}",
            method: 'post',
            headers: {
                'X-CSRF-TOKEN': "{{ @csrf_token() }}"
            },
            success: function (file, response) {
                console.log(response['success']);
                $('#group_photo').attr('value', `${response.success}`);
            }
        });

    </script>


    <!-- Google Maps -->
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDq46a51kTANyyLxxx1uhp4o6RleQC9iIY"></script>
    <script src="/plugins/ckeditor/ckeditor.js"></script>
    <script src="/plugins/ckeditor/ckconfig.js"></script>
    <script>


        $(document).ready(function () {
// Google Maps


            map = new google.maps.Map(document.getElementById('map-canvas'), {
                center: {lat: 41.9981294, lng: 21.4254355},
                zoom: 10
            });

            var marker = new google.maps.Marker({
                position: {lat: 41.9981294, lng: 21.4254355},
                map: map,
                draggable: true
            });

            var input = document.getElementById('searchmap');
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(input);

            google.maps.event.addListener(searchBox, 'places_changed', function () {
                var places = searchBox.getPlaces();
                var bounds = new google.maps.LatLngBounds();
                var i, place;
                for (i = 0; place = places[i]; i++) {
                    bounds.extend(place.geometry.location);
                    marker.setPosition(place.geometry.location);
                }
                map.fitBounds(bounds);
                map.setZoom(15);

            });

            google.maps.event.addListener(marker, 'position_changed', function () {
                var lat = marker.getPosition().lat();
                var lng = marker.getPosition().lng();

                $('#lat').val(lat);
                $('#lng').val(lng);
            });


            $("form").bind("keypress", function (e) {
                if (e.keyCode == 13) {
                    $("#searchmap").attr('value');
                    //add more buttons here
                    return false;
                }
            });


            $("#searchmap").attr('placeholder', 'Изберете локација').css({'padding': '20px 11px 20px 20px'});

        });


    </script>
@endsection
