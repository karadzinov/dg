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
                                <li class="breadcrumb-item" aria-current="page">Уреди ресторан</li>
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
                    <form action="{{ route('restaurants.update', $restaurant->id) }}" method="POST"
                          enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <p><strong>Општи информации</strong></p>
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name"> Име на ресторанот : <span class="danger">*</span>
                                        </label>
                                        <input type="text"
                                               class="form-control @error('name') is-invalid @enderror form-horizontal required"
                                               id="name"
                                               name="name" value="{{ $restaurant->name }}"/>
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
                                        <input type="text"
                                               class="form-control form-horizontal required @error('phone') is-invalid @enderror"
                                               id="phone"
                                               name="phone" value="{{ $restaurant->phone }}"/>
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
                                        <input type="text"
                                               class="form-control form-horizontal required  @error('address') is-invalid @enderror"
                                               id="address"
                                               name="address" value="{{ $restaurant->address }}"/>
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
                                        <label for="category_id"> Категорија : <span class="danger">*</span></label>
                                        <select class="form-control @error('category_id') is-invalid @enderror"
                                                name="category_id" id="category_id">
                                            {!! $categories !!}
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="description"> Повеќе за ресторанот : <span class="danger">*</span>
                                        </label>
                                        <textarea class="ckeditor @error('description') is-invalid @enderror" rows="3"
                                                  name="description"
                                                  id="description">{{ $restaurant->description }}</textarea>
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
                                @foreach($contacts as $contact)
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
                                                           name="contactName[]" value="{{ $contact->contactName }}"/>
                                                    @error('contactName')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="contactPosition"> Позиција : <span
                                                            class="danger">*</span>
                                                    </label>
                                                    <input type="text"
                                                           class="form-control form-horizontal required @error('contactPosition') is-invalid @enderror"
                                                           id="contactPosition"
                                                           name="contactPosition[]"
                                                           value="{{ $contact->contactPosition }}"/>
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
                                                           id="contactEmail" name="contactEmail[]"
                                                           value="{{ $contact->contactEmail }}"/>
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
                                                           id="contactPhone" name="contactPhone[]"
                                                           value="{{ $contact->contactPhone }}"/>
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
                                                    <label for="contactDescription"> Повеќе инфомации за контактот :
                                                        <span
                                                            class="danger">*</span>
                                                    </label>
                                                    <input type="text"
                                                           class="form-control form-horizontal @error('contactDescription') is-invalid @enderror"
                                                           name="contactDescription[]" id="contactDescription"
                                                           value="{{ $contact->contactDescription }}">
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
                                @endforeach
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
                                        <input type="number"
                                               class="form-control form-horizontal required @error('capacity') is-invalid @enderror"
                                               id="capacity"
                                               name="capacity" value="{{ $restaurant->capacity }}"/>
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
                                        <label for="menuDiscount"> Акциско мени (во <i
                                                class="ti ti-currency-euro fs-5 align-middle"></i>): <span
                                                class="danger">*</span>
                                        </label>
                                        <input type="number" class="form-control form-horizontal" id="menuDiscount"
                                               name="menuDiscount" value="{{ $restaurant->menuDiscount }}"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="menuMin"> Мени min (во <i
                                                class="ti ti-currency-euro fs-5 align-middle"></i>): <span
                                                class="danger">*</span>
                                        </label>
                                        <input type="number" class="form-control form-horizontal"
                                               id="menuMin"
                                               name="menuMin" value="{{ $restaurant->menuMin }}"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="menuMax"> Мени max (во <i
                                                class="ti ti-currency-euro fs-5 align-middle"></i>): <span
                                                class="danger">*</span>
                                        </label>
                                        <input type="number" class="form-control form-horizontal"
                                               id="menuMax"
                                               name="menuMax" value="{{ $restaurant->menuMax }}"/>
                                    </div>
                                </div>
                            </div>

                        </section>
                        <br>
                        <br>
                        <p><strong>Линкови</strong></p>
                        <section>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="facebook"> Facebook : <span class="danger">*</span>
                                        </label>
                                        <input type="text"
                                               class="form-control form-horizontal"
                                               id="facebook"
                                               name="facebook" value="{{ $restaurant->facebook }}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="instagram"> Instagram : <span class="danger">*</span>
                                        </label>
                                        <input type="text"
                                               class="form-control form-horizontal"
                                               id="instagram"
                                               name="instagram" value="{{ $restaurant->instagram }}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="twitter"> Twitter : <span class="danger">*</span>
                                        </label>
                                        <input type="text"
                                               class="form-control form-horizontal"
                                               id="twitter"
                                               name="twitter" value="{{ $restaurant->twitter }}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="youtube"> Youtube : <span class="danger">*</span>
                                        </label>
                                        <input type="text"
                                               class="form-control form-horizontal"
                                               id="youtube"
                                               name="youtube" value="{{ $restaurant->youtube }}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="weblink"> Web : <span class="danger">*</span>
                                        </label>
                                        <input type="text"
                                               class="form-control form-horizontal"
                                               id="weblink"
                                               name="weblink" value="{{ $restaurant->weblink }}"/>
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
@section('scripts')
    <script src="/plugins/ckeditor/ckeditor.js"></script>
    <script src="/plugins/ckeditor/ckconfig.js"></script>


    <script>
        @if($restaurant->categories->first())
        $("#category_id").val("{{ $restaurant->categories->first()->id }}").change();
        @endif
    </script>

@endsection

