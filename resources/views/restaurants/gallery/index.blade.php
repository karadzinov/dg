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
                                            class="ti ti-home-2 text-danger me-1 fs-5"></i></a></li>
                                <li class="breadcrumb-item"><a class="text-muted"
                                                               href="{{ route('restaurants.profile', $restaurant->slug) }}">
                                        {{ $restaurant->name }}</a></li>
                                <li class="breadcrumb-item" aria-current="page">Албуми</li>
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
                    <div class="col-md-6 col-xl-6">
                    </div>
                    <div
                        class="col-md-3 col-xl-3 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                        <a href="{{ route('restaurants.gallery.create', $restaurant->id) }}"
                           class="btn btn-info d-flex align-items-center">
                            <i class="ti ti-photo-plus text-white me-1 fs-5"></i> Додади албум
                        </a>
                    </div>
                    <div
                        class="col-md-3 col-xl-3 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                        <a href="{{ route('restaurants.gallery.video.create', $restaurant->id) }}"
                           class="btn btn-info d-flex align-items-center">
                            <i class="ti ti-photo-plus text-white me-1 fs-5"></i> Додади Youtube видео
                        </a>
                    </div>
                </div>
            </div>
            <!-- ---------------------
                            end Contact
                        ---------------- -->
            <!-- Modal -->
            <div class="card card-body">
                <h4 class="card-title text-center">Албуми TEST</h4>
                <div class="table-responsive">
                    <table class="table search-table align-middle text-nowrap">
                        <thead class="header-item">
                        <th>Име на албумот</th>
                        <th class="text-center">Ресторан</th>
                        <th class="text-center">Креиран</th>
                        <th class="text-end">Акција</th>
                        </thead>
                        <tbody>
                        <!-- start row -->
                        @foreach($albums as $album)
                            <tr class="search-items">
                                <td class="text-start">
                                    <div class="d-flex align-items-center">
                                        <img
                                            src="/images/cover_images/restaurants/thumbnails/{{ $album->coverImg }}"
                                            alt="avatar" class="rounded-circle"
                                            width="40"/>
                                        <div class="ms-3 align-items-center">
                                            <div class="user-meta">
                                                <p class="fw-normal">{{ $album->name }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <span class="usr-location"
                                          data-location="Boston, USA">{{ $album->restaurant->name }}</span>
                                </td>
                                <td class="text-center">
                                    <span class="usr-ph-no"
                                          data-phone="+1 (070) 123-4567">{{ $album->created_at->diffForHumans() }}</span>
                                </td>
                                <td class="text-end">
                                    <div class="action-btn">
                                        <a href="{{ route('restaurants.gallery.destroy', $album->id) }}"
                                           class="text-dark delete ms-2"
                                           onclick="event.preventDefault();
                                  document.getElementById('delete-form').submit();">
                                            <i class="ti ti-trash fs-5"></i>
                                        </a>
                                        <form id="delete-form" method="post"
                                              action="{{ route('restaurants.gallery.destroy', $album->id) }}">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        <!-- end row -->
                        </tbody>
                    </table>
                </div>
                <div class="text-end">
                    <a href="{{ route('users.index') }}" class="btn btn-info">
                        <i class="ti ti-arrow-left text-white me-1 fs-5"></i> Назад
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
