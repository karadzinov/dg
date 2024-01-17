@extends('layouts.frontend')
@section('content')


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
                                        <option value="Ресторани">Ресторани</option>
                                        <option value="Музичари">Музичари</option>
                                        <option value="Фотографи">Фотографи</option>
                                        <option value="Покани">Покани</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="subject" class="control-label">Наслов</label>
                                    <input
                                        type="text"
                                        id="subject"
                                        name="subject"
                                        class="form-control"
                                        placeholder="Во врска со што?"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="description">Вашето прашање</label>
                                <input type="text" id="description" name="description" class="form-control" style="height: 200px">
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






















