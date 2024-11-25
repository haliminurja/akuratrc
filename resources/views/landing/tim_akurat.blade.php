@extends('landing.layouts.index')

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
        <div class="breadcrumb__shape">
            <img src="{{ asset('landing/img/images/breadcrumb_shape01.png') }}" alt="Decorative Shape">
            <img src="{{ asset('landing/img/images/breadcrumb_shape02.png') }}" alt="Decorative Shape" class="rightToLeft">
            <img src="{{ asset('landing/img/images/breadcrumb_shape03.png') }}" alt="Decorative Shape">
            <img src="{{ asset('landing/img/images/breadcrumb_shape04.png') }}" alt="Decorative Shape">
            <img src="{{ asset('landing/img/images/breadcrumb_shape05.png') }}" alt="Decorative Shape" class="alltuchtopdown">
        </div>
    </section>
    <section class="team__area-three">
        <div class="container">
            <!-- Komisaris & Wakil Komisaris Section -->
            <h5 class="title"><a href="#">Komisaris & Wakil Komisaris</a></h5>
            <div class="row gutter-24">
                @forelse ($top1 as $item)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                    <div class="team__item-three shine-animate-item">
                        <div class="team__thumb-three shine-animate">
                            <img src="{{ url('file/struktur/' . ($item->foto ?? 'default.jpg')) }}" alt="{{ $item->nama }}">
                        </div>
                        <h5 class="text-dark"><a href="#">{{ $item->nama }}</a></h5>
                        <span class="text-dark">{{ $item->nama_jabatan }}</span>
                    </div>
                </div>
                @empty
                    <p>No data available.</p>
                @endforelse
            </div>
            <!-- Direktur & Wakil Direktur Section -->
            <h5 class="title"><a href="#">Direktur & Wakil Direktur</a></h5>
            <div class="row gutter-24">
                @forelse ($top2 as $item)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                        <div class="team__item-three shine-animate-item">
                            <div class="team__thumb-three shine-animate">
                                <img src="{{ url('file/struktur/' . ($item->foto ?? 'default.jpg')) }}" alt="{{ $item->nama }}">
                            </div>
                            <h5 class="text-dark"><a href="#">{{ $item->nama }}</a></h5>
                            <span class="text-dark">{{ $item->nama_jabatan }}</span>
                        </div>
                    </div>
                @empty
                    <p>No data available.</p>
                @endforelse
            </div>
            <!-- Kepala Bagian Section -->
            <h5 class="title"><a href="#">Kepala Bagian</a></h5>
            <div class="row gutter-24">
                @forelse ($top3 as $item)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                    <div class="team__item-three shine-animate-item">
                        <div class="team__thumb-three shine-animate">
                            <img src="{{ url('file/struktur/' . ($item->foto ?? 'default.jpg')) }}" alt="{{ $item->nama }}">
                        </div>
                        <h5 class="text-dark"><a href="#">{{ $item->nama }}</a></h5>
                        <span class="text-dark">{{ $item->nama_jabatan }}</span>
                    </div>
                </div>
                @empty
                    <p>No data available.</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection
