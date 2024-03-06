@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="border-bottom title-part-padding">
            <h4 class="card-title mb-0">Edit User: {{ $user->name }}</h4>
        </div>
        <div class="card-body">
            <form class="needs-validation" novalidate="" action="{{ route('admin.users.update', $user->id) }}" method="post">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name" value="{{  $user->name }}"
                               required="" name="name">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="valid-feedback">Looks good!</div>

                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email"
                               value="{{ $user->email }}" required="" name="email">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="password">Password</label>


                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" required="" name="password">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="password_confirmation">Repeat Password</label>


                        <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                               name="password_confirmation" required autocomplete="new-password">

                        @error('password_confirmation')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label class="form-label" for="role">Role</label>
                        <select class="form-control" id="role_id" name="role_id">
                            @foreach($roles as $role)
                                <option value="{{  $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <button class="btn btn-primary mt-3 rounded-pill px-4" type="submit">
                    Update user
                </button>
            </form>
        </div>
    </div>
@endsection
