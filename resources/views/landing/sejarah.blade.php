@extends('landing.layouts.index')

@section('css')
@endsection

@section('content')
    <section class="breadcrumb__area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="breadcrumb__content">
                        <h2 class="title">Sejarah</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('index') }}">Beranda</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Sejarah</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb__shape">
            <img src="{{ asset('landing/img/images/breadcrumb_shape01.png') }}" alt="">
            <img src="{{ asset('landing/img/images/breadcrumb_shape02.png') }}" alt="" class="rightToLeft">
            <img src="{{ asset('landing/img/images/breadcrumb_shape03.png') }}" alt="">
            <img src="{{ asset('landing/img/images/breadcrumb_shape04.png') }}" alt="">
            <img src="{{ asset('landing/img/images/breadcrumb_shape05.png') }}" alt="" class="alltuchtopdown">
        </div>
    </section>
    <section class="about__area-six">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="about__img-wrap-six">
                        <img src="{{ asset('landing/img/logo/logo.png') }}" alt="">
                        <div class="shape">
                            <img src="{{ asset('landing/img/images/h4_about_img_shape.png') }}" alt="" class="alltuchtopdown">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about__content-six">
                        <div class="section-title mb-25">
                            <span class="sub-title">Sejarah Akurat Center</span>
                            <h2 class="title">
                                Berdiri Sejak Tahun {{$one?->tahun}}
                            </h2>
                        </div>
                        <p>{{$one?->deskripsi_sejarah}}</p>
                        <a href="{{route('kontak') }}" class="btn btn-two">
                            Hubungi Kami
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="about__shape-wrap-four">
            <img src="{{ asset('landing/img/images/h4_about_shape01.png') }}" alt="">
            <img src="{{ asset('landing/img/images/h4_about_shape02.png') }}" alt="" data-parallax='{"x" : -80 , "y" : -80 }'>
        </div>
    </section>
@endsection

@section('javascript')
@endsection
