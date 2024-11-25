@extends('landing.layouts.index')

@section('css')
@endsection

@section('content')
    <section class="breadcrumb__area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="breadcrumb__content">
                        <h2 class="title">Kontak</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('index') }}">Beranda</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Kontak</li>
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
    <section class="contact__area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-map">
                        <iframe
                            src="{{$one?->maps}}"
                            style="border:0;" allowfullscreen loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="contact__content">
                        <div class="section-title mb-35">
                            <h2 class="title">Bagaimana kami dapat membantu Anda?</h2>
                        </div>
                        <div class="contact__info">
                            <ul class="list-wrap">
                                <li>
                                    <div class="icon">
                                        <i class="flaticon-pin"></i>
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Alamat</h4>
                                        <p>{{$one?->alamat}}</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="flaticon-phone-call"></i>
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Phone</h4>
                                        <a href="tel:{{$one?->telp}}">{{$one?->telp}}</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="flaticon-mail"></i>
                                    </div>
                                    <div class="content">
                                        <h4 class="title">E-mail</h4>
                                        <a href="mailto:{{$one?->email}}">{{$one?->email}}</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('javascript')
@endsection
