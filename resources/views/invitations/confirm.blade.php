@extends('layouts.frontend')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <h3>Вашата покана е креирана.</h3>
                            <h4>За деталите проверете ја вашата е-маил адреса.</h4>
                        </div>
                        <br>
                        <div class="text-center">
                            <a href="{{ route('frontend.invitations') }}" class="btn btn-primary">Кон покани</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
