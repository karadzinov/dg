@extends('layouts.frontend')
@section('content')
    <div class="container-fluid">
        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">{{ $name }}</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-muted " href="./index.html">Ресторани</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">{{ $name }}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3">
                        <div class="text-center mb-n5">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card overflow-hidden">
            <div class="card-body p-0">
                <img src="/dist/images/ksantika.jpg" alt="" class="img-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-4 order-lg-1 order-2">
                        <div class="d-flex align-items-center justify-content-around m-4">
                            <div class="text-center">
                                <i class="ti ti-phone-call fs-6 d-block mb-2"></i>
                                <h4 class="mb-0 fw-semibold lh-1">+389 70 864 864</h4>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-n3 order-lg-2 order-1">
                        <div class="mt-n5">
                            <div class="d-flex align-items-center justify-content-center mb-2">
                                <div
                                    class="bg-white d-flex align-items-center justify-content-center rounded-circle"
                                    style="width: 110px; height: 110px;"
                                ">
                                <div
                                    class="border border-4 border-white d-flex align-items-center justify-content-center rounded-circle overflow-hidden"
                                    style="width: 100px; height: 100px;">
                                    <img src="/dist/images/ksantika-logo.png" alt="" class="w-100 h-100">
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h5 class="fs-5 mb-0 fw-semibold">Ksantika</h5>
                            <p class="mb-0 fs-4">Wedding & Event center</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 order-last">
                    <ul class="list-unstyled d-flex align-items-center justify-content-center justify-content-lg-start my-3 gap-3">
                        <li class="position-relative">
                            <a class="text-white d-flex align-items-center justify-content-center bg-primary p-2 fs-4 rounded-circle"
                               href="javascript:void(0)" width="30" height="30">
                                <i class="ti ti-brand-facebook"></i>
                            </a>
                        </li>
                        <li class="position-relative">
                            <a class="text-white bg-secondary d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle "
                               href="javascript:void(0)">
                                <i class="ti ti-brand-twitter"></i>
                            </a>
                        </li>
                        <li class="position-relative">
                            <a class="text-white bg-secondary d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle "
                               href="javascript:void(0)">
                                <i class="ti ti-brand-dribbble"></i>
                            </a>
                        </li>
                        <li class="position-relative">
                            <a class="text-white bg-danger d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle "
                               href="javascript:void(0)">
                                <i class="ti ti-brand-youtube"></i>
                            </a>
                        </li>
                        <li>
                            <button class="btn btn-primary">Закажи состанок</button>
                        </li>
                    </ul>
                </div>
            </div>
            <ul class="nav nav-pills user-profile-tab justify-content-end mt-2 bg-light-info rounded-2"
                id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button
                        class="nav-link position-relative rounded-0 active d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                        id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button"
                        role="tab" aria-controls="pills-profile" aria-selected="true">
                        <i class="ti ti-user-circle me-2 fs-6"></i>
                        <span class="d-none d-md-block">Профил</span>
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button
                        class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                        id="pills-calendar-tab" data-bs-toggle="pill" data-bs-target="#pills-calendar" type="button"
                        role="tab" aria-controls="pills-calendar" aria-selected="false">
                        <i class="ti ti-calendar me-2 fs-6"></i>
                        <span class="d-none d-md-block">Календар</span>
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button
                        class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                        id="pills-gallery-tab" data-bs-toggle="pill" data-bs-target="#pills-gallery" type="button"
                        role="tab" aria-controls="pills-gallery" aria-selected="false" tabindex="-1">
                        <i class="ti ti-photo-plus me-2 fs-6"></i>
                        <span class="d-none d-md-block">Галерија</span>
                    </button>
                </li>
            </ul>
        </div>
    </div>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-profile" role="tabpanel"
             aria-labelledby="pills-profile-tab" tabindex="0">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card shadow-none border">
                        <div class="card-body">
                            <h4 class="fw-semibold mb-3">Контакт</h4>
                            <p>Здраво Мартин јас сум Иже. Генерален менаџер во ресторанот Ксантика. Ви стојам
                                на располагање за било какви прашања.</p>
                            <ul class="list-unstyled mb-0">
                                <li class="d-flex align-items-center gap-3 mb-4">
                                    <i class="ti ti-briefcase text-dark fs-6"></i>
                                    <h6 class="fs-4 fw-semibold mb-0">Генерален менаџер</h6>
                                </li>
                                <li class="d-flex align-items-center gap-3 mb-4">
                                    <i class="ti ti-mail text-dark fs-6"></i>
                                    <h6 class="fs-4 fw-semibold mb-0">idze@ksantika.mk</h6>
                                </li>
                                <li class="d-flex align-items-center gap-3 mb-4">
                                    <i class="ti ti-device-desktop text-dark fs-6"></i>
                                    <h6 class="fs-4 fw-semibold mb-0">https://ksantika.mk</h6>
                                </li>
                                <li class="d-flex align-items-center gap-3 mb-2">
                                    <i class="ti ti-map-pin text-dark fs-6"></i>
                                    <h6 class="fs-4 fw-semibold mb-0">Скопје</h6>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="col-lg-8">


                    <div class="card">
                        <div class="card-body border-bottom">
                            <div class="col-12">
                                <p>
                                    <b>За ресторанот</b><br/>
                                </p>

                                <p>
                                    Ресторан Ксантика се простира на површина од 1100 м2 и се состои од две целини, сала
                                    за свечености специјално дизајнирана за летни и зимски свадби (површина од 500 м2 и
                                    капацитет од 350 гости) и летна бавча под отворено небо (1000 m2 и 500 гости).
                                </p>
                                <p>
                                    Ресторанот Ксантика е просторен и добро опремен објект кој нуди различни опции за
                                    свечености, родендени и прослави. Сала за свечености е специјално дизајнирана и може
                                    да се користи како за летни, така и за зимски свадби. Со површина од 500 м2 и
                                    капацитет од 350 гости, сала за свечености ви овозможува да организирате големи и
                                    прослави со многу гости.
                                </p>
                                <p>
                                    Летната бавча под отворено небо е уште еден дел од ресторанот Ксантика, каде што
                                    можете да уживате во отворен простор и природна атмосфера. Со површина од 1000 м2 и
                                    капацитет од 500 гости, летната бавча е одличен избор за прослави и настани на
                                    отворено.
                                </p>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="row">
                <div class="card">
                    <div class="card-body border-bottom">
                        <div class="col-12">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5930.80068115555!2d21.518187!3d41.991683!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x135415fb181fd219%3A0x268d005c8b92ecae!2zUmVzdGF1cmFudCDigJ5Lc2FudGlrYeKAnA!5e0!3m2!1sen!2smk!4v1692650414369!5m2!1sen!2smk"
                                width="100%" height="350px" frameborder="0" style="border:0"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="tab-pane fade" id="pills-gallery" role="tabpanel" aria-labelledby="pills-gallery-tab"
             tabindex="0">
            <div class="d-sm-flex align-items-center justify-content-between mt-3 mb-4">
                <h3 class="mb-3 mb-sm-0 fw-semibold d-flex align-items-center">Галерија <span
                        class="badge text-bg-secondary fs-2 rounded-4 py-1 px-2 ms-2">12</span></h3>
                <form class="position-relative">
                    <input type="text" class="form-control search-chat py-2 ps-5" id="text-srh"
                           placeholder="Search Friends">
                    <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y text-dark ms-3"></i>
                </form>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="card hover-img overflow-hidden rounded-2">
                        <div class="card-body p-0">
                            <img src="/dist/images/ksantika6.jpg" alt="" class="img-fluid w-100 object-fit-cover"
                                 style="height: 220px;">
                            <div class="p-4 d-flex align-items-center justify-content-between">
                                <div>

                                </div>
                                <div class="dropdown">
                                    <a class="text-muted fw-semibold d-flex align-items-center p-1"
                                       href="javascript:void(0)" role="button" data-bs-toggle="dropdown"
                                       aria-expanded="false">
                                        <i class="ti ti-dots-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu overflow-hidden">

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card hover-img overflow-hidden rounded-2">
                        <div class="card-body p-0">
                            <img src="/dist/images/ksantika5.jpg" alt=""
                                 class="img-fluid w-100 object-fit-cover" style="height: 220px;">
                            <div class="p-4 d-flex align-items-center justify-content-between">
                                <div>

                                </div>
                                <div class="dropdown">
                                    <a class="text-muted fw-semibold d-flex align-items-center p-1"
                                       href="javascript:void(0)" role="button" data-bs-toggle="dropdown"
                                       aria-expanded="false">
                                        <i class="ti ti-dots-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu overflow-hidden">

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card hover-img overflow-hidden rounded-2">
                        <div class="card-body p-0">
                            <img src="/dist/images/ksantika4.jpg" alt=""
                                 class="img-fluid w-100 object-fit-cover" style="height: 220px;">
                            <div class="p-4 d-flex align-items-center justify-content-between">
                                <div>

                                </div>
                                <div class="dropdown">
                                    <a class="text-muted fw-semibold d-flex align-items-center p-1"
                                       href="javascript:void(0)" role="button" data-bs-toggle="dropdown"
                                       aria-expanded="false">
                                        <i class="ti ti-dots-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu overflow-hidden">

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card hover-img overflow-hidden rounded-2">
                        <div class="card-body p-0">
                            <img src="/dist/images/ksantika3.jpg" alt=""
                                 class="img-fluid w-100 object-fit-cover" style="height: 220px;">
                            <div class="p-4 d-flex align-items-center justify-content-between">
                                <div>

                                </div>
                                <div class="dropdown">
                                    <a class="text-muted fw-semibold d-flex align-items-center p-1"
                                       href="javascript:void(0)" role="button" data-bs-toggle="dropdown"
                                       aria-expanded="false">
                                        <i class="ti ti-dots-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu overflow-hidden">

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card hover-img overflow-hidden rounded-2">
                        <div class="card-body p-0">
                            <img src="/dist/images/ksantika1.jpg" alt=""
                                 class="img-fluid w-100 object-fit-cover" style="height: 220px;">
                            <div class="p-4 d-flex align-items-center justify-content-between">
                                <div>

                                </div>
                                <div class="dropdown">
                                    <a class="text-muted fw-semibold d-flex align-items-center p-1"
                                       href="javascript:void(0)" role="button" data-bs-toggle="dropdown"
                                       aria-expanded="false">
                                        <i class="ti ti-dots-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu overflow-hidden">

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card hover-img overflow-hidden rounded-2">
                        <div class="card-body p-0">
                            <img src="/dist/images/ksantika2.jpg" alt=""
                                 class="img-fluid w-100 object-fit-cover" style="height: 220px;">
                            <div class="p-4 d-flex align-items-center justify-content-between">
                                <div>

                                </div>
                                <div class="dropdown">
                                    <a class="text-muted fw-semibold d-flex align-items-center p-1"
                                       href="javascript:void(0)" role="button" data-bs-toggle="dropdown"
                                       aria-expanded="false">
                                        <i class="ti ti-dots-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu overflow-hidden">

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="tab-pane fade" id="pills-calendar" role="tabpanel" aria-labelledby="pills-calendar-tab"
             tabindex="0">


            <div class="card">
                <div>
                    <div class="row gx-0">
                        <div class="col-lg-12">
                            <div class="p-4 calender-sidebar app-calendar">
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- BEGIN MODAL -->
            <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="eventModalLabel">
                                Add / Edit Event
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="">
                                        <label class="form-label">Event Title</label>
                                        <input id="event-title" type="text" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <div><label class="form-label">Event Color</label></div>
                                    <div class="d-flex">
                                        <div class="n-chk">
                                            <div class="form-check form-check-primary form-check-inline">
                                                <input class="form-check-input" type="radio" name="event-level"
                                                       value="Danger" id="modalDanger"/>
                                                <label class="form-check-label" for="modalDanger">Danger</label>
                                            </div>
                                        </div>
                                        <div class="n-chk">
                                            <div class="form-check form-check-warning form-check-inline">
                                                <input class="form-check-input" type="radio" name="event-level"
                                                       value="Success" id="modalSuccess"/>
                                                <label class="form-check-label" for="modalSuccess">Success</label>
                                            </div>
                                        </div>
                                        <div class="n-chk">
                                            <div class="form-check form-check-success form-check-inline">
                                                <input class="form-check-input" type="radio" name="event-level"
                                                       value="Primary" id="modalPrimary"/>
                                                <label class="form-check-label" for="modalPrimary">Primary</label>
                                            </div>
                                        </div>
                                        <div class="n-chk">
                                            <div class="form-check form-check-danger form-check-inline">
                                                <input class="form-check-input" type="radio" name="event-level"
                                                       value="Warning" id="modalWarning"/>
                                                <label class="form-check-label" for="modalWarning">Warning</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 d-none">
                                    <div class="">
                                        <label class="form-label">Enter Start Date</label>
                                        <input id="event-start-date" type="text" class="form-control"/>
                                    </div>
                                </div>

                                <div class="col-md-12 d-none">
                                    <div class="">
                                        <label class="form-label">Enter End Date</label>
                                        <input id="event-end-date" type="text" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="button" class="btn btn-success btn-update-event"
                                    data-fc-event-public-id="">
                                Update changes
                            </button>
                            <button type="button" class="btn btn-primary btn-add-event">
                                Add Event
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MODAL -->

        </div>

    </div>

    </div>

@endsection
