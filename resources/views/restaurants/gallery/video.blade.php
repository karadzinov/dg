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
                                <li class="breadcrumb-item"><a class="text-muted"
                                                               href="{{ route('restaurants.profile', $restaurant->slug) }}">
                                        {{ $restaurant->name }}</a></li>
                                <li class="breadcrumb-item" aria-current="page">Додади Youtube видео</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Create Form -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Ве молиме внесете ги следните информации</h4>
                    <form action="{{ route('restaurants.gallery.video.store', $restaurant->id) }}" method="POST">
                        @csrf
                        <br>
                        <br>
                        <p><strong>Информации за албумот</strong></p>
                        <br>
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name"> Име на албумот : <span class="danger">*</span>
                                        </label>
                                        <input type="text"
                                               class="form-control form-horizontal required @error('name') is-invalid @enderror"
                                               id="name"
                                               name="name"/>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <input type="number" hidden name="restaurant_id" value="{{ $restaurant->id }}">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="youtube_link"> Ставете линк до Youtube видеото : <span class="danger">*</span>
                                        </label>
                                        <input type="text"
                                               class="form-control form-horizontal required @error('youtube_link') is-invalid @enderror"
                                               id="youtube_link"
                                               name="youtube_link"/>
                                        @error('youtube_link')
                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </section>
                        <br>
                        <br>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Сочувај го контактот</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

