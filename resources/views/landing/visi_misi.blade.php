@extends('landing.layouts.index')

@section('css')
@endsection

@section('content')
    <section class="breadcrumb__area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="breadcrumb__content">
                        <h2 class="title">Visi & Misi</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('index') }}">Beranda</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Visi & Misi</li>
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
    <section class="about__area-seven">
        <div class="container">
            <div class="project__details-wrap">
                <div class="row">
                    <div class="col-12 mb-30">
                        <div class="project__details-content">
                            <h2 class="title">VISI</h2>
                            <div class="about__list-box">
                                <ul class="list-wrap">
                                    <li>{{$visi->deskripsi}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="project__details-content">
                            <h2 class="title">MISI</h2>
                            <div class="about__list-box">
                                <ul class="list-wrap">
                                    @foreach ($misi as $item)
                                        <li><i class="flaticon-arrow-button"></i>{{$item->deskripsi}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('javascript')
@endsection
