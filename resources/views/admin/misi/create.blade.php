@extends('admin.layouts.index')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/custom/select/bootstrap-select.min.css') }}">
@endsection

@section('content')
    <div class="flex-column-fluid">
        <div class="card mb-5 mb-xl-8 border-2 shadow p-3 mb-5 bg-white rounded">
            <div class="card-header">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">misi</span>
                </h3>

            </div>
            <form action="{{ route('admin.misi.store') }}" method="post">
                @csrf
                <div class="card-body">
                    @include('errors.alert')
                    <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2 required">
                            <span>Visi</span>
                        </label>
                        <select class="selectpicker form-control form-control-sm form-select-solid " name="id_visi"
                            id="id_visi" data-live-search="true" title="Pilih" required>
                            @foreach ($all as $item)
                                <option value="{{ $item->id_visi }}"> {{ Str::limit($item->deskripsi . ' (' . $item->tahun_awal . ' - ' . $item->tahun_akhir . ')', 100) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2 required">
                            <span>Deskripsi</span>
                        </label>
                        <textarea type="text" name="deskripsi" class="form-control form-control-sm " required></textarea>

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
    <script>
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
