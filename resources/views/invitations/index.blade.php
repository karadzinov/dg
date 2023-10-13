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
                            <h4>Ресторани</h4>
                            <h5>пронајдете го ресторанот од соништата</h5>
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
            <div class="col-12">
                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <h3>Креирајте ја вашата покана...</h3>
                        <p>

                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <!-- ---------------------
                                                    start Custom Design Example
                                                ---------------- -->
                <div class="card">
                    <div class="card-body wizard-content">
                        <h4 class="card-title mb-0">Внесете ги следниве информации</h4>
                        <h6 class="card-subtitle mb-3"></h6>
                        <form action="#" class="tab-wizard dropzone wizard-circle">
                            <!-- Step 1 -->
                            <h6>Чекор 1</h6>
                            <section>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="mr">Името на младоженецот</label>
                                            <input type="text" class="form-control" required id="mr" name="mr" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="mrs">Името на невестата</label>
                                            <input type="text" class="form-control" required id="mrs" name="mrs"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="emailAddress1">Датум на свадбата</label>
                                            <input type="date" class="form-control" id="emailAddress1" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="fv-row mb-10">
                                        <!--begin::Label-->
                                        <label for="basic-url" class="form-label">Вашиот
                                            линк</label>
                                        <!--end::Label-->
                                        <div class="input-group mb-5">
                                            <span class="input-group-text" id="basic-addon3">https://dragigosti.com/</span>
                                            <input type="text" class="form-control " id="basic-url" name="basic_url"
                                                   aria-describedby="basic-addon3">
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- Step 2 -->
                            <h6>Чекор 2</h6>
                            <section>
                                <div class="row">
                                    <div class="col-12">
                                        <!--begin::Input group-->
                                        <div class="fv-row">
                                            <!--begin::Dropzone-->
                                            <div class="dropzone" id="kt_dropzonejs_example_1">
                                                <!--begin::Message-->
                                                <div class="dz-message needsclick">
                                                    <i class="ki-duotone ki-file-up fs-3x text-primary"><span class="path1"></span><span class="path2"></span></i>

                                                    <!--begin::Info-->
                                                    <div class="ms-4">
                                                        <h3 class="fs-5 fw-bold text-gray-900 mb-1">Drop files here or click to upload.</h3>
                                                        <span class="fs-7 fw-semibold text-gray-400">Upload up to 10 files</span>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                            </div>
                                            <!--end::Dropzone-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="jobTitle1">Job Title :</label>
                                            <input type="text" class="form-control" id="jobTitle1" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="videoUrl1">Company Name :</label>
                                            <input type="text" class="form-control" id="videoUrl1" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="shortDescription1">Job Description :</label>
                                            <textarea name="shortDescription" id="shortDescription1" rows="6" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- Step 3 -->
                            <h6>Чекор 3</h6>
                            <section>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="int1">Interview For :</label>
                                            <input type="text" class="form-control" id="int1" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="intType1">Interview Type :</label>
                                            <select class="form-select" id="intType1" data-placeholder="Type to search cities" name="intType1">
                                                <option value="Banquet">Normal</option>
                                                <option value="Fund Raiser">Difficult</option>
                                                <option value="Dinner Party">Hard</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="Location1">Location :</label>
                                            <select class="form-select" id="Location1" name="location">
                                                <option value="">Select City</option>
                                                <option value="India">India</option>
                                                <option value="USA">USA</option>
                                                <option value="Dubai">Dubai</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="jobTitle2">Interview Date :</label>
                                            <input type="date" class="form-control" id="jobTitle2" />
                                        </div>
                                        <div class="mb-3">
                                            <label>Requirements :</label>
                                            <div class="c-inputs-stacked">
                                                <div class="form-check">
                                                    <input type="radio" id="customRadio6" name="customRadio" class="form-check-input" />
                                                    <label class="form-check-label" for="customRadio6">Employee</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" id="customRadio7" name="customRadio" class="form-check-input" />
                                                    <label class="form-check-label" for="customRadio7">Contract</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- Step 4 -->
                            <h6>Чекор 4</h6>
                            <section>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="behName1">Behaviour :</label>
                                            <input type="text" class="form-control" id="behName1" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="participants1">Confidance</label>
                                            <input type="text" class="form-control" id="participants1" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="participants1">Result</label>
                                            <select class="form-select" id="participants1" name="location">
                                                <option value="">Select Result</option>
                                                <option value="Selected">Selected</option>
                                                <option value="Rejected">Rejected</option>
                                                <option value="Call Second-time"> Call Second-time </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="decisions1">Comments</label>
                                            <textarea name="decisions" id="decisions1" rows="4" class="form-control"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label>Rate Interviwer :</label>
                                            <div class="c-inputs-stacked">
                                                <div class="form-check">
                                                    <input type="radio" id="customRadio1" name="customRadio" class="form-check-input" />
                                                    <label class="form-check-label" for="customRadio1">1 star</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" id="customRadio2" name="customRadio" class="form-check-input" />
                                                    <label class="form-check-label" for="customRadio2">2 star</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" id="customRadio3" name="customRadio" class="form-check-input" />
                                                    <label class="form-check-label" for="customRadio3">3 star</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" id="customRadio4" name="customRadio" class="form-check-input" />
                                                    <label class="form-check-label" for="customRadio4">4 star</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" id="customRadio5" name="customRadio" class="form-check-input" />
                                                    <label class="form-check-label" for="customRadio5">5 star</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </form>
                    </div>
                </div>
                <!-- ---------------------
                                                    end Custom Design Example
                                                ---------------- -->
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

        let mr = '';
        let mrs = '';
        $("#mr").on('input',function(e){


            mr = $(this).val().toLowerCase();
        });


        $("#mrs").on('input',function(e){
            mrs = $(this).val().toLowerCase();

            $("#basic-url").val(mr + "-" + mrs);

            $("#basic-url").removeClass("is-invalid").addClass("is-valid");

        });


        $('#mrs').blur(function()          //whenever you click off an input element
        {
            if( !$(this).val() ) {                      //if it is blank.
                $("#basic-url").removeClass("is-valid").addClass("is-invalid");
                $("#basic-url").val("");
            }
        });

        $('#mr').blur(function()          //whenever you click off an input element
        {
            if( !$(this).val() ) {                      //if it is blank.
                $("#basic-url").removeClass("is-valid").addClass("is-invalid");
                $("#basic-url").val("");
            }
        });




    </script>

    <script>
        var myDropzone = new Dropzone("#kt_dropzonejs_example_1", {
            url: "https://keenthemes.com/scripts/void.php", // Set the url for your upload script location
            paramName: "file", // The name that will be used to transfer the file
            maxFiles: 10,
            maxFilesize: 10, // MB
            addRemoveLinks: true,
            accept: function(file, done) {
                if (file.name == "wow.jpg") {
                    done("Naha, you don't.");
                } else {
                    done();
                }
            }
        });
    </script>
@endsection
