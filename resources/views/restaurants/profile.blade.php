@extends('layouts.frontend')
@section('content')

    <div class="container-fluid">
        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">{{ $restaurant->name }}</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-muted"
                                                               href="{{ route('frontend.index') }}"><i
                                            class="ti ti-home-2 text-dark me-1 fs-5"></i></a></li>
                                <li class="breadcrumb-item"><a class="text-muted"
                                                               href="{{ route('frontend.restaurants') }}">Ресторани</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">{{ $restaurant->name }}</li>
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
                <img src="/images/cover_images/restaurants/originals/{{ $restaurant->coverImg }}" alt=""
                     class="img-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-4 order-lg-1 order-2">
                        <div class="d-flex align-items-center justify-content-around m-4">
                            <div class="text-center">
                                <i class="ti ti-phone-call fs-6 d-block mb-2"></i>
                                <h4 class="mb-0 fw-semibold lh-1">{{ $restaurant->phone }}</h4>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-n3 order-lg-2 order-1">
                        <div class="mt-n5">
                            <div class="d-flex align-items-center justify-content-center mb-2">
                                <div
                                    class="linear-gradient d-flex align-items-center justify-content-center rounded-circle"
                                    style="width: 110px; height: 110px; background-image: url('/images/logos/restaurants/thumbnails/{{ $restaurant->logo }}');">

                                </div>
                            </div>
                            <div class="text-center">
                                <h5 class="fs-5 mb-0 fw-semibold">{{ $restaurant->name }}</h5>
                                <p class="mb-0 fs-4">{{ $restaurant->subtitle }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 order-last">
                        <ul class="list-unstyled d-flex align-items-center justify-content-center justify-content-lg-center my-3 gap-3">
                            <li class="position-relative">
                                <a class="text-white d-flex align-items-center justify-content-center bg-primary p-2 fs-4 rounded-circle"
                                   href="{{ $restaurant->facebook }}" width="30" height="30" target="_blank">
                                    <i class="ti ti-brand-facebook"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-white bg-secondary d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle "
                                   href="{{ $restaurant->instagram }}" target="_blank">
                                    <i class="ti ti-brand-instagram"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-white bg-secondary d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle "
                                   href="{{ $restaurant->weblink }}" target="_blank">
                                    <i class="ti ti-brand"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-white bg-danger d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle "
                                   href="{{ $restaurant->youtube }}" target="_blank">
                                    <i class="ti ti-brand-youtube"></i>
                                </a>
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
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                            id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button"
                            role="tab" aria-controls="pills-contact" aria-selected="false" tabindex="-1">
                            <i class="ti ti-photo-plus me-2 fs-6"></i>
                            <span class="d-none d-md-block">Контакт</span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-profile" role="tabpanel"
                 aria-labelledby="pills-profile-tab" tabindex="0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body border-bottom">
                                <div class="col-12">
                                    {!! $restaurant->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <div id="map-canvas"></div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-gallery" role="tabpanel" aria-labelledby="pills-gallery-tab"
                 tabindex="0">
                <div class="d-sm-flex align-items-center justify-content-between mt-3 mb-4">
                    <h3 class="mb-3 mb-sm-0 fw-semibold d-flex align-items-center">Галерија <span
                            class="badge text-bg-secondary fs-2 rounded-4 py-1 px-2 ms-2">{{ count($albums) }}</span>
                    </h3>
                </div>
                <div class="row">
                    @foreach($albums as $album)
                        <div class="col-sm-6 col-xl-4">
                            <div class="card hover-img overflow-hidden rounded-2">
                                <div class="position-relative">
                                    <a href="{{ route('restaurants.album.view', $album->id) }}"><img src="/images/cover_images/restaurants/thumbnails/{{ $album->coverImg }}"
                                                                      class="card-img-top rounded-0" alt="..." style="max-height: 400px"></a>
                                    <a
                                       class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3"
                                       data-bs-toggle="tooltip" data-bs-placement="top"><i
                                            class="ti ti-eye fs-4"></i></a></div>
                                <div class="card-body pt-3 p-4">
                                    <h6 class="fw-semibold fs-4">{{ $album->name }}</h6>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                 aria-labelledby="pills-contact-tab" tabindex="0">
                <div class="row">
                    @foreach($contacts as $contact)
                        <div class="col-sm-6 col-xl-4">
                            <div class="card hover-img overflow-hidden rounded-2">
                                <div class="card-body pt-3 p-4 text-center">
                                    <h6 class="fw-semibold fs-4">{{ $contact->contactName }}</h6>
                                    <p class="fw-semibold fs-4">{{ $contact->contactPosition }}</p>
                                    <br>
                                    <p class="fw-semibold text-wrap fs-4 mb-0">{{ $contact->desc }}</p>
                                    <br>
                                    <p class="fw-semibold fs-4 mb-0">{{ $contact->contactEmail }} </p>
                                    <p class="fw-semibold fs-4 mb-0">{{ $contact->contactPhone }} </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="card w-100">
                    <div class="card-body">
                        <div class="button-group">
                            <div id="login-modal"
                                 class="modal fade"
                                 tabindex="-1"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="text-center mt-2 mb-4">
                                                <a href="" class="text-success"><span><img
                                                            src="/images/logos/restaurants/thumbnails/{{ $restaurant->logo }}"
                                                            class="me-3" width="80"
                                                            alt=""/></span></a>
                                            </div>
                                            <h5 class="mb-3 text-center">Пратете ни ја вашата порака!!!</h5>
                                            <form action="{{ route('messages.store', $restaurant->id) }}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="mb-3">
                                                            <label for="name">Име</label>
                                                            <input
                                                                type="text" required
                                                                class="form-control"
                                                                id="name" name="name"
                                                                placeholder="Вашето име"
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="mb-3">
                                                            <label for="email">Е-маил</label>
                                                            <input
                                                                type="email" required
                                                                class="form-control"
                                                                id="email" name="email"
                                                                placeholder="Вашиот е-маил"
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="mb-3">
                                                            <label for="phone">Телефон</label>
                                                            <input
                                                                type="text" required
                                                                class="form-control"
                                                                id="phone" name="phone"
                                                                placeholder="Вашиот телефон"
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="message">Вашата порака</label>
                                                            <textarea
                                                                type="text"
                                                                class="form-control quill-editor"
                                                                id="message" name="message" rows="6"
                                                            ></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="d-md-flex align-items-center mt-3">
                                                            <div class="ms-auto mt-3 mt-md-0">
                                                                <button
                                                                    type="submit"
                                                                    class="btn btn-info font-medium rounded-pill px-4">
                                                                    <div class="d-flex align-items-center">
                                                                        <i class="ti ti-send me-2 fs-4"></i>
                                                                        Испрати
                                                                    </div>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card w-100">
                    <div class="card-body">
                        <div class="text-center">
                            <h5 class="fs-5 mb-0 fw-semibold">Контактирајте не!!!</h5>
                            <br>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="text-center">
                                        <button
                                            type="button"
                                            class="btn btn-primary  btn-lg px-4 fs-4 font-medium"
                                            data-bs-toggle="modal"
                                            data-bs-target="#login-modal">
                                            <i class="ti ti-mail fs-5 text-center d-block"></i>
                                            Испрати порака
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-center">
                                        <button
                                            class="btn btn-primary  btn-lg px-4 fs-4 font-medium">
                                            <i class="ti ti-phone-call fs-5 text-center d-block"></i>
                                            {{ $restaurant->phone }}
                                        </button>
                                    </div>
                                </div>
                                <br>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <!-- Google Maps -->
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAS05zxYcZTGI-KfGAk8l0xNC2eCWfNsPw"></script>

    <script>

        $(document).ready(function () {
// Google Maps

            map = new google.maps.Map(document.getElementById('map-canvas'), {
                center: {lat: {{ $restaurant->lat }}, lng: {{ $restaurant->lng }}},
                zoom: 15
            });

            var marker = new google.maps.Marker({
                position: {lat: {{ $restaurant->lat }}, lng: {{ $restaurant->lng }}},
                map: map,
                draggable: false
            });

        });

    </script>
@endsection
