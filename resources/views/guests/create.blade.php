@extends('layouts.frontend')

@section('content')
    <div class="body-wrapper">


        <div class="container-fluid">
            <div class="row justify-content-center">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Можете да додадете уште:
                            <strong> {{ 300 - auth()->user()->packageInfo()['totalGuests'] }}</strong> гости <p
                                class="float-end">Пакет: <img src="/dist/images/backgrounds/bronze.png"
                                                              style="width: 20px;">Bronze (<a
                                    href="/invitation/package">Промени</a>)</p></div>

                        <div class="card-body">


                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form action="{{ route('guests.store', $invitation) }}" method="POST">
                                @csrf


                                <div id="clonedInput1" class="clonedInput">
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <strong>Внесете име:</strong>
                                                <input type="text" id="name" name="name[]" class="form-control"
                                                       placeholder="Име">
                                            </div>
                                        </div>

                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <strong>Email:</strong>
                                                <input type="text" id="email" name="email[]" class="form-control"
                                                       placeholder="Email">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="actions  text-center m-md-2">
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
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Име</th>
                                <th>Email</th>
                                <th>Link</th>
                                <th>Потврда</th>
                                <th>Мени</th>
                                <th>Избриши</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($guests as $guest)
                                <tr>
                                    <td>
                                        <a href="{{ env('APP_URL') }}/{{ $invitation->invitation_link }}/{{ $guest->link->link }}"
                                           target="_blank">{{ $guest->name }}</a></td>
                                    <td>{{ $guest->email }}</td>
                                    <td>
                                        <a target="_blank" title="Клик за Copy!"
                                           href="{{ env('APP_URL') }}/{{ $invitation->invitation_link }}/{{ $guest->link->link }}">{{ env('APP_URL') }}/{{ $invitation->invitation_link }}/{{ $guest->link->link }}</a>
                                        <span class="btn btn-sm btn-secondary copy"
                                              style="margin-left: 20px;"><i class="ti ti-copy"></i> Copy</span>
                                    </td>
                                    <td>
                                        @if($guest->confirmed != 0)
                                            <button class="btn btn-success">Потврдено</button>
                                        @else
                                            <button class="btn btn-default">Се чека на потврда</button>
                                        @endif
                                    </td>
                                    <td>
                                        @if($guest->menu_option !== "regular")
                                            <button class="btn btn-sm btn-info">{{ $guest->menu_option }}</button>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('guests.destroy', $guest->id) }}"
                                              method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Избриши</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>


    </div>

@endsection
@section('scripts')
    <script>


        $(".copy").on("click", function (e) {
            e.preventDefault();
            console.time('time1');
            var temp = $("<input>");
            $("body").append(temp);
            temp.val($(this).prev().text()).select();
            document.execCommand("copy");
            temp.remove();
            console.timeEnd('time1');

            $(this).attr('title', "Ископирано!");
            $(this).tooltip("show");
        });


    </script>
@endsection

