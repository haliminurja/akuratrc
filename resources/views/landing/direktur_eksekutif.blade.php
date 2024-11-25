@extends('landing.layouts.index')

@section('css')
@endsection

@section('content')
    <section class="breadcrumb__area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="breadcrumb__content">
                        <h2 class="title">Direktur Eksekutif</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('index') }}">Beranda</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Direktur Eksekutif</li>
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
    <section class="team__details-area">
        <div class="container">
            @foreach ($all as $item)
                <div class="team__details-inner mb-30">
                    <div class="row align-items-center">
                        <div class="col-36">
                            <div class="team__details-img">
                                <img src="{{ url('file/struktur/' . $item->foto) }}" alt="">
                            </div>
                        </div>
                        <div class="col-64">
                            <div class="team__details-content">
                                <h2 class="title">{{$item->nama}}</h2>
                                <span class="position">{{$item->nama_jabatan}}</span>
                                <p>-</p>
                                <div class="team__details-info">
                                    <ul class="list-wrap">
                                        <li>
                                            <i class="flaticon-phone-call"></i>
                                            <a href="tel:{{$item->telp}}">{{$item->telp}}</a>
                                        </li>
                                        <li>
                                            <i class="flaticon-mail"></i>
                                            <a href="mailto:{{$item->email}}">{{$item->email}}</a>
                                        </li>
                                        <li>
                                            <i class="flaticon-pin"></i>
                                            {{$item->alamat}}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection

@section('javascript')
@endsection
