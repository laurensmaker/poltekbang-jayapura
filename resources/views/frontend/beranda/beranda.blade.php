@extends('frontend.layouts.main')
@section('content')
 <!-- home-slider start -->
<section class="slider-content">
    <div class="home-slider owl-carousel owl-theme" id="home-slider">
        <div class="item">
            <div class="slide-image">
                <img src="{{ asset('frontend/images/beranda.png') }}" class="img-fluid desk-img" alt="backery-slider-01">
                <img src="{{ asset('frontend/images/beranda.png') }}" class="img-fluid mobile-img" alt="mobile-slider-01">
                <div class="container slider-info-content">
                    <div class="row">
                        <div class="col">
                            <div class="slider-text-info slider-content-center slider-text-center">
                                <span class="sub-title e1">Selamat Datang</span>
                                <h2 class="e1">Poltekbang Jayapura</h2>
                                {{-- <a href="collection.html" class="btn btn-style e1">Shop now</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- home-slider end -->

    
@endsection