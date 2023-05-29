@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Guests</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a class="btn btn-success" href="/guests/create">Add Guest</a>

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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Link</th>
                            <th>Confirmed</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($guests as $guest)
                            <tr>
                                <td><a href="/guests/{{ $guest->id }}/edit">{{ $guest->name }}</a></td>
                                <td>{{ $guest->email }}</td>
                                <td>
                                    <a target="_blank" href="https://dragigosti.com/{{ $guest->link->link }}">https://dragigosti.com/{{ $guest->link->link }}</a>
                                </td>
                                <td>
                                    @if($guest->confirmed != 0)
                                    <button class="btn btn-success">Confirmed</button>
                                        @else
                                        <button class="btn btn-default">Waiting for confirmation</button>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('guests.destroy', $guest->id) }}"
                                          method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Delete</button>
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
