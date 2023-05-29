@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Add New Product</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('guests.index') }}"> Back</a>
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

        <form action="{{ route('guests.store') }}" method="POST">
            @csrf


            <div id="clonedInput1" class="clonedInput">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <input type="text" id="name" name="name[]" class="form-control" placeholder="Name">
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
            <div class="actions  text-center">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <button type="submit" class="btn btn-primary clone">+</button>
                    <button type="submit" class="btn btn-primary remove">-</button>
                </div>
            </div>

            <div class="showHere"></div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <strong>Plus one:</strong>
                <input type="checkbox" name="plus_one" >
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>


        </form>
    </div>


@endsection
@section('scripts')
    <script>
        $('document').ready(function () {

            $('.clone').on('click', function (e) {
                e.preventDefault();
            });

            $('.remove').on('click', function (e) {
                e.preventDefault();
            });
            var regex = /^(.+?)(\d+)$/i;
            var cloneIndex = $(".clonedInput").length;

            function clone() {

                $(".clonedInput").last().clone()
                    .appendTo(".showHere")
                    .attr("id", "clonedInput" + cloneIndex)
                    .find("*")
                    .each(function () {
                        var id = this.id || "";
                        var match = id.match(regex) || [];
                        if (match.length == 3) {
                            this.id = match[1] + (cloneIndex);
                        }
                    })
                    .on('click', 'button.clone', clone)
                    .on('click', 'button.remove', remove);
                cloneIndex++;
            }

            function remove() {
                $(".clonedInput").last().remove();
            }

            $("button.clone").on("click", clone);

            $("button.remove").on("click", remove);

        });

    </script>
@endsection
