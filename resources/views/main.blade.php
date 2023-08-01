@extends('layouts.frontend')
@section('content')
    <div class="container-fluid">




        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div id="myCarousel" class="carousel slide carousel-dark" data-bs-ride="carousel">
                            <ul class="carousel-indicators">
                                <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class=""></li>
                                <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" class="active" aria-current="true"></li>
                                <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" class=""></li>
                            </ul>
                            <div class="carousel-inner">
                                <div class="carousel-item"  style="background-image: url('/dist/images/alikas.jpg'), linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7));">

                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>First slide label</h5>
                                        <p>
                                            Nulla vitae elit libero, a pharetra augue mollis
                                            interdum.
                                        </p>
                                    </div>
                                </div>
                                <div class="carousel-item active" style="background-image: url('/dist/images/vezilka2.jpg'), linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7));">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Second slide label</h5>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing
                                            elit.
                                        </p>
                                    </div>
                                </div>
                                <div class="carousel-item"  style="background-image: url('/dist/images/latana.jpg'), linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7));">

                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Third slide label</h5>
                                        <p>
                                            Praesent commodo cursus magna, vel scelerisque
                                            nisl consectetur.
                                        </p>
                                    </div>
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
        </div>

        <div class="row">
            <div class="col-12">
                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <h3>Драги гости...</h3>
                        <p>
                            Секој пар има приказна и никоја не е иста. Електронските покани ќе Ви помогнат да ја пренесете без ограничувања преку кратко видео, слики, текст што ќе ја направи единствена исто како вашата приказна а ние ќе се погрижиме за тоа. Едноставно, гостите нема да сакаат да пропуштат да бидат дел од неа. Преку RSVP копчето во секој миг ќе знаете кој го потврдил нивното пристуство а кого би сакале да го потсетите. При самата потврда гостите ќе може да внесат информација што ќе ви олесни при организирањето.И тука не завршува Вашата електронската покана, на истиот линк Вашите гости ќе имаат пристап до сликите и видеата што Вие ќе ги одберете од Вашата свадба а преку кој ќе може да ја споделат радоста со најблиските. За крај, електронската порака не Ви заштедува само време и енергија туку исто така се грижи дека нема ниту едно дрво да биде исечено за неа. Едвај чекаме да ја слушнеме Вашата приказна
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="row">

                            <div class="example">
                                <h4 class="card-title mt-4">Изберете го вашиот датум</h4>

                                <div class="input-daterange input-group" id="date-range">
                                    <input type="text" class="form-control" name="start">

                                    <span class="input-group-text bg-info b-0 text-white">ДО</span>

                                    <input type="text" class="form-control" name="end">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-lg-8">
                <div class="card blog position-relative overflow-hidden hover-img" style="background-image: url(/dist/images/alikas.jpg);">
                    <div class="card-body position-relative">
                        <div class="d-flex flex-column justify-content-between h-100">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="position-relative" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Mollie Underwood">

                                </div>
                                <span class="badge text-bg-primary rounded-3 fs-2 fw-semibold">Топ понуда</span>
                            </div>
                            <div>
                                <a href="/profile/alikas" class="fs-7 my-4 fw-semibold text-white d-block lh-sm"><h1 class="text-white">25ти Август</h1> <p> Аликас</p></a>
                                <div class="d-flex align-items-center gap-4">
                                    <div class="d-flex align-items-center gap-2 text-white fs-3 fw-normal">
                                        <i class="ti ti-eye fs-5"></i>
                                        Капацитет 300 гости
                                    </div>
                                    <div class="d-flex align-items-center gap-2 text-white fs-3 fw-normal">

                                        32<i class="ti ti-currency-euro fs-5"></i> / порција

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
            <div class="col-md-6 col-lg-4">
                <div class="card blog position-relative overflow-hidden hover-img" style="background-image: url(/dist/images/ragusa.jpg);">
                    <div class="card-body position-relative">
                        <div class="d-flex flex-column justify-content-between h-100">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="position-relative" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Francisco Quinn">

                                </div>
                                <span class="badge text-bg-primary rounded-3 fs-2 fw-semibold">Топ понуда</span>
                            </div>
                            <div>
                                <a href="/profile/alikas" class="fs-7 my-4 fw-semibold text-white d-block lh-sm">5 Август - Рагуза</a>
                                <div class="d-flex align-items-center gap-4">
                                    <div class="d-flex align-items-center gap-2 text-white fs-3 fw-normal">
                                        <i class="ti ti-eye fs-5"></i>
                                        Капацитет 713
                                    </div>
                                    <div class="d-flex align-items-center gap-2 text-white fs-3 fw-normal">
                                        35 <i class="ti ti-currency-euro"></i>

                                    </div>
                                    <div class="d-flex align-items-center gap-1 text-white fw-normal ms-auto">
                                        <i class="ti ti-point"></i>
                                        <small>Петок, Авг 5</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card rounded-2 overflow-hidden hover-img">
                    <div class="position-relative">
                        <a href="javascript:void(0)"><img src="/dist/images/vezilka.jpg" class="card-img-top rounded-0" alt="..."></a>
                        <span class="badge bg-white text-dark fs-2 rounded-4 lh-sm mb-9 me-9 py-1 px-2 fw-semibold position-absolute bottom-0 end-0">20% намалување</span>

                    </div>
                    <div class="card-body p-4">
                        <span class="badge text-bg-light fs-2 rounded-4 py-1 px-2 lh-sm  mt-3">Топ понуа</span>
                        <a class="d-block my-4 fs-5 text-dark fw-semibold" href="">Везилка</a>
                        <div class="d-flex align-items-center gap-4">
                            <div class="d-flex align-items-center gap-2"><i class="ti ti-eye text-dark fs-5"></i>Капацитет 400</div>
                            <div class="d-flex align-items-center gap-2">35 <i class="ti ti-currency-euro text-dark fs-5"></i></div>
                            <div class="d-flex align-items-center fs-2 ms-auto"><i class="ti ti-point text-dark"></i>Сабота, Сеп 16</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card rounded-2 overflow-hidden hover-img">
                    <div class="position-relative">
                        <a href="javascript:void(0)"><img src="/dist/images/alikas2.jpg" class="card-img-top rounded-0" alt="..."></a>


                    </div>
                    <div class="card-body p-4">
                        <span class="badge text-bg-light fs-2 rounded-4 py-1 px-2 lh-sm  mt-3">Прослава</span>
                        <a class="d-block my-4 fs-5 text-dark fw-semibold" href="">Аликас</a>
                        <div class="d-flex align-items-center gap-4">
                            <div class="d-flex align-items-center gap-2"><i class="ti ti-eye text-dark fs-5"></i>Капацитет 100</div>
                            <div class="d-flex align-items-center gap-2">35 <i class="ti ti-currency-euro text-dark fs-5"></i></div>
                            <div class="d-flex align-items-center fs-2 ms-auto"><i class="ti ti-point text-dark"></i>Недела, Сеп 17</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card rounded-2 overflow-hidden hover-img">
                    <div class="position-relative">
                        <a href="javascript:void(0)"><img src="/dist/images/vezilka2.jpg" class="card-img-top rounded-0" alt="..."></a>

                        <img src="/dist/images/vezilka-logo.png" alt="" class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40" height="40" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Ресторант Везилка">
                    </div>
                    <div class="card-body p-4">
                        <span class="badge text-bg-light fs-2 rounded-4 py-1 px-2 lh-sm  mt-3">Свадба</span>
                        <a class="d-block my-4 fs-5 text-dark fw-semibold" href="">Везилка</a>
                        <div class="d-flex align-items-center gap-4">
                            <div class="d-flex align-items-center gap-2"><i class="ti ti-eye text-dark fs-5"></i>Капацитет 400</div>
                            <div class="d-flex align-items-center gap-2">35 <i class="ti ti-currency-euro text-dark fs-5"></i></div>
                            <div class="d-flex align-items-center fs-2 ms-auto"><i class="ti ti-point text-dark"></i>Недела, Сеп 17</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card rounded-2 overflow-hidden hover-img">
                    <div class="position-relative">
                        <a href="javascript:void(0)"><img src="/dist/images/latana.jpg" class="card-img-top rounded-0" alt="..."></a>
                        <span class="badge bg-white text-dark fs-2 rounded-4 lh-sm mb-9 me-9 py-1 px-2 fw-semibold position-absolute bottom-0 end-0">10% намалување</span>
                        <img src="/dist/images/latana-logo.jpg" alt="" class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40" height="40" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Walter Palmer">
                    </div>
                    <div class="card-body p-4">
                        <span class="badge text-bg-light fs-2 rounded-4 py-1 px-2 lh-sm  mt-3">Свадба</span>
                        <a class="d-block my-4 fs-5 text-dark fw-semibold" href="">Ла Тана</a>
                        <div class="d-flex align-items-center gap-4">
                            <div class="d-flex align-items-center gap-2"><i class="ti ti-eye text-dark fs-5"></i>Капацитет 200</div>
                            <div class="d-flex align-items-center gap-2">35 <i class="ti ti-currency-euro text-dark fs-5"></i></div>
                            <div class="d-flex align-items-center fs-2 ms-auto"><i class="ti ti-point text-dark"></i>Среда, Сеп 14</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card rounded-2 overflow-hidden hover-img">
                    <div class="position-relative">
                        <a href="javascript:void(0)"><img src="/dist/images/ragusa2.jpg" class="card-img-top rounded-0" alt="..."></a>
                        <span class="badge bg-white text-dark fs-2 rounded-4 lh-sm mb-9 me-9 py-1 px-2 fw-semibold position-absolute bottom-0 end-0">5% намалување</span>
                        <img src="/dist/images/ragusa-logo.png" alt="" class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40" height="40" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Walter Palmer">
                    </div>
                    <div class="card-body p-4">
                        <span class="badge text-bg-light fs-2 rounded-4 py-1 px-2 lh-sm  mt-3">Свадба</span>
                        <a class="d-block my-4 fs-5 text-dark fw-semibold" href="">Ragusа</a>
                        <div class="d-flex align-items-center gap-4">
                            <div class="d-flex align-items-center gap-2"><i class="ti ti-eye text-dark fs-5"></i>Капацитет 200</div>
                            <div class="d-flex align-items-center gap-2">35 <i class="ti ti-currency-euro text-dark fs-5"></i></div>
                            <div class="d-flex align-items-center fs-2 ms-auto"><i class="ti ti-point text-dark"></i>Среда, Сеп 14</div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-6 col-lg-4">
                <div class="card rounded-2 overflow-hidden hover-img">
                    <div class="position-relative">
                        <a href="javascript:void(0)"><img src="/dist/images/doubletree.jpg" class="card-img-top rounded-0" alt="..."></a>
                        <span class="badge bg-white text-dark fs-2 rounded-4 lh-sm mb-9 me-9 py-1 px-2 fw-semibold position-absolute bottom-0 end-0">5% намалување</span>
                        <img src="/dist/images/doubletree-logo.png" alt="" class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40" height="40" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Walter Palmer">
                    </div>
                    <div class="card-body p-4">
                        <span class="badge text-bg-light fs-2 rounded-4 py-1 px-2 lh-sm  mt-3">Свадба</span>
                        <a class="d-block my-4 fs-5 text-dark fw-semibold" href="">Doubletree by Hilton</a>
                        <div class="d-flex align-items-center gap-4">
                            <div class="d-flex align-items-center gap-2"><i class="ti ti-eye text-dark fs-5"></i>Капацитет 200</div>
                            <div class="d-flex align-items-center gap-2">35 <i class="ti ti-currency-euro text-dark fs-5"></i></div>
                            <div class="d-flex align-items-center fs-2 ms-auto"><i class="ti ti-point text-dark"></i>Среда, Сеп 14</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <nav aria-label="...">
            <ul class="pagination justify-content-center mb-0 mt-4">
                <li class="page-item">
                    <a class="page-link border-0 rounded-circle text-dark round-32 d-flex align-items-center justify-content-center" href="#"><i class="ti ti-chevron-left"></i></a>
                </li>
                <li class="page-item active" aria-current="page">
                    <a class="page-link border-0 rounded-circle round-32 mx-1 d-flex align-items-center justify-content-center" href="#">1</a>
                </li>
                <li class="page-item">
                    <a class="page-link border-0 rounded-circle text-dark round-32 mx-1 d-flex align-items-center justify-content-center" href="#">2</a>
                </li>
                <li class="page-item">
                    <a class="page-link border-0 rounded-circle text-dark round-32 mx-1 d-flex align-items-center justify-content-center" href="#">3</a>
                </li>
                <li class="page-item">
                    <a class="page-link border-0 rounded-circle text-dark round-32 mx-1 d-flex align-items-center justify-content-center" href="#">4</a>
                </li>
                <li class="page-item">
                    <a class="page-link border-0 rounded-circle text-dark round-32 mx-1 d-flex align-items-center justify-content-center" href="#">5</a>
                </li>
                <li class="page-item">
                    <a class="page-link border-0 rounded-circle text-dark round-32 mx-1 d-flex align-items-center justify-content-center" href="#">...</a>
                </li>
                <li class="page-item">
                    <a class="page-link border-0 rounded-circle text-dark round-32 mx-1 d-flex align-items-center justify-content-center" href="#">10</a>
                </li>
                <li class="page-item">
                    <a class="page-link border-0 rounded-circle text-dark round-32 d-flex align-items-center justify-content-center" href="#"><i class="ti ti-chevron-right"></i></a>
                </li>
            </ul>
        </nav>
    </div>
@endsection
