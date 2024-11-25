@extends('landing.layouts.index')

@section('css')
@endsection

@section('content')
    <section class="banner__area-four banner__bg-four" data-background="{{ asset('landing/img/banner/h5_banner_bg.jpg') }}">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6">
                    <div class="banner__content-four">
                        <h2 class="title" data-aos="fade-up" data-aos-delay="100">{{ $header->pesan }}</span>
                        </h2>
                        <p data-aos="fade-up" data-aos-delay="300">{{ $header->deskripsi }}</p>
                        <div class="shape">
                            <img src="{{ asset('landing/img/banner/h5_banner_shape01.png') }}" alt=""
                                class="rotateme">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-9">
                    <div class="banner__img-two">
                        <img src="{{ url('file/header/' . $header?->foto) }}" alt="">
                        <div class="img__shape">
                            <img src="{{ asset('landing/img/banner/h5_banner_shape03.png') }}" alt=""
                                class="alltuchtopdown">
                            <img src="{{ asset('landing/img/banner/h5_banner_shape05.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="blog__post-area-five">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="section-title text-center mb-50 tg-heading-subheading animation-style3">
                        <h2 class="title tg-element-title">JENIS LAYANAN</h2>
                    </div>
                </div>
            </div>
            <div class="services-item-wrap">
                <div class="row justify-content-center">
                    @foreach ($jenis_layanan as $item)
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                            <div class="services-item shine-animate-item">
                                <div class="services-content">
                                    <h2 class="title"><a href="{{ route('layanan', ['layanan' => $item->id_jenis_layanan]) }}">{{$item->nama_layanan}}</a></h2>
                                    <p>{{$item->deskripsi}}</p>
                                    <a href="{{ route('layanan', ['layanan' => $item->id_jenis_layanan]) }}" class="btn">Detail Layanan</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="blog-shape-wrap">
            <img src="{{ asset('landing/img/images/h5_blog_shape01.png') }}" alt=""
                data-aos="fade-right"data-aos-delay="400">
            <img src="{{ asset('landing/img/images/h5_blog_shape02.png') }}" alt="" data-aos="fade-left"
                data-aos-delay="400">
        </div>
    </section>
    <section class="services-area services-bg" data-background="{{ asset('landing/img/bg/services_bg.jpg') }}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="section-title text-center mb-40 tg-heading-subheading animation-style3">
                        <!-- <span class="sub-title">WHAT WE OFFER</span> -->
                        <h2 class="title tg-element-title">BERITA TERBARU</h2>
                    </div>
                </div>
            </div>
            <div class="services-item-wrap">
                <div class="row justify-content-center">
                    @foreach ($berita as $item)
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                            <div class="services-item shine-animate-item">
                                <div class="services-thumb">
                                    <a href="{{ route('berita-detail', ['id' => $item->id_berita]) }}"
                                        class="shine-animate"><img src="{{ url('file/berita/' . $item->foto) }}"
                                            alt="" /></a>
                                </div>
                                <div class="services-content">
                                    <h4 class="title"><a
                                            href="{{ route('berita-detail', ['id' => $item->id_berita]) }}">{{ $item->nama_kategori }}</a>
                                    </h4>
                                    <p>{{ $item->judul }}</p>
                                    <a href="{{ route('berita-detail', ['id' => $item->id_berita]) }}"
                                        class="btn">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
@endsection

@section('javascript')
@endsection
