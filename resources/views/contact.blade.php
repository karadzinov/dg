@extends('layouts.frontend')
@section('content')
    <div class="row">
        <div class="col-12">
            <div id="myCarousel" class="carousel slide carousel-dark" data-bs-ride="carousel"
                 style="margin-top: 140px;">
                <ul class="carousel-indicators">
                    <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" class="active"
                        aria-current="true"></li>
                </ul>
                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <div class="slider-image"
                             style="background-image: url('/dist/images/flowers.png');"></div>

                        <div class="carousel-caption d-md-block">
                            <h4>Драги Гости</h4>
                            <h5>вашиот единствен свадбен планер</h5>

                        </div>

                    </div>


                    <a class="carousel-control-prev" href="#myCarousel" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <h3>Драги гости...</h3>
                        <p>
                            Тука сме за сите ваши прашања!
                            <br>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="mb-0 text-white">Контактирајте не!</h4>
            </div>
            <form action="{{ route('frontend.question') }}" method="post">
                @csrf
                <div>
                    <div class="card-body">
                        <h5>Вашите информации</h5>
                        <div class="row pt-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="firstName" class="control-label">Име</label>
                                    <input
                                        type="text"
                                        id="firstName"
                                        name="firstName"
                                        class="form-control"
                                        placeholder="Петар"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="lastName" class="control-label">Презиме</label>
                                    <input
                                        type="text"
                                        id="lastName" name="lastName"
                                        class="form-control"
                                        placeholder="Петровски"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="control-label">Е-маил</label>
                                    <input
                                        type="email"
                                        id="email" name="email"
                                        class="form-control"
                                        placeholder="dragigosti@pingdevs.mk"
                                    />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="control-label">Телефон за контакт</label>
                                    <input
                                        type="text"
                                        id="phone" name="phone"
                                        class="form-control"
                                        placeholder="+ 123 11 234 567"
                                    />
                                </div>
                            </div>
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="category" class="control-label">Категорија</label>
                                    <select
                                        id="category" name="category"
                                        class="form-control form-select"
                                        data-placeholder="Choose a Category"
                                        tabindex="1">
                                        <option value="Category 1">Ресторани</option>
                                        <option value="Category 2">Музичари</option>
                                        <option value="Category 3">Фотографи</option>
                                        <option value="Category 4">Покани</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="question">Вашето прашање</label>
                                <textarea id="question" name="question" class="form-control quill-editor"></textarea>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="card-body border-top text-end">
                                <button
                                    type="submit"
                                    class="btn btn-success rounded-pill px-4"
                                >
                                    <div class="d-flex align-items-center">
                                        <i class="ti ti-device-floppy me-1 fs-4"></i>
                                        Прати
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection






















