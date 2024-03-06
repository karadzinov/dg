@extends('layouts.admin')
@section('content')
    <div class="card w-100 position-relative overflow-hidden">
        <div class="px-4 py-3 border-bottom">
            <h5 class="card-title fw-semibold mb-0 lh-sm">Users Table</h5>


        </div>
        <div class="card-body p-4">
            <p>
                <a class="btn btn-default" href="{{ route('admin.users.create') }}"><i
                        class="fs-4 ti ti-plus"></i>Create new user</a>
            </p>

            <div class="table-responsive mb-4">
                <table class="table border text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                    <tr>
                        <th>
                            <h6 class="fs-4 fw-semibold mb-0">User</h6>
                        </th>

                        <th>
                            <h6 class="fs-4 fw-semibold mb-0">Category</h6>
                        </th>
                        <th>
                            <h6 class="fs-4 fw-semibold mb-0">Login As...</h6>
                        </th>
                        <th><h6 class="fs-4 fw-semibold mb-0">Action</h6></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="../assets/images/profile/user-2.jpg" class="rounded-circle" width="40"
                                         height="40">
                                    <div class="ms-3">
                                        <h6 class="fs-4 fw-semibold mb-0">{{ $user->name }}</h6>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <p class="mb-0 fw-normal">{{ $user->category }}</p>
                            </td>
                            <td>
                                <form method="post" action="{{ route('admin.users.login') }}">
                                    @csrf
                                    <input type="hidden" name="email" value="{{ $user->email }}">

                                    <button type="submit"
                                            class="btn btn-primary btn-sm ms-auto">{{ $user->email }}</button>
                                </form>
                            </td>
                            <td>
                                <div class="dropdown dropstart">
                                    <a href="#" class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                       aria-expanded="false">
                                        <i class="ti ti-dots-vertical fs-6"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center gap-3"
                                               href="{{ route('admin.users.edit', $user->id) }}"><i
                                                    class="fs-4 ti ti-edit"></i>Edit</a>
                                        </li>
                                        <li>


                                            <button type="button" class="dropdown-item d-flex align-items-center gap-3"
                                                    data-bs-userid="{{ $user->id }}"
                                                    data-bs-user-name="{{ $user->name }}" data-bs-toggle="modal"
                                                    data-bs-target="#userDelete">
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
    <div class="modal fade" id="userDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <form method="post" class="deleteUser">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="deleteUser" class="deleteUser">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

    <script>
        const deleteModal = document.getElementById('userDelete')
        deleteModal.addEventListener('show.bs.modal', event => {
            // Button that triggered the modal
            const button = event.relatedTarget
            // Extract info from data-bs-* attributes
            const userId = button.getAttribute('data-bs-userid')
            const userName = button.getAttribute('data-bs-user-name')

            let action = "/admin/users/" + userId;
            deleteModal.querySelector('form').setAttribute('action', action);
            deleteModal.querySelector('#deleteMessage').innerHTML = 'Are you sure you want to delete ' + userName + '?';

        })
    </script>

@endsection
