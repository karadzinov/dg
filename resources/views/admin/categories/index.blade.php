@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="border-bottom title-part-padding">
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-default">Add
                        Category</a>
                </div>
                <div class="card-body">
                        {!! $categories !!}
                </div>


            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="/assets/libs/nestable/jquery.nestable.js"></script>
    <script>
        $(document).ready(function () {

            var updateOutput = function (e) {
                var list = e.length ? e : $(e.target),
                    output = list.data("output");
                if (window.JSON) {
                    output.val(window.JSON.stringify(list.nestable("serialize"))); //, null, 2));
                } else {
                    output.val("JSON browser support required for this demo.");
                }


                var order = $('.dd').nestable('serialize');


                // Make an AJAX call to update the order on the backend
                $.ajax({
                    type: 'POST',
                    url: '{{ route('admin.categories.order') }}',
                    data: { order: order },
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': "{{ @csrf_token() }}"
                    },
                    success: function (response) {
                        console.log(response); // Handle the success response
                    },
                    error: function (error) {
                        console.log(error); // Handle the error
                    }
                });
            };


           // $("#nestable2").nestable().on("change", updateOutput);


            $("#nestable")
                .nestable({
                    group: 1,
                })
                .on("change", updateOutput);

            updateOutput($("#nestable").data("output", $("#nestable-output")));







        });
    </script>
@endsection
