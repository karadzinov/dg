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
                                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Информации за
                                        профилот</a></li>
                                <li class="breadcrumb-item" aria-current="page"><a
                                        href="{{ route('frontend.invitations') }}">Покани</a></li>
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
                            <th class="text-center">Име на невестата</th>
                            <th class="text-center">Име на младоженецот</th>
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
                                        <div class="text-center align-items-center">
                                            {{strip_tags($invitation->female_name) }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center align-items-center">
                                            {{ strip_tags($invitation->male_name) }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center align-items-center">
                                            <a href="{{ route('invitation.editText', $invitation->id) }}">
                                                <i class="ti ti-edit fs-5"></i>Промени текст/слики
                                            </a>
                                        </div>
                                    </td>
                                    <td class="text-end">
                                        <div class="action-btn">

                                            <a href="{{ route('invitation.destroy', $invitation->id) }}"
                                               class="text-dark delete ms-2"
                                               onclick="event.preventDefault();
                                  document.getElementById('delete-form').submit();">
                                                <i class="ti ti-trash fs-5"></i>
                                            </a>
                                            <form id="delete-form" method="post"
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
                        <div class="col-md-12 text-center">
                            {{ $invitations->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
