@extends('layouts.frontend')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <h3>Креирајте ја вашата покана...</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <!-- --------------------- start Custom Design Example---------------- -->
                <div class="card">
                    <div class="card-body wizard-content">
                        <h4 class="card-title mb-0">Внесете ги следниве информации</h4>
                        <h6 class="card-subtitle mb-3"></h6>
                        <form action="{{ route('invitations.store') }}" method="post" id="check_form"
                              class="tab-wizard wizard-circle tab-validation-wizard"
                              enctype="multipart/form-data" name="invitations">
                            @csrf
                            <!-- Step 1 -->
                            <h6>Чекор 1</h6>
                            <section>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="mrs" class="form-label">Име на невеста</label>
                                            <input type="text"
                                                   class="form-control "
                                                   name="mrs" id="mrs" placeholder="" value="" onkeyup="transcrire()" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="mr" class="form-label">Име на младоженец</label>
                                            <input type="text"
                                                   class="form-control"
                                                   name="mr" id="mr" placeholder="" value="" onkeyup="transcrireMr()" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="@if(auth()->user()) col-md-12 @else col-md-6 @endif">
                                        <div class="mb-3">
                                            <label for="date" class="form-label">Изберете датум</label>
                                            <input type="date"
                                                   class="form-control"
                                                   name="date" id="date" placeholder="" value="" required min="{{ date('Y-m-d') }}"/>
                                        </div>
                                    </div>
                                    @if(auth()->user())
                                        <input type="hidden"
                                               class="form-control"
                                               name="email" id="email" placeholder=""
                                               value="{{ auth()->user()->email }}"/>
                                    @else
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Внесете го вашиот е-маил</label>
                                                <input type="email"
                                                       class="form-control"
                                                       name="email" id="email" placeholder="" value="" required/>
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
                                                  id="basic-addon3">https://dragigosti.com/</span>
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
                            <h6>Чекор 2</h6>
                            <section>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="card">
                                            <div id="female-upload">
                                                <div class="dz-message" data-dz-message><span>Изберете слика за невестата</span>
                                                </div>
                                                <div class="fallback">
                                                    <input name="file" type="file"/>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <input name="female_photo" id="female_photo" class="form-control" style="visibility: hidden;" type="text" value="" required/>
                                <br>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="card">
                                            <div id="male-upload">
                                                <div class="dz-message" data-dz-message><span>Изберете слика за младоженецот</span>
                                                </div>
                                                <div class="fallback">
                                                    <input name="file" type="file"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <input name="male_photo" class="form-control" style="visibility: hidden;" id="male_photo" type="text" value="" required/>
                                <br>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="card">
                                            <div id="group-upload">
                                                <div class="dz-message" data-dz-message>
                                                    <span>Изберете заедничка слика</span></div>
                                                <div class="fallback">
                                                    <input name="file" type="file" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <input name="group_photo" id="group_photo" class="form-control" style="visibility: hidden;" type="text" value="" required/>
                            </section>
                            <!-- Step 3 -->
                            <h6>Чекор 3</h6>
                            <section>
                                <div class="row">
                                    <div class="text-center">
                                        <h5>Продолжете кон уредување на вашата веб страна</h5>
                                        <br>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12 text-center mb-10">

                                                 <button class="btn btn-block button-large btn-primary" onclick="event.preventDefault();
                                              $('#check_form').append(`<input type='hidden' name='template' checked value='template_a' />`);
                                  document.getElementById('check_form').submit();"><span id="mainurl"></span></button>



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
    <script>
        Dropzone.autoDiscover = false;
        $('document').ready(function () {



            let mr = $("#mr").val();
            let mrs = $("#mrs").val();
            $("#mr").on("change paste keyup", function () {

                mr = $(this).val().toLowerCase();

                $("#basic_url").val(toLatin(mrs + "-" + mr));
                $("#mainurl").text("https://dragigosti.com/" + toLatin(mrs + "-" + mr));


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

            $("#mrs").on("change paste keyup", function () {
                mrs = $(this).val().toLowerCase();

                $("#basic_url").val(toLatin(mrs + "-" + mr));

                $("#mainurl").text("https://dragigosti.com/" + toLatin(mrs + "-" + mr));

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
                            $("#valid").css('display', 'block');
                            validInvalid(true);
                            $("#not-valid").css('display', 'none');
                        }
                        if (response.status === 'Choose another Url') {
                            validInvalid(false)
                            $("#valid").css('display', 'none');
                            $("#not-valid").css('display', 'block');
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

            function validInvalid(e)
            {
                jQuery.validator.addMethod("checkUrl", function() { return e });
            }


            $("a[href$='previous']").hide();
        });



        let myMaleDropzone = $("#male-upload").dropzone({
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
                $('#male_photo').attr('value', `${response.success}`);
            }
        });

        let myFemaleDropzone = $("#female-upload").dropzone({
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
                $('#female_photo').attr('value', `${response.success}`);
            }
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
@endsection
