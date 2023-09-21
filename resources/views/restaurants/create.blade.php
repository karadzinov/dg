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
                                <li class="breadcrumb-item" aria-current="page">Креирај ресторан</li>
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
                    <form action="{{ route('restaurants.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <p><strong>Општи информации</strong></p>
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name"> Име на ресторанот : <span class="danger">*</span>
                                        </label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror form-horizontal required" id="name"
                                               name="name"/>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="phone"> Телефон : <span class="danger">*</span>
                                        </label>
                                        <input type="text" class="form-control form-horizontal required @error('phone') is-invalid @enderror" id="phone"
                                               name="phone"/>
                                        @error('phone')
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
                                        <label for="address"> Адреса : <span class="danger">*</span>
                                        </label>
                                        <input type="text" class="form-control form-horizontal required  @error('address') is-invalid @enderror" id="address"
                                               name="address"/>
                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="city"> Град : <span class="danger">*</span>
                                        </label>
                                        <select class="form-select form-horizontal required" id="city" name="city">
                                            @foreach($cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->admin_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="description"> Повеќе за ресторанот : <span class="danger">*</span>
                                        </label>
                                        <textarea class="quill-editor @error('description') is-invalid @enderror" rows="3" placeholder="Text Here..."
                                                  name="description" id="description"></textarea>
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
                        <p><strong>Изглед на профилот</strong></p>
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="coverImg"> Слика на профилот : <span class="danger">*</span>
                                        </label>
                                        <input type="file"
                                               class="form-control custom-file-input form-horizontal required @error('coverImg') is-invalid @enderror"
                                               id="coverImg"
                                               name="coverImg"/>
                                        @error('coverImg')
                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="logo"> Лого на ресторанот : <span class="danger">*</span>
                                        </label>
                                        <input type="file"
                                               class="form-control custom-file-input form-horizontal required @error('logo') is-invalid @enderror"
                                               id="logo" name="logo"/>
                                        @error('logo')
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
                        <div>
                            <div id="clonedInput1" class="clonedInput">
                                <p><strong>Личност за контакт</strong></p>
                                <section>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="contactName"> Име : <span class="danger">*</span>
                                                </label>
                                                <input type="text" class="form-control form-horizontal required @error('contactName') is-invalid @enderror"
                                                       id="contactName"
                                                       name="contactName[]"/>
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
                                                <input type="text" class="form-control form-horizontal required @error('contactPosition') is-invalid @enderror"
                                                       id="contactPosition"
                                                       name="contactPosition[]"/>
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
                                                <input type="text" class="form-control form-horizontal required @error('contactEmail') is-invalid @enderror"
                                                       id="contactEmail" name="contactEmail[]"/>
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
                                                <input type="text" class="form-control form-horizontal required @error('contactPhone') is-invalid @enderror"
                                                       id="contactPhone" name="contactPhone[]"/>
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
                                                <label for="contactDescription"> Повеќе инфомации за контактот : <span
                                                        class="danger">*</span>
                                                </label>
                                                <input type="text" class="form-control form-horizontal @error('contactDescription') is-invalid @enderror"
                                                          name="contactDescription[]" id="contactDescription">
                                                @error('contactDescription')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="showHere"></div>
                                </section>
                            </div>
                            <div class="actions  text-center">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <p>Додади/Избриши лица за контакт</p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <button class="btn btn-outline-primary clone">+</button>
                                    <button class="btn btn-outline-primary remove">-</button>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <p><strong>Дополнителни информации</strong></p>
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="capacity"> Капацитет на гости : <span class="danger">*</span>
                                        </label>
                                        <input type="number" class="form-control form-horizontal required @error('capacity') is-invalid @enderror" id="capacity"
                                               name="capacity"/>
                                        @error('capacity')
                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="menuDiscount"> Акциско мени (во <i class="ti ti-currency-euro fs-5 align-middle"></i>): <span class="danger">*</span>
                                        </label>
                                        <input type="number" class="form-control form-horizontal" id="menuDiscount"
                                               name="menuDiscount"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="menuMin"> Мени min (во <i class="ti ti-currency-euro fs-5 align-middle"></i>): <span class="danger">*</span>
                                        </label>
                                        <input type="number" class="form-control form-horizontal"
                                               id="menuMin"
                                               name="menuMin"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="menuMax"> Мени max (во <i class="ti ti-currency-euro fs-5 align-middle"></i>): <span class="danger">*</span>
                                        </label>
                                        <input type="number" class="form-control form-horizontal"
                                               id="menuMax"
                                               name="menuMax"/>
                                    </div>
                                </div>
                            </div>

                        </section>
                        <br>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Сочувај ги информациите</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

