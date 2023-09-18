@extends('layouts.frontend')
@section('content')
    <div class="container-fluid">
        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h3 class="fw-semibold mb-8">Додади ресторан</h3>
                    </div>
                </div>
            </div>
        </div>


        <div class="card overflow-hidden">
            <div class="card-body p-0">
                <img src="/images/landing-page-banner.jpg" alt="" class="img-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-4 order-lg-1 order-2">
                        <div class="d-flex align-items-center justify-content-around m-4">
                            <div class="text-start">
                                <h5 class="fs-5 mb-0 pb-2 fw-semibold">Внесете телефон</h5>
                                <input type="text" class="form-control">

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-n3 order-lg-2 order-1">
                        <div class="mt-n5">
                            <div class="d-flex align-items-center justify-content-center mb-2">
                                <div
                                    class="linear-gradient d-flex align-items-center justify-content-center rounded-circle"
                                    style="width: 110px; height: 110px;">
                                    <div
                                        class="border border-4 border-white d-flex align-items-center justify-content-center rounded-circle overflow-hidden"
                                        style="width: 100px; height: 100px">
                                        <img src="/images/landing-page-banner.jpg" alt="" class="w-100 h-100">
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <h5 class="fs-5 mb-0 pb-2 fw-semibold">Избери лого</h5>
                                <input type="file" class="form-control ">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 order-last">
                        <div
                            class="form-control border-4 border-white d-flex align-items-center justify-content-center overflow-hidden" >
                            <input type="file" class="form-control">
                        </div>
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



        <!-- Create Form -->
        <!-- -------------------------------------------------------------- -->
        <div class="col-12">
            <div class="card">
                <div class="card-body wizard-content">
                    <h4 class="card-title">Ве молиме внесете ги следните информации</h4>
                    <form action="#" class="validation-wizard wizard-circle mt-5">
                        <!-- Step 1 -->
                        <h6>Основни информации</h6>
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name"> Име на ресторанот : <span class="danger">*</span>
                                        </label>
                                        <input type="text" class="form-control required" id="name" name="name" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="phone"> Телефон : <span class="danger">*</span>
                                        </label>
                                        <input type="text" class="form-control required" id="phone" name="phone" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="address"> Адреса : <span class="danger">*</span>
                                        </label>
                                        <input type="text" class="form-control required" id="address" name="address" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="city"> Град : <span class="danger">*</span>
                                        </label>
                                        <select class="form-select required" id="city" name="city">
                                            @foreach($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->admin_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Step 2 -->
                        <h6>Контакт информации</h6>
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="jobTitle2">Лице за контакт :</label>
                                        <input type="text" class="form-control required" id="jobTitle2" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="webUrl3">Позиција :</label>
                                        <input type="url" class="form-control required" id="webUrl3" name="webUrl3" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="jobTitle2">Е-маил :</label>
                                        <input type="text" class="form-control required" id="jobTitle2" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="webUrl3">Веб страна :</label>
                                        <input type="url" class="form-control required" id="webUrl3" name="webUrl3" />
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Step 3 -->
                        <h6>Изглед на профилот</h6>
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="wint1">Interview For :</label>
                                        <input type="text" class="form-control required" id="wint1" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="wintType1">Interview Type :</label>
                                        <select class="form-select required" id="wintType1" data-placeholder="Type to search cities" name="wintType1">
                                            <option value="Banquet">Normal</option>
                                            <option value="Fund Raiser">Difficult</option>
                                            <option value="Dinner Party">Hard</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="wLocation1">Location :</label>
                                        <select class="form-select required" id="wLocation1" name="wlocation">
                                            <option value="">Select City</option>
                                            <option value="India">India</option>
                                            <option value="USA">USA</option>
                                            <option value="Dubai">Dubai</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="wjobTitle2">Interview Date :</label>
                                        <input type="date" class="form-control required" id="wjobTitle2" />
                                    </div>
                                    <div class="mb-3">
                                        <label>Requirements :</label>
                                        <div class="c-inputs-stacked">
                                            <div class="form-check">
                                                <input type="radio" id="customRadio16" name="customRadio" class="form-check-input" />
                                                <label class="form-check-label" for="customRadio16">Employee</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" id="customRadio17" name="customRadio" class="form-check-input" />
                                                <label class="form-check-label" for="customRadio17">Contract</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Step 4 -->
                        <h6>Опис за ресторанот</h6>
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="behName1">Behaviour :</label>
                                        <input type="text" class="form-control required" id="behName1" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="participants1">Confidance</label>
                                        <input type="text" class="form-control required" id="participants1" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="participants1">Result</label>
                                        <select class="form-select required" id="participants1" name="location">
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
                                                <input type="radio" id="customRadio11" name="customRadio" class="form-check-input" />
                                                <label class="form-check-label" for="customRadio11">1 star</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" id="customRadio12" name="customRadio" class="form-check-input" />
                                                <label class="form-check-label" for="customRadio12">2 star</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" id="customRadio13" name="customRadio" class="form-check-input" />
                                                <label class="form-check-label" for="customRadio13">3 star</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" id="customRadio14" name="customRadio" class="form-check-input" />
                                                <label class="form-check-label" for="customRadio14">4 star</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" id="customRadio15" name="customRadio" class="form-check-input" />
                                                <label class="form-check-label" for="customRadio15">5 star</label>
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
                                                end Step wizard with validation
                                            ---------------- -->
        </div>
        <!-- -------------------------------------------------------------- -->
        <!-- Example -->
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-profile" role="tabpanel"
                 aria-labelledby="pills-profile-tab" tabindex="0">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card shadow-none border">
                            <div class="card-body">
                                <h4 class="fw-semibold mb-3">Контакт</h4>
                                <p>Здраво Мартин јас сум Демијен Дроца. Генерален менаџер во ресторанот Аликаст. Ви стојам на располагање за било какви прашања.</p>
                                <ul class="list-unstyled mb-0">
                                    <li class="d-flex align-items-center gap-3 mb-4">
                                        <i class="ti ti-briefcase text-dark fs-6"></i>
                                        <h6 class="fs-4 fw-semibold mb-0">Генерален менаџер</h6>
                                    </li>
                                    <li class="d-flex align-items-center gap-3 mb-4">
                                        <i class="ti ti-mail text-dark fs-6"></i>
                                        <h6 class="fs-4 fw-semibold mb-0">demijen@allikas.mk</h6>
                                    </li>
                                    <li class="d-flex align-items-center gap-3 mb-4">
                                        <i class="ti ti-device-desktop text-dark fs-6"></i>
                                        <h6 class="fs-4 fw-semibold mb-0">https://alikas.mk</h6>
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
                                        <b>ЗОШТО ALLIKAS?</b><br/>
                                        За да овозможиме вашата бајка да биде прераскажувана ја создадовме приказната
                                        која се вика Аllikas (извор). Затоа што од тука сѐ започнува, затоа што од тука
                                        извира вашата љубов, слога… вашата среќа. Затоа што овде го одигра првиот танц
                                        со својата сродна душа и зачекори по патеката која се вика брак. Затоа ние сме
                                        тука, твојот ден да го направиме бајка и со насмевка да те испратиме на твоето
                                        брачно патување…
                                    </p>
                                    <p><b>ЗА НАС</b><br/>
                                        Алликас е ресторан кој се наоѓа на 5 километри од центарот на градот во пријатна
                                        и тивка околина. Се протега на голема зелена површина, каде ресторанскиот дел
                                        изнесува 600 м2 и е со капацитет од 250 до 400 гости. На зеленилото е превидено
                                        да се прават свадби и прослави под отворено небо, а исто така е организирано
                                        одржување на матично на отворено. Ресторанот обезбедува паркинг-места за 100
                                        возила, кој ќе биде под постојан видео-надзор, како и игротека за најмалите
                                        гости. Салата за свечености е предвидена за летни и зимски свадби, што значи
                                        дека во лето се отвора од сите три страни и има подно ладење, а во зима се
                                        затвора од сите три страни со стаклена фасада и има подно греење.</p>
                                    <p><b>ТИМ</b><br/>
                                        Нашиот тим од професионалци воден од проф. Небојша Вуковиќ создаде менија коишто
                                        содржат уникатни јадења, создадени за потребите на нашиот ресторан, а кои ќе ви
                                        овозможат незаборавно гастрономско уживање.
                                        ДЕМИЈЕН ДРОЦА
                                        General manager
                                        АГРИФИНА ПЛУЖНИКОВА-ДРОЦА
                                        Food and baverage manager
                                        АНАСТАСИЈА ПЛУЖНИКОВА
                                        Sales and marketing manager</p>
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
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1010.5795608741408!2d21.405086081458712!3d42.03404815092993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1fb5002215f81f9b!2sAllikas!5e0!3m2!1sen!2s!4v1507806316557"
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
                                <img src="/dist/images/alikas.jpg" alt="" class="img-fluid w-100 object-fit-cover"
                                     style="height: 220px;">
                                <div class="p-4 d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="fw-semibold mb-0 fs-4">Isuava wakceajo fe.jpg</h6>
                                        <span class="text-dark fs-2">Wed, Dec 14, 2023</span>
                                    </div>
                                    <div class="dropdown">
                                        <a class="text-muted fw-semibold d-flex align-items-center p-1"
                                           href="javascript:void(0)" role="button" data-bs-toggle="dropdown"
                                           aria-expanded="false">
                                            <i class="ti ti-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu overflow-hidden">
                                            <li><a class="dropdown-item" href="javascript:void(0)">Isuava wakceajo
                                                    fe.jpg</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card hover-img overflow-hidden rounded-2">
                            <div class="card-body p-0">
                                <img src="/dist/images/gallery/gallery1.jpg" alt=""
                                     class="img-fluid w-100 object-fit-cover" style="height: 220px;">
                                <div class="p-4 d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="fw-semibold mb-0 fs-4">Ip docmowe vemremrif.jpg</h6>
                                        <span class="text-dark fs-2">Wed, Dec 14, 2023</span>
                                    </div>
                                    <div class="dropdown">
                                        <a class="text-muted fw-semibold d-flex align-items-center p-1"
                                           href="javascript:void(0)" role="button" data-bs-toggle="dropdown"
                                           aria-expanded="false">
                                            <i class="ti ti-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu overflow-hidden">
                                            <li><a class="dropdown-item" href="javascript:void(0)">Ip docmowe
                                                    vemremrif.jpg</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card hover-img overflow-hidden rounded-2">
                            <div class="card-body p-0">
                                <img src="/dist/images/gallery/gallery2.jpg" alt=""
                                     class="img-fluid w-100 object-fit-cover" style="height: 220px;">
                                <div class="p-4 d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="fw-semibold mb-0 fs-4">Duan cosudos utaku.jpg</h6>
                                        <span class="text-dark fs-2">Wed, Dec 14, 2023</span>
                                    </div>
                                    <div class="dropdown">
                                        <a class="text-muted fw-semibold d-flex align-items-center p-1"
                                           href="javascript:void(0)" role="button" data-bs-toggle="dropdown"
                                           aria-expanded="false">
                                            <i class="ti ti-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu overflow-hidden">
                                            <li><a class="dropdown-item" href="javascript:void(0)">Duan cosudos
                                                    utaku.jpg</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card hover-img overflow-hidden rounded-2">
                            <div class="card-body p-0">
                                <img src="/dist/images/gallery/gallery3.jpg" alt=""
                                     class="img-fluid w-100 object-fit-cover" style="height: 220px;">
                                <div class="p-4 d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="fw-semibold mb-0 fs-4">Fu netbuv oggu.jpg</h6>
                                        <span class="text-dark fs-2">Wed, Dec 14, 2023</span>
                                    </div>
                                    <div class="dropdown">
                                        <a class="text-muted fw-semibold d-flex align-items-center p-1"
                                           href="javascript:void(0)" role="button" data-bs-toggle="dropdown"
                                           aria-expanded="false">
                                            <i class="ti ti-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu overflow-hidden">
                                            <li><a class="dropdown-item" href="javascript:void(0)">Fu netbuv
                                                    oggu.jpg</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card hover-img overflow-hidden rounded-2">
                            <div class="card-body p-0">
                                <img src="/dist/images/gallery/gallery4.jpg" alt=""
                                     class="img-fluid w-100 object-fit-cover" style="height: 220px;">
                                <div class="p-4 d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="fw-semibold mb-0 fs-4">Di sekog do.jpg</h6>
                                        <span class="text-dark fs-2">Wed, Dec 14, 2023</span>
                                    </div>
                                    <div class="dropdown">
                                        <a class="text-muted fw-semibold d-flex align-items-center p-1"
                                           href="javascript:void(0)" role="button" data-bs-toggle="dropdown"
                                           aria-expanded="false">
                                            <i class="ti ti-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu overflow-hidden">
                                            <li><a class="dropdown-item" href="javascript:void(0)">Di sekog do.jpg</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card hover-img overflow-hidden rounded-2">
                            <div class="card-body p-0">
                                <img src="/dist/images/gallery/gallery5.jpg" alt=""
                                     class="img-fluid w-100 object-fit-cover" style="height: 220px;">
                                <div class="p-4 d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="fw-semibold mb-0 fs-4">Lo jogu camhiisi.jpg</h6>
                                        <span class="text-dark fs-2">Thu, Dec 15, 2023</span>
                                    </div>
                                    <div class="dropdown">
                                        <a class="text-muted fw-semibold d-flex align-items-center p-1"
                                           href="javascript:void(0)" role="button" data-bs-toggle="dropdown"
                                           aria-expanded="false">
                                            <i class="ti ti-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu overflow-hidden">
                                            <li><a class="dropdown-item" href="javascript:void(0)">Lo jogu
                                                    camhiisi.jpg</a></li>
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
