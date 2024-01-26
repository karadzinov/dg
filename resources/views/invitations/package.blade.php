@extends('layouts.frontend')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <span class="fw-bolder text-uppercase fs-2 d-block mb-7">Bronze</span>
                        <div class="my-4">
                            <img src="/dist/images/backgrounds/bronze.png" alt="" class="img-fluid" width="80" height="80">
                        </div>
                        <h2 class="fw-bolder fs-12 mb-3">Бесплатен</h2>
                        <ul class="list-unstyled mb-7">
                            <li class="d-flex align-items-center gap-2 py-2">
                                <i class="ti ti-check text-primary fs-4"></i>
                                <span class="text-dark">300 покани кон гости</span>
                            </li>
                            <li class="d-flex align-items-center gap-2 py-2">
                                <i class="ti ti-check text-primary fs-4"></i>
                                <span class="text-dark">10 креирани покани</span>
                            </li>
                            <li class="d-flex align-items-center gap-2 py-2">
                                <i class="ti ti-check text-primary fs-4"></i>
                                <span class="text-dark">5GB простор за прикачување слики/видеа</span>
                            </li>
                            <li class="d-flex align-items-center gap-2 py-2">
                                <i class="ti ti-x text-muted fs-4"></i>
                                <span class="text-muted">Уникатен темплејт</span>
                            </li>
                            <li class="d-flex align-items-center gap-2 py-2">
                                <i class="ti ti-x text-muted fs-4"></i>
                                <span class="text-muted">Уникатен домеин</span>
                            </li>
                        </ul>
                        <button class="btn btn-primary fw-bolder py-6 w-100 text-capitalize">Избери</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="card">
                    <div class="card-body pt-6">
                        <div class="text-end">
                            <span class="badge fw-bolder py-1 bg-warning-subtle text-warning text-uppercase fs-2 rounded-3">POPULAR</span>
                        </div>
                        <span class="fw-bolder text-uppercase fs-2 d-block mb-7">Silver</span>
                        <div class="my-4">
                            <img src="/dist/images/backgrounds/silver.png" alt="" class="img-fluid" width="80" height="80">
                        </div>
                        <div class="d-flex mb-3">

                            <h2 class="fw-bolder fs-12 ms-2 mb-0">2500</h2>
                            <h5 class="fw-bolder fs-6 mb-0">ден</h5>
                        </div>
                        <ul class="list-unstyled mb-7">
                            <li class="d-flex align-items-center gap-2 py-2">
                                <i class="ti ti-check text-primary fs-4"></i>
                                <span class="text-dark">1200 покани кон гости</span>
                            </li>
                            <li class="d-flex align-items-center gap-2 py-2">
                                <i class="ti ti-check text-primary fs-4"></i>
                                <span class="text-dark">20 креирани покани</span>
                            </li>
                            <li class="d-flex align-items-center gap-2 py-2">
                                <i class="ti ti-check text-primary fs-4"></i>
                                <span class="text-dark">15GB простор за прикачување слики/видеа</span>
                            </li>
                            <li class="d-flex align-items-center gap-2 py-2">
                                <i class="ti ti-x text-muted fs-4"></i>
                                <span class="text-muted">Уникатен темплејт</span>
                            </li>
                            <li class="d-flex align-items-center gap-2 py-2">
                                <i class="ti ti-x text-muted fs-4"></i>
                                <span class="text-muted">Уникатен домеин</span>
                            </li>
                        </ul>
                        <button class="btn btn-primary fw-bolder py-6 w-100 text-capitalize">Избери</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <span class="fw-bolder text-uppercase fs-2 d-block mb-7">gold</span>
                        <div class="my-4">
                            <img src="/dist/images/backgrounds/gold.png" alt="" class="img-fluid" width="80" height="80">
                        </div>
                        <div class="d-flex mb-3">

                            <h2 class="fw-bolder fs-12 ms-2 mb-0">6000</h2>
                            <h5 class="fw-bolder fs-6 mb-0">ден</h5>
                        </div>
                        <ul class="list-unstyled mb-7">
                            <li class="d-flex align-items-center gap-2 py-2">
                                <i class="ti ti-check text-primary fs-4"></i>
                                <span class="text-dark">Неограничено покани кон гости</span>
                            </li>
                            <li class="d-flex align-items-center gap-2 py-2">
                                <i class="ti ti-check text-primary fs-4"></i>
                                <span class="text-dark">Неограничено креирање покани</span>
                            </li>
                            <li class="d-flex align-items-center gap-2 py-2">
                                <i class="ti ti-check text-primary fs-4"></i>
                                <span class="text-dark">30GB простор за прикачување слики/видеа</span>
                            </li>
                            <li class="d-flex align-items-center gap-2 py-2">
                                <i class="ti ti-check text-primary fs-4"></i>
                                <span class="text-dark">Уникатен темплејт</span>
                            </li>
                            <li class="d-flex align-items-center gap-2 py-2">
                                <i class="ti ti-check text-primary fs-4"></i>
                                <span class="text-dark">Уникатен домеин</span>
                            </li>
                        </ul>
                        <button class="btn btn-primary fw-bolder py-6 w-100 text-capitalize">Избери</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
@section('scripts')

@endsection



