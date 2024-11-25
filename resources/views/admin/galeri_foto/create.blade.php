@extends('admin.layouts.index')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/custom/select/bootstrap-select.min.css') }}">
@endsection

@section('content')
    <div class="flex-column-fluid">
        <div class="card mb-5 mb-xl-8 border-2 shadow p-3 mb-5 bg-white rounded">
            <div class="card-header">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">galeri foto</span>
                </h3>

            </div>
            <form action="{{ route('admin.galeri_foto.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    @include('errors.alert')
                    <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2 required">
                            <span>Judul</span>
                        </label>
                        <input type="text" name="judul_foto" class="form-control form-control-sm " required />
                    </div>
                    <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2 required">
                            <span>Deskripsi</span>
                        </label>
                        <textarea type="text" name="deskripsi" class="form-control form-control-sm " required></textarea>
                    </div>
                    <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2 required">
                            <span>Foto</span>
                        </label>
                        <input type="file" id="foto" name="foto" class="form-control form-control-sm "  onchange="previewFoto()" required />
                        <div id="previewContainer" class="mt-3"></div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-sm btn-primary w-250px" id="btnSubmit">
                            <span class="indicator-label">Simpan</span>
                        </button>
                    </div>
            </form>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('assets/plugins/custom/select/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/select/bootstrap-select.min.js') }}"></script>
    <script>
        function previewFoto() {
            const input = document.getElementById('foto');
            const previewContainer = document.getElementById('previewContainer');
            previewContainer.innerHTML = ''; // Menghapus pratinjau sebelumnya

            if (input.files && input.files[0]) {
                const file = input.files[0];
                const reader = new FileReader();

                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.alt = "Pratinjau Foto";
                    img.style.maxWidth = "100%";
                    img.style.maxHeight = "200px";
                    img.classList.add('img-thumbnail');
                    previewContainer.appendChild(img);
                };

                reader.readAsDataURL(file);
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
