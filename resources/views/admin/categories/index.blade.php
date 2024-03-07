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
            // Initialize the drag-and-drop
            $('.dd').nestable();

            // Handle the change event when the list is updated
            $('.dd').on('change', function () {
                // Get the new order
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
            });
        });
    </script>
@endsection
