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
                              class="tab-wizard wizard-circle"
                              enctype="multipart/form-data">
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
                                                   name="mrs" id="mrs" placeholder=""  value=""/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="mr" class="form-label">Име на младоженец</label>
                                            <input type="text"
                                                   class="form-control"
                                                   name="mr" id="mr" placeholder=""  value=""/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="date" class="form-label">Изберете датум</label>
                                            <input type="date"
                                                   class="form-control"
                                                   name="date" id="date" placeholder=""  value=""/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Внесете го вашиот е-маил</label>
                                            <input type="email"
                                                   class="form-control"
                                                   name="email" id="email" placeholder=""  value=""/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="fv-row mb-10">
                                        <!--begin::Label-->
                                        <label for="basic-url" class="form-label">Вашиот линк до поканата</label>
                                        <!--end::Label-->
                                        <div class="input-group mb-5">
                                            <span class="input-group-text"
                                                  id="basic-addon3">https://dragigosti.com/</span>
                                            <input type="text" class="form-control" id="basic-url"
                                                   aria-describedby="basic-addon3" name="basic-url">
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
                                            <div id="male-upload">
                                                <div class="dz-message" data-dz-message><span>Изберете слика за младоженецот</span>
                                                </div>
                                                <div class="fallback">
                                                    <input name="file"  type="file"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <input name="male_photo" id="male_photo" hidden type="text" value=""/>
                                <br>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="card">
                                            <div id="female-upload">
                                                <div class="dz-message" data-dz-message><span>Изберете слика за невестата</span>
                                                </div>
                                                <div class="fallback">
                                                    <input name="file"  type="file"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <input name="female_photo" id="female_photo" hidden type="text" value=""/>
                                <br>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="card">
                                            <div id="group-upload">
                                                <div class="dz-message" data-dz-message>
                                                    <span>Изберете заедничка слика</span></div>
                                                <div class="fallback">
                                                    <input name="file"  type="file"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <input name="group_photo" id="group_photo" hidden type="text" value=""/>
                            </section>
                            <!-- Step 3 -->
                            <h6>Чекор 3</h6>
                            <section>
                                <div class="row">
                                    <div class="text-center">
                                        <h5>Изберете темплејт</h5>
                                        <br>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6">
                                            <div class="card blog position-relative overflow-hidden hover-img"
                                                 style="background-image: url(/images/templates/template-a.png); background-size: cover"
                                                 onclick="event.preventDefault();
                                              $('#check_form').append(`<input type='hidden' name='template' checked value='template_a' />`);
                                  document.getElementById('check_form').submit();">
                                                <div class="card-body position-relative">
                                                    <div class="d-flex flex-column justify-content-between h-100">
                                                        <div>
                                                            <a href="{{ route('invitations.template_a') }}"
                                                               class="fs-7 my-4 fw-semibold text-white d-block lh-sm">Темплејт
                                                                А</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-6">
                                            <div class="card blog position-relative overflow-hidden hover-img"
                                                 style="background-image: url(/images/maticno.png); background-size: cover"
                                                 onclick="event.preventDefault();
                                             $('#check_form').append(`<input type='hidden' name='template' checked value='template_b' />`);
                                  document.getElementById('check_form').submit();">
                                                <div class="card-body position-relative">
                                                    <div class="d-flex flex-column justify-content-between h-100">
                                                        <div>
                                                            <a href="{{ route('invitations.template_a') }}"
                                                               class="fs-7 my-4 fw-semibold text-white d-block lh-sm">Темплејт
                                                                B</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                            </section>
                        </form>
                    </div>
                </div>
            </div>
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
@section('scripts')
    <script>
        $('document').ready(function () {
            let mr = '';
            let mrs = '';
            $("#mr").on("change paste keyup", function () {
                mr = $(this).val().toLowerCase();

                $("#basic-url").val(mrs + "-" + mr);

                var data = $("#basic-url").val();

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
                            $("#not-valid").css('display', 'none');
                        }
                        if (response.status === 'Choose another Url') {
                            $("#valid").css('display', 'none');
                            $("#not-valid").css('display', 'block');
                        }

                    }
                });
            });

            $("#mrs").on("change paste keyup", function () {
                mrs = $(this).val().toLowerCase();

                $("#basic-url").val(mrs + "-" + mr);

                var data = $("#basic-url").val();

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
                            $("#not-valid").css('display', 'none');
                        }
                        if (response.status === 'Choose another Url') {
                            $("#valid").css('display', 'none');
                            $("#not-valid").css('display', 'block');
                        }

                    }
                });
            });

        });

    </script>

    <script src="/dist/libs/ckeditor/ckeditor.js"></script>
    <script src="/dist/libs/ckeditor/samples/js/sample.js"></script>
    <script>
        //default
        initSample();

        //inline editor
        // We need to turn off the automatic editor creation first.
        CKEDITOR.disableAutoInline = true;

        CKEDITOR.inline("editor2", {
            extraPlugins: "sourcedialog",
            removePlugins: "sourcearea",
        });

        var editor1 = CKEDITOR.replace("editor1", {
            extraAllowedContent: "div",
            height: 460,
        });
        editor1.on("instanceReady", function () {
            // Output self-closing tags the HTML4 way, like <br>.
            this.dataProcessor.writer.selfClosingEnd = ">";

            // Use line breaks for block elements, tables, and lists.
            var dtd = CKEDITOR.dtd;
            for (var e in CKEDITOR.tools.extend(
                {},
                dtd.$nonBodyContent,
                dtd.$block,
                dtd.$listItem,
                dtd.$tableContent
            )) {
                this.dataProcessor.writer.setRules(e, {
                    indent: true,
                    breakBeforeOpen: true,
                    breakAfterOpen: true,
                    breakBeforeClose: true,
                    breakAfterClose: true,
                });
            }
            // Start in source mode.
            this.setMode("source");
        });
    </script>
    <script data-sample="1">
        CKEDITOR.replace("male_text", {
            height: 150,
        });
    </script>
    <script data-sample="2">
        CKEDITOR.replace("female_text", {
            height: 150,
        });
    </script>
    <script data-sample="3">
        CKEDITOR.replace("main_text", {
            height: 150,
        });
    </script>
    <script type="text/javascript">

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

    <script>

        $('document').ready(function () {
            $("#basic-url").on("change paste keyup", function () {
                var data = $(this).val();

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
                            $("#not-valid").css('display', 'none');
                        }
                        if (response.status === 'Choose another Url') {
                            $("#valid").css('display', 'none');
                            $("#not-valid").css('display', 'block');
                        }
                    }
                });
            });
        });

    </script>
    <script>
        $('document').ready(function () {
            let element = $('a[href="#finish"]').val();
            console.log(element);
        });

    </script>
@endsection