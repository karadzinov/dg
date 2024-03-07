@extends('layouts.admin')
@section('content')
    <form action="{{ route('admin.categories.update', $category->id) }}" method="post">
        @method('put')
        @csrf
        <div class="row mt-4">
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name"
                           value="{{ $category->name  }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

            </div>


            <div class="mb-3 row">
                <label for="parent_id">Sub Category</label>
                <select class="form-control @error('parent_id') is-invalid @enderror" name="parent_id" id="parent_id">
                    <option value="">Main Category</option>
                    {!! $categories !!}
                </select>

                @error('user_id')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>


            <div class="mb-3 row">
                <button type="submit" class="btn btn-warning">Edit Category</button>
            </div>
        </div>
    </form>



    <div class="row">
        <div class="col-12">
            <form method="post" action="{{ route('admin.categories.destroy', $category->id) }}">
                @csrf
                @method('delete')

                <button type="submit" class="btn btn-danger">Delete {{ $category->name }}</button>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $("#parent_id").val("{{ $category->parent_id }}").change();
    </script>
@endsection
