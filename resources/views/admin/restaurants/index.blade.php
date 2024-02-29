@extends('layouts.admin')
@section('content')
    <div class="card w-100 position-relative overflow-hidden">
        <div class="px-4 py-3 border-bottom">
            <h5 class="card-title fw-semibold mb-0 lh-sm">Restaurants Table</h5>
        </div>
        <div class="card-body p-4">

            <div class="table-responsive mb-4">
                <table class="table border text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                    <tr>
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
                                                    class="fs-4 ti ti-plus"></i>Add</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center gap-3" href="#"><i
                                                    class="fs-4 ti ti-edit"></i>Edit</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center gap-3" href="#"><i
                                                    class="fs-4 ti ti-trash"></i>Delete</a>
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
@endsection
