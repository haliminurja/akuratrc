@extends('landing.layouts.index')

@section('css')
@endsection

@section('content')
    <section class="breadcrumb__area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="breadcrumb__content">
                        <h2 class="title">Galeri Video</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('index') }}">Beranda</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Galeri Video</li>
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
    <section class="services__area-three services__bg-three">
        <div class="container">
            <div class="footer-instagram-2">
                <ul class="list-wrap justify-content-center">
                    @foreach ($all as $item)
                        <li>
                            <div class="about__list-img-three position-relative overflow-hidden rounded-3 shadow-lg">
                                <!-- Gambar Thumbnail -->
                                <a href="https://www.youtube.com/watch?v={{ $item->link }}"
                                   class="popup-video d-block text-decoration-none position-relative"
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   aria-label="Play video: {{ $item->judul }}">
                                    <!-- Thumbnail dengan efek overlay -->
                                    <img
                                        src="https://img.youtube.com/vi/{{ $item->link }}/hqdefault.jpg"
                                        alt="Thumbnail for {{ $item->judul }}"
                                        class="img-fluid rounded-3">
                                    <!-- Overlay dengan efek gelap -->
                                    <div class="video-overlay position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50"></div>
                                    <!-- Tombol Play -->
                                    <div class="play-icon-wrapper position-absolute top-50 start-50 translate-middle d-flex align-items-center justify-content-center">
                                        <span
                                            class="play-icon bg-white text-warning rounded-circle shadow-lg d-flex align-items-center justify-content-center"
                                            style="width: 70px; height: 70px;">
                                            <i class="fas fa-play" style="font-size: 24px;"></i>
                                        </span>
                                    </div>
                                </a>
                            </div>


                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

@endsection

@section('javascript')

@endsection
