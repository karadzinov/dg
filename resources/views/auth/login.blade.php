@extends('layouts.frontendLight')

@section('content')

    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full"
         data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="{{ route('frontend.index') }}" class="text-nowrap logo-img text-center d-block mb-5 w-100">
                                    <img src="/dist/images/logo.svg" width="180" alt="">
                                </a>
                                <div class="position-relative text-center my-4">
                                    <p class="mb-0 fs-4 px-3 d-inline-block bg-white z-index-5 position-relative">Логирај се</p>
                                    <span class="border-top w-100 position-absolute top-50 start-50 translate-middle"></span>
                                </div>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Е-маил адреса</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                               id="email" aria-describedby="emailHelp" value="{{ old('email') }}"
                                               required autocomplete="email" autofocus name="email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="password" class="form-label">Лозинка</label>
                                        <input id="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password" required
                                               autocomplete="current-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input primary" type="checkbox"  name="remember"
                                                   id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label text-dark" for="remember">
                                                Запомни ме
                                            </label>
                                        </div>
                                        @if (Route::has('password.request'))
                                            <a class="text-primary fw-medium" href="{{ route('password.request') }}">
                                                Заборавена лозинка?
                                            </a>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2"> Логирај се</button>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="mb-0 fw-medium">Немате профил?</p>
                                        <a class="text-primary fw-medium ms-4 fs-4" href="{{ route('register') }}">Регистрирај се!</a>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
