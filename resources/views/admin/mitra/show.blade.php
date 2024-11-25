@extends('admin.layouts.index')

@section('css')
@endsection

@section('content')
    <div class="flex-column-fluid">
        <div class="card mb-5 mb-xl-8 border-2 shadow p-3 mb-5 bg-white rounded">
            <div class="card-header">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">mitra</span>
                </h3>

            </div>
            <div class="card-body">
                <div class="d-flex flex-column mb-8 fv-row">
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2 required">
                        <span>Mitra</span>
                    </label>
                    <p class="my-3">{{ $one?->nama_mitra }}</p>

                </div>
                <div class="d-flex flex-column mb-8 fv-row">
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2 required">
                        <span>Kabupaten</span>
                    </label>
                    <p class="my-3">{{ $one?->kabupaten }}</p>

                </div>
                <div class="d-flex flex-column mb-8 fv-row">
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2 required">
                        <span>Alamat</span>
                    </label>
                    <p class="my-3">{{ $one?->alamat_mitra }}</p>

                </div>
                <div class="d-flex flex-column mb-8 fv-row">
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2 required">
                        <span>Deskripsi</span>
                    </label>
                    <p class="my-3">{{ $one?->deskripsi_mitra }}</p>
                </div>
                <img id="defaultPreview" src="{{ url('file/mitra/' . $one?->foto_mitra) }}"
                    style="max-width: 100%; max-height: 200px; display: {{ $one?->foto_mitra ? 'block' : 'none' }}"
                    alt="Pratinjau Foto">
            </div>
        </div>
    </div>
@endsection

@section('javascript')
@endsection
