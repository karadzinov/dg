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
                                <li class="breadcrumb-item">
                                    <a class="text-muted" href="{{ route('frontend.index') }}">
                                        <i class="ti ti-home-2 text-danger me-1 fs-5"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('users.index') }}">Поканети
                                        гости {{ auth()->user()->packageInfo()['totalGuests'] }} / 300</a></li>
                                <li class="breadcrumb-item" aria-current="page">
                                    <a href="{{ route('frontend.invitations') }}">Покани {{ auth()->user()->packageInfo()['totalInvitations'] }}
                                        / 10</a>
                                </li>
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
                            <th class="text-center">Покана</th>
                            <th class="text-center">Наслов</th>

                            <th class="text-center">Додади гости</th>
                            <th class="text-center">Прегледај листа на гости</th>
                            <th class="text-center">Промени текст</th>
                            <th class="text-end">Избриши</th>
                            </thead>
                            <tbody>
                            <!-- start row -->
                            @foreach($invitations as $invitation)
                                <tr class="search-items">
                                    <td>
                                        <div class="action-btn text-center">
                                            <a href="{{ route('invitation.show', $invitation->invitation_link) }}"
                                               class="text-info edit">
                                                <i class="ti ti-eye fs-5"></i> Погледни
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        @if($invitation->template != "birthday")
                                            <div class="text-center align-items-center">
                                                {{strip_tags($invitation->female_name) }}
                                                & {{ strip_tags($invitation->male_name) }}
                                            </div>
                                        @else
                                            <div class="text-center align-items-center">
                                                {{strip_tags($invitation->name) }}
                                            </div>
                                        @endif
                                    </td>


                                    <td>
                                        <div class="text-center align-items-center">
                                            <a href="{{ route('guests.create', $invitation) }}">
                                                <i class="ti ti-edit fs-5"></i>Додади гости</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center align-items-center">

                                            <a href="{{ route('guests.index', $invitation) }}"
                                               class="btn btn-sm btn-info">Потврдени: {{ $invitation->guestsConfirmed() }}</a>
                                            <a href="{{ route('guests.index', $invitation) }}"
                                               class="btn btn-sm btn-danger">Не
                                                потврдени: {{ $invitation->guestsWaiting() }}</a>
                                        </div>
                                    </td>
                                    <td>
                                        @if($invitation->template != "birthday")
                                            <div class="text-center align-items-center">
                                                <a href="{{ route('invitation.editText', $invitation->id) }}">
                                                    <i class="ti ti-edit fs-5"></i>Промени текст/слики
                                                </a>
                                            </div>
                                        @else
                                            <div class="text-center align-items-center">

                                            </div>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <div class="action-btn">

                                            <a href="{{ route('invitation.destroy', $invitation->id) }}"
                                               class="text-dark delete ms-2"
                                               onclick="event.preventDefault();
                                  document.getElementById('delete-form-{{ $invitation->id }}').submit();">
                                                <i class="ti ti-trash fs-5"></i>
                                            </a>
                                            <form id="delete-form-{{ $invitation->id }}" method="post"
                                                  action="{{ route('invitation.destroy', $invitation->id) }}">
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


                {{ $invitations->links() }}
            </div>
        </div>
    </div>
@endsection
