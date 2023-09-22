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
                                <li class="breadcrumb-item"><a class="text-muted" href="{{ route('frontend') }}"><i
                                            class="ti ti-home-2 text-danger me-1 fs-5"></i></a></li>
                                <li class="breadcrumb-item"><a class="text-muted" href="{{ route('restaurants.show', $restaurant->slug) }}">
                                        {{ $restaurant->name }}</a></li>
                                <li class="breadcrumb-item" aria-current="page">Креирај контакт</li>
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
                    <form action="{{ route('contacts.store', $restaurant->slug) }}" method="POST">
                        @csrf
                        <br>
                        <br>
                        <p><strong>Личност за контакт</strong></p>
                        <br>
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="contactName"> Име : <span class="danger">*</span>
                                        </label>
                                        <input type="text"
                                               class="form-control form-horizontal required @error('contactName') is-invalid @enderror"
                                               id="contactName"
                                               name="contactName"/>
                                        <input type="number" hidden
                                               class="form-control" name="restaurant_id" value="{{ $restaurant->id }}"/>
                                        @error('contactName')
                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="contactPosition"> Позиција : <span class="danger">*</span>
                                        </label>
                                        <input type="text"
                                               class="form-control form-horizontal required @error('contactPosition') is-invalid @enderror"
                                               id="contactPosition"
                                               name="contactPosition"/>
                                        @error('contactPosition')
                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="contactEmail"> Е-маил : <span class="danger">*</span>
                                        </label>
                                        <input type="text"
                                               class="form-control form-horizontal required @error('contactEmail') is-invalid @enderror"
                                               id="contactEmail" name="contactEmail"/>
                                        @error('contactEmail')
                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="contactPhone"> Телефон : <span class="danger">*</span>
                                        </label>
                                        <input type="text"
                                               class="form-control form-horizontal required @error('contactPhone') is-invalid @enderror"
                                               id="contactPhone" name="contactPhone"/>
                                        @error('contactPhone')
                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="desc"> Инфо за контактот : <span class="danger">*</span>
                                            </label>
                                            <textarea type="text" class="form-control @error('desc') is-invalid @enderror" rows="10" placeholder="Text Here..."
                                                      name="desc" id="desc"></textarea>
                                            @error('description')
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

