@extends('layouts.frontend')

@section('content')
    <div class="body-wrapper">
        <div class="container-fluid">
            <div class="row m-md-5">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Додади</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('guests.index', $invitation) }}"> Назад</a>
                    </div>
                </div>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('guests.store', $invitation) }}" method="POST">
                @csrf


                <div id="clonedInput1" class="clonedInput">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Внесете име:</strong>
                                <input type="text" id="name" name="name[]" class="form-control" placeholder="Име">
                            </div>
                        </div>

                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Email:</strong>
                                <input type="text" id="email" name="email[]" class="form-control" placeholder="Email">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="actions  text-center m-md-5">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <button type="submit" class="btn btn-primary clone">+</button>
                        <button type="submit" class="btn btn-primary remove">-</button>
                    </div>
                </div>

                <div class="showHere"></div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <strong>Плус еден:</strong>
                    <input type="checkbox" name="plus_one">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 m-md-3">
                    <button type="submit" class="btn btn-primary">Додади</button>
                </div>


            </form>
        </div>

    </div>

@endsection

