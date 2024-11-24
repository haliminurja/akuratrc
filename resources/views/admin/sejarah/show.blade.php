@extends('admin.layouts.index')

@section('css')
@endsection

@section('content')
    <div class="flex-column-fluid">
        <div class="card mb-5 mb-xl-8 border-2 shadow p-3 mb-5 bg-white rounded">
            <div class="card-header">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">sejarah</span>
                </h3>

            </div>
            <div class="card-body">
                <div class="d-flex flex-column mb-8 fv-row">
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                        <span>Deskripsi</span>
                    </label>
                    <p class="mx-3">{{ $one?->deskripsi_sejarah }}</p>

                </div>

                <div class="d-flex flex-column mb-8 fv-row">
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                        <span>tahun</span>
                    </label>
                    <p class="mx-3">{{ $one?->tahun }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
@endsection
