@extends('landing.layouts.index')

@section('css')
@endsection

@section('content')
    <section class="breadcrumb__area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="breadcrumb__content">
                        <h2 class="title">Publikasi</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('index') }}">Beranda</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Publikasi</li>
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
    <section class="blog__area">
        <div class="container">
            <div class="blog__inner-wrap">
                <div class="row">
                    <div class="col-70">
                        <div class="blog-post-wrap">
                            <div class="row gutter-24">
                                @foreach ($all as $item)
                                    <div class="col-md-6">
                                        <div class="blog__post-two shine-animate-item">
                                            <div class="blog__post-thumb-two">
                                                <a href="{{ route('berita-detail', ['id' => $item->id_berita]) }}" class="shine-animate">
                                                    <img src="{{ url('file/berita/'.$item->foto) }}" alt="">
                                                </a>
                                            </div>
                                            <div class="blog__post-content-two">
                                                <div class="blog-post-meta">
                                                    <ul class="list-wrap">
                                                        <li><a class="blog__post-tag-two">{{$item->nama_kategori}}</a></li>
                                                        <li>
                                                            <i class="fas fa-calendar-alt"></i>
                                                            {{ \Carbon\Carbon::parse($item->tanggal)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                                                        </li>
                                                    </ul>
                                                </div>
                                                <h2 class="title">
                                                    <a href="{{ route('berita-detail', ['id' => $item->id_berita]) }}">{{$item->judul}}</a>
                                                </h2>
                                                <div class="blog-avatar">
                                                    <div class="avatar-content">
                                                        <p>By <a href="{{ route('berita-detail', ['id' => $item->id_berita]) }}">{{$item->nama_petugas}}</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- Tambahkan Pagination -->
                            <div class="pagination-wrap mt-40">
                                {{ $all->appends(['id_kategori' => request('id_kategori')])->links('pagination::bootstrap-4') }}
                            </div>
                        </div>

                    </div>
                    <div class="col-30">
                        <aside class="blog__sidebar">
                            <div class="sidebar__widget">
                                <h4 class="sidebar__widget-title">Kategori</h4>
                                <div class="sidebar__cat-list">
                                    <ul class="list-wrap">
                                        @foreach ($kategori as $item)
                                        <li>
                                            <a href="{{ route('berita').'?id_kategori='.$item->id_kategori }}"><i class="flaticon-arrow-button"></i>{{$item->nama_kategori}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
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
