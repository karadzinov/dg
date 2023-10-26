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
                                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Информации за профилот</a></li>
                                <li class="breadcrumb-item" aria-current="page"><a href="{{ route('users.activities') }}">Активности</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="widget-content searchable-container list">
            <!-- --------------------- -->
            <!-- Modal -->
            <div class="card card-body">
                <h4 class="card-title text-center">Покани</h4>
                @if(count($invitations)=== 0)
                    <br>
                    <h6 class="card-title text-center">Немате креирано покана</h6>
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
                            @foreach($invitations as $invitation)
                                <tr class="search-items">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="/images/logos/restaurants/thumbnails/{{ $invitation->logo }}"
                                                 alt="avatar" class="rounded-circle"
                                                 width="40"/>
                                            <div class="ms-3 align-items-middle">
                                                <div class="user-meta">
                                                    <a href=""
                                                       class="title mb-0">{{ $invitation->name }}</a>
                                                    <p class="fw-normal">{{ $invitation->subtitle }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center align-items-center">
                                            <div class="action-btn">
                                                <a href=""
                                                   class="text-info edit">
                                                    <i class="ti ti-user fs-5"></i>Види контакти
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center align-items-center">
                                            <div class="action-btn ">
                                                <a href=""
                                                   class="text-info edit">
                                                    <i class="ti ti-photo-plus fs-5"></i> Види галерија
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                    <span class="usr-location"
                                          data-location="Boston, USA">{{ $invitation->address }},</span>
                                    </td>
                                    <td class="text-center">
                                    <span class="usr-ph-no"
                                          data-phone="+1 (070) 123-4567">{{ $invitation->phone }}</span>
                                    </td>
                                    <td class="text-end">
                                        <div class="action-btn">
                                            <a href=""
                                               class="text-info edit">
                                                <i class="ti ti-eye fs-5"></i>
                                            </a>
                                            <a href="javascript:void(0)">

                                            </a>
                                            <a href=""
                                               class="text-dark delete ms-2"
                                               onclick="event.preventDefault();
                                  document.getElementById('delete-form').submit();">
                                                <i class="ti ti-trash fs-5"></i>
                                            </a>
                                            <form id="delete-form" method="post"
                                                  action="">
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
        </div>
    </div>
@endsection
