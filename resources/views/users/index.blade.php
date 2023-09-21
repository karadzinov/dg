@extends('layouts.frontend')
@section('content')
    <div class="container-fluid">
        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">{{ Auth::user()->name }}</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-muted" href="{{ route('frontend') }}"><i
                                            class="ti ti-home-2 text-danger me-1 fs-5"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Информации за профилот</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="widget-content searchable-container list">
            <!-- --------------------- start Contact ---------------- -->
            <div class="card card-body">
                <div class="row">
                    <div class="col-md-4 col-xl-3">
                    </div>
                    <div
                        class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                        <a href="{{ route('restaurants.create') }}" class="btn btn-info d-flex align-items-center">
                            <i class="ti ti-users text-white me-1 fs-5"></i> Додади ресторан
                        </a>
                    </div>
                </div>
            </div>
            <!-- ---------------------
                            end Contact
                        ---------------- -->
            <!-- Modal -->
            <div class="card card-body">
                <h4 class="card-title text-center">Ресторани</h4>
                <div class="table-responsive">
                    <table class="table search-table align-middle text-nowrap">
                        <thead class="header-item">
                        <th>Име</th>
                        <th class="text-center">Контакт</th>
                        <th class="text-center">Локација</th>
                        <th class="text-center">Телефон</th>
                        <th class="text-end">Акција</th>
                        </thead>
                        <tbody>
                        <!-- start row -->
                        @foreach($restaurants as $restaurant)
                        <tr class="search-items">
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="/images/logos/restaurants/thumbnails/{{ $restaurant->logo }}" alt="avatar" class="rounded-circle"
                                         width="35"/>
                                    <div class="ms-3">
                                        <div class="user-meta-info">
                                            <h6 class="user-name mb-0" data-name="Emma Adams">{{ $restaurant->name }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="text-center align-items-center">
                                    <div class="action-btn">
                                        <a href="javascript:void(0)" class="text-info edit">
                                            <i class="ti ti-user fs-5"></i>Види контакти
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <span class="usr-location" data-location="Boston, USA">{{ $restaurant->address }}, {{ $restaurant->city_id }}</span>
                            </td>
                            <td class="text-center">
                                <span class="usr-ph-no" data-phone="+1 (070) 123-4567">{{ $restaurant->phone }}</span>
                            </td>
                            <td class="text-end">
                                <div class="action-btn">
                                    <a href="javascript:void(0)" class="text-info edit">
                                        <i class="ti ti-eye fs-5"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="text-dark delete ms-2">
                                        <i class="ti ti-trash fs-5"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        <!-- end row -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
