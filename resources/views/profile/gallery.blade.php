@extends('layouts.frontend')
@section('content')

    <div class="container-fluid">


    <div class="card">
        <div class="border-bottom title-part-padding">
            <h1 class="card-title mb-0">Додадете фотографии за:  {{ $profile->name }}</h1>


        </div>
        <div class="card-body">
            @if(Session::has('flash_message'))
                <p class="alert alert-success">{{ Session::get('flash_message') }}</p>
            @endif
            <form class="needs-validation" novalidate="" action="{{ route('profile.gallery.store',  $profile->id) }}"
                  method="post"
                  enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-12">
                        <label for="inputImages" class="form-label">Изберете фотографии</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="inputImages"
                               name="images[]" multiple>

                        @error('image')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                </div>

                <button class="btn btn-primary mt-3 rounded-pill px-4" type="submit">
                    Прикачи
                </button>
            </form>
        </div>
    </div>



    @if($profile->gallery())

        <div class="card">
            <div class="border-bottom title-part-padding">
                <h1 class="card-title mb-0">{{ $profile->gallery()->count() }} Фотографии</h1>


            </div>
            <div class="card-body">

                @if(Session::has('flash_message_delete'))
                    <p class="alert alert-danger">{{ Session::get('flash_message_delete') }}</p>
                @endif

                <div class="row" id="qatable">
                    @foreach($profile->gallery as $image)
                        <div class="col-md-4">
                            <div class="card position position{{$image->position}} pointer-cursor">
                                <div class="card-body">

                                    <img src="/images/gallery/medium/{{ $image->image }}"
                                         alt="" class="img-container"/>
                                </div>
                                <div class="card-footer">
                                    <div class="text-end">
                                        <button type="button"
                                                class="btn btn-sm btn-danger"
                                                data-bs-id="{{ $image->id }}"
                                                data-bs-name="Image" data-bs-toggle="modal"
                                                data-bs-target="#delete">
                                            <i class="fs-4 ti ti-trash"></i>Избриши
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>


            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Дали сте сигурни?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="deleteMessage"></div>
                    </div>
                    <div class="modal-footer">
                        <form method="post" class="deleteUser">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Откажи</button>
                            <button type="submit" class="btn btn-danger">Избриши</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal End -->
    @endif
@endsection

@section('scripts')
    <script src="/dist/js/jquery-ui-min.js"></script>

    <script>
        const deleteModal = document.getElementById('delete')
        deleteModal.addEventListener('show.bs.modal', event => {
            // Button that triggered the modal
            const button = event.relatedTarget
            // Extract info from data-bs-* attributes
            const id = button.getAttribute('data-bs-id')

            const name = button.getAttribute('data-bs-name')


            let action = "/user/profile/gallery/" + id;
            deleteModal.querySelector('form').setAttribute('action', action);
            deleteModal.querySelector('#deleteMessage').innerHTML = 'Are you sure you want to delete ' + name + '?';

        })
    </script>
            <script>
                $(document).ready(function (e) {
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
                        drop: function (event, ui) {
                            ui.droppable = $(this);
                            var answers = $('#qatable').find('.position');
                            toindex = answers.index(ui.droppable);


                            fromindex = answers.index(ui.draggable);

                            var placeholder = $('<div id="placeholder">&nbsp;</div>').insertBefore(ui.droppable); // Placeholder
                            if (toindex < fromindex) { // Moving an answer up
                                for (var i = toindex; i < fromindex; i++) {
                                    answers.eq(i).insertBefore(answers.eq(i + 1)); // Shift everything down
                                }
                                ui.draggable.insertBefore(placeholder); // Move the draggable answer to where the other one was
                                placeholder.remove();
                            } else { // Moving the answer down
                                for (var i = toindex; i > fromindex; i--) {
                                    answers.eq(i).insertBefore(answers.eq(i - 1)); // Shift everything up
                                }
                                ui.draggable.insertBefore(placeholder); // Move the draggable answer to where the other one was
                                placeholder.remove();
                            }


                            $.ajax({
                                type: 'POST',
                                url: '{{ route('profile.gallery.position', $profile->id) }}',
                                data: {fromindex: fromindex + 1, toindex: toindex + 1},
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

                            console.log("Go mrdam: ", fromindex + 1);
                            console.log("Na pozicija: ", toindex + 1);
                        }
                    });
                });
            </script>
@endsection
