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
                                <li class="breadcrumb-item"><a class="text-muted"
                                                               href="{{ route('frontend.index') }}"><i
                                            class="ti ti-home-2 text-danger me-1 fs-5"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page"><a href="{{ route('users.index') }}">Информации за профилот</a></li>
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
                    @if(Auth::user()->category === 'restaurant')
                        <div
                            class="col-md-4 col-xl-3 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                            <a href="{{ route('restaurants.create') }}" class="btn btn-info d-flex align-items-center">
                                <i class="ti ti-home text-white me-1 fs-5"></i> Додади ресторан
                            </a>
                        </div>
                    @endif
                    @if(Auth::user()->category === 'music')
                        <div
                            class="col-md-4 col-xl-3 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                            <a href="{{ route('musicians.create') }}" class="btn btn-info d-flex align-items-center">
                                <i class="ti ti-music text-white me-1 fs-5"></i> Додади музичари
                            </a>
                        </div>
                    @endif
                    @if(Auth::user()->category === 'photo')
                        <div
                            class="col-md-4 col-xl-3 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                            <a href="{{ route('photographers.create') }}"
                               class="btn btn-info d-flex align-items-center">
                                <i class="ti ti-camera text-white me-1 fs-5"></i> Додади фотографи
                            </a>
                        </div>
                    @endif

                        @if(Auth::user()->category === 'profile')
                            <div
                                class="col-md-4 col-xl-3 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                                <a href="{{ route('profile.create') }}"
                                   class="btn btn-info d-flex align-items-center">
                                    <i class="ti ti-camera text-white me-1 fs-5"></i> Креирај профил
                                </a>
                            </div>
                        @endif

                </div>
            </div>
            <!-- --------------------- -->
            @if(Auth::user()->category === 'restaurant')
                <!-- Modal -->
                <div class="card card-body">
                    <h4 class="card-title text-center">Ресторани</h4>
                    @if(count($restaurants)=== 0)
                        <br>
                        <h6 class="card-title text-center">Немате внесено ниту еден ресторан</h6>
                    @else
                        <div class="table-responsive">
                            <table class="table search-table align-middle text-nowrap">
                                <thead class="header-item">
                                <th>Име</th>
                                <th class="text-center">Контакт</th>
                                <th class="text-center">Галерија</th>
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
                                                <img src="/images/logos/restaurants/thumbnails/{{ $restaurant->logo }}"
                                                     alt="avatar" class="rounded-circle"
                                                     width="40"/>
                                                <div class="ms-3 align-items-middle">
                                                    <div class="user-meta">
                                                        <a href="{{ route('restaurants.profile', $restaurant->slug) }}"
                                                           class="title mb-0">{{ $restaurant->name }}</a>
                                                        <p class="fw-normal">{{ $restaurant->subtitle }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-center align-items-center">
                                                <div class="action-btn">
                                                    <a href="{{ route('contacts.index', $restaurant->slug) }}"
                                                       class="text-info edit">
                                                        <i class="ti ti-user fs-5"></i>Види контакти
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-center align-items-center">
                                                <div class="action-btn ">
                                                    <a href="{{ route('restaurants.gallery', $restaurant->id) }}"
                                                       class="text-info edit">
                                                        <i class="ti ti-photo-plus fs-5"></i> Види галерија
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                    <span class="usr-location"
                                          data-location="Boston, USA">{{ $restaurant->address }}, {{ $restaurant->city->admin_name }}</span>
                                        </td>
                                        <td class="text-center">
                                    <span class="usr-ph-no"
                                          data-phone="+1 (070) 123-4567">{{ $restaurant->phone }}</span>
                                        </td>
                                        <td class="text-end">
                                            <div class="action-btn">
                                                <a href="{{ route('restaurants.edit', $restaurant->id) }}"
                                                   class="text-info edit">
                                                    <i class="ti ti-eye fs-5"></i>
                                                </a>
                                                <a href="javascript:void(0)">

                                                </a>

                                                <a href=""
                                                   class="text-dark delete ms-2"
                                                   onclick="event.preventDefault();
                                  document.getElementById('delete-form-{{  $restaurant->id }}').submit();">
                                                    <i class="ti ti-trash fs-5"></i>
                                                </a>
                                                <form id="delete-form-{{ $restaurant->id }}" method="post" action="{{ route('restaurants.destroy', $restaurant->id) }}">
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
                    @endif
                </div>
            @endif
            @if(Auth::user()->category === 'music')
                <div class="card card-body">
                    <h4 class="card-title text-center">Музичари</h4>
                    @if(count($musicians) === 0)
                        <br>
                        <h6 class="card-title text-center">Немате внесено ниту еден бенд/музичар</h6>
                    @else
                        <div class="table-responsive">
                            <table class="table search-table align-middle text-nowrap">
                                <thead class="header-item">
                                <th>Име</th>
                                <th class="text-center">Контакт</th>
                                <th class="text-center">Галерија</th>
                                <th class="text-center">Телефон</th>
                                <th class="text-end">Акција</th>
                                </thead>
                                <tbody>
                                <!-- start row -->
                                @foreach($musicians as $musician)
                                    <tr class="search-items">
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="/images/logos/musicians/thumbnails/{{ $musician->logo }}"
                                                     alt="avatar" class="rounded-circle"
                                                     width="40"/>
                                                <div class="ms-3 align-items-middle">
                                                    <div class="user-meta">
                                                        <a href="{{ route('musicians.profile', $musician->slug) }}"
                                                           class="title mb-0">{{ $musician->name }}</a>
                                                        <p class="fw-normal">{{ $musician->subtitle }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-center align-items-center">
                                                <div class="action-btn">
                                                    <a href="{{ route('contacts.index', $musician->slug) }}"
                                                       class="text-info edit">
                                                        <i class="ti ti-user fs-5"></i>Види контакти
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-center align-items-center">
                                                <div class="action-btn ">
                                                    <a href="{{ route('musicians.gallery', $musician->id) }}"
                                                       class="text-info edit">
                                                        <i class="ti ti-photo-plus fs-5"></i> Види галерија
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                    <span class="usr-ph-no"
                                          data-phone="+1 (070) 123-4567">{{ $musician->phone }}</span>
                                        </td>
                                        <td class="text-end">
                                            <div class="action-btn">
                                                <a href="{{ route('musicians.edit', $musician->id) }}"
                                                   class="text-info edit">
                                                    <i class="ti ti-eye fs-5"></i>
                                                </a>
                                                <a href="javascript:void(0)">

                                                </a>
                                                <a href="{{ route('musicians.destroy', $musician->id) }}"
                                                   class="text-dark delete ms-2"
                                                   onclick="event.preventDefault();
                                  document.getElementById('delete-form').submit();">
                                                    <i class="ti ti-trash fs-5"></i>
                                                </a>
                                                <form id="delete-form" method="post"
                                                      action="{{ route('musicians.destroy', $musician->id) }}">
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
                    @endif
                </div>
            @endif
            @if(Auth::user()->category === 'photo')
                <div class="card card-body">
                    <h4 class="card-title text-center">Фотографи</h4>
                    @if(count($photographers)=== 0)
                        <br>
                        <h6 class="card-title text-center">Немате внесено ниту еден фотограф</h6>
                    @else
                        <div class="table-responsive">
                            <table class="table search-table align-middle text-nowrap">
                                <thead class="header-item">
                                <th>Име</th>
                                <th class="text-center">Контакт</th>
                                <th class="text-center">Галерија</th>
                                <th class="text-center">Телефон</th>
                                <th class="text-end">Акција</th>
                                </thead>
                                <tbody>
                                <!-- start row -->
                                @foreach($photographers as $photographer)
                                    <tr class="search-items">
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img
                                                    src="/images/logos/photographers/thumbnails/{{ $photographer->logo }}"
                                                    alt="avatar" class="rounded-circle"
                                                    width="40"/>
                                                <div class="ms-3 align-items-middle">
                                                    <div class="user-meta">
                                                        <a href="{{ route('photographers.profile', $photographer->slug) }}"
                                                           class="title mb-0">{{ $photographer->name }}</a>
                                                        <p class="fw-normal">{{ $photographer->subtitle }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-center align-items-center">
                                                <div class="action-btn">
                                                    <a href="{{ route('contacts.index', $photographer->slug) }}"
                                                       class="text-info edit">
                                                        <i class="ti ti-user fs-5"></i>Види контакти
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-center align-items-center">
                                                <div class="action-btn ">
                                                    <a href="{{ route('photographers.gallery', $photographer->id) }}"
                                                       class="text-info edit">
                                                        <i class="ti ti-photo-plus fs-5"></i> Види галерија
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                    <span class="usr-ph-no"
                                          data-phone="+1 (070) 123-4567">{{ $photographer->phone }}</span>
                                        </td>
                                        <td class="text-end">
                                            <div class="action-btn">
                                                <a href="{{ route('photographers.edit', $photographer->id) }}"
                                                   class="text-info edit">
                                                    <i class="ti ti-eye fs-5"></i>
                                                </a>
                                                <a href="javascript:void(0)">
                                                </a>
                                                <a href="{{ route('photographers.destroy', $photographer->id) }}"
                                                   class="text-dark delete ms-2"
                                                   onclick="event.preventDefault();
                                  document.getElementById('delete-form').submit();">
                                                    <i class="ti ti-trash fs-5"></i>
                                                </a>
                                                <form id="delete-form" method="post"
                                                      action="{{ route('photographers.destroy', $photographer->id) }}">
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
                    @endif
                </div>
            @endif

            @if(Auth::user()->category === 'profile')
                <div class="card card-body">
                    <h4 class="card-title text-center">Профили</h4>
                    @if(count($profiles)=== 0)
                        <br>
                        <h6 class="card-title text-center">Немате внесено ниту еден профил</h6>
                    @else
                        <div class="table-responsive">
                            <table class="table search-table align-middle text-nowrap">
                                <thead class="header-item">
                                <th>Име</th>

                                <th class="text-center">Галерија</th>
                                <th class="text-center">Телефон</th>
                                <th class="text-end">Акција</th>
                                </thead>
                                <tbody>
                                <!-- start row -->
                                @foreach($profiles as $profile)
                                    <tr class="search-items">
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img
                                                    src="/images/logos/profile/thumbnails/{{ $profile->logo }}"
                                                    alt="avatar" class="rounded-circle"
                                                    width="40"/>
                                                <div class="ms-3 align-items-middle">
                                                    <div class="user-meta">
                                                        <a href="{{ route('profile.index', $profile->slug) }}"
                                                           class="title mb-0">{{ $profile->name }}</a>
                                                        <p class="fw-normal">{{ $profile->subtitle }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-center align-items-center">
                                                <div class="action-btn ">
                                                    <a href="{{ route('profile.gallery', $profile->id) }}"
                                                       class="text-info edit">
                                                        <i class="ti ti-photo-plus fs-5"></i> Види галерија
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                    <span class="usr-ph-no"
                                          data-phone="+1 (070) 123-4567">{{ $profile->phone }}</span>
                                        </td>
                                        <td class="text-end">
                                            <div class="action-btn">
                                                <a href="{{ route('profile.edit', $profile->id) }}"
                                                   class="text-info edit">
                                                    <i class="ti ti-eye fs-5"></i>
                                                </a>
                                                <a href="javascript:void(0)">
                                                </a>
                                                <a href="{{ route('profile.destroy', $profile->id) }}"
                                                   class="text-dark delete ms-2"
                                                   onclick="event.preventDefault();
                                  document.getElementById('delete-form').submit();">
                                                    <i class="ti ti-trash fs-5"></i>
                                                </a>
                                                <form id="delete-form" method="post"
                                                      action="{{ route('profile.destroy', $profile->id) }}">
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
                    @endif
                </div>
            @endif
        </div>
    </div>
@endsection
