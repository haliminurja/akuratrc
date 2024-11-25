@extends('landing.layouts.index')

@section('css')
@endsection

@section('content')
    <section class="breadcrumb__area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="breadcrumb__content">
                        <h2 class="title">Tim Akurat</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('index') }}">Beranda</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tim Akurat</li>
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
    <section class="team__area-three">
        <div class="container">
            <div class="row gutter-24 justify-content-center">
                @foreach ($all as $item)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                        <div class="team__item-three shine-animate-item">
                            <div class="team__thumb-three shine-animate">
                                <img src="{{ url('file/struktur/' . $item->foto) }}" alt="">
                            </div>
                            <div class="team__content-three">
                                <h4 class="title"><a href="#">{{ $item->nama }}</a></h4>
                                <span>{{ $item->nama_jabatan }}</span>
                            </div>
                            <div class="team-social team__social-three">
                                <ul class="list-wrap">
                                    <li><a href="{{ $item->fb }}"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="{{ $item->ig }}"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                                <div class="social-toggle-icon">
                                    <i class="fas fa-share-alt"></i>
                                </div>
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
