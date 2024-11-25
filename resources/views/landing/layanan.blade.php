@extends('landing.layouts.index')

@section('css')
@endsection

@section('content')
<section class="breadcrumb__area">
    <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="breadcrumb__content">
                        <h2 class="title">{{ $one?->nama_layanan }}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('index') }}">Beranda</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $one?->nama_layanan }}</li>
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
    <section class="services__area-three services__bg-three"
        data-background="{{ asset('landing/img/bg/h3_services_bg.jpg') }}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title white-title text-center mb-50">
                        <h2 class="title">JENIS-JENIS</h2>
                        <h2 class="title">{{ $one?->nama_layanan }}</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center gutter-24">
                @foreach ($all as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="services__item-three">
                            <div class="services__item-top">

                                <div class="services__item-top-title">
                                    <h2 class="title"><a href="#">{{ $item->nama_layanan }}</a></h2>
                                </div>
                            </div>
                            <div class="services__content-three">
                                <p>{{ $item->deskripsi }}</p>
                                <a href="#" class="btn btn-two">Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@section('javascript')
@endsection
