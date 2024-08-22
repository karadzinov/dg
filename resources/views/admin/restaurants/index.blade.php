@extends('layouts.admin')
@section('content')
    <div class="card w-100 position-relative overflow-hidden">
        <div class="px-4 py-3 border-bottom">
            <h5 class="card-title fw-semibold mb-0 lh-sm">Restaurants Table</h5>
        </div>
        <div class="card-body p-4">

            <div class="table-responsive mb-4">
                <table class="table border text-nowrap mb-0 align-middle" id="qatable">
                    <thead class="text-dark fs-4">
                    <tr>
                        <th>
                            <h6 class="fs-4 fw-semibold mb-0">Position</h6>
                        </th>
                        <th>
                            <h6 class="fs-4 fw-semibold mb-0">Name</h6>
                        </th>

                        <th>
                            <h6 class="fs-4 fw-semibold mb-0">User</h6>
                        </th>
                        <th>
                            <h6 class="fs-4 fw-semibold mb-0">Info</h6>
                        </th>
                        <th><h6 class="fs-4 fw-semibold mb-0">Action</h6></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($restaurants as $restaurant)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">

                                    <div class="ms-3">
                                        <h6 class="fs-4 fw-semibold mb-0 position position{{ $restaurant->position }}">{{ $restaurant->position }}</h6>
                                    </div>
                                </div>
                            </td><td>
                                <div class="d-flex align-items-center">
                                    <img src="/images/logos/restaurants/thumbnails/{{ $restaurant->logo }}" class="rounded-circle" width="40"
                                         height="40">
                                    <div class="ms-3">
                                        <h6 class="fs-4 fw-semibold mb-0">{{ $restaurant->name }}</h6>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <p class="mb-0 fw-normal">{{ $restaurant->user->name }}</p>
                                <p class="mb-0 fw-normal">{{ $restaurant->user->email }}</p>
                            </td>
                            <td>
                                <p class="mb-0 fw-normal">{{ $restaurant->city->city }}</p>
                                <p class="mb-0 fw-normal">{{ $restaurant->address }}</p>
                            </td>
                            <td>
                                <div class="dropdown dropstart">
                                    <a href="#" class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                       aria-expanded="false">
                                        <i class="ti ti-dots-vertical fs-6"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center gap-3" href="#"><i
                                                    class="fs-4 ti ti-edit"></i>Edit</a>
                                        </li>
                                        <li>
                                            <button type="button" class="dropdown-item d-flex align-items-center gap-3"
                                                    data-bs-id="{{ $restaurant->id }}"
                                                    data-bs-name="{{ $restaurant->name }}" data-bs-toggle="modal"
                                                    data-bs-target="#delete">
                                                <i class="fs-4 ti ti-trash"></i>Delete
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Are you sure?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="deleteMessage"></div>
                </div>
                <div class="modal-footer">
                    <form method="post" class="deleteRestaurant">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End -->
@endsection
@section('scripts')
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js" integrity="sha256-eTyxS0rkjpLEo16uXTS0uVCS4815lc40K2iVpWDvdSY=" crossorigin="anonymous"></script>
    <script>
        const deleteModal = document.getElementById('delete')
        deleteModal.addEventListener('show.bs.modal', event => {
            // Button that triggered the modal
            const button = event.relatedTarget
            // Extract info from data-bs-* attributes
            const id = button.getAttribute('data-bs-id')

            const name = button.getAttribute('data-bs-name')


            let action = "/admin/restaurants/" + id;
            deleteModal.querySelector('form').setAttribute('action', action);
            deleteModal.querySelector('#deleteMessage').innerHTML = 'Are you sure you want to delete ' + name + '?';

        })
    </script>
    <script>
        $(document).ready(function(e) {
            $('.position').draggable({
                axis: 'y',
                opacity: 0.5,
                containment: $('#qatable'),
                revert: true,
                revertDuration: 0,
                distance: 10,
                cursor: 'pointer'
            }).droppable({
                accept: '.position',
                tolerance: 'pointer',
                drop: function(event, ui) {
                    ui.droppable = $(this);
                    var answers = $('#qatable').find('.position');
                    toindex = answers.index(ui.droppable);


                    fromindex = answers.index(ui.draggable);

                    var placeholder = $('<div id="placeholder">&nbsp;</div>').insertBefore(ui.droppable); // Placeholder
                    if (toindex < fromindex) { // Moving an answer up
                        for (var i=toindex;i<fromindex;i++) {
                            answers.eq(i).insertBefore(answers.eq(i+1)); // Shift everything down
                        }
                        ui.draggable.insertBefore(placeholder); // Move the draggable answer to where the other one was
                        placeholder.remove();
                    } else { // Moving the answer down
                        for (var i=toindex;i>fromindex;i--) {
                            answers.eq(i).insertBefore(answers.eq(i-1)); // Shift everything up
                        }
                        ui.draggable.insertBefore(placeholder); // Move the draggable answer to where the other one was
                        placeholder.remove();
                    }



                    $.ajax({
                        type: 'POST',
                        url: '{{ route('admin.restaurants.position') }}',
                        data: { fromindex: fromindex+1,  toindex: toindex+1},
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': "{{ @csrf_token() }}"
                        },
                        success: function (response) {
                            location.reload();
                        },
                        error: function (error) {
                            console.log(error); // Handle the error
                        }
                    });

                    console.log("Go mrdam: ", fromindex+1);
                    console.log("Na pozicija: ",  toindex+1);
                }
            });
        });
    </script>
@endsection
