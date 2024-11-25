@extends('landing.layouts.index')

@section('css')
@endsection

@section('content')
    <section class="breadcrumb__area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="breadcrumb__content">
                        <h2 class="title">Galeri Foto</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('index') }}">Beranda</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Galeri Foto</li>
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
                            <!-- Adding data-image attribute to store image URL -->
                            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                data-image="{{ url('file/foto/' . $item->foto) }}" data-judul="{{ $item->judul_foto }}"
                                data-deskripsi="{{ $item->deskripsi }}">
                                <img src="{{ url('file/foto/' . $item->foto) }}" alt="">
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fs-5" id="modal-title">Modal title</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Gambar akan diperbarui secara dinamis -->
                    <img id="modal-image" src="" alt="" width="100%" height="100%"
                        style="object-fit: cover;">
                    <p id="modal-deskripsi"></p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modalImage = document.getElementById('modal-image');
            const modalTitle = document.getElementById('modal-title');
            const modalDeskripsi = document.getElementById('modal-deskripsi');

            // Tambahkan event listener pada semua elemen dengan atribut data-bs-toggle="modal"
            document.querySelectorAll('a[data-bs-toggle="modal"]').forEach(item => {
                item.addEventListener('click', function() {
                    // Ambil data dari atribut elemen
                    const imageUrl = this.getAttribute('data-image');
                    const judul = this.getAttribute('data-judul');
                    const deskripsi = this.getAttribute('data-deskripsi');

                    // Debug untuk memeriksa apakah data tersedia
                    console.log('Image URL:', imageUrl);
                    console.log('Judul:', judul);
                    console.log('Deskripsi:', deskripsi);

                    // Perbarui elemen modal dengan data yang didapat
                    modalTitle.textContent = judul ||
                    'Default Title'; // Gunakan nilai default jika data tidak ada
                    modalDeskripsi.textContent = deskripsi || 'Tidak ada deskripsi yang tersedia.';
                    modalImage.src = imageUrl || ''; // Kosongkan src jika URL tidak valid
                });
            });
        });
    </script>
@endsection
