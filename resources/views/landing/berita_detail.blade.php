@extends('landing.layouts.index')

@section('css')
@endsection

@section('content')
    <section class="breadcrumb__area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="breadcrumb__content">
                        <h2 class="title">Publikasi Detail</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('index') }}">Beranda</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Publikasi Detail</li>
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
    <section class="blog__details-area">
        <div class="container">
            <div class="blog__inner-wrap">
                <div class="row">
                    <div class="col-70">
                        <div class="blog__details-wrap">
                            <div class="blog__details-thumb">
                                <img src="{{ url('file/berita/'.$one->foto) }}" alt="">
                            </div>
                            <div class="blog__details-content">
                                <h2 class="title">{{$one?->judul}}</h2>
                                <div class="blog-post-meta">
                                    <ul class="list-wrap">
                                        <li><a href="#" class="blog__post-tag-two">{{$one?->nama_kategori}}</a></li>
                                        <li><i class="fas fa-calendar-alt"></i>{{ Carbon\Carbon::parse($one?->tanggal)?->locale('id')?->isoFormat('dddd, D MMMM YYYY') }}</li>
                                    </ul>
                                </div>
                                <p>{{$one->deskripsi}}</p>
                                @if ($one?->dokumen != null)
                                    <p class="mb-2">Download Laporan PDF:</p>
                                    <a href="{{ url('file/dokumen/' . $one?->dokumen) }}" target="_blank" class="btn btn-sm btn-primary p-2 w-100px">Download</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-30">
                            <div class="sidebar__widget">
                                <h4 class="sidebar__widget-title">Berita Lainnya</h4>
                                <div class="sidebar__post-list">
                                    @foreach ($berita as $item)
                                    <div class="sidebar__post-item">
                                        <div class="sidebar__post-content">
                                            <h5 class="title"><a href="{{ route('berita-detail', ['id' => $item->id_berita]) }}">{{ $item->judul }}</a></h5>
                                            <span class="date"><i class="flaticon-time"></i>{{ Carbon\Carbon::parse($item->tanggal)?->locale('id')?->isoFormat('dddd, D MMMM YYYY') }}</span>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('javascript')
@endsection
