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
                                <li class="breadcrumb-item"><a class="text-muted" href="{{ route('frontend') }}"><i
                                            class="ti ti-home-2 text-danger me-1 fs-5"></i></a></li>
                                <li class="breadcrumb-item"><a class="text-muted" href="{{ route('restaurants.show', $restaurant->slug) }}">
                                        {{ $restaurant->name }}</a></li>
                                <li class="breadcrumb-item" aria-current="page">Контакти</li>
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
                    <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                        <a href="{{ route('contacts.create', $restaurant->slug) }}" class="btn btn-info d-flex align-items-center">
                            <i class="ti ti-users text-white me-1 fs-5"></i> Додади контакт
                        </a>
                    </div>
                </div>
            </div>
            <!-- ---------------------
                            end Contact
                        ---------------- -->
            <!-- Modal -->
            <div class="card card-body">
                <h4 class="card-title text-center">Контакти</h4>
                <div class="table-responsive">
                    <table class="table search-table align-middle text-nowrap">
                        <thead class="header-item">
                        <th>Име</th>
                        <th class="text-center">Порака</th>
                        <th class="text-center">Позиција</th>
                        <th class="text-center">Телефон</th>
                        <th class="text-end">Акција</th>
                        </thead>
                        <tbody>
                        <!-- start row -->
                        @foreach($contacts as $contact)
                            <tr class="search-items">
                                <td class="text-start">
                                    <h6 class="user-name mb-0"
                                        data-name="Emma Adams">{{ $contact->contactName }}</h6>
                                    <span class="user-work fs-3"
                                    >{{ $contact->contactEmail }}</span>
                                </td>
                                    <?php
                                        $limit = 50;
                                        if (strlen($contact->desc) > $limit) {
                                            $description = substr($contact->desc, 0, strrpos(substr($contact->desc, 0, $limit), ' ')) . '...';
                                        } else
                                            $description = $contact->desc;
                                    ?>
                                <td class="text-center">
                                    <span class="usr-location"
                                          data-location="Boston, USA">{{ $description }}</span>
                                </td>
                                <td class="text-center">
                                    <span class="usr-location"
                                          data-location="Boston, USA">{{ $contact->contactPosition }}</span>
                                </td>
                                <td class="text-center">
                                    <span class="usr-ph-no"
                                          data-phone="+1 (070) 123-4567">{{  $contact->contactPhone }}</span>
                                </td>
                                <td class="text-end">
                                    <div class="action-btn">
                                        <a href="{{ route('contacts.edit', $contact->id) }}"
                                           class="text-info edit">
                                            <i class="ti ti-edit fs-5"></i>
                                        </a>
                                        <a href="{{ route('contacts.destroy', $contact->id) }}"
                                           class="text-dark delete ms-2"
                                           onclick="event.preventDefault();
                                  document.getElementById('delete-form').submit();">
                                            <i class="ti ti-trash fs-5"></i>
                                        </a>
                                        <form id="delete-form" method="post"
                                              action="{{ route('contacts.destroy', $contact->id) }}">
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
