@extends('admin.layouts.index')

@section('css')
@endsection

@section('content')
    <div class="flex-column-fluid">
        <div class="card mb-5 mb-xl-8 border-2 shadow p-3 mb-5 bg-white rounded">
            <div class="card-header">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">berita</span>
                </h3>

            </div>
            <div class="card-body">
                <div class="d-flex flex-column mb-8 fv-row">
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2 required">
                        <span>Judul</span>
                    </label>
                    <p class="my-3">{{ $one?->judul }}</p>

                </div>
                <div class="d-flex flex-column mb-8 fv-row">
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2 required">
                        <span>Deskripsi</span>
                    </label>
                    <p class="my-3">{{ $one?->deskripsi }}</p>
                </div>
                <div class="d-flex flex-column mb-8 fv-row">
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2 required">
                        <span>Tanggal</span>
                    </label>
                    <p class="my-3">{{ $one?->tanggal }}</p>
                </div>
                <img id="defaultPreview" src="{{ url('file/berita/' . $one?->foto) }}"
                    style="max-width: 100%; max-height: 200px; display: {{ $one?->foto ? 'block' : 'none' }}"
                    alt="Pratinjau Foto">

                @if ($one?->dokumen != null)
                    <a href="{{ url('file/dokumen/' . $one?->dokumen) }}" class="btn btn-sm btn-primary p-1 w-100px fs-8 mt-2">Download</a>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('javascript')
@endsection
