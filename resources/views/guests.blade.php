@extends('layouts.frontend')

@section('guests')
    {{ $str }}
@endsection


@section('form')
    @if(session()->has('success'))
        <div class="alert alert-success">
            Ви благодариме на потврдата!
        </div>
    @endif
    @if(session()->has('plus_one'))
        <div class="alert alert-success">
            Ви благодариме на додавањето! Ве молиме потврдете.
        </div>
    @endif
    <div class="contact-form">
        @foreach($guests as $guest)
            <form action="{{ route('confirm', ["id" => $guest->id]) }}" method="POST">
                @csrf
                <div class="form-group has-feedback">
                    <label class="sr-only" for="name">Name*</label>
                    <input type="text" placeholder="Name" class="form-control" id="name" name="name"
                           value="{{ $guest->name }}">
                    <i class="fa fa-user form-control-feedback"></i>

                </div>
                <div class="form-group has-feedback">
                    <label class="sr-only" for="email">Email*</label>
                    <input type="email" placeholder="Email" class="form-control" id="email" name="email"
                           value="{{ $guest->email }}">
                    <i class="fa fa-envelope form-control-feedback"></i>

                </div>
                @if(!$guest->confirmed)
                    <input type="submit" value="Потврди" class="submit-button btn btn-default">
                @else
                    <input type="submit" value="Потврдено" class="success btn btn-default" disabled>
                @endif
            </form>

            @if($guest->plus_one)
                <form action="{{ route('plus_one', ["link_id" => $link->id, "guest_id" => $guest->id]) }}"
                      method="POST">
                    @csrf
                    <div class="form-group has-feedback">
                        <label class="sr-only" for="name">Name*</label>
                        <input type="text" placeholder="Name" class="form-control" id="name" name="name">
                        <i class="fa fa-user form-control-feedback"></i>

                    </div>
                    <div class="form-group has-feedback">
                        <label class="sr-only" for="email">Email*</label>
                        <input type="email" placeholder="Email" class="form-control" id="email" name="email">
                        <i class="fa fa-envelope form-control-feedback"></i>

                    </div>
                    <input type="submit" value="Додади" class="submit-button btn btn-default">
                </form>
            @endif
        @endforeach


    </div>
@endsection
