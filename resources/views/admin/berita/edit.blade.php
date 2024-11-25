@extends('admin.layouts.index')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/custom/select/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/custom/flatpickr/flatpickr.min.css') }}">
@endsection

@section('content')
    <div class="flex-column-fluid">
        <div class="card mb-5 mb-xl-8 border-2 shadow p-3 mb-5 bg-white rounded">
            <div class="card-header">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">berita</span>
                </h3>

            </div>
            <form action="{{ route('admin.berita.update', $id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    @include('errors.alert')
                    <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2 required">
                            <span>Kategori</span>
                        </label>
                        <select class="selectpicker form-control form-control-sm form-select-solid " name="id_kategori"
                            id="id_kategori" data-live-search="true" title="Pilih" required>
                            @foreach ($all as $item)
                                <option value="{{ $item->id_kategori }}" @selected($item->id_kategori == $one?->id_kategori)>
                                    {{ $item->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2 required">
                            <span>Judul</span>
                        </label>
                        <input type="text" name="judul" class="form-control form-control-sm "
                            value="{{ $one?->judul }}" required />
                    </div>
                    <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2 required">
                            <span>Deskripsi</span>
                        </label>
                        <textarea type="text" name="deskripsi" class="form-control form-control-sm " required>{{ $one?->deskripsi }}</textarea>
                    </div>
                    <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span>Foto</span>
                        </label>
                        <input type="file" accept=".png, .jpg, .jpeg" id="foto" name="foto" class="form-control form-control-sm "
                            onchange="previewFoto()" />
                        <div id="previewContainer" class="mt-3">
                            <!-- Menampilkan gambar default jika ada -->
                            <img id="defaultPreview" src="{{ url('file/berita/' . $one?->foto) }}"
                                style="max-width: 100%; max-height: 200px; display: {{ $one?->foto ? 'block' : 'none' }}"
                                alt="Pratinjau Foto" />
                        </div>

                    </div>
                    <img src="{{ url('file/foto/' . $one?->foto) }}" style="max-width: 100%; max-height: 200px">

                    <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2 ">
                            <span>Dokumen</span>
                        </label>
                        <input type="file" accept=".pdf" id="dokumen" name="dokumen" class="form-control form-control-sm " />
                        @if ($one?->dokumen != null)
                            <a href="{{ url('file/dokumen/' . $one?->dokumen) }}" class="btn btn-sm btn-primary p-1 w-100px fs-8 mt-2">Download</a>
                        @endif
                    </div>
                    <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2 required">
                            <span>Tanggal</span>
                        </label>
                        <div class="position-relative d-flex align-items-center">
                            <span class="svg-icon svg-icon-2 position-absolute mx-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <path opacity="0.3"
                                        d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z"
                                        fill="black" />
                                    <path
                                        d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z"
                                        fill="black" />
                                    <path
                                        d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z"
                                        fill="black" />
                                </svg>
                            </span>
                            <input type="text" class="form-control form-control-sm ps-12" id="tanggal" name="tanggal"
                                placeholder="Pilih Tanggal" value="{{ $one?->tanggal }}" readonly required />
                        </div>
                    </div>
                    <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2 required">
                            <span>Status</span>
                        </label>
                        @php
                            if ($one->status == 'y') {
                                $active = 'checked';
                                $block = '';
                            } else {
                                $active = '';
                                $block = 'checked';
                            }
                        @endphp
                        <div class="d-flex fv-row mb-2">
                            <div class="form-check form-check-custom form-check-solid">
                                <input {{ $active }} class="form-check-input me-3" name="status" type="radio"
                                    value="y" id="kt_modal_update_role_option_1">
                                <label class="form-check-label" for="kt_modal_update_role_option_1">
                                    <div class="fw-bolder text-gray-800">Ya</div>
                                </label>
                            </div>
                        </div>
                        <div class="d-flex fv-row">
                            <div class="form-check form-check-custom form-check-solid">
                                <input {{ $block }} class="form-check-input me-3" name="status" type="radio"
                                    value="t" id="kt_modal_update_role_option_2">
                                <label class="form-check-label" for="kt_modal_update_role_option_2">
                                    <div class="fw-bolder text-gray-800">Tidak Aktif</div>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-sm btn-primary w-250px" id="btnSubmit">
                            <span class="indicator-label">Simpan</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('assets/plugins/custom/select/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/select/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/flatpickr/flatpickr.js') }}"></script>
    <script>
        $("#tanggal").flatpickr({
            dateFormat: "Y-m-d H:i", // Menggunakan dateFormat, bukan format
            altFormat: "Y-m-d H:i",
            enableTime: true, // Menambahkan ini untuk mengaktifkan input waktu
            allowInput: false,
            altInput: true,
        });

        function previewFoto() {
            const input = document.getElementById('foto');
            const previewContainer = document.getElementById('previewContainer');
            const defaultPreview = document.getElementById('defaultPreview');

            if (input.files && input.files[0]) {
                const file = input.files[0];
                const reader = new FileReader();

                reader.onload = function(e) {
                    // Jika ada file yang dipilih, tampilkan pratinjau baru
                    if (defaultPreview) defaultPreview.style.display = 'none'; // Sembunyikan gambar default
                    let img = document.createElement('img');
                    img.src = e.target.result;
                    img.alt = "Pratinjau Foto";
                    img.style.maxWidth = "100%";
                    img.style.maxHeight = "200px";
                    img.classList.add('img-thumbnail');

                    // Bersihkan kontainer dan tambahkan gambar baru
                    previewContainer.innerHTML = '';
                    previewContainer.appendChild(img);
                };

                reader.readAsDataURL(file);
            } else {
                // Jika tidak ada file yang dipilih, kembalikan gambar default
                if (defaultPreview) defaultPreview.style.display = 'block';
                previewContainer.innerHTML = '';
            }
        }
        window.onbeforeunload = function() {
            $("button[type=submit]").prop("disabled", "disabled");
        }
        window.setTimeout(function() {
            $(".alert").fadeTo(1000, 0).slideUp(1000, function() {
                $(this).remove();
            });
        }, 2000);
    </script>
@endsection
