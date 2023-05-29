@extends('layouts.frontend')
@section('gallery')
    <!-- section start -->
    <!-- ================ -->
    <section class="pv-30 clearfix">
        <div class="container">
            <div class="row">
                <h2 class="text-center text-muted logo-font">Photo <span class="text-default">Gallery</span></h2>
                <div class="separator"></div>
            </div>
            <!-- isotope filters start -->
            <div class="filters text-center">
                <ul class="nav nav-pills">
                    <li class="active"><a href="#" data-filter="*">All</a></li>
                    <li><a href="#" data-filter=".photo-booth">Photo Booth</a></li>

                </ul>
            </div>
            <!-- isotope filters end -->
        </div>
        <div class="isotope-container row grid-space-0">


            @foreach($images as $image)


            <div class="col-sm-6 col-md-3 isotope-item photo-booth">
                <div class="image-box text-center">
                    <div class="overlay-container overlay-visible">
                        <img src="/images/guests/thumbs/{{ $image->getFileName() }}" alt="">
                        <a href="/images/guests/{{ $image->getFileName() }}" class="popup-img overlay-link"><i class="fa fa-plus"></i></a>

                    </div>
                </div>
            </div>

                @endforeach



        </div>

    </section>
    <!-- section end -->
    @endsection
