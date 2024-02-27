<div class="d-flex align-items-center justify-content-between mb-4 musician-items">
    <div class="d-flex">
        <div class="p-8  d-flex align-items-center justify-content-center me-6">
            <div class="rounded-circle" style="width: 60px; height: 60px; background-image: url('/images/logos/musicians/thumbnails/{{ $musician->logo }}'); background-size: cover; background-position: center; background-color: #ffffff"></div>
        </div>
        <div style="margin-top: 30px">
            <p class="fw-semibold"> {{ $musician->name }}</p>

        </div>
    </div>
    <h6 class="mb-0 fw-semibold remove-musician-list" data-musician-id="{{ $musician->id }}" style="cursor:pointer;">x</h6>
</div>

