@extends('layouts.frontend')

@section('content')
    <div class="body-wrapper">


        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Гости</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <a class="btn btn-success" href="/guests/create/{{ $invitation->id }}">Додади гости</a>

                                <a class="btn btn-info" href="/user/invitations">Назад</a>

                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Име</th>
                                <th>Email</th>
                                <th>Link</th>
                                <th>Потврда</th>
                                <th>Избриши</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($guests as $guest)
                                <tr>
                                    <td><a href="{{ env('APP_URL') }}/{{ $invitation->invitation_link }}/{{ $guest->link->link }}" target="_blank">{{ $guest->name }}</a></td>
                                    <td>{{ $guest->email }}</td>
                                    <td>
                                        <a target="_blank"
                                           href="{{ env('APP_URL') }}/{{ $invitation->invitation_link }}/{{ $guest->link->link }}">{{ env('APP_URL') }}/{{ $invitation->invitation_link }}/{{ $guest->link->link }}</a>
                                    </td>
                                    <td>
                                        @if($guest->confirmed != 0)
                                            <button class="btn btn-success">Потврдено</button>
                                        @else
                                            <button class="btn btn-default">Се чека на потврда</button>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('guests.destroy', $guest->id) }}"
                                              method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Избриши</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>

@endsection
